<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use Mail;
use App\Mail\SendMailable;
use Socialite;
use App\Models\Cart;
use App\Models\User;
use App\Models\Course;
use App\Models\Image;
use App\Models\Country;
use App\Models\Category;
use App\Models\State;
use App\Models\Review;
use App\Models\Myorder;

class CartsController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['addtocart','updateCount']]);
    }

    function addtocart(Request $request,$slug = null) { 
        
        $id = $slug;
        
        $courseInfo = Course::where('id', $id)->first(); 
        $user_id = Session::get('user_id');
        $course_id = $id;

        if (Cookie::get('cookname_broserId') != '') { 
            $browser_session_id = Cookie::get('cookname_broserId');
        } else { 
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

        $query = new Cart();
        $sess_user_id = 0;
        if(Session::has('user_id')){
            $sess_user_id = Session::get('user_id');
        }
        
        $query = $query->where('session_id', $browser_session_id);
        $query = $query->where('course_id', $course_id);
            
        $ifExist = $query->first();
        
        $serialisedData['quantity'] = 1;
        $serialisedData['course_id'] = $course_id;
        $serialisedData['user_id'] = $sess_user_id;
        
        if ($ifExist) {
            $serialisedData['id'] = $ifExist->id;
            Cart::where('id', $ifExist->id)->update($serialisedData);
        } else {
            
            $serialisedData['slug'] = $this->createSlug('Cart' . '-' . rand(10000, 99999) . rand(10000, 99999), 'carts');            
            $serialisedData['session_id'] = $browser_session_id;            
            Cart::insert($serialisedData);
        }
        
        exit;
    }
    
    function removecart(Request $request,$slug = null) { 
        
        $id = $slug;

        if ($id) {
            Cart::where('id', $id)->delete();
        }
        exit;
    }
    
    function updateCount(Request $request) { 
        $this->layout = '';
        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

        $query = new Cart();
        $sess_user_id = Session::get('user_id');
        if (!empty($sess_user_id)) {
            $query = $query->where(function($q) use ($sess_user_id,$browser_session_id){
                $q->where('user_id', $sess_user_id)
                ->orWhere('session_id', $browser_session_id);
            });
        } else {
            $query = $query->where(function($q) use ($browser_session_id){
                $q->where('user_id', 0)
                ->orWhere('session_id', $browser_session_id);
            });
        }
        $cartCount = $query->count();
        
        if($request->ajax()){
            return view('elements.carts.updatecount', ['cartCount'=>$cartCount]);
        }
    }
    
    public function viewcart() {
        $pageTitle = 'Shopping Cart';
        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

        $query = new Cart();
        $sess_user_id = Session::get('user_id');
        if (!empty($sess_user_id)) {
            $query = $query->where(function($q) use ($sess_user_id,$browser_session_id){
                $q->where('user_id', $sess_user_id)
                ->orWhere('session_id', $browser_session_id);
            });
        } else {
            $query = $query->where(function($q) use ($browser_session_id){
                $q->where('user_id', 0)
                ->orWhere('session_id', $browser_session_id);
            });
        }
        $cartCount = $query->count();
        $allrecords = $query->get();

        return view('carts.viewcart', ['title' => $pageTitle, 'cartCount'=>$cartCount ,'allrecords' => $allrecords]);
    }
    
    public function checkout() {
        $pageTitle = 'Shopping Cart Checkout';
        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

        $query = new Cart();
        $sess_user_id = Session::get('user_id');
        if (!empty($sess_user_id)) {
            $query = $query->where(function($q) use ($sess_user_id){
                $q->where('user_id', $sess_user_id)
                ->orWhere('session_id', $sess_user_id);
            });
        } else {
            $query = $query->where(function($q) use ($sess_user_id){
                $q->where('user_id', 0)
                ->orWhere('session_id', $sess_user_id);
            });
        }
        $cartCount = $query->count();
        $allrecords = $query->get();
        
        $countryList = Country::getCountryList();
        $stateList = array();

        return view('carts.checkout', ['title' => $pageTitle, 'cartCount'=>$cartCount ,'allrecords' => $allrecords, 'countryList'=>$countryList, 'stateList'=>$stateList]);
    }

}

?>