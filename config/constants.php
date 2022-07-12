<?php

$siteSetting =  App\Http\Controllers\Controller::getSiteSetting();

define('SITE_TITLE', $siteSetting->site_title);
define('TITLE_FOR_LAYOUT', ' :: ' . SITE_TITLE);
define('HTTP_PATH', 'https://www.courseunits.com');
define("BASE_PATH", $_SERVER['DOCUMENT_ROOT']);
define('MAIL_FROM', 'info@courseunits.com');
define('CURR', '$');
define('API_KEY', 'COU0R14S7409E98U14NITS445');

define('SECURE_CODE', 'COURSEUNITS');

define('CAPTCHA_KEY', '6LfZf5AfAAAAAGWRvNbHCN64sy8uv6UYXDP5rXvv');
define('SECRET_KEY', '6LfZf5AfAAAAAO5vTOSaxek-yW55VLNJDucRMxl1');
define('IS_LIVE', 1);
define('IS_DEMO', 0);
define('MAX_IMAGE_UPLOAD_SIZE_DISPLAY', '2MB');
define('MAX_IMAGE_UPLOAD_SIZE_VAL', 2048);

global $accountStatus;
$accountStatus = array(
    'Activate' => "Activate",
    'Deactivate' => "Deactivate",
    'Delete' => "Delete",
);

define('LOGO_IMAGE_UPLOAD_PATH', BASE_PATH . '/public/files/logo/');
define('LOGO_IMAGE_DISPLAY_PATH', HTTP_PATH . '/public/files/logo/');
define('HOME_LOGO_PATH', LOGO_IMAGE_DISPLAY_PATH.$siteSetting->home_logo);
define('LOGO_PATH', LOGO_IMAGE_DISPLAY_PATH.$siteSetting->logo);
define('FAVICON_PATH', LOGO_IMAGE_DISPLAY_PATH.$siteSetting->favicon);

define('CK_IMAGE_UPLOAD_PATH', BASE_PATH . '/public/files/ckeditorimages/');
define('CK_IMAGE_DISPLAY_PATH', HTTP_PATH . '/public/files/ckeditorimages/');
define('IMAGE_EXT', 'image/gif, image/jpeg, image/png');
define('DOC_EXT', '.pdf,.doc,.docx');
/* ******* profile image path ****** */
define('PROFILE_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/users/full/');
define('PROFILE_SMALL_UPLOAD_PATH', BASE_PATH . '/public/files/users/small/');
define('PROFILE_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/users/full/');
define('PROFILE_SMALL_DISPLAY_PATH', HTTP_PATH . '/public/files/users/small/');
define('PROFILE_MW', 250);
define('PROFILE_MH', 250);

/* ******* Category image path ****** */
define('CATEGORY_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/categories/full/');
define('CATEGORY_SMALL_UPLOAD_PATH', BASE_PATH . '/public/files/categories/small/');
define('CATEGORY_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/categories/full/');
define('CATEGORY_SMALL_DISPLAY_PATH', HTTP_PATH . '/public/files/categories/small/');
define('CATEGORY_MW', 280);
define('CATEGORY_MH', 140);

/* ******* profile image path ****** */
define('TESTIMONIAL_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/testimonials/full/');
define('TESTIMONIAL_SMALL_UPLOAD_PATH', BASE_PATH . '/public/files/testimonials/small/');
define('TESTIMONIAL_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/testimonials/full/');
define('TESTIMONIAL_SMALL_DISPLAY_PATH', HTTP_PATH . '/public/files/testimonials/small/');
define('TESTIMONIAL_MW', 610);
define('TESTIMONIAL_MH', 360);


global $languageLevels;
$languageLevels = array(
    'Basic' => "Basic",
    'Conversational' => "Conversational",
    'Fluent' => "Fluent"
);

global $yeatArray;
$yeatArray = array_combine(range(date('Y'), date('Y') - 60), range(date('Y'), date('Y') - 60));


global $gigstatus;
$gigstatus = array('0'=>'Deactivate','1'=>'Active');

global $delivery_days;
for($i=1;$i<30;$i++){
    if($i == 1){
        $delivery_days[$i]= $i.' Day Delivery';
    }else{
        $delivery_days[$i]= $i.' Days Delivery';
    }
} 

global $revisions;
for($i=0;$i<10;$i++){
    $revisions["$i"]= $i;
} 
$revisions['unlimited']= 'Unlimited';

global $package_price;
for($i=5;$i<1000;$i=$i+5){
    $package_price["$i"]= CURR.$i;
}

global $duration;
$duration = array(
    '2 Hours' => '0-2 Hours',
    '6 Hours' => '3-6 Hours',
    '16 Hours' => '7-16 Hours',
    '17 Hours' => '17+ Hours',
);

global $rating;
$rating = array(
    '4.5' => '4.5 & up',
    '4.0' => '4.0 & up',
    '3.5' => '3.5 & up',
    '3.0' => '3.0 & up',
    '2.5' => '2.5 & up',
    '2.0' => '2.0 & up',
);

global $serviceDays;
$serviceDays  = array(
    '1' => '24 hours',
    '2' => '3 Days',
    '3' => '7 Days',
    '4' => '15 Days',
    '5' => '30 Days',
    '6' => '45 Days',
    '7' => '60 Days',
    '8' => '60 Days+',
);

global $expry;
for($i=1;$i<=30;$i=$i+1){
    if($i == 1){
        $expry["$i day"]= "$i day";
    }else{
        $expry["$i days"]= "$i days";
    }
    
}

define('SERVICE_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/services/');
define('SERVICE_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/services/');
/////Document upload/
define('DOCUMENT_UPLOAD_PATH', BASE_PATH . '/public/files/document/');
define('DOCUMENT_DISPLAY_PATH', HTTP_PATH . '/public/files/document/');

global $offerstatusbuyer;
$offerstatusbuyer  = array(
    '0' => 'Pending',
    '1' => 'Accepted',
    '2' => 'Rejected',    
    '3' => 'Completed'    
);
global $walletTypes;
$walletTypes  = array(
    '0' => 'Earn From Request',
    '1' => 'Pay For Request',
    '2' => 'Withdraw Request Pending',    
    '3' => 'Withdraw Request Apporved', 
    '4' => 'Withdraw Request Rejected', 
    '5' => 'Pay From Gig', 
    '6' => 'Earn From Gig',
   
);

global $gigOrderStatus;
$gigOrderStatus  = array(
    '0' => 'Pending',
    '1' => 'Inprogress',
    '2' => 'Completed'
);


/* * ***************************** Course Image Path ****************************** */
define('COURSE_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/courses/full/');
define('COURSE_SMALL_UPLOAD_PATH', BASE_PATH . '/public/files/courses/small/');
define('COURSE_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/courses/full/');
define('COURSE_SMALL_DISPLAY_PATH', HTTP_PATH . '/public/files/courses/small/');
define('COURSE_MW', 280);
define('COURSE_MH', 140);

/* * ***************************** Course Video Path ****************************** */
define('COURSE_VIDEO_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/courses/video/');
define('COURSE_VIDEO_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/courses/video/');

global $searchTimeArray;
$searchTimeArray  = array(
    '1' => 'Up to 24 hours',
    '3' => 'Up to 3 days',
    '7' => 'Up to 7 days',
    '10' => 'Up to 10 days',
    '15' => 'Up to 15 days',
    '50' => 'Any'
);
global $searchLanguageArray;
$searchLanguageArray  = array(
    'English' => 'English',
    'Russian' => 'Russian',
    'Urdu' => 'Urdu',
    'German' => 'German',
    'Italian' => 'Italian',
    'Spanish' => 'Spanish',
//    'Polish' => 'Polish',
//    'Hindi' => 'Hindi',
//    'Korean' => 'Korean',
//    'Arabic' => 'Arabic',
//    'Hebrew' => 'Hebrew',
//    'Japanese' => 'Japanese',
//    'Turkish' => 'Turkish',     
//    'French' => 'French',     
    'any' => 'Any'
);

global $searcFilterArray;
$searcFilterArray  = array(
    '1' => 'Price Low to High',
    '2' => 'Price High to Low',    
    '3' => 'Latest First',
    '4' => 'Oldest First',
);

global $level;
$level  = array(
    '1' => 'Beginner Level',
    '2' => 'Intermediate Level',    
    '3' => 'Expert Level',
    '4' => 'All',
);

define('GIG_MSG_FULL_UPLOAD_PATH', BASE_PATH . '/public/files/gigs/msg/');
define('GIG_MSG_FULL_DISPLAY_PATH', HTTP_PATH . '/public/files/gigs/msg/');

define('PAYPAL_EMAIL', 'alok.tiwari@logicspice.com'); 
define('PAYPALURL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPALURLLIVE', 'https://www.paypal.com/cgi-bin/webscr');
?>