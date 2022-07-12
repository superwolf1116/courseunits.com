<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Mail;
use DB;
use Redirect;
use Session;
use Input;
use Response;
use App\Models\Payment;
use App\Models\Servicesoffer;
use App\Models\Service;
use App\Models\Wallet;
use App\Models\Myorder;
use App\Models\Orderitem;
use App\Models\Review;
use App\Models\Gig;
use App\Models\Gigmessage;
use App\Models\Notification;
use App\Models\User;
use App\Models\Gigextra;
use App\Models\Gigrequirement;

class MyordersController extends Controller {
    
    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }
    
    public function buyingorders(Request $request){ 
        $pageTitle = 'My Courses';
        $allrecords  = Orderitem::where('buyer_id', Session::get('user_id'))->orderBy('id', 'DESC')->get();
        return view('myorders.buyingorders', ['title' => $pageTitle, 'allrecords'=>$allrecords]);  
    }
    
    public function sellingorders(Request $request){ 
        $pageTitle = 'My Courses';
        $allrecords  = Orderitem::where('seller_id', Session::get('user_id'))->orderBy('id', 'DESC')->get();
        return view('myorders.sellingorders', ['title' => $pageTitle, 'allrecords'=>$allrecords]);  
    }
    
    
    
    public function rateseller(Request $request, $slug){ 
        $pageTitle = 'Rate Seller';
        $myorderInfo  = Myorder::where('slug', $slug)->first();
        $oldRatingInfo = Review::where(['otheruser_id'=>Session::get('user_id'), 'myorder_id'=>$myorderInfo->id])->first();
        
        if (!empty($request->all())) {
            $request->validate([
                'comment' => 'required'
            ]);              
            $serialisedData = array();
            $serialisedData['otheruser_id'] =  $myorderInfo->buyer_id;
            $serialisedData['user_id'] =  $myorderInfo->seller_id;
            $serialisedData['as_a'] =  'seller';
            $serialisedData['myorder_id'] = $myorderInfo->id;
            $serialisedData['servicesoffer_id'] = 0;
            $serialisedData['rating'] = $request->get('rating');
            $serialisedData['comment'] = $request->get('comment');
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(10));;
            $serialisedData = $this->serialiseFormData($serialisedData);
            Review::insert($serialisedData); 
            
            $gigInfo = Gig::where('id', $myorderInfo->gig_id)->first();
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $selleruser = $myorderInfo->Seller->first_name . ' ' . $myorderInfo->Seller->last_name;
            $title = $gigInfo->title;

            $emailId = $myorderInfo->Seller->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 17)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!loginuser!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($selleruser, $title, $loginuser,  HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            Myorder::where('id', $myorderInfo->id)->update(array('is_buyer_rate'=>1));
            $this->updateUserRating($myorderInfo->seller_id, 'seller');
            
            Session::flash('success_message', "You have successfully give review rating to the seller.");
            return Redirect::to('buying-orders');
        }        
        return view('myorders.rateseller', ['title' => $pageTitle, 'myorderInfo'=>$myorderInfo, 'oldRatingInfo'=>$oldRatingInfo]);  
    }
    
    public function ratebuyer(Request $request, $slug){ 
        $pageTitle = 'Rate Buyer';
        $myorderInfo  = Myorder::where('slug', $slug)->first();
        $oldRatingInfo = Review::where(['otheruser_id'=>Session::get('user_id'), 'myorder_id'=>$myorderInfo->id])->first();
        if (!empty($request->all())) {               
            $request->validate([
                'comment' => 'required'
            ]);            
            $serialisedData = array();
            $serialisedData['otheruser_id'] =  $myorderInfo->seller_id;
            $serialisedData['user_id'] =  $myorderInfo->buyer_id;
            $serialisedData['as_a'] =  'buyer';
            $serialisedData['myorder_id'] = $myorderInfo->id;
            $serialisedData['servicesoffer_id'] = 0;
            $serialisedData['rating'] = $request->get('rating');
            $serialisedData['comment'] = $request->get('comment');
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(10));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Review::insert($serialisedData); 
            
            $gigInfo = Gig::where('id', $myorderInfo->gig_id)->first();
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $selleruser = $myorderInfo->Buyer->first_name . ' ' . $myorderInfo->Buyer->last_name;
            $title = $gigInfo->title;

            $emailId = $myorderInfo->Buyer->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 18)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!loginuser!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($selleruser, $title, $loginuser,  HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
           
            Myorder::where('id', $myorderInfo->id)->update(array('is_seller_rate'=>1));
            $this->updateUserRating($myorderInfo->buyer_id, 'buyer');
            
            Session::flash('success_message', "You have successfully give review rating to the buyer.");
            return Redirect::to('selling-orders');
        }        
        return view('myorders.ratebuyer', ['title' => $pageTitle, 'myorderInfo'=>$myorderInfo, 'oldRatingInfo'=>$oldRatingInfo]);  
    }
    
    public function workplace(Request $request, $slug) {       
        $pageTitle = 'View Workplace';
        $orderInfo = Myorder::where('slug', $slug)->first();
        if(!$orderInfo){
            return Redirect::to('dashboard');
        }
        $gigInfo = Gig::where('id', $orderInfo->gig_id)->first();
        
        $gigextra = Gigextra::where('status', 1)->orderBy('title', 'ASC')->pluck('title','id')->all();
        $gigrequirement=Gigrequirement::where('gig_id',$orderInfo->gig_id)->first();
        
        if (!empty($request->all())) {
            $request->validate([
                'message' => 'required'
            ]);
            
            $sender_id = Session::get('user_id');
            if($orderInfo->seller_id == Session::get('user_id')){
               $receiver_id = $orderInfo->buyer_id;
            }else{
               $receiver_id = $orderInfo->seller_id; 
            }
            
            if (Input::hasFile('attachment')) {
                $file = Input::file('attachment');
                $uploadedFileName = $this->uploadImage($file, GIG_MSG_FULL_UPLOAD_PATH);
                $attachment = $uploadedFileName;
            }else{
                $attachment = '';
            }
            
            $serialisedData = array();
            $serialisedData['gig_id'] =  $orderInfo->gig_id;
            $serialisedData['myorder_id'] =  $orderInfo->id;
            $serialisedData['sender_id'] =  $sender_id;
            $serialisedData['receiver_id'] =  $receiver_id;
            $serialisedData['message'] =  $request->get('message');
            $serialisedData['attachment'] =  $attachment;
            $serialisedData['status'] = 0;
            $serialisedData['time'] = time();
            $serialisedData['slug'] = $orderInfo->gig_id.$sender_id.$receiver_id.time().rand(10,99);
            $serialisedData = $this->serialiseFormData($serialisedData);
            Gigmessage::insert($serialisedData); 
            Session::flash('success_message', "Your messages sent successfully.");
            
            $serialisedData = array();
            $serialisedData['from_name'] = Session::get('user_name');
            $serialisedData['user_id'] = $receiver_id;
            $serialisedData['message'] = $request->get('message');
            $serialisedData['url'] = 'myorders/workplace/'.$slug.'/#sentmessages';
            $serialisedData['status'] = 0;
            $serialisedData = $this->serialiseFormData($serialisedData);
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)).time().rand(10,99);
            Notification::insert($serialisedData);
            return Redirect::to('myorders/workplace/'.$slug.'/#sentmessages');
        }        
        $gigmessages = Gigmessage::where('myorder_id', $orderInfo->id)->orderBy('id', 'DESC')->get();        
        return view('myorders.workplace', ['title' => $pageTitle, 'orderInfo'=>$orderInfo, 'gigInfo'=>$gigInfo, 'gigmessages'=>$gigmessages,'gigextra'=>$gigextra,'gigrequirement'=>$gigrequirement]);
    }
    
    public function download(Request $request, $slug, $filename) {       
        $fname = substr($filename, 9);
        $file_path = GIG_MSG_FULL_UPLOAD_PATH.$filename;
        return Response::download($file_path, $fname, ['Content-Length: '. filesize($file_path)]);
    }
    
}
?>