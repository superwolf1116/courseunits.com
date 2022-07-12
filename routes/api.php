<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users/login', 'Api\UsersController@login');
Route::post('/users/forgotPassword', 'Api\UsersController@forgotPassword');
Route::post('/users/register', 'Api\UsersController@register');
Route::post('/users/sociallogin', 'Api\UsersController@sociallogin');
Route::get('/users/dashboard', 'Api\UsersController@dashboard');
Route::post('/users/changepassword', 'Api\UsersController@changepassword');
Route::get('/users/getprofile', 'Api\UsersController@getprofile');
Route::get('/users/mycourse', 'Api\UsersController@mycourse');
Route::get('/users/Wishlist', 'Api\UsersController@Wishlist');
Route::get('/users/home_detail', 'Api\UsersController@home_detail');
Route::get('/users/categorylist', 'Api\UsersController@categorylist');
Route::post('/users/subcategorylist', 'Api\UsersController@subcategorylist');
Route::get('/users/courselist', 'Api\UsersController@courselist');
Route::post('/users/coursedetail', 'Api\UsersController@coursedetail');
Route::post('/users/SubCatwise_courses', 'Api\UsersController@SubCatwise_courses');
Route::post('/users/all_courses', 'Api\UsersController@all_courses');
Route::post('/users/video_status', 'Api\UsersController@video_status');

Route::get('/users/cart', 'Api\UsersController@cart');
Route::get('/users/top_languages', 'Api\UsersController@top_languages');

Route::post('/users/addtocart', 'Api\UsersController@addtocart');
Route::post('/users/purchase_order', 'Api\UsersController@purchase_order');

Route::post('/users/removeFrom_cart', 'Api\UsersController@removeFrom_cart');
Route::post('/users/later_courses', 'Api\UsersController@later_courses');
Route::get('/users/later_coursesList', 'Api\UsersController@later_coursesList');

Route::post('/users/addtowishlist', 'Api\UsersController@addtowishlist');
Route::post('/users/removewishlist', 'Api\UsersController@removewishlist');
Route::post('/users/removefrom_laterlist', 'Api\UsersController@removefrom_laterlist');
Route::post('/users/latercourse_addcart', 'Api\UsersController@latercourse_addcart');

Route::post('/users/cartTowishlist', 'Api\UsersController@cartTowishlist');


Route::post('/users/instructorlist', 'Api\UsersController@instructorlist');
Route::post('/users/instructordetails', 'Api\UsersController@instructordetails');
Route::post('/users/course_lectures', 'Api\UsersController@course_lectures');

Route::post('/users/setpaypalemail', 'Api\UsersController@setpaypalemail');
Route::get('/users/getcountrylist', 'Api\UsersController@getcountrylist');
Route::post('/users/searchword', 'Api\UsersController@searchword');
Route::post('/users/courseInfo', 'Api\UsersController@courseInfo');

Route::post('/users/editprofile', 'Api\UsersController@editprofile');
Route::post('/users/changepicture', 'Api\UsersController@changepicture');
Route::get('/users/getcategorylist', 'Api\UsersController@getcategorylist');
Route::post('/users/getsubcategorylist', 'Api\UsersController@getsubcategorylist');
Route::get('/users/getskilllist', 'Api\UsersController@getskilllist');
Route::get('/users/getlanguagelist', 'Api\UsersController@getlanguagelist');
Route::get('/users/gettopgigs', 'Api\UsersController@gettopgigs');
Route::any('/users/gigdetail', 'Api\UsersController@gigdetail');
Route::any('/users/getgigslisting', 'Api\UsersController@getgigslisting');
Route::any('/users/gigslisting', 'Api\UsersController@gigslisting');
Route::any('/users/gethomedetail', 'Api\UsersController@gethomedetail');
Route::any('/users/liked', 'Api\UsersController@liked');
Route::any('/users/delete', 'Api\UsersController@delete');
Route::any('/users/getsavedgigs', 'Api\UsersController@getsavedgigs');
Route::any('/users/buyercontact', 'Api\UsersController@buyercontact');
Route::any('/users/sellercontact', 'Api\UsersController@sellercontact');
Route::any('/users/viewprofile', 'Api\UsersController@viewprofile');
Route::any('/users/getnotification', 'Api\UsersController@getnotification');
Route::any('/users/getbuyercontacts', 'Api\UsersController@getbuyercontacts');
Route::any('/users/getsellercontacts', 'Api\UsersController@getsellercontacts');
Route::any('/users/getofferedgig', 'Api\UsersController@getofferedgig');
Route::any('/users/getmyofferedgig', 'Api\UsersController@getmyofferedgig');
Route::any('/users/getconversation', 'Api\UsersController@getconversation');
Route::any('/users/sendmessage', 'Api\UsersController@sendmessage');
Route::any('/users/createoffer', 'Api\UsersController@createoffer');
Route::any('/users/acceptreject', 'Api\UsersController@acceptreject');
Route::any('/users/sendNonceToServer', 'Api\UsersController@sendNonceToServer');
Route::any('/users/markasordercompleted', 'Api\UsersController@markasordercompleted');
Route::any('/users/withdrawrequest', 'Api\UsersController@withdrawrequest');

Route::get('/myorders/sellingorders', 'Api\MyordersController@sellingorders');
Route::get('/myorders/buyingorders', 'Api\MyordersController@buyingorders');
Route::any('/myorders/earnings', 'Api\MyordersController@earnings');
Route::any('/myorders/paymenthistory', 'Api\MyordersController@paymenthistory');
Route::any('/myorders/orderdetail', 'Api\MyordersController@orderdetail');
Route::any('/myorders/rateandreview', 'Api\MyordersController@rateandreview');

Route::any('/services/create', 'Api\ServicesController@create');
Route::any('/services/edit', 'Api\ServicesController@edit');
Route::any('/services/delete', 'Api\ServicesController@delete');
Route::any('/services/listing', 'Api\ServicesController@listing');
Route::any('/services/detail', 'Api\ServicesController@detail');
Route::any('/services/activelist', 'Api\ServicesController@activelist');
Route::any('/services/offersentlist', 'Api\ServicesController@offersentlist');
Route::any('/services/offersent', 'Api\ServicesController@offersent');
Route::any('/services/acceptrejectoffer', 'Api\ServicesController@acceptrejectoffer');
Route::any('/services/markcompleted', 'Api\ServicesController@markcompleted');
Route::any('/services/viewoffer', 'Api\ServicesController@viewoffer');
Route::any('/services/workplace', 'Api\ServicesController@workplace');
Route::any('/services/sendmessage', 'Api\ServicesController@sendmessage');
Route::any('/services/messagelist', 'Api\ServicesController@messagelist');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
