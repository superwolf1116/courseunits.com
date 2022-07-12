<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use Mail;
use App\Mail\SendMailable;
use Socialite;
use App\Models\User;
use App\Models\Message;
use App\Models\Category;
use App\Models\Service;
use App\Models\Myorder;
use App\Models\Image;
use App\Models\Gig;
use App\Models\Review;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Wallet;
use App\Models\Course;
use App\Models\Cart;
use App\Models\Coursesection;
use App\Models\Coursecontent;
use App\Models\Courseextra;
use App\Models\Coursefaq;
use App\Models\Courserequirement;
use App\Models\Orderitem;
use App\Models\Pgmlang;
use App\Models\Banner;
class UsersController extends Controller {

    public function __construct() {
//        $this->middleware('userlogedin', ['only' => ['login', 'forgotPassword', 'resetPassword', 'register']]);
//        $this->middleware('is_userlogin', ['except' => ['logout', 'login','forgotPassword', 'resetPassword', 'redirectToGoogle', 'handleGoogleCallback', 'redirectToFacebook', 'handleFacebookCallback', 'redirectToLinkedin', 'handleLinkedinCallback', 'register', 'sociallogin','emailConfirmation', 'publicprofile']]);
    }

   public function login() {
        $this->requestAuthentication('POST');
        $reqData = $_POST['data'];
        //print_r($reqData );exit;
        $userData = json_decode($reqData, true);
        $email = $userData['email_address'];
        //print_r($email);exit;
        $password = $userData['password'];
        //print_r( $password);exit;
        $device_type = $userData['device_type'];
        $device_id = $userData['device_id'];
        //echo $password;
        $userInfo = User::where('email_address', $email)->first();
        //print_r($userInfo->password);exit;
        if (!empty($userInfo)) {
            if (password_verify($password,$userInfo->password)) {
                if ($userInfo->status == 1 && $userInfo->activation_status == 1) {
                    $data = $this->logindata($userInfo);
                     $token = $data['token'];
                    User::where('id', $userInfo->id)->update(array('device_type' => $device_type, 'device_id' => $device_id,'token' => $token));
                    $this->successOutputResult('login sucessfully', json_encode($data));
                } else if ($userInfo->status == 1 && $userInfo->activation_status == 0) {
                    $error = 'You need to activate your account before login.';
                } else if ($userInfo->status == 0 && $userInfo->activation_status == 0) {
                    $error = 'Your account might have been temporarily disabled. Please contact us for more details.';
                }
            } else {
                $error = 'Invalid email or password.';
            }
            $this->errorOutputResult($error);
        } else {
            $this->errorOutputResult('You entered wrong username or password.');
        }
    }
 public function logindata($userCheck) {
        $data = array();
        $data['user_id'] = $userCheck->id;
        $data['first_name'] = $userCheck->first_name;
        $data['last_name'] = $userCheck->last_name;
        $data['email_address'] = $userCheck->email_address;
        $data['contact'] = $userCheck->contact;
        $data['profile_image'] = $userCheck->profile_image;
    $userInfo = User::where('id', $userCheck->id)->first();
    if($userInfo->token != '')
        {$token = $userInfo->token;
        }
    else{$token = $this->setToken($userCheck);}
        $data['token'] = $token;
        //print_r($data);exit;
        return $data;
    }
//for top programming languages
    public function top_languages()
    {
       $tokenData = $this->requestAuthentication('GET',1);

       $user_id = $tokenData['user_id'];
        $pgmlang = Pgmlang::where('status', 0)->limit(12)->get(); 
        $i=0;
        foreach ($pgmlang as $pgm[$i]) {
            # code...
       
        // $userDetails['language_id'] = $pgm[$i]->id;
        // $userDetails['language_name'] = $pgm[$i]->name;
         $data['response_data'][$i]['Language_id'] =  $pgm[$i]->id;

         $data['response_data'][$i]['Language_name'] =  $pgm[$i]->name;  
          
        
           
            
        $i++;
    }
        $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        //print_r($pgmlang);exit;

    }

public function getprofile() {
        //echo"hi";exit;
        $tokenData = $this->requestAuthentication('GET',1);

       $user_id = $tokenData['user_id'];      
      //echo $user_id;exit;
        $userInfo = User::where('id', $user_id)->first();   
             //print_r($userInfo);exit;             
        $userDetails['user_id'] = $userInfo->id;
        $userDetails['user_type'] = $userInfo->user_type;
        $userDetails['first_name'] = $userInfo->first_name;
        $userDetails['last_name'] = $userInfo->last_name;
        $userDetails['about_short'] = $userInfo->about_short;
        $userDetails['about'] = $userInfo->about;
         $userDetails['email_address'] = $userInfo->email_address;
        if($userInfo->contact != ''){
        $userDetails['contact'] = $userInfo->contact;}
        else{$userDetails['contact'] = "";}
       
       if($userInfo->about_short != ''){
        $userDetails['about_short'] = $userInfo->about_short;}
        else{$userDetails['about_short'] = "";}
        if($userInfo->about != ''){
        $userDetails['about'] = $userInfo->about;}
        else{$userDetails['about'] = "";}

        if($userInfo->profile_image != ''){
        $userDetails['profile_image'] = $userInfo->profile_image;}
        else{$userDetails['profile_image'] = "";}

        $data['response_data'] = $userDetails;
        $data['response_status'] = 'success';
        $data['response_msg'] = '';
        echo json_encode($data);
    }

public function courseInfo()
{
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true); 
        $recordInfo = Course::where('id', $userData['course_id'])->first();

        $sellingcount=DB::table('myorders')->where('course_id', $userData['course_id'])->count();
         $courscnt=DB::table('courses')->where('user_id', $recordInfo->user_id)->count();
        $user=User::where('id',$recordInfo->user_id)->first();
        $sections = Coursesection::where('course_id',$userData['course_id'])->get();
        // $query = new Review();
        // $query = $query->where('status', 1);
        // $query = $query->where('course_id', $userData['course_id']);


        $coursereviews =Review::where('status', 1)->where('course_id',$userData['course_id'])->get();
          
        //print_r( $coursereviews);exit;
        $studentCount = DB::table('orderitems')->where('seller_id', $recordInfo->user_id)->where('course_id',$userData['course_id'])->count();
        $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('user_id',$recordInfo->user_id)->first();
        $catnm=Category::where('id','=',$recordInfo->category_id)->where('status',1)->first();

        $subcatnm=Category::where('parent_id','=',$recordInfo->category_id)->where('status',1)->first();
        //print_r($catnm);exit;
        $courseCount = DB::table('courses')->where('user_id', $recordInfo->user_id)->count();
         $instructorstudentCount = DB::table('orderitems')->where('seller_id', $recordInfo->user_id)->count();
        $courseDetails['Course_id'] = $recordInfo->id;
        $courseDetails['Seller_id'] = $recordInfo->user_id;
        if($sellingcount>=5 || $courscnt>1)
             {
               $courseDetails['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
               $courseDetails['Seller_type'] = "New Seller";
             }
             else
             {
              $courseDetails['Seller_type'] = "";
             }
        $courseDetails['Title'] = $recordInfo->title;
        $courseDetails['Subtitle'] = $recordInfo->sub_title;
        $courseDetails['total_rating']=$overallrating->reviewcnt;
        $courseDetails['rating']=$overallrating->rating; 
        $courseDetails['studentCount']= $studentCount;
        $courseDetails['seller_image']= $user->profile_image;
        $courseDetails['seller_name']= $user->first_name." ".$user->last_name;
        $courseDetails['last_updated']= $recordInfo->created_at->format('m/Y');
        $courseDetails['category']=$catnm->name;
        $courseDetails['subcategory']= $subcatnm->name;
        $courseDetails['course_image']= $recordInfo->image;
        $courseDetails['price']= $recordInfo->price;
        $courseDetails['instructor_name']= $user->first_name." ".$user->last_name;
        $courseDetails['instructor_rating']= $user->average_rating;
        $courseDetails['instructor_review']= $user->total_review;
        $courseDetails['instructor_studenntcnt']=$instructorstudentCount;
        $courseDetails['course_count']= $courseCount;
        $courseDetails['about_course']= $recordInfo->description;
        $courseDetails['course_content']= $recordInfo->description;
      

       $j=0;
       foreach ($sections as $section[$j]) {
            # code...
            $contents = DB::table('coursecontents')->where('section_id', $section[$j]->id)->where('course_id', $recordInfo->id)->get();
              // print_r($contents);exit;
                $contentCount = DB::table('coursecontents')->where('section_id', $section[$j]->id)->where('course_id', $recordInfo->id)->count();
                 $courseDetails['Cources'][$j]['Section_title']= $section[$j]->section_title;
                $i=0;
                foreach($contents as $content[$i]){
              $courseDetails['Cources'][$i]['Lecture_title']= $content[$i]->lecture_title;
              $courseDetails['Cources'][$i]['lecture_description']=$content[$i]->lecture_description;
              $courseDetails['Cources'][$i]['video']=$content[$i]->video;
              $courseDetails['Cources'][$i]['video_time']=$content[$i]->video_time;
              $i++;
            $j++;
            }

        }
        if($coursereviews=="")
        {
          $courseDetails['student_Review']=$coursereviews->comment;
        }
        else
        {
           $courseDetails['student_Review']="No reviews found.";
        }
        // foreach($contents as $content){
        //       $courseDetails['lecture_title']= $content->lecture_title;
        //        $courseDetails['video_time']=$content->video_time;
        //         $courseDetails['video_time']=$content->video_time;
                 
        // }
        $data['response_data'] = $courseDetails;
        $data['response_status'] = 'success';
        $data['response_msg'] = '';
        echo json_encode($data);
         
}

public function forgotPassword() {
        $this->requestAuthentication('POST');

        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
        $userData = json_decode($values, true);
    //print_r($userData);exit;
        $userInfo = User::where('email_address', $userData['email_address'])->first();
        if (!empty($userInfo)) {
            $uniqueKey = bin2hex(openssl_random_pseudo_bytes(25));
            User::where('id', $userInfo->id)->update(array('forget_password_status' => 1, 'unique_key' => $uniqueKey));

            $link = HTTP_PATH . "/reset-password/" . $uniqueKey;
            $name = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $emailId = $userInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 4)->first();
            $toRepArray = array('[!username!]', '[!link!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($name, $link, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
           // Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
             $msgString = "A link to reset your password was sent to your email address.";
                echo $this->successOutput($msgString);
                exit;
        }
        else
        {
            $msgstring = "Please enter valid email address.";
                    echo $this->errorOutputResult($msgstring);
                    exit;
        }
        
    }



public function editprofile() {
        $tokenData = $this->requestAuthentication('POST');
    $userid = $tokenData['user_id'];
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
        $userData = json_decode($values, true);

        $serialisedData = array();
        if (isset($userData['first_name'])) {
            $serialisedData["first_name"] = $userData['first_name'];
        } else {
            $serialisedData["first_name"] = '';
        }
         if (isset($userData['last_name'])) {
            $serialisedData["last_name"] = $userData['last_name'];
        } else {
            $serialisedData["last_name"] = '';
        }
        if (isset($userData['contact'])) {
            $serialisedData["contact"] = $userData['contact'];
        } else {
            $serialisedData["contact"] = '';
        }
        if (isset($userData['address'])) {
            $serialisedData["address"] = $userData['address'];
        } else {
            $serialisedData["address"] = '';
        }

         if (isset($userData['about'])) {
            $serialisedData["about"] = $userData['about'];
        } else {
            $serialisedData["about"] = '';
        }
         if (isset($userData['about_short'])) {
            $serialisedData["about_short"] = $userData['about_short'];
        } else {
            $serialisedData["about_short"] = '';
        }
        User::where('id',$userid)->update($serialisedData);
    $userInfo = User::where('id', $userid )->first();                           
        $userDetails['user_id'] = $userInfo->id;
        $userDetails['user_type'] = $userInfo->user_type;
        $userDetails['first_name'] = $userInfo->first_name;
        $userDetails['last_name'] = $userInfo->last_name;
        $userDetails['about'] = $userInfo->about;
         $userDetails['about_short'] = $userInfo->about_short;
        $userDetails['email_address'] = $userInfo->email_address;
    if($userInfo->contact != ''){
        $userDetails['contact'] = $userInfo->contact;}
        else{$userDetails['contact'] = "";}
       if($userInfo->address != ''){
        $userDetails['address'] = $userInfo->address;}
        else{$userDetails['address'] = "";}
        if($userInfo->profile_image != ''){
        $userDetails['profile_image'] = $userInfo->profile_image;}
        else{$userDetails['profile_image'] = "";}

        $data['response_data'] = $userDetails;
        $data['response_status'] = 'success';
        $data['response_msg'] = 'Profile update successfully';
        echo json_encode($data);
        exit;
    }

// public function upload_banner();
// {

// }
    public function purchase_order()
    {
           $tokenData = $this->requestAuthentication('POST');
    $userid = $tokenData['user_id'];
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
        $userData = json_decode($values, true); ;
        $query = new Cart();
        $sess_user_id = Session::get('user_id');
        if (!empty($sess_user_id)) {
            $query = $query->where(function($q) use ($sess_user_id) {
                $q->where('user_id', $sess_user_id)
                        ->orWhere('session_id', $sess_user_id);
            });
        } else {
            $query = $query->where(function($q) use ($sess_user_id) {
                $q->where('user_id', 0)
                        ->orWhere('session_id', $sess_user_id);
            });
        }
        $cartCount = $query->count();
        $allrecords = $query->first();
        //$query = new Cart();

        //print_r($userData);exit;
         //$recordInfo = Course::where('id', $userData['course_id'])->first();
         //print_r($recordInfo);exit;
        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');
        $total_amount = urlencode($userData['amount']);
        $currency = urlencode('USD');

        $transactionId = bin2hex(openssl_random_pseudo_bytes(10));
        $wallet_trn_id = $transactionId;
        if ($transactionId) {
           if($userData['payment_type']==1)
           {
            $serialisedData['user_id'] =  $userid;
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['course_id'] = $userData['course_id'];
            $serialisedData['transaction_id'] = $userData['transaction_id'];
             $serialisedData['created_at'] = date('Y-m-d H:i:s');
            $serialisedData['updated_at'] = date('Y-m-d H:i:s');
           //$serialisedData['pay_type'] = $userData['payment_type'];
            //$serialisedData['buyer_location'] = $userData['location'];
            Payment::insert($serialisedData);
            $paymentId = DB::getPdo()->lastInsertId();

            $serialisedData = array();
            $serialisedData['buyer_id'] =$userid;
            $serialisedData['course_id'] =$userData['course_id'];
            $serialisedData['amount'] =$total_amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] =$total_amount;
            $serialisedData['admin_amount'] = 0;
            $serialisedData['admin_commission'] = 0;
            $serialisedData['quantity'] = $userData['quantity'];
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $userData['transaction_id'];
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['buyer_location'] = $userData['location'];
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);
            $orderId = DB::getPdo()->lastInsertId();
            
            Payment::where('id', $paymentId)->update(array('order_id'=>$orderId));

           
                 $serialisedData = array();
                 $serialisedData['buyer_id'] = $userid;
                 $serialisedData['course_id'] = $userData['course_id'];
                 $serialisedData['order_id'] = $orderId;
                 $serialisedData['seller_id'] =  $allrecords->user_id;
                 $serialisedData['amount'] = $total_amount;
                 $serialisedData['total_amount'] =$total_amount+ 200;
                 $serialisedData['revenue'] = $total_amount;
                 $serialisedData['admin_amount'] = 0;
                 $serialisedData['admin_commission'] = 0;
                 $serialisedData['quantity'] = 1;
                 $serialisedData['pay_type'] = 'PayPal';
                 $serialisedData['paypal_trn_id'] = $wallet_trn_id;
                 $serialisedData['status'] = 1;
                 $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
                 $serialisedData = $this->serialiseFormData($serialisedData);
                 Orderitem::insert($serialisedData);
          }

          else 
          {
            $serialisedData['user_id'] =  $userid;
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['course_id'] = $userData['course_id'];
            $serialisedData['transaction_id'] = $userData['transaction_id'];
             $serialisedData['created_at'] = date('Y-m-d H:i:s');
            $serialisedData['updated_at'] = date('Y-m-d H:i:s');
           //$serialisedData['pay_type'] = $userData['payment_type'];
            $serialisedData['buyer_location'] = $userData['location'];
            Payment::insert($serialisedData);
            $paymentId = DB::getPdo()->lastInsertId();

            $serialisedData = array();
            $serialisedData['buyer_id'] =$userid;
            $serialisedData['course_id'] =$userData['course_id'];
            $serialisedData['amount'] =$total_amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] =$total_amount;
            $serialisedData['admin_amount'] = 0;
            $serialisedData['admin_commission'] = 0;
            $serialisedData['quantity'] = $userData['Quantity'];
            $serialisedData['pay_type'] = 'Card';
            $serialisedData['paypal_trn_id'] = $userData['transaction_id'];
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['buyer_location'] = $userData['location'];
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);
            $orderId = DB::getPdo()->lastInsertId();
            
            Payment::where('id', $paymentId)->update(array('order_id'=>$orderId));

             $serialisedData = array();
             $serialisedData['buyer_id'] = $userid;
             $serialisedData['course_id'] = $userData['course_id'];
             $serialisedData['order_id'] = $orderId;
             $serialisedData['seller_id'] =  $allrecords->user_id;
             $serialisedData['amount'] = $total_amount;
             $serialisedData['total_amount'] =$total_amount + 200;
             $serialisedData['revenue'] = $total_amount;
             $serialisedData['admin_amount'] = 0;
             $serialisedData['admin_commission'] = 0;
             $serialisedData['quantity'] = 1;
             $serialisedData['pay_type'] = 'PayPal';
             $serialisedData['paypal_trn_id'] = $wallet_trn_id;
             $serialisedData['status'] = 1;
             $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
             $serialisedData = $this->serialiseFormData($serialisedData);
             Orderitem::insert($serialisedData);
          }
        }
         $course_ids = explode(',',$userData['course_id']);
        // print_r($course_ids);exit;
         $crs=0;
         foreach($course_ids as $courseid[$crs]){
            $cartdata=Cart::where('user_id',$userid)->where('course_id',$courseid[$crs])->delete();
             
               
          $crs++; 
        }
        $data['response_data'] = '';
        $data['response_status'] = 'success';
       if($userData['payment_type']==1){
        $data['response_msg'] = 'Payment successfully done using Paypal.';
       }
       else{
         $data['response_msg'] = 'Payment successfully done using Card.';
       }
        echo json_encode($data);
        exit;
    }

public function home_detail()
{
    $tokenData = $this->requestAuthentication('GET', 1);
     $user_id = $tokenData['user_id']; 
     $categoryData = Category::where('parent_id','=',0)->where('status',1)->whereNotNull('home_image')->get();
     $courseData = Course::where('status', '=',1)->get(); 
      $whishlist= DB::table('savedcourses')->where(['user_id' => $user_id])->first();
      $banner=Banner::where('status', '=',1)->first();
      $mysavecourses = array();
        if ($whishlist) {
            if ($whishlist->course_ids) {

                $mysavecourses = explode(',', $whishlist->course_ids);
            }
        }
       $data['response_data'] = array();
        $i=0;$j=0;$k=0;$l=0;$m=0;$n=0;
          $ci=0;          
        foreach( $mysavecourses as $coursedata[$ci])
        {          
             $allrecords = Course::where('id', $coursedata[$ci])->first();
             if(isset($allrecords->title))
             {
               $text = $allrecords->title;
             }
             $keywordarray=array();
              
            $common_word = array('the','website','with','complete','by','development','guide','and','-','to',' advanced','(',')','beginner',' + ','or','end','test');
             $keywordarray=explode(" ", $text);
             $yourArray = array_map('strtolower', $keywordarray);
             $result = array_diff( $yourArray,$common_word); 
             
           $query=new Course();
             foreach($result  as $k=>$keyword){
    
             if($k < 1)
              {
              
                 $query= $query->where('title', 'like', '%'.$keyword.'%');
                 //print_r( $query);exit;
              }else{
               // echo"else";exit;
              $query= $query->orWhere('title', 'like', '%'.$keyword.'%');
              }

       }
       if(isset($allrecords->id)){
        //$crs=array();
       $dd= $query->where('id', '<>',$allrecords->id)->distinct('id')->get();
       foreach($dd as $coutsnm)
       //print_r($dd);exit;
       $crs[]=$coutsnm;
      }     
        $ci++;             
        }
        
         $data['response_data']['Banner']['id'] =$banner->id;
          $data['response_data']['Banner']['name'] =$banner->name;
        foreach ($categoryData as $details[$i]) { 
         $data['response_data']['category_list'][$i]['id'] = $details[$i]['id'];
         $data['response_data']['category_list'][$i]['category_name'] = $details[$i]['name'];
         $data['response_data']['category_list'][$i]['category_homeimage'] = $details[$i]['home_image'];
         if($details[$i]['description'] == ""){ $data['response_data']['category_list'][$i]['category_desc'] = "";}
         else { $data['response_data']['category_list'][$i]['category_desc'] = $details[$i]['description'];}
         $data['response_data']['category_list'][$i]['is_feature'] = $details[$i]['is_feature'];
         $data['response_data']['category_list'][$i]['slug'] = $details[$i]['slug'];
         $data['response_data']['category_list'][$i]['status'] = $details[$i]['status'];
         $data['response_data']['category_list'][$i]['is_deleted'] = $details[$i]['is_deleted'];
         $data['response_data']['category_list'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');
         $data['response_data']['category_list'][$i]['updated_at'] = $details[$i]['updated_at']->format('M d, Y');
         $i++;   
        }
        //for cources
        foreach ($courseData as $coursedetail[$j]) { 
            $seller_name = DB::table('users')->where(['id' => $coursedetail[$j]['user_id']])->first();
            $sellingcount=DB::table('myorders')->where('course_id', $coursedetail[$j]['id'])->count();
              $courscnt=DB::table('courses')->where('user_id', $coursedetail[$j]['user_id'])->count();
              $categoryData = Category::where('id','=',$coursedetail[$j]['category_id'])->first();
              $subcategoryData = Category::where('id','=',$coursedetail[$j]['subcategory_id'])->first();
              $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$coursedetail[$j]['id'])->first();
               
             $data['response_data']['course_list'][$j]['id'] = $coursedetail[$j]['id'];
             $data['response_data']['course_list'][$j]['user_id'] = $coursedetail[$j]['user_id'];
             
             $data['response_data']['course_list'][$j]['seller_name'] =$seller_name->first_name." ".$seller_name->last_name;

              if($sellingcount>=5 || $courscnt>1)
             {
                $data['response_data']['course_list'][$j]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
                $data['response_data']['course_list'][$j]['Seller_type'] = "New Seller";
             }
             else
             {
               $data['response_data']['course_list'][$j]['Seller_type'] = "";
             }
             $data['response_data']['course_list'][$j]['course_title'] =$coursedetail[$j]['title'];
             $data['response_data']['course_list'][$j]['category_name'] =$categoryData->name;
             $data['response_data']['course_list'][$j]['subcategory_name'] =$subcategoryData->name;
             $data['response_data']['course_list'][$j]['course_description'] =$coursedetail[$j]['description'];
             $data['response_data']['course_list'][$j]['course_image'] =$coursedetail[$j]['image'];
             $data['response_data']['course_list'][$j]['course_sample_video'] =$coursedetail[$j]['sample_video'];
             $data['response_data']['course_list'][$j]['course_subtitle'] =$coursedetail[$j]['sub_title'];
             $data['response_data']['course_list'][$j]['course_price'] =$coursedetail[$j]['price'];
             $data['response_data']['course_list'][$j]['course_status'] =$coursedetail[$j]['status'];
             $data['response_data']['course_list'][$j]['course_slug'] =$coursedetail[$j]['slug'];
             $data['response_data']['course_list'][$j]['created_at'] = $coursedetail[$j]['created_at']->format('M d, Y');
             $data['response_data']['course_list'][$j]['updated_at'] = $coursedetail[$j]['updated_at']->format('M d, Y');
            $data['response_data']['course_list'][$j]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data']['course_list'][$j]['rating'] =  $overallrating->rating; 
         $j++;
    }
          $cnt=4;
foreach ($courseData as $topcoursedetail[$n]) 
{ 

     $categoryData = Category::where('id','=',$topcoursedetail[$n]['category_id'])->first();
     $subcategoryData = Category::where('id','=',$topcoursedetail[$n]['subcategory_id'])->first();
     $user=User::where('id',$topcoursedetail[$n]['user_id'])->first();
         //print_r($user);exit;
       $sellingcount=DB::table('myorders')->where('course_id', $topcoursedetail[$n]['id'])->count();
        $courseCount = DB::table('courses')->where('user_id', $user->id)->count();
        $studentCount = DB::table('orderitems')->where('seller_id',$user->id)->count();
        $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$topcoursedetail[$n]['id'])->first();
       $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$topcoursedetail[$n]['id'])->first();
    $courscnt=DB::table('courses')->where('user_id', $topcoursedetail[$n]['user_id'])->count();
    
      if($studentCount>=$cnt && $overallrating->rating>=$cnt)
      {
          $data['response_data']['Topcourse_list'][$n]['id'] = $topcoursedetail[$n]['id'];
             $data['response_data']['Topcourse_list'][$n]['user_id'] = $coursedetail[$n]['user_id'];
             $data['response_data']['Topcourse_list'][$n]['seller_name'] =$seller_name->first_name." ".$seller_name->last_name;

              if($sellingcount>=5 || $courscnt>1)
             {
                $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
                $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "New Seller";
             }
             else
             {
               $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "";
             }
             $data['response_data']['Topcourse_list'][$n]['course_title'] =$topcoursedetail[$n]['title'];
             $data['response_data']['Topcourse_list'][$n]['category_name'] =$categoryData->name;
             $data['response_data']['Topcourse_list'][$n]['subcategory_name'] =$subcategoryData->name;
             $data['response_data']['Topcourse_list'][$n]['course_description'] =$topcoursedetail[$n]['description'];
             $data['response_data']['Topcourse_list'][$n]['course_image'] =$topcoursedetail[$n]['image'];
             $data['response_data']['Topcourse_list'][$n]['course_sample_video'] =$topcoursedetail[$n]['sample_video'];
             $data['response_data']['Topcourse_list'][$n]['course_subtitle'] =$topcoursedetail[$n]['sub_title'];
             $data['response_data']['Topcourse_list'][$n]['course_price'] =$topcoursedetail[$n]['price'];
             $data['response_data']['Topcourse_list'][$n]['course_status'] =$topcoursedetail[$n]['status'];
             $data['response_data']['Topcourse_list'][$n]['course_slug'] =$topcoursedetail[$n]['slug'];
             $data['response_data']['Topcourse_list'][$n]['created_at'] = $topcoursedetail[$n]['created_at']->format('M d, Y');
             $data['response_data']['Topcourse_list'][$n]['updated_at'] = $topcoursedetail[$n]['updated_at']->format('M d, Y');
            $data['response_data']['Topcourse_list'][$n]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data']['Topcourse_list'][$n]['rating'] =  $overallrating->rating; 
        $n++;     
      }
}
if(!empty($crs))
{
    $arr=0;
     foreach ($crs as $wish_etail[$m][$arr]) { 
              $seller_name = DB::table('users')->where('id','=', $wish_etail[$m][$arr]['user_id'])->first();
              $categoryData = Category::where('id','=',$wish_etail[$m][$arr]['category_id'])->first();
              $subcategoryData = Category::where('id','=',$wish_etail[$m][$arr]['subcategory_id'])->first();
              $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$wish_etail[$m][$arr]['id'])->first(); 
              $sellingcount=DB::table('myorders')->where('course_id', $wish_etail[$m][$arr]['id'])->count();
             $courscnt=DB::table('courses')->where('user_id', $wish_etail[$m][$arr]['user_id'])->count();
             // print_r($subcategoryData);exit;
             $data['response_data']['wish_list'][$m]['id'] = $wish_etail[$m][$arr]['id'];
             $data['response_data']['wish_list'][$m]['user_id'] = $wish_etail[$m][$arr]['user_id'];
            if($sellingcount>=5 ||$courscnt>1)
             {
                $data['response_data']['wish_list'][$m]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
               $data['response_data']['wish_list'][$m]['Seller_type']  = "New Seller";
             }
             else
             {
               $data['response_data']['wish_list'][$m]['Seller_type']  = "";
             }

             $data['response_data']['wish_list'][$m]['seller_name'] =$seller_name->first_name." ".$seller_name->last_name;
             $data['response_data']['wish_list'][$m]['wishcourse_title'] =$wish_etail[$m][$arr]['title'];
             $data['response_data']['wish_list'][$m]['wishcategory_name'] =$categoryData->name;
             $data['response_data']['wish_list'][$m]['subcategory_name'] =$subcategoryData->name;
             $data['response_data']['wish_list'][$m]['wishcourse_description'] =$wish_etail[$m][$arr]['description'];
             $data['response_data']['wish_list'][$m]['wishcourse_image'] =$wish_etail[$m][$arr]['image'];
             $data['response_data']['wish_list'][$m]['wishcourse_sample_video'] =$wish_etail[$m][$arr]['sample_video'];
             $data['response_data']['wish_list'][$m]['wishcourse_subtitle'] =$wish_etail[$m][$arr]['sub_title'];
             $data['response_data']['wish_list'][$m]['wishcourse_price'] =$wish_etail[$m][$arr]['price'];
             $data['response_data']['wish_list'][$m]['wishcourse_status'] =$wish_etail[$m][$arr]['status'];
             $data['response_data']['wish_list'][$m]['wishcourse_slug'] =$wish_etail[$m][$arr]['slug'];
             $data['response_data']['wish_list'][$m]['wishcreated_at'] = $wish_etail[$m][$arr]['created_at']->format('M d, Y');
             $data['response_data']['wish_list'][$m]['wishupdated_at'] = $wish_etail[$m][$arr]['updated_at']->format('M d, Y');
            $data['response_data']['wish_list'][$m]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data']['wish_list'][$m]['rating'] =  $overallrating->rating; 
         $m++;
         $arr++;
}
    }
        $cartcount = 0;
        $cartcount = DB::table('carts')->where('user_id', $user_id)->where('later_course_flag',0)->count();
        $data['response_data']['cart_count'] = $cartcount;
        if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No Details are found!');
            exit;
        }
        exit;
}

 public function courselist()
 {

      $tokenData = $this->requestAuthentication('GET', 1);
       $user_id = $tokenData['user_id'];
       //print_r($user_id);exit;
         $courses =Course::where('status',1)->get();
         //print_r($courses);exit;

          $data['response_data'] = array();
          //print_r( $data['response_data']);exit;
            $i = 0;$j=0;
         foreach($courses as $details[$i] )
         {
           // print_r($details[$i]['id']);exit;
            $courseData = Course::where('id', $details[$i]['id'])->first(); 
          
         
            $data['response_data'][$i]['coursetitle'] =  $courseData['title'];
           
          
        
           
            $i++;
        } 

         
        // foreach ($categoryData as $catdetails[$j]) {
        // // print_r( $details[$i]);exit;
        //  $data['response_data'][$j]['categoryid']['id'] = $catdetails[$j]['id'];
        //  $data['response_data'][$j]['categoryname']['category_name'] = $catdetails[$j]['name'];
        
        //  $j++;   
        // }

           $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit; 
         
 }
//list of category

   public function categorylist()
    {
        $tokenData = $this->requestAuthentication('GET', 1);
        $user_id = $tokenData['user_id'];
        $categoryData = Category::where('parent_id',0)->where('status',1)->get();
        //for top categories
         $globalCategories = Category::where('parent_id',0)->where('status',1)->limit(12)->get();

        //print_r($globalCategories);exit;
        $data['response_data'] = array();
        $i = 0;$j=0;
        foreach ($categoryData as $details[$i]) {
        // print_r( $details[$i]);exit;
         $data['response_data'][$i]['id'] = $details[$i]['id'];
         $data['response_data'][$i]['category_name'] = $details[$i]['name'];
         $data['response_data'][$i]['category_image'] = $details[$i]['home_image'];
         if($details[$i]['description'] == ""){ $data['response_data'][$i]['category_desc'] = "";}
         else { $data['response_data'][$i]['category_desc'] = $details[$i]['description'];}
        $data['response_data'][$i]['subtitle'] = $details[$i]['sub_title'];
         $data['response_data'][$i]['slug'] = $details[$i]['slug'];
         $data['response_data'][$i]['status'] = $details[$i]['status'];
         $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');
         $data['response_data'][$i]['updated_at'] = $details[$i]['updated_at']->format('M d, Y');
         $i++;   
        }

         foreach ($globalCategories as $globalCategories_details[$j]) {
          //print_r($globalCategories_details[$j]);exit;
         $data['response_data'][$j]['id'] = $globalCategories_details[$j]['id'];
         $data['response_data'][$j]['topcategory_name'] = $globalCategories_details[$j]['name'];
         $data['response_data'][$j]['topcategory_image'] = $globalCategories_details[$j]['home_image'];
         if($globalCategories_details[$j]['description'] == ""){ $data['response_data'][$j]['category_desc'] = "";}
         else { $data['response_data'][$j]['category_desc'] =  $globalCategories_details[$j]['description'];}
        $data['response_data'][$j]['subtitle'] =  $globalCategories_details[$j]['sub_title'];
         $data['response_data'][$j]['slug'] =  $globalCategories_details[$j]['slug'];
         $data['response_data'][$j]['status'] =  $globalCategories_details[$j]['status'];
         $data['response_data'][$j]['created_at'] =  $globalCategories_details[$j]['created_at']->format('M d, Y');
         $data['response_data'][$j]['updated_at'] =  $globalCategories_details[$j]['updated_at']->format('M d, Y');
         $j++;   
        }
        if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No Category found!');
            exit;
        }
        exit;
    }
    public function coursedetail()
    {
        //echo"hiii";
       $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        //print_r($user_id);exit;
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
      //print_r($userData);exit;
        $subcategoryData = Category::where('parent_id','=',$userData['category_id'])->where('status',1)->get();
           
        $courseData1 = Course::where('category_id','=',$userData['category_id'])->get();
        //print_r($courseData1);exit;

            $data['response_data'] = array();
        $i = 0;$j=0;
        // foreach ($subcategoryData as $details[$i]) {
        //  $data['response_data'][$i]['id'] = $details[$i]['id'];
        //  $data['response_data'][$i]['category_name'] = $details[$i]['name'];
        //  $data['response_data'][$i]['category_image'] = $details[$i]['home_image'] ;       
        //  if($details[$i]['category_desc'] == ""){ $data['response_data'][$i]['description'] = "";}
        //  else { $data['response_data'][$i]['category_desc'] = $details[$i]['description'];}
         
        //  $data['response_data'][$i]['slug'] = $details[$i]['slug'];
        //  $data['response_data'][$i]['status'] = $details[$i]['status'];
        //  $data['response_data'][$i]['is_deleted'] = $details[$i]['is_deleted'];
        //  $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');
        //  $data['response_data'][$i]['updated_at'] = $details[$i]['updated_at']->format('M d, Y');
        //  $i++;   
        // }
        foreach($courseData1 as $detailss[$j] )
         {
            $courseData = Course::where('id', $detailss[$j]['id'])->first(); 
           
            $categoryData = Category::where('id', $courseData->category_id)->first();
             //print_r($categoryData);exit;
            $userdata=User::where('id',$courseData->user_id)->first();
            
            $subcategoryData = Category::where('id', $courseData->subcategory_id)->first();
            $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$courseData->category_id)->first(); 

            $courscnt=DB::table('courses')->where('user_id', $courseData->user_id)->count();
            //print_r($overallrating);exit;
            $sellingcount=DB::table('myorders')->where('course_id', $detailss[$j]['id'])->count();
          //print_r($sellingcount);exit;
            $data['response_data']['Course_list'][$j]['id'] = $detailss[$j]['id'];
             if($sellingcount>=5 || $courscnt>1)
             {
               $data['response_data']['Course_list'][$j]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
              $data['response_data']['Course_list'][$j]['Seller_type'] = "New Seller";
             }
             else
             {
              $data['response_data']['Course_list'][$j]['Seller_type'] = "";
             }
            $data['response_data']['Course_list'][$j]['Seller_name'] =  $userdata->first_name." ".$userdata->last_name;
            $data['response_data']['Course_list'][$j]['created_at'] = $detailss[$j]['created_at']->format('M d, Y');
            $data['response_data']['Course_list'][$j]['category_name'] =  $categoryData['name'];
            $data['response_data']['Course_list'][$j]['category_image'] =  $categoryData['home_image'];
             $data['response_data']['Course_list'][$j]['subcategory_name'] =  $subcategoryData['name'];
            $data['response_data']['Course_list'][$j]['course_title'] =  $courseData['title'];
            $data['response_data']['Course_list'][$j]['course_subtitle'] =$courseData['sub_title'];
            $data['response_data']['Course_list'][$j]['course_description'] =  $courseData['description'];
           
            $data['response_data']['Course_list'][$j]['course_sample_video'] =   $courseData['sample_video'];
             $data['response_data']['Course_list'][$j]['course_image'] =   $courseData['image'];
             $data['response_data']['Course_list'][$j]['total_rating'] = $overallrating->reviewcnt;
               $data['response_data']['Course_list'][$j]['rating'] =  $overallrating->rating;
            // if($addonsData){$data['response_data'][$i]['addons'] =$addonsData['name'];}
            // else{$data['response_data'][$i]['addons'] ='';}
        
        
            $data['response_data']['Course_list'][$j]['course_price'] = $courseData['price'];
            $j++;
        } 

                 $cnt=4;$n=0;
foreach ($courseData1 as $topcoursedetail[$n]) 
{ 

     $categoryData = Category::where('id','=',$topcoursedetail[$n]['category_id'])->first();
     $subcategoryData = Category::where('id','=',$topcoursedetail[$n]['subcategory_id'])->first();
     $user=User::where('id',$topcoursedetail[$n]['user_id'])->first();
         //print_r($user);exit;
       $sellingcount=DB::table('myorders')->where('course_id', $topcoursedetail[$n]['id'])->count();
        $courseCount = DB::table('courses')->where('user_id', $user->id)->count();
        $studentCount = DB::table('orderitems')->where('seller_id',$user->id)->count();
        $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$topcoursedetail[$n]['id'])->first();
       $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$topcoursedetail[$n]['id'])->first();
    $courscnt=DB::table('courses')->where('user_id', $topcoursedetail[$n]['user_id'])->count();
    
      if($studentCount>=$cnt && $overallrating->rating>=$cnt)
      {
          $data['response_data']['Topcourse_list'][$n]['id'] = $topcoursedetail[$n]['id'];
             //$data['response_data']['Topcourse_list'][$n]['user_id'] = $topcoursedetail[$n]['user_id'];
             $data['response_data']['Topcourse_list'][$n]['Seller_name'] =$user->first_name." ".$user->last_name;

              if($sellingcount>=5 || $courscnt>1)
             {
                $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
                $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "New Seller";
             }
             else
             {
               $data['response_data']['Topcourse_list'][$n]['Seller_type'] = "";
             }
             $data['response_data']['Topcourse_list'][$n]['course_title'] =$topcoursedetail[$n]['title'];
             $data['response_data']['Topcourse_list'][$n]['category_name'] =$categoryData->name;
              $data['response_data']['Topcourse_list'][$n]['category_image'] =$categoryData->home_image;
             $data['response_data']['Topcourse_list'][$n]['subcategory_name'] =$subcategoryData->name;
             $data['response_data']['Topcourse_list'][$n]['course_description'] =$topcoursedetail[$n]['description'];
             $data['response_data']['Topcourse_list'][$n]['course_image'] =$topcoursedetail[$n]['image'];
             $data['response_data']['Topcourse_list'][$n]['course_sample_video'] =$topcoursedetail[$n]['sample_video'];
             $data['response_data']['Topcourse_list'][$n]['course_subtitle'] =$topcoursedetail[$n]['sub_title'];
             $data['response_data']['Topcourse_list'][$n]['course_price'] =$topcoursedetail[$n]['price'];
             $data['response_data']['Topcourse_list'][$n]['course_status'] =$topcoursedetail[$n]['status'];
             $data['response_data']['Topcourse_list'][$n]['course_slug'] =$topcoursedetail[$n]['slug'];
             $data['response_data']['Topcourse_list'][$n]['created_at'] = $topcoursedetail[$n]['created_at']->format('M d, Y');
            // $data['response_data']['Topcourse_list'][$n]['updated_at'] = $topcoursedetail[$n]['updated_at']->format('M d, Y');
            $data['response_data']['Topcourse_list'][$n]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data']['Topcourse_list'][$n]['rating'] =  $overallrating->rating; 
        $n++;
     
      }
      

}
        if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No SubCategory found!');
            exit;
        }
        exit;



    }
    //getting subcategorywise courses and instructor list
    public function SubCatwise_courses()
    {
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        //print_r($user_id);exit;
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        //print_r($userData);exit;
         $courseData1 = Course::where('subcategory_id','=',$userData['sucat_id'])->get();
         //print_r($courseData1);exit;
         $j=0;$i=0;
          foreach($courseData1 as $detailss[$j] )
         {
            $courseData = Course::where('id', $detailss[$j]['id'])->first(); 
           
            $categoryData = Category::where('id', $courseData->category_id)->first();
             //print_r($categoryData);exit;
            $userdata=User::where('id',$courseData->user_id)->first();
            
            $subcategoryData = Category::where('id', $courseData->subcategory_id)->first();
            $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$courseData->category_id)->first(); 

            $courscnt=DB::table('courses')->where('user_id', $courseData->user_id)->count();
            //print_r($overallrating);exit;
            $sellingcount=DB::table('myorders')->where('course_id', $detailss[$j]['id'])->count();
          //print_r($sellingcount);exit;
            $data['response_data']['Courselist'][$j]['id'] = $detailss[$j]['id'];
             if($sellingcount>=5 || $courscnt>1)
             {
               $data['response_data']['Courselist'][$j]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
              $data['response_data']['Courselist'][$j]['Seller_type'] = "New Seller";
             }
             else
             {
              $data['response_data']['Courselist'][$j]['Seller_type'] = "";
             }
            $data['response_data']['Courselist'][$j]['Seller_name'] =  $userdata->first_name." ".$userdata->last_name;
            $data['response_data']['Courselist'][$j]['created_at'] = $detailss[$j]['created_at']->format('M d, Y');
            $data['response_data']['Courselist'][$j]['category_name'] =  $categoryData['name'];
            $data['response_data']['Courselist'][$j]['category_image'] =  $categoryData['home_image'];
             $data['response_data']['Courselist'][$j]['subcategory_name'] =  $subcategoryData['name'];
            $data['response_data']['Courselist'][$j]['course_title'] =  $courseData['title'];
            $data['response_data']['Courselist'][$j]['course_subtitle'] =  $courseData['sub_title'];
            $data['response_data']['Courselist'][$j]['course_description'] =  $courseData['description'];
           
            $data['response_data']['Courselist'][$j]['course_sample_video'] =   $courseData['sample_video'];
             $data['response_data']['Courselist'][$j]['course_image'] =   $courseData['image'];
             $data['response_data']['Courselist'][$j]['total_rating'] = $overallrating->reviewcnt;
               $data['response_data']['Courselist'][$j]['rating'] =  $overallrating->rating;
            // if($addonsData){$data['response_data'][$i]['addons'] =$addonsData['name'];}
            // else{$data['response_data'][$i]['addons'] ='';}
        
        
            $data['response_data']['Courselist'][$j]['course_price'] = $courseData['price'];
            $j++;
        } 

        foreach($courseData1 as $course[$i] )

         {
            $user=User::where('id',$course[$i]['user_id'])->first();
            //print_r($user);exit;
             $courseCount = DB::table('courses')->where('user_id', $user->id)->count();
         $studentCount = DB::table('orderitems')->where('seller_id',$user->id)->count();


          $data['response_data']['instructorlist'][$i]['id'] =  $user->id;
        $data['response_data']['instructorlist'][$i]['user_name'] =  $user->first_name." ".$user->last_name;
        $data['response_data']['instructorlist'][$i]['user_image'] = $user->profile_image;
        $data['response_data']['instructorlist'][$i]['course_count'] =   $courseCount;  
        
        $data['response_data']['instructorlist'][$i]['user_position'] =  $user->user_type;
        $data['response_data']['instructorlist'][$i]['no_of_students'] = $studentCount; 
        
           
           $i++;  



         }
        if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No data found!');
            exit;
        }
        exit;
    }

    //getting courses by passing all as parameter or category_id
    public function all_courses()
    {
      $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        $courseData = Course::where('status', '=',1)->first();
        //print_r($courseData);exit;
        if(isset($userData['level'])){ $level = $userData['level'];}
        if(isset($userData['price'])){ $price = $userData['price'];}
        if(isset($userData['sort'])){ $sort = $userData['sort'];}
        if($userData['cat_id'] == "All")
        {
            $courseData = Course::where('status', '=',1)->get();
            if(isset($level) && ($level != 0)){
                $courseData = Course::where('status', '=',1)->where('level','=',$level)->get();
            }
            if(isset($price) && ($price != 0)){
                $courseData = Course::where('status', '=',1)->where('price','=',$price)->get();
            }
            if(isset($price) && $price == 1){
                $courseData = Course::where('status', '=',1)->where('price','!=',$price)->get();
            }
            if(isset($sort) && ($sort == 2) && ($sort != 0)){
                $courseData = Course::where('status', '=',1)->orderBy('created_at', 'DESC')->get();
            }
            if(isset($sort) && ($sort == 3)&& ($sort != 0)){
                $courseData = Course::where('status', '=',1)->orderBy('price', 'ASC')->get();
            }
            if(isset($sort) && ($sort == 4) && ($sort != 0)){
                $courseData = Course::where('status', '=',1)->orderBy('price', 'DESC')->get();
            }
            
            
        }
        else
        {
            $courseData = Course::where('category_id', '=',$userData['cat_id'])->get();
            if(isset($level)){
                $courseData = Course::where('category_id', '=',$userData['cat_id'])->where('level','=',$level)->get();
            }
            if(isset($price) && $price == 0){
                $courseData = Course::where('status', '=',1)->where('price','=',$price)->get();
            }
            if(isset($price) && $price == 1){
                $courseData = Course::where('status', '=',1)->where('price','!=',$price)->get();
            }
            if(isset($sort) && $sort == 2){
                $courseData = Course::where('status', '=',1)->orderBy('created_at', 'DESC')->get();
            }
            if(isset($sort) && $sort == 3){
                $courseData = Course::where('status', '=',1)->orderBy('price', 'ASC')->get();
            }
            if(isset($sort) && $sort == 4){
                $courseData = Course::where('status', '=',1)->orderBy('price', 'DESC')->get();
            }
            
            
        }
        $j=0;
        foreach ($courseData as $coursedetail[$j]) { 
           $seller_name = DB::table('users')->where(['id' => $coursedetail[$j]['user_id']])->first();
            $sellingcount=DB::table('myorders')->where('course_id', $coursedetail[$j]['id'])->count();
          $courscnt=DB::table('courses')->where('user_id', $coursedetail[$j]['user_id'])->count();
          $categoryData = Category::where('id','=',$coursedetail[$j]['category_id'])->first();
          $subcategoryData = Category::where('id','=',$coursedetail[$j]['subcategory_id'])->first();
          $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$coursedetail[$j]['id'])->first();
            $data['response_data']['course_list'][$j]['id'] = $coursedetail[$j]['id'];
            $data['response_data']['course_list'][$j]['name'] =$seller_name->first_name." ".$seller_name->last_name;

              if($sellingcount>=5 || $courscnt>1)
             {
                $data['response_data']['course_list'][$j]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
                $data['response_data']['course_list'][$j]['Seller_type'] = "New Seller";
             }
             else
             {
               $data['response_data']['course_list'][$j]['Seller_type'] = "";
             }
             $data['response_data']['course_list'][$j]['title'] =$coursedetail[$j]['title'];
             $data['response_data']['course_list'][$j]['category_name'] =$categoryData->name;
              $data['response_data']['course_list'][$j]['category_image'] =$categoryData->home_image;
             $data['response_data']['course_list'][$j]['subcategory'] =$subcategoryData->name;
             $data['response_data']['course_list'][$j]['description'] =$coursedetail[$j]['description'];
             $data['response_data']['course_list'][$j]['image'] =$coursedetail[$j]['image'];
             $data['response_data']['course_list'][$j]['sample_video'] =$coursedetail[$j]['sample_video'];
             $data['response_data']['course_list'][$j]['sub_title'] =$coursedetail[$j]['sub_title'];
             $data['response_data']['course_list'][$j]['total_price'] =$coursedetail[$j]['price'];
             $data['response_data']['course_list'][$j]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data']['course_list'][$j]['rating'] =  $overallrating->rating ? $overallrating->rating : ''; 
         $j++;
    }
      if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No data found!');
            exit;
        }
        exit;

    }


    //for search
    public function searchword()
    {
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        $keyword=$userData['keyword'];
        $catdata1=Category::where('name', 'like', '%'. $keyword.'%')->where('status',1)->get();
        //print_r($catdata1);exit;
        $categoryData = Category::where('name', 'like', '%'. $keyword.'%')->where('status',1)->pluck('id');
        //print_r($categoryData);exit;
        $courseinfo=Course::whereIn('category_id',$categoryData)->orWhere('title', 'like', '%'. $keyword.'%')->where('status',1)->get();
       // print_r($courseinfo);exit;
        $data['response_data'] = array();
           $i=0;$j=0;
           foreach ($catdata1 as $details[$i]) 
           {
             $data['response_data'][$i]['id'] = $details[$i]['id'];
             $data['response_data'][$i]['category_name'] = $details[$i]['name'];
             $data['response_data'][$i]['category_image'] = $details[$i]['home_image'];
           //   if($details[$i]['description'] == ""){ $data['response_data'][$i]['category_desc'] = "";}
           // else { $data['response_data'][$i]['category_desc'] = $details[$i]['description'];}
           // $data['response_data'][$i]['subtitle'] = $details[$i]['sub_title'];
           // $data['response_data'][$i]['slug'] = $details[$i]['slug'];
           // $data['response_data'][$i]['status'] = $details[$i]['status'];
           // $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');
           // $data['response_data'][$i]['updated_at'] = $details[$i]['updated_at']->format('M d, Y');
             $i++;
           }
           foreach ($courseinfo as $detailss[$j]) 
           {
              
            $courseData = Course::where('id', $detailss[$j]['id'])->first(); 
           
            $categoryData = Category::where('id', $courseData->category_id)->first();
             //print_r($categoryData);exit;
            $userdata=User::where('id',$courseData['user_id'])->first();
            
            $sellingcount=DB::table('myorders')->where('course_id', $detailss[$j]['id'])->count();
              $courscnt=DB::table('courses')->where('user_id', $detailss[$j]['user_id'])->count();
            $subcategoryData = Category::where('id', $courseData->subcategory_id)->first();
            $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$courseData['id'])->first(); 
             $data['response_data'][$j]['id'] = $detailss[$j]['id'];
             $data['response_data'][$j]['category_name'] =  $categoryData['name'];
             $data['response_data'][$j]['category_image'] =  $categoryData['home_image'];
             $data['response_data'][$j]['title'] =  $courseData['title'];
             $data['response_data'][$j]['description'] =  $courseData['description'];
            $data['response_data'][$j]['name'] = $userdata['first_name']."".$userdata['last_name'];
            if($sellingcount>=5 || $courscnt>1)
             {
                $data['response_data'][$j]['Seller_type'] = "Best Seller";
             }else if($sellingcount==0 && $courscnt==1)
             {
                $data['response_data'][$j]['Seller_type'] = "New Seller";
             }
             else
             {
               $data['response_data'][$j]['Seller_type'] = "";
             }
            $data['response_data'][$j]['subcategory'] =  $subcategoryData['name'];
            $data['response_data'][$j]['image'] =   $courseData['image'];
            $data['response_data'][$j]['sample_video'] =   $courseData['sample_video'];
            $data['response_data'][$j]['sub_title'] =   $courseData['sub_title'];

             $data['response_data'][$j]['total_price'] = $courseData['price'];
             $data['response_data'][$j]['total_rating'] = $overallrating->reviewcnt;
            $data['response_data'][$j]['rating'] =  $overallrating->rating;
             $j++;
           }
           //print_r($data);exit;
           if (!empty($data['response_data'])) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No record found!');
            exit;
        }
        exit;


   

    }

    //for list subcategory

    public function subcategorylist()
    {
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
      
        $subcategoryData = Category::where('parent_id','=',$userData['category_id'])->where('status',1)->get();
          //print_r($subcategoryData);exit;
        $data['response_data'] = array();
        $i = 0;
        foreach ($subcategoryData as $details[$i]) {
         $data['response_data'][$i]['id'] = $details[$i]['id'];
         $data['response_data'][$i]['category_name'] = $details[$i]['name'];
         $data['response_data'][$i]['category_image'] = $details[$i]['home_image'];
         if($details[$i]['category_desc'] == ""){ $data['response_data'][$i]['description'] = "";}
         else { $data['response_data'][$i]['category_desc'] = $details[$i]['description'];}
         
         $data['response_data'][$i]['slug'] = $details[$i]['slug'];
         $data['response_data'][$i]['status'] = $details[$i]['status'];
         $data['response_data'][$i]['is_deleted'] = $details[$i]['is_deleted'];
         $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');
         $data['response_data'][$i]['updated_at'] = $details[$i]['updated_at']->format('M d, Y');
         $i++;   
        }
        if (!empty($data)) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No SubCategory found!');
            exit;
        }
        exit;
    }
//for my cources
    public function mycourse() {
        $tokenData = $this->requestAuthentication('GET');
       $user_id = $tokenData['user_id'];
       $mycourses = Orderitem::where(['buyer_id' => $user_id])->orderBy('id', 'DESC')->get();
         $data['response_data'] = array();
          $i = 0;
            $count=6;
         foreach($mycourses as $details[$i] )
         {
            $courseData = Course::where('id', $details[$i]['course_id'])->first(); 
           // print_r($courseData);exit;
            $categoryData = Category::where('id', $courseData['category_id'])->first();
            $subcategoryData = Category::where('id', $courseData['subcategory_id'])->first();
            $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$details[$i]['course_id'])->first(); 
           $data['response_data'][$i]['id'] = $details[$i]['course_id'];
           //$data['response_data'][$i]['course_id'] = $details[$i]['course_id'];
            
            $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');;
            $data['response_data'][$i]['category'] =  $categoryData['name'];
            $data['response_data'][$i]['title'] =  $courseData['title'];
            $data['response_data'][$i]['description'] =  $courseData['description'];
            $data['response_data'][$i]['subcategory'] =  $subcategoryData['name'];
            $data['response_data'][$i]['sample_video'] =   $courseData['sample_video'];
             $data['response_data'][$i]['image'] =   $courseData['image'];
             $data['response_data'][$i]['total_rating'] = $overallrating->reviewcnt;
               $data['response_data'][$i]['rating'] =  $overallrating->rating;
            
            $data['response_data'][$i]['total_price'] = $courseData['price'];
            $i++;
        } 
           $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit; 
    }

    public function Wishlist() 
{
    //echo"hiiii";exit;
    $tokenData = $this->requestAuthentication('GET');
    $user_id = $tokenData['user_id'];
    //print_r($user_id);exit;
    $mysavecoursesAA = DB::table('savedcourses')->where(['user_id' => $user_id])->first();
   // print_r($mysavecoursesAA);exit;
    //print_r($mysavecoursesAA);exit;
        $mysavecourses = array();
        if ($mysavecoursesAA) {
            if ($mysavecoursesAA->course_ids) {
                $mysavecourses = explode(',', $mysavecoursesAA->course_ids);
            }
        }
        //print_r($mysavecourses);exit;
        $allrecords = Course::whereIn('id', $mysavecourses)->get();
       // print_r($allrecords);exit;
         $data['response_data'] = array();
            $i = 0;
         foreach($allrecords as $details[$i] )
         {
            $courseData = Course::where('id', $details[$i]['id'])->first(); 
            $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id',$details[$i]['id'])->first(); 
            //print_r($overallrating);exit;
       // $allRate = $overallrating->rating;
       // $allRwCnt = $overallrating->reviewcnt;
            //print_r($courseData);exit;
            $categoryData = Category::where('id', $courseData->category_id)->first();
            $subcategoryData = Category::where('id', $courseData->subcategory_id)->first();

            $data['response_data'][$i]['id'] = $details[$i]['id'];
            $data['response_data'][$i]['created_at'] = $details[$i]['created_at']->format('M d, Y');;
            $data['response_data'][$i]['category'] =  $categoryData['name'];
            $data['response_data'][$i]['title'] =  $courseData['title'];
            $data['response_data'][$i]['description'] =  $courseData['description'];
            $data['response_data'][$i]['subcategory'] =  $subcategoryData['name'];
            $data['response_data'][$i]['sample_video'] =   $courseData['sample_video'];
             $data['response_data'][$i]['image'] =   $courseData['image'];
            
             $data['response_data'][$i]['total_price'] = $courseData['price'];
              $data['response_data'][$i]['total_rating'] = $overallrating->reviewcnt;
               $data['response_data'][$i]['rating'] =  $overallrating->rating;
            $i++;

         }
         $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        //print_r($allrecords);exit;

}

public function cart() 
{
    //echo"hiiii";exit;
    $tokenData = $this->requestAuthentication('GET');
    $user_id = $tokenData['user_id'];
    $cartinfo=Cart::where('user_id',$user_id)->where('later_course_flag',0)->get();
   //print_r($cartinfo);exit;
     $data['response_data'] = array();
            $i = 0;$total = 0;
         foreach($cartinfo as $details[$i] )

         {
          //print_r($details[$i]);exit;
             $courseData = Course::where('id', $details[$i]['course_id'])->first(); 
             //print_r($courseData->user_id);exit;
            $userdata=User::where('id',$courseData['user_id'])->first();
            //print_r($userdata);exit;
             $categoryData = Category::where('id', $courseData['category_id'])->first();
            $subcategoryData = Category::where('id', $courseData['subcategory_id'])->first();
          $data['response_data'][$i]['id'] = $details[$i]['id'];
            $data['response_data'][$i]['course_id'] = $details[$i]['course_id'];
            $data['response_data'][$i]['category'] =  $categoryData['name'];
             $data['response_data'][$i]['title'] =  $courseData['title'];
            $data['response_data'][$i]['description'] =  $courseData['description'];
            $data['response_data'][$i]['name'] = $userdata['first_name']."".$userdata['last_name'];
            $data['response_data'][$i]['subcategory'] =  $subcategoryData['name'];
            $data['response_data'][$i]['image'] =   $courseData['image'];
            $data['response_data'][$i]['sample_video'] =   $courseData['sample_video'];
            
             $data['response_data'][$i]['total_price'] = $courseData['price'];
             $total =  ($total + $data['response_data'][$i]['total_price']);
            $i++;


         }

         $data['total'] = $total;
         $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
    //print_r($cartinfo);exit;


}

// public function later_save()
// {
//   $this->requestAuthentication('POST');
// }
public function addtocart()
{
    //echo"hii";exit;

        //$this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
         $userData = json_decode($values, true);
         $cid = $userData['course_id'];
         $user_id = $userData['user_id'];
         
        $cartinfo = Cart::where('user_id',$userData['user_id'])->where('course_id',$userData['course_id'])->first();
        //print_r($userData);exit;
        if(empty($cartinfo)){
         if (Cookie::get('cookname_broserId') != '') { 
            $browser_session_id = Cookie::get('cookname_broserId');
        }
        else { 
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }
        //echo  $browser_session_id;exit;
       
        $serialisedData = array();
         if (isset($userData['user_id'])) {
            $serialisedData['user_id'] = $userData['user_id'];
        } else {
            $serialisedData['user_id'] = '';
        }
         if (isset($userData['course_id'])) {
            $serialisedData['course_id'] = $userData['course_id'];
        } else {
            $serialisedData['course_id'] = '';
        }
        if (isset($userData['quantity'])) {
            $serialisedData['quantity'] = $userData['quantity'];
        } else {
            $serialisedData['quantity'] = '';
        }
         $serialisedData['slug'] = $this->createSlug('Cart' . '-' . rand(10000, 99999) . rand(10000, 99999), 'carts');
          $serialisedData['session_id'] = $browser_session_id;            
            Cart::insert($serialisedData);
            $data['response_status'] = 'success';
            $cartcount = 0;
            $cartcount = DB::table('carts')->where('user_id', $user_id)->where('later_course_flag',0)->count();
            $data['response_data']['cart_count'] = $cartcount;
            echo json_encode($data);
            exit;
          }
          else {
            echo $this->errorOutputResult('course alredy exists in your cart list!');
            exit;
}

}

public function removeFrom_cart()
{
  $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }

        $userData = json_decode($values, true);
        $cartinfo=Cart::where('user_id',$userData['user_id'])->where('course_id',$userData['course_id'])->first();
        // print_r($userData['user_id']);exit;
         if(!empty($cartinfo)){

        Cart::where('user_id', $userData['user_id'])->where('course_id', $userData['course_id'])->delete();
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
      }
       else {
            echo $this->errorOutputResult('No record found!');
            exit;
}


}
//webservice for "Get saved for later courses list web service".
public function later_courses()
{
    //echo"hiii";exit;
  //$this->requestAuthentication('POST');
        $this->requestAuthentication('POST');

        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
         $userData = json_decode($values, true);
         //print_r($userData);exit;
         $cid= $userData['course_id'];
         $user_id=$userData['user_id'];
        //print_r($cid."". $user_id);exit;
         $cartinfo=Cart::where('user_id',$user_id)->where('course_id',$cid)->first();
        // print_r($cartinfo);exit;
         if(!empty($cartinfo))
         {
         DB::table('carts')->where('user_id',$user_id)->where('course_id',$cid)->update(['later_course_flag' => 1]);
         //print_r("Updated successfully");exit;
       }
         $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;

}
public function later_coursesList()
{
   $tokenData = $this->requestAuthentication('GET');
    $user_id = $tokenData['user_id'];
    $cartinfo= DB::table('carts')->where('user_id',$user_id)->where('later_course_flag',1)->get();
  //print_r($cartinfo);exit;
     $data['response_data'] = array();
            $i = 0;
         foreach($cartinfo as $details[$i] )

         {
          //print_r($details[$i]->course_id);exit;
             $courseData = Course::where('id', $details[$i]->course_id)->first(); 
             //print_r($courseData->user_id);exit;
            $userdata=User::where('id',$courseData->user_id)->first();
            //print_r($userdata);exit;
             $categoryData = Category::where('id', $courseData['category_id'])->first();
            $subcategoryData = Category::where('id', $courseData['subcategory_id'])->first();
          
            $data['response_data'][$i]['id'] = $details[$i]->course_id;
            $data['response_data'][$i]['category'] =  $categoryData['name'];
             $data['response_data'][$i]['title'] =  $courseData['title'];
            $data['response_data'][$i]['description'] =  $courseData['description'];
            $data['response_data'][$i]['name'] = $userdata['first_name']." ".$userdata['last_name'];
            $data['response_data'][$i]['subcategory'] =  $subcategoryData['name'];
            $data['response_data'][$i]['image'] =   $courseData['image'];
             $data['response_data'][$i]['sample_video'] =   $courseData['sample_video'];
             $data['response_data'][$i]['total_price'] = $courseData['price'];
            $i++;


         }
        if (!empty($data['response_data'])) {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else {
            echo $this->errorOutputResult('No record found!');
            exit;
}
}
//Remove from cart and add to wishlist
public function cartTowishlist()
{
   //echo"hiii";exit;
    $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }

        $userData = json_decode($values, true);
        $cid= $userData['course_id'];
        //print_r($userData);exit;
        $cartinfo=Cart::where('user_id',$userData['user_id'])->where('course_id',$userData['course_id'])->first();
        //print_r($cartinfo);exit;
        // print_r($userData['user_id']);exit;
         if(!empty($cartinfo)){

        Cart::where('user_id', $userData['user_id'])->where('course_id', $userData['course_id'])->delete();
    }
     $mysavecsAA = DB::table('savedcourses')->where('user_id',$userData['user_id'])->first();
     if ($mysavecsAA) {
                $mysavecourse = array();
                if ($mysavecsAA->course_ids) {
                    $mysavecourse = explode(',', $mysavecsAA->course_ids);
                }
                if (!in_array($cid, $mysavecourse)) {
                    $mysavecourse[] = $cid;
                }
                $courseidss = implode(',', $mysavecourse);
                DB::table('savedcourses')->where('id', $mysavecsAA->id)->update(['course_ids' => $courseidss]);
            }
            else { 
                $serialisedData = array();
                $serialisedData['user_id'] = $userData['user_id'];
                $serialisedData['course_ids'] = $cid;
                $serialisedData = $this->serialiseFormData($serialisedData);
                DB::table('savedcourses')->insert($serialisedData);
            }
             $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;


 }
//remove from latercourse and add to addtocart
public function latercourse_addcart()
{
   $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
         $userData = json_decode($values, true);
         $cid= $userData['course_id'];
         $user_id=$userData['user_id'];
        //print_r($cid."". $user_id);exit;
         $cartinfo=Cart::where('user_id',$user_id)->where('course_id',$cid)->first();
         //print_r($cartinfo);exit;
         if(!empty($cartinfo))
         {
         DB::table('carts')->where('user_id',$user_id)->where('course_id',$cid)->update(['later_course_flag' => 0]);
         //print_r("Updated successfully");exit;
       }
         $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;
}
//remove from latercourse
public function removefrom_laterlist()
{
  $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
         $userData = json_decode($values, true);
         $cid= $userData['course_id'];
         $user_id=$userData['user_id'];
        //print_r($cid."". $user_id);exit;
         $cartinfo=Cart::where('user_id',$user_id)->where('course_id',$cid)->first();
         //print_r($cartinfo);exit;
         if(!empty($cartinfo))
         {
         DB::table('carts')->where('user_id',$user_id)->where('course_id',$cid)->where('later_course_flag',1)->delete();
         //print_r("Updated successfully");exit;
       }
         $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;
}

//add to wishlist
 public function addtowishlist()
 {
   $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }

        $userData = json_decode($values, true);
        $cid= $userData['course_id'];
          $mysavecsAA = DB::table('savedcourses')->where('user_id',$userData['user_id'])->first();
          //print_r($mysavecsAA);exit;
          if ($mysavecsAA) {
                $mysavecourse = array();
                if ($mysavecsAA->course_ids) {
                    $mysavecourse = explode(',', $mysavecsAA->course_ids);
                }
                if (!in_array($cid, $mysavecourse)) {
                    $mysavecourse[] = $cid;
                }
                $courseidss = implode(',', $mysavecourse);
                DB::table('savedcourses')->where('id', $mysavecsAA->id)->update(['course_ids' => $courseidss]);
            }
            else { 
                $serialisedData = array();
                $serialisedData['user_id'] = $userData['user_id'];
                $serialisedData['course_ids'] = $cid;
                $serialisedData = $this->serialiseFormData($serialisedData);
                DB::table('savedcourses')->insert($serialisedData);
            }
             $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;
 }
 public function removewishlist(){

 $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }

        $userData = json_decode($values, true);
        $cid= $userData['course_id'];
          $mysavecsAA = DB::table('savedcourses')->where('user_id',$userData['user_id'])->first();
          $mysavecourse = array();
            if ($mysavecsAA->course_ids) {
                $mysavecourse = explode(',', $mysavecsAA->course_ids);
            }
            if (($key = array_search($cid, $mysavecourse)) !== false) {
                unset($mysavecourse[$key]);
            }
            $courseidss = implode(',', $mysavecourse);
            DB::table('savedcourses')->where('id', $mysavecsAA->id)->update(['course_ids' => $courseidss]);
             $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;

 }

//Fetch instructor list category wise.
 public function instructorlist()
 {

        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
         //print_r($userData);exit;
        $coursedata =Course::where('category_id','=',$userData['category_id'])->where('status',1)->groupBy('user_id')->get();
        //print_r($coursedata);exit;
        $i=0;
        foreach ($coursedata as $course[$i]) { 
        $user=User::where('id',$course[$i]->user_id)->first();
        $courseCount = DB::table('courses')->where('user_id', $course[$i]->user_id)->count();
         $studentCount = DB::table('orderitems')->where('seller_id',$course[$i]->user_id)->count();
       // print_r($courseCount);exit;
        $data['response_data'][$i]['id'] =  $user->id;
        $data['response_data'][$i]['user_name'] =  $user->first_name." ".$user->last_name;
        $data['response_data'][$i]['user_image'] = $user->profile_image;
        $data['response_data'][$i]['course_count'] =   $courseCount;  
        
        $data['response_data'][$i]['user_position'] =  $user->user_type;
        $data['response_data'][$i]['no_of_students'] = $studentCount; 
        
           
           $i++;  

          # code...
        }
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit; 
 } 
 //Fetch instructor details and his no of courses list.

 public function instructordetails()
 {
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        $user=User::where('id',$userData['user_id'])->first();
        $coursedata =Course::where('user_id',$userData['user_id'])->where('status',1)->get();
        //print_r($coursedata);exit;
        $studentCount = DB::table('orderitems')->where('seller_id',$userData['user_id'])->count();
        $courseCount = DB::table('courses')->where('user_id',$userData['user_id'])->count();
        $overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('user_id',$userData['user_id'])->first();
         // $courseDetails['rating']=$overallrating->rating; 
         $data['response_data'] = array();
        $data['response_data']['user_name'] =  $user->first_name." ".$user->last_name;
        $data['response_data']['user_image'] =  $user->profile_image;
         $data['response_data']['user_contact'] =  $user->contact;
          $data['response_data']['user_email_address'] =  $user->email_address;
         $data['response_data']['user_about'] =  $user->about;
         $data['response_data']['user_about_short'] =  $user->about_short;
         
        $data['response_data']['studentCount'] = $studentCount;
        $data['response_data']['coursecount'] = $courseCount;
        $data['response_data']['rating'] = $overallrating->rating;
        $i=0;
        foreach ($coursedata as $course[$i]) {
           $overallcourserating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course[$i]['id'])->first();
           //print_r($overallcourserating);exit;
          //$data['response_data']['Cources'][$i]['course_name'] =  $course[$i]['id'];
           $data['response_data']['Cources'][$i]['course_id'] =  $course[$i]['id'];
          $data['response_data']['Cources'][$i]['course_name'] =  $course[$i]['title'];
          $data['response_data']['Cources'][$i]['course_image'] =  $course[$i]['image'];
          $data['response_data']['Cources'][$i]['course_price'] =  $course[$i]['price'];
          $data['response_data']['Cources'][$i]['course_rating'] =  $overallcourserating->rating;
          $data['response_data']['Cources'][$i]['course_reviewcnt'] =  $overallcourserating->reviewcnt;
         $i++;
        // $i++;
        }
       // print_r($coursedata);exit;
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit; 

 }
//Fetch course lectures and more info.
 public function video_status()
 {
    //echo"hhhh";exit;
     $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        $coursecontents=Coursecontent::where('id', $userData['id'])->first();
      //print_r($coursecontents);exit;
        if(!empty($coursecontents))
        {
        Coursecontent::where('id',  $userData['id'])->update(['video_status'=>1]);
           $data['response_status'] = 'success';
        
                    echo json_encode($data);
            exit;
       }
       else
       {
        echo $this->errorOutputResult('No record found!');
       }


        //print_r($userData);exit;

 }
public function course_lectures()
{
        $tokenData = $this->requestAuthentication('POST', 1);
        $user_id = $tokenData['user_id'];
        $reqData = $_POST['data'];
        $userData = json_decode($reqData, true);
        //print_r($userData);exit;
        global $level;
       $recordInfo = Course::where('id', $userData['course_id'])->first();
       //print_r($recordInfo);exit;
       $contsections = DB::table('coursecontents')->where('video','<>','')->get()->toArray();
       //print_r($contsections);exit;
       $sectionids=array_column($contsections, 'section_id');
       
       $course_ids=array_column($contsections, 'course_id');
       //print_r($course_ids);exit;
       $sections = Coursesection::whereIn('id',$sectionids)->where('course_id',$userData['course_id'])->get();
      //print_r($sections);exit;
       $userInfo=User::where('id',$recordInfo->user_id)->first();
       $lacturCount = DB::table('coursecontents')->where('course_id', $recordInfo->id)->count();
       $studentCount = DB::table('payments')->where('course_id', $recordInfo->id)->count();
       $data['response_data'] = array();
       $data['response_data']['course_id'] =$recordInfo->id;
        $data['response_data']['Seller_name'] =$userInfo->first_name." ".$userInfo->last_name;
        $data['response_data']['Seller_image'] =$userInfo->profile_image;
        if(!empty($userInfo->about_short))
        {
        $data['response_data']['Seller_position'] =$userInfo->about_short;
       }
       else{
        $data['response_data']['Seller_position'] = "";
       }
       $data['response_data']['course_title'] =$recordInfo->sub_title;
        $data['response_data']['course_image'] =$recordInfo->image;
       $data['response_data']['skills_level'] =$level[$recordInfo->level];
       $data['response_data']['Lectures'] = $lacturCount;
       $data['response_data']['Students'] = $studentCount;
       $data['response_data']['description'] = $recordInfo->description;
       $data['response_data']['seller_full_name'] =$userInfo->first_name." ".$userInfo->last_name;
       $data['response_data']['seller_profile_image'] =$userInfo->profile_image;
        $j=0;
       foreach ($sections as $section[$j]) {
            # code...
        //print_r($section[$j]->course_id);exit;
            $contents = DB::table('coursecontents')->where('section_id', $section[$j]->id)->where('course_id', $section[$j]->course_id)->where('video','<>','')->get();
              
              //print_r($contents);exit;
                $contentCount = DB::table('coursecontents')->where('section_id', $section[$j]->id)->where('course_id', $recordInfo->id)->count();

                // if()
                //  $data['response_data']['Cources'][$j]['Section_title']= $section[$j]->section_title;
                $i=0;
                foreach($contents as $content[$i]){
               $cont = DB::table('coursecontents')->where('id',  $content[$i]->id)->first(); 
               //print_r($cont);exit;
               // if($section[$j]->id == $content[$i]->section_id && $section[$j]->id ==$content[$i]->section_id  && $cont->video != '')
               // {
               $data['response_data']['Cources'][$j]['Section_title']= $section[$j]->section_title;
               // }   
            $data['response_data']['Cources'][$i]['id']= $cont->id;
              $data['response_data']['Cources'][$i]['Lecture_title']= $cont->lecture_title;
             $data['response_data']['Cources'][$i]['lecture_description']=$cont->lecture_description;
             if(!empty($cont->video))
             {
              $data['response_data']['Cources'][$i]['video']=$cont->video;
              $data['response_data']['Cources'][$i]['video_time']=$cont->video_time;
                 if($cont->video_status == 1){
                
              $data['response_data']['Cources'][$i]['video_status']="watched";
               }
               else
               {
                $data['response_data']['Cources'][$i]['video_status']="Not watched";
               }
              

            }
            if($content[$i]->video_status == 1){
                
              $data['response_data']['Cources'][$i]['video_status']="watched";
               }
              
              
              $i++;
            
            }
           $j++;
        }
        // $data['response_status'] = 'success';
        // $data['response_msg'] = '';
        // echo json_encode($data);
        //     exit; 
        if (!empty($data['response_data'])) 
        {
            $data['response_status'] = 'success';
            $data['response_msg'] = '';
            echo json_encode($data);
            exit;
        }
        else 
        {
            echo $this->errorOutputResult('No record found!');
            exit;
         
      //print_r($recordInfo);exit;


}
}
    public function changepicture() 
    {
        //echo"Hello";exit;
    $tokenData = $this->requestAuthentication('POST');
    $userid = $tokenData['user_id'];
    
    $profile_image = $_FILES['profile_image'];
   //print_r($profile_image );exit;
        $userinfo = User::where('id',$userid )->first();
        
            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['tmp_name'] != '') {
                $file = $_FILES['profile_image'];
                $file = Input::file('profile_image');
        $uploadedFileName = $this->uploadImage($file, PROFILE_FULL_UPLOAD_PATH);
                $this->resizeImage($uploadedFileName, PROFILE_FULL_UPLOAD_PATH, PROFILE_SMALL_UPLOAD_PATH, PROFILE_MW, PROFILE_MH);
                $input['profile_image'] = $uploadedFileName;
                       
            }
            else {
                unset($input['profile_image']);
            }
        //print_r($input['profile_image']);exit;
        $serialisedData['profile_image'] = $input['profile_image']; //send 1 for edit
        User::where('id', $userid)->update($serialisedData);
    $userInfo1 = User::where('id', $userid )->first();
        $userDetails['user_id'] = $userInfo1->id;
        $userDetails['user_type'] = $userInfo1->user_type;
        $userDetails['first_name'] = $userInfo1->first_name;
        $userDetails['last_name'] = $userInfo1->last_name;
        //$userDetails['contact'] = $userInfo->contact;
        $userDetails['email_address'] = $userInfo1->email_address;
        if($userInfo1->contact != ''){
        $userDetails['contact'] = $userInfo1->contact;}
        else{$userDetails['contact'] = "";}
        if($userInfo1->address != ''){
        $userDetails['address'] = $userInfo1->address;}
        else{$userDetails['address'] = "";}
        if($userInfo1->profile_image != ''){
        $userDetails['profile_image'] = $userInfo1->profile_image;}
        else{$userDetails['profile_image'] = "";}

        $data['response_data'] = $userDetails;
        $data['response_status'] = 'success';
        $data['response_msg'] = 'Profile Picture updated successfully';
        echo json_encode($data);
        exit;
        $this->successOutput('Profile image updated successfully.');
    }

 public function sociallogin()
 {
        $this->requestAuthentication('POST');
        if (isset($_REQUEST['data']))
            $values = trim($_REQUEST['data']);

        $userData = json_decode($values, true);
    
        $serialisedData = array();
        if (isset($userData['email_address'])) {
            $serialisedData['email_address'] = $userData['email_address'];
        } else {
           $serialisedData['email_address'] = '';
        }
        if (isset($userData['first_name'])) {
            $serialisedData['first_name'] = $userData['first_name'];
        } else {
            $serialisedData['first_name'] = '';
        }
        if (isset($userData['last_name'])) {
            $serialisedData['last_name'] = $userData['last_name'];
        } else {
            $serialisedData['first_name'] = '';
        }
        if (isset($userData['device_id'])) {
            $serialisedData['device_id'] = $userData['device_id'];
        } else {
            $serialisedData['device_id'] = '';
        }
        if (isset($userData['device_type'])) {
            $serialisedData['device_type'] = $userData['device_type'];
        } else {
            $serialisedData['device_type'] = '';
        }

        $msgString = "";
        if (isset($serialisedData) && !empty($serialisedData)) 
        {
            if (trim($serialisedData['email_address']) == '') {
                $msgString .= 'Email Address is required field.';
            }
            if (trim($serialisedData["first_name"])== '') {
                $msgString .= 'First Name is required field.';
            }
            if (trim($serialisedData["last_name"])== '') {
                $msgString .= 'Last Name is required field.';
            }
            if (trim($serialisedData["device_type"])== '') {
                $msgString .= 'Device type is required field.';
            }
            if (trim($serialisedData["device_id"]) == '') {
                $msgString .= 'Device id is required field.';
            }
            if (isset($msgString) && $msgString != '') {
                echo $this->errorOutputResult($msgString);
                exit;
            } else {
                $userInfo = User::where('email_address' , $serialisedData['email_address'])->first();
                if (!empty($userInfo)) {
                        if ($userInfo->status == 1 && $userInfo->activation_status == 1) {
                             $data = $this->logindata($userInfo);
                             $token = $data['token'];
                            //$data = $userInfo;
                            User::where('id', $userInfo->id)->update(array('device_type' => $serialisedData["device_type"], 'device_id' => $serialisedData["device_id"],'token'=>$token));
                            // $data['id'] = $userInfo->id;
                            // $data['user_type'] = $userInfo->user_type;
                            // $data['first_name'] = $userInfo->first_name;
                            // $data['last_name'] = $userInfo->last_name;
                            // $data['contact'] = $userInfo->contact;
                            // $data['email_address'] = $userInfo->email_address;
                            if($userInfo->id != ''){
                            $details['user_id'] = $userInfo->id;}
                            else{$details['user_id'] = "";}
                            if($userInfo->first_name != ''){
                            $details['first_name'] = $userInfo->first_name;}
                            else{$details['first_name'] = "";}
                            if($userInfo->last_name != ''){
                            $details['last_name'] = $userInfo->last_name;}
                            else{$details['last_name'] = "";}

                            if($userInfo->email_address != ''){
                            $details['email_address'] = $userInfo->email_address;}
                            else{$details['email_address'] = "";}
                            if($userInfo->token != ''){
                            $details['token'] = $userInfo->token;}
                            else{$details['token'] = "";}
                         if($userInfo->contact != ''){
                            $details['contact'] = $userInfo->contact;}
                            else{$details['contact'] = "";}
                            if($userInfo->address != ''){
                            $details['address'] = $userInfo->address;}
                            else{$details['address'] = "";}
                            if($userInfo->profile_image != ''){
                            $details['profile_image'] = $userInfo->profile_image;}
                            else{$details['profile_image'] = "";}
                
                            Session::put('user_id', $userInfo->id);
                            $data['response_data'] = $details;
                            $data['response_status'] = 'success';
                            $data['response_msg'] = 'Login Successfully';
                            echo json_encode($data);
                            exit;
                        } else if ($userInfo->status == 1 && $userInfo->activation_status == 0) {
                            $msgString .= 'You need to activate your account before login.';
                            echo $this->errorOutputResult($msgString);
                        exit;
                        } else if ($userInfo->status == 0 && $userInfo->activation_status == 0) {
                            $msgString .= 'Your account might have been temporarily disabled. Please contact us for more details.';
                            echo $this->errorOutputResult($msgString);
                        exit;
                        }

                    
                }

                else
                {
                     // $data = $this->logindata($userInfo);
                     //         $token = $data['token'];
                    $serialisedData = array();
                    $password = $userData['first_name'].'@123';
                    $serialisedData['password'] = md5($password);
                    $serialisedData['slug'] = $this->createSlug($userData['first_name'] . ' ' .$userData['last_name'], 'users');
                    $serialisedData['first_name'] = $userData['first_name'];
                        $serialisedData['email_address'] = $userData['email_address'];
                    $serialisedData['last_name'] = $userData['last_name'];
                    $serialisedData['user_type'] = $userData['user_type'];

                    $serialisedData['activation_status'] = 1;
                    $serialisedData['user_status'] = 1;
                    $serialisedData['status'] = 1;
                    $serialisedData['created_at'] = date('Y-m-d H:i:s');
                    $serialisedData['updated_at'] = date('Y-m-d H:i:s');
                    $uniqueKey = bin2hex(openssl_random_pseudo_bytes(25));
                    $serialisedData['unique_key'] = $uniqueKey;
                     //$serialisedData['token'] = $token;
                    if(User::insert($serialisedData)) {
                        //$this->login($userInfo);

                     //    $data = $this->logindata($userInfo);
                     // $token = $data['token'];
                     $last_row = DB::table('users')->orderBy('id', 'DESC')->first();
                     $data = $this->logindata($last_row );
                      $token = $data['token'];

                      User::where('id', $last_row->id)->update(['token'=>$token]);

                      //update(['later_course_flag' => 1])
                    //mail send
                    $userId = $last_row->id;
        
                    //$link = HTTP_PATH . "/email-confirmation/" . $uniqueKey;
                    $name =  $last_row->first_name. ' ' .  $last_row->last_name;
                    $emailId =  $last_row->email_address;
                    $password = $password;
                    

                    $emailTemplate = DB::table('emailtemplates')->where('id', 33)->first();
                    $toRepArray = array('[!email!]', '[!username!]', '[!password!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                    $fromRepArray = array($emailId, $name, $password, HTTP_PATH, SITE_TITLE);
                    //$emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                    $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                    //print_r($emailBody);exit;
                    //Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
             //print_r($last_row);exit;
            $details = $this->logindata($last_row);

          //print_r($details);exit;
                    $details['first_name'] = $last_row->first_name;
                    $details['last_name'] = $last_row->last_name;
                    if(isset($last_row->contact) && ($last_row->contact != '')){
                    $details['contact'] = $last_row->contact;
                      $data['response_data']['contact'] = $details['contact'];}
                    else{$details['contact'] = "";}
                    $details['email_address'] = $last_row->email_address;
                    if(isset($last_row->address) && ($last_row->address != '')){
                    $details['address'] = $last_row->address;
                      $data['response_data']['address'] = $details['address'];}
                    else{$details['address'] = "";}
                    if(isset($last_row->profile_image) && ($last_row->profile_image != '')){
                    $details['profile_image'] = $last_row->profile_image;
                    $data['response_data']['profile_image'] = $details['profile_image'];}
                    else{$details['profile_image'] = "";}

            $data['response_data'] = $details;
                    $data['response_msg'] = '';

                    $data['response_status'] = 'success';
            //print_r($data);exit;
                    echo json_encode($data);
                    exit;
                    }exit;


                }
            }
        }
        
}



public function changepassword() {
    //echo"hiii";exit;
        $tokenData = $this->requestAuthentication('POST');
        //print_r($tokenData);exit;
    $user_id = $tokenData['user_id'];
// print_r($user_id);exit;
        if (isset($_REQUEST['data']))
        {
            $values = trim($_REQUEST['data']);
        }
        $userData = json_decode($values, true);
       //print_r($userData);exit;
        $recordInfo = User::where('id', $user_id)->first();
      // print_r($recordInfo);exit;
        $serialisedData = array();
    $msgString = '';
        if (isset($userData['old_password'])) {
           $serialisedData["old_password"] = $userData['old_password'];
        } else {
            $serialisedData["old_password"] = '';
        }
        if (isset($userData['new_password'])) {
            $serialisedData["new_password"] = $userData['new_password'];
        } else {
            $serialisedData["new_password"] = '';
        }
        if ($serialisedData) {
            if (trim($serialisedData["old_password"]) == '') {
                $msgString .= 'Old Password is required field.';
            }
            if (trim($serialisedData["new_password"]) == '') {
                $msgString .= 'New Password is required field.';
            }
        }
        if (!password_verify($serialisedData["old_password"], $recordInfo->password)) {
            $this->errorOutputResult('Current password is not correct.');
        } else if ($serialisedData["old_password"] == $serialisedData["new_password"]) {
            $this->errorOutputResult('You can not change new password same as current password.');
        } else {
            $new_password = $this->encpassword($serialisedData["new_password"]);
            User::where('id', $user_id)->update(array('password' => $new_password));
            $this->successOutput('Your Password has been changed successfully.');
        }

    }
     public function register() { 
      // echo"hi";exit;
        $this->requestAuthentication('POST');
        if (isset($_REQUEST['data'])){
            $values = trim($_REQUEST['data']);
        }
        $userData = json_decode($values, true);
        //print_r($_REQUEST['data']);exit;
        //$userData = $values;
        
        $serialisedData = array();
         $serialisedData = array();
        if (isset($userData['user_type'])) {
            $serialisedData['user_type'] = $userData['user_type'];
        } else {
            $serialisedData['user_type'] = '';
        }
       
        if (isset($userData['first_name'])) {
            $serialisedData['first_name'] = $userData['first_name'];
        } else {
            $serialisedData['first_name'] = '';
        }
        if (isset($userData['last_name'])) {
            $serialisedData['last_name'] = $userData['last_name'];
        } else {
            $serialisedData['last_name'] = '';
        }
        // if (isset($userData['contact'])) {
        //     $serialisedData['contact'] = $userData['contact'];
        // } else {
        //     $serialisedData['contact'] = '';
        // }
        if (isset($userData['email_address'])) {
            $serialisedData['email_address'] = $userData['email_address'];
        } else {
            $serialisedData['email_address'] = '';
        }
        if (isset($userData['password'])) {
            $serialisedData['password'] = $userData['password'];
        } else {
            $serialisedData['User']['password'] = '';
        }
        if (isset($userData['device_id'])) {
            $serialisedData['device_id'] = $userData['device_id'];
        } else {
            $serialisedData['device_id'] = '';
        }
        if (isset($userData['device_type'])) {
            $serialisedData['device_type'] = $userData['device_type'];
        } else {
            $serialisedData['device_type'] = '';
        }
        if (isset($userData['device_id'])) {
            $serialisedData['device_id'] = $userData['device_id'];
        } else {
            $serialisedData['device_id'] = '';
        }

        if (isset($userData['device_type'])) {
            $serialisedData['device_type'] = $userData['device_type'];
        } else {
            $serialisedData['device_type'] = '';
        }

     // print_r($serialisedData);exit;
        $msgString = '';
        if($serialisedData) 
        {
            if(trim($serialisedData["first_name"]) == '') {
                $msgString .= 'First name is required field.';
            }
            if (trim($serialisedData["last_name"]) == '') {
                $msgString .= 'Last name is required field.';
            }
            if (empty($serialisedData["password"])) {
                $msgString .= 'Password is required field.';
            }
            // if (trim($serialisedData["contact"]) == '') {
            //     $msgString .= 'Contact Number is required field.';
            // }
            if (trim($serialisedData["email_address"]) == '') {
                $msgString .= 'Email Address is required field.';
            }
            if (isset($msgString) && $msgString != '') {
                echo $this->errorOutputResult($msgString);
                exit;
            } else {
                
                //$serialisedData['password'] = md5($serialisedData['password']);
                $serialisedData['password'] = $this->encpassword($serialisedData['password']);
                $serialisedData['slug'] = $this->createSlug($serialisedData['first_name'] . ' ' .$serialisedData['last_name'], 'users');
                $serialisedData['activation_status'] = 0;
                $serialisedData['user_status'] = 0;
                $serialisedData['status'] = 0;
                $serialisedData['created_at'] = 0;
                $serialisedData['updated_at'] = 0;
                $uniqueKey = bin2hex(openssl_random_pseudo_bytes(25));
                $serialisedData['unique_key'] = $uniqueKey;
        
                if(User::insert($serialisedData)) {
                 $last_row = DB::table('users')->orderBy('id', 'DESC')->first();
                    //mail send
                    $userId = $last_row ->id;
        
                    $link = HTTP_PATH . "/email-confirmation/" . $uniqueKey;
                    $name =  $userData['first_name'] . ' ' .  $userData['last_name'];
                    $emailId =  $userData['email_address'];
                    $new_password =  $userData['password'];

                    $emailTemplate = DB::table('emailtemplates')->where('id', 3)->first();
                    $toRepArray = array('[!email!]', '[!username!]', '[!password!]', '[!link!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                    $fromRepArray = array($emailId, $name, $new_password, $link, HTTP_PATH, SITE_TITLE);
                    $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                    $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                    //print_r($emailBody);exit;
                    Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));


                    $data['response_data']['user_id'] = $userId;
                    $data['response_msg'] = 'We have sent you an account activation link by email. Please check your spam folder if you do not receive the email within the next few minutes.';

                    $data['response_status'] = 'success';
        
                    echo json_encode($data);
                    exit;
                }exit;
            }
        }
    }
    
}

?>