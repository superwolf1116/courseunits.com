<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomesController@index');
//Route::get('/', 'HomesController@home');
Route::any('/login', 'UsersController@login');
Route::any('/teacher-login', 'UsersController@teacherlogin');
Route::any('/logout', 'UsersController@logout');
Route::any('/register', 'UsersController@register');
Route::any('/teacher-signup', 'UsersController@teacherregister');
Route::get('/email-confirmation/{ukey}', 'UsersController@emailConfirmation');
Route::any('/forgot-password', 'UsersController@forgotPassword');
Route::any('/teacher-forgot-password', 'UsersController@teacherforgotPassword');
Route::any('/reset-password/{ukey}', 'UsersController@resetPassword');

Route::any('/users/myaccount', 'UsersController@myaccount');

Route::any('/users/dashboard', 'UsersController@dashboard');
Route::get('/users/redirecttogoogle/{slug}', 'UsersController@redirectToGoogle');
Route::get('/users/handlegooglecallback', 'UsersController@handleGoogleCallback');
Route::get('/users/redirecttofacebook/{slug}', 'UsersController@redirectToFacebook');
Route::get('/users/handlefacebookcallback', 'UsersController@handleFacebookCallback');
Route::get('/users/redirecttolinkedin', 'UsersController@redirectToLinkedin');
Route::get('/users/handlelinkedincallback', 'UsersController@handleLinkedinCallback');
Route::get('/users/sociallogin', 'UsersController@sociallogin');
Route::post('/users/uploadprofileimage', 'UsersController@uploadprofileimage');
Route::post('/users/updatedata', 'UsersController@updatedata');
Route::any('/users/settings', 'UsersController@settings');
Route::any('/users/updatesettings', 'UsersController@updatesettings');
Route::get('/users/notifications', 'UsersController@notifications');
Route::get('/users/delete-notification/{slug}', 'UsersController@deletenotification');
Route::get('/users/view-notification/{slug}', 'UsersController@viewnotification');

Route::any('/users/chklogin', 'UsersController@chklogin');

Route::get('/users/getstatelist/{id}', 'UsersController@getstatelist');

Route::any('/teaching', 'UsersController@teach');

Route::any('/courses/offeredcourse', 'CoursesController@offeredcourse');
Route::any('/courses/myofferedcourse', 'CoursesController@myofferedcourse');
Route::any('/courses/add', 'CoursesController@add');
Route::any('/courses/management', 'CoursesController@management');
Route::any('/courses/create', 'CoursesController@create');
Route::get('/courses/getsubcategorylist/{id}', 'CoursesController@getsubcategorylist');
Route::get('/courses/getsubsubcategorylist/{id}', 'CoursesController@getsubsubcategorylist');
Route::any('/courses/edit/{slug}', 'CoursesController@edit');
Route::any('/courses/uploaddocument', 'CoursesController@uploaddocument');
Route::any('/courses/uploaddoc', 'CoursesController@uploaddoc');
Route::any('/courses/delete/{slug}', 'CoursesController@delete');
Route::any('/courses/deleteimage/{id}', 'CoursesController@deleteimage');
Route::any('/courses/deletesection/{id}', 'CoursesController@deletesection');
Route::any('/courses/deletecontent/{id}', 'CoursesController@deletecontent');

Route::any('/courses/getkeyword', 'CoursesController@getkeyword');

Route::any('/courses/addwaitlist', 'CoursesController@addwaitlist');

Route::any('/courses/createoffer', 'CoursesController@createoffer');
Route::any('/acceptreject/{type}/{slug}', 'CoursesController@acceptreject');
Route::any('/courses', 'CoursesController@listing');
Route::any('/courses/{catslug}', 'CoursesController@listing');
Route::any('/courses/{catslug}/{subcatslug}', 'CoursesController@listing');
Route::any('/courses/{catslug}/{subcatslug}/{subsubcatslug}', 'CoursesController@listing');
Route::get('/course-details/{slug}', 'CoursesController@detail');
Route::any('/course-dashboard/{slug}', 'CoursesController@coursedashboard');
Route::get('/orders', 'PagesController@orders');

Route::get('/services/management', 'ServicesController@management');
Route::any('/services/create-request', 'ServicesController@create');
Route::any('/services/edit-request/{slug}', 'ServicesController@editrequest');
Route::any('/services/delete-request/{slug}', 'ServicesController@deleterequest');
Route::get('/services/updatesubcategory/{catid}', 'ServicesController@updatesubcategory');

Route::any('/earnings', 'WalletsController@earnings');
Route::post('/wallets/withdraw-request', 'WalletsController@withdrawrequest');

Route::get('/buyer-requests/{slug}', 'ServicesController@detail');
Route::any('/buyer-requests', 'ServicesController@buyerrequest');
Route::get('/buyer-requests-view-offers/{slug}', 'ServicesController@buyerrequestviewoffers');
Route::any('/services/acceptrejectoffers/{type}/{slug}', 'ServicesController@acceptrejectoffers');
Route::any('/services/acceptandpay/{slug}', 'PaymentsController@acceptandpay');
Route::post('/send-request-offer', 'ServicesController@sendrequestoffer');
Route::any('/services/workplace/{slug}', 'ServicesController@workplace');
Route::get('/services/markcompleted/{slug}', 'ServicesController@markcompleted');
Route::any('/services/offers-sent', 'ServicesController@offerssent');

Route::any('/payments/successpaypal/{slug}', 'PaymentsController@successpaypal');
Route::any('/payments/cancel/{slug}', 'PaymentsController@cancel');
Route::any('/payments/notify/{slug}', 'PaymentsController@notify');



Route::any('/order-summary/{slug}', 'PaymentsController@ordersummary');

Route::any('/payments/paywithpaypal', 'PaymentsController@paywithpaypal');
Route::any('/payments/success', 'PaymentsController@success');
Route::any('/payments/paypalcancel', 'PaymentsController@paypalcancel');

Route::any('/payments/paywithpaypalservice/{slug}', 'PaymentsController@paywithpaypalservice');
Route::any('/payments/successservice/{slug}', 'PaymentsController@successservice');
Route::any('/payments/paypalcancelservice/{slug}', 'PaymentsController@paypalcancelservice');

Route::any('/payments/paywithcard', 'PaymentsController@paywithcard');
Route::any('/payments/payviawallet', 'PaymentsController@payviawallet');
Route::any('/purchase-history', 'PaymentsController@history');
Route::any('/payments/paywithcardservice', 'PaymentsController@paywithcardservice');
Route::any('/payments/payviawalletservice', 'PaymentsController@payviawalletservice');

Route::any('/my-courses', 'MyordersController@buyingorders');
Route::any('/myorders/markascompleted/{slug}', 'MyordersController@markascompleted');
Route::any('/myorders/rateseller/{slug}', 'MyordersController@rateseller');
Route::any('/myorders/ratebuyer/{slug}', 'MyordersController@ratebuyer');
Route::any('/myorders/workplace/{slug}', 'MyordersController@workplace');
Route::get('/myorders/download/{slug}/{filename}', 'MyordersController@download');
Route::get('/messages/download/{slug}/{filename}', 'MessagesController@download');

Route::any('/selling-orders', 'MyordersController@sellingorders');

Route::get('/buyer-contacts', 'UsersController@buyercontacts');
Route::get('/seller-contacts', 'UsersController@sellercontacts');
Route::get('/public-profile/{slug}', 'UsersController@publicprofile');

Route::any('/users/messageuser', 'UsersController@messageuser');
Route::any('/messages/message/{slug}', 'MessagesController@message');
Route::any('/messages/message', 'MessagesController@message');
Route::post('/users/likeunlike', 'UsersController@likeunlike');
Route::post('/users/deletelikeunlike', 'UsersController@deletelikeunlike');
Route::get('/wishlist', 'UsersController@wishlist');

Route::get('/faqs', 'PagesController@index');
Route::get('/how-it-works', 'PagesController@index');
Route::get('/privacy-policy', 'PagesController@index');
Route::get('/terms-and-condition', 'PagesController@index');
Route::get('/help-center', 'PagesController@index');
Route::get('/place-track-order', 'PagesController@index');
Route::get('/returns-refunds', 'PagesController@index');
Route::get('/payment-course-units-account', 'PagesController@index');
Route::get('/order-cancellation', 'PagesController@index');
Route::get('/how-to-shop-courses-on-course-units-global', 'PagesController@index');
Route::get('/corporate-account', 'PagesController@index');
Route::get('/advertise-with-course-units-global', 'PagesController@index');
Route::get('/report-a-product', 'PagesController@index');
Route::get('/sell-courses-on-course-units-global', 'PagesController@index');
Route::get('/become-a-tutor', 'PagesController@index');
Route::get('/become-an-affiliate', 'PagesController@index');
Route::get('/course-units-global-partner-program', 'PagesController@index');
Route::get('/join-us-on-social-media', 'PagesController@index');
Route::get('/investor-relations', 'PagesController@index');
Route::get('/payment-methods', 'PagesController@index');
Route::get('/get-to-know-us', 'PagesController@index');
Route::get('/careers-course-units-global', 'PagesController@index');
Route::get('/blog', 'PagesController@index');
Route::get('/press-and-news', 'PagesController@index');
Route::get('/trust-and-safety', 'PagesController@index');
Route::get('/about-us', 'PagesController@index');
Route::any('/contact-us', 'PagesController@contactus');

Route::any('/updatedata', 'HomesController@updatedata');
Route::any('/categories', 'HomesController@categories');
Route::get('/check-new-notification', 'UsersController@checknotifications');

Route::any('/pages/checlapi', 'PagesController@checlapi');

Route::any('/addtocart/{slug}', 'CartsController@addtocart');
Route::any('/addtocart', 'CartsController@addtocart');
Route::any('/updateCount', 'CartsController@updateCount');
Route::any('/viewcart', 'CartsController@viewcart');
Route::any('/checkout', 'CartsController@checkout');
Route::any('/removecart/{slug}', 'CartsController@removecart');

#Route::get('/sendemail', 'HomesController@sendmail');
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function()
{
    Route::any('/', 'AdminsController@login');
    Route::any('login', 'AdminsController@login');
    Route::any('admins/login', 'AdminsController@login');
    Route::get('admins/logout', 'AdminsController@logout');
    Route::get('admins/dashboard', 'AdminsController@dashboard');
    Route::get('admins/userchart/{daycount}', 'AdminsController@userchart');
    Route::get('admins/instructorchart/{daycount}', 'AdminsController@instructorchart');
    Route::any('admins/change-username', 'AdminsController@changeUsername');
    Route::any('admins/change-password', 'AdminsController@changePassword');
    Route::any('admins/change-email', 'AdminsController@changeEmail');
    Route::any('admins/forgot-password', 'AdminsController@forgotPassword');
    Route::any('admins/site-settings', 'AdminsController@siteSettings');
    
    Route::any('/users', 'UsersController@index');
    Route::any('/users/add', 'UsersController@add');    
    Route::any('/users/edit/{slug}', 'UsersController@edit');
    Route::get('/users/activate/{slug}', 'UsersController@activate');
    Route::get('/users/deactivate/{slug}', 'UsersController@deactivate');
    Route::get('/users/delete/{slug}', 'UsersController@delete');
    Route::get('/users/deleteimage/{slug}', 'UsersController@deleteimage');
    
    Route::any('/instructors', 'InstructorsController@index');
    Route::any('/instructors/add', 'InstructorsController@add');    
    Route::any('/instructors/edit/{slug}', 'InstructorsController@edit');
    Route::get('/instructors/activate/{slug}', 'InstructorsController@activate');
    Route::get('/instructors/deactivate/{slug}', 'InstructorsController@deactivate');
    Route::get('/instructors/delete/{slug}', 'InstructorsController@delete');
    Route::get('/instructors/deleteimage/{slug}', 'InstructorsController@deleteimage');
    
    Route::any('/countries', 'CountriesController@index');
    Route::any('/countries/add', 'CountriesController@add');    
    Route::any('/countries/edit/{slug}', 'CountriesController@edit');
    Route::get('/countries/activate/{slug}', 'CountriesController@activate');
    Route::get('/countries/deactivate/{slug}', 'CountriesController@deactivate');
    Route::get('/countries/delete/{slug}', 'CountriesController@delete');
    
    Route::any('/countries/state/{cslug}', 'CountriesController@state');
    Route::any('/countries/addstate/{cslug}', 'CountriesController@addstate');    
    Route::any('/countries/editstate/{cslug}/{slug}', 'CountriesController@editstate');
    Route::get('/countries/activatestate/{cslug}/{slug}', 'CountriesController@activatestate');
    Route::get('/countries/deactivatestate/{cslug}/{slug}', 'CountriesController@deactivatestate');
    Route::get('/countries/deletestate/{cslug}/{slug}', 'CountriesController@deletestate');
    
    Route::any('/categories', 'CategoriesController@index');
    Route::any('/categories/add', 'CategoriesController@add');    
    Route::any('/categories/edit/{slug}', 'CategoriesController@edit');
    Route::get('/categories/activate/{slug}', 'CategoriesController@activate');
    Route::get('/categories/deactivate/{slug}', 'CategoriesController@deactivate');
    Route::get('/categories/delete/{slug}', 'CategoriesController@delete');
    
    Route::any('/categories/subcategory/{cslug}', 'CategoriesController@subcategory');
    Route::any('/categories/addsubcategory/{cslug}', 'CategoriesController@addsubcategory');    
    Route::any('/categories/editsubcategory/{cslug}/{slug}', 'CategoriesController@editsubcategory');
    Route::get('/categories/activatesubcategory/{cslug}/{slug}', 'CategoriesController@activatesubcategory');
    Route::get('/categories/deactivatesubcategory/{cslug}/{slug}', 'CategoriesController@deactivatesubcategory');
    Route::get('/categories/deletesubcategory/{cslug}/{slug}', 'CategoriesController@deletesubcategory');
    
    Route::any('/categories/subsubcategory/{mslug}/{cslug}', 'CategoriesController@subsubcategory');
    Route::any('/categories/addsubsubcategory/{mslug}/{cslug}', 'CategoriesController@addsubsubcategory');    
    Route::any('/categories/editsubsubcategory/{mslug}/{cslug}/{slug}', 'CategoriesController@editsubsubcategory');
    Route::get('/categories/activatesubsubcategory/{mslug}/{cslug}/{slug}', 'CategoriesController@activatesubsubcategory');
    Route::get('/categories/deactivatesubsubcategory/{mslug}/{cslug}/{slug}', 'CategoriesController@deactivatesubsubcategory');
    Route::get('/categories/deletesubsubcategory/{mslug}/{cslug}/{slug}', 'CategoriesController@deletesubsubcategory');
    
    Route::any('/skills', 'SkillsController@index');
    Route::any('/skills/add', 'SkillsController@add');    
    Route::any('/skills/edit/{slug}', 'SkillsController@edit');
    Route::get('/skills/activate/{slug}', 'SkillsController@activate');
    Route::get('/skills/deactivate/{slug}', 'SkillsController@deactivate');
    Route::get('/skills/delete/{slug}', 'SkillsController@delete');
    
    Route::any('/qualifications', 'QualificationsController@index');
    Route::any('/qualifications/add', 'QualificationsController@add');    
    Route::any('/qualifications/edit/{slug}', 'QualificationsController@edit');
    Route::get('/qualifications/activate/{slug}', 'QualificationsController@activate');
    Route::get('/qualifications/deactivate/{slug}', 'QualificationsController@deactivate');
    Route::get('/qualifications/delete/{slug}', 'QualificationsController@delete');
    
    Route::any('/testimonials', 'TestimonialsController@index');
    Route::any('/testimonials/add', 'TestimonialsController@add');    
    Route::any('/testimonials/edit/{slug}', 'TestimonialsController@edit');
    Route::get('/testimonials/activate/{slug}', 'TestimonialsController@activate');
    Route::get('/testimonials/deactivate/{slug}', 'TestimonialsController@deactivate');
    Route::get('/testimonials/delete/{slug}', 'TestimonialsController@delete');
    
    Route::any('/pages', 'PagesController@index');  
    Route::any('/pages/edit/{slug}', 'PagesController@edit');
    Route::any('/pages/pageimages', 'PagesController@pageimages');
    
    Route::any('/wallets', 'WalletsController@index');
    Route::any('/wallets/history/{slug}', 'WalletsController@history');
    Route::get('/wallets/approve-reject/{type}/{slug}', 'WalletsController@approvereject');
    
    Route::any('/vieworders', 'ViewordersController@index');
    
    Route::any('/courses', 'CoursesController@index');
    Route::any('/courses/add', 'CoursesController@add');    
    Route::any('/courses/edit/{slug}', 'CoursesController@edit');
    Route::get('/courses/activate/{slug}', 'CoursesController@activate');
    Route::get('/courses/deactivate/{slug}', 'CoursesController@deactivate');
    Route::get('/courses/delete/{slug}', 'CoursesController@delete');
    
    Route::any('/services', 'ServicesController@index');
    Route::any('/services/add', 'ServicesController@add');    
    Route::any('/services/edit/{slug}', 'ServicesController@edit');
    Route::get('/services/activate/{slug}', 'ServicesController@activate');
    Route::get('/services/deactivate/{slug}', 'ServicesController@deactivate');
    Route::get('/services/delete/{slug}', 'ServicesController@delete');
    
    Route::any('/paypal-payment-histories', 'PaymentsController@index');
    
   
   
});