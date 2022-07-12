<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Mail;
use DB;
use Redirect;
use Cookie;
use Session;
use App\Models\Payment;
use App\Models\Servicesoffer;
use App\Models\Service;
use App\Models\Gig;
use App\Models\Cart;
use App\Models\Wallet;
use App\Models\Myorder;
use App\Models\Orderitem;
use App\Models\User;
use App\Models\Gigextra;
use App\Models\Notification;

class PaymentsController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }

    public function successpaypal($slug = null) {
        $paymentInfo = Payment::where('order_slug', $slug)->first();
        if (!$paymentInfo) {
            Session::flash('success_message', "'Your transaction failed. Please try again.");
            return Redirect::to('dashboard');
        } else {
            $transactionId = '';
            if (isset($_REQUEST['txn_id']) && $_REQUEST['txn_id'] != '') {
                $transactionId = $_REQUEST['txn_id'];
                $amountPaid = $_REQUEST['mc_gross'];
            } elseif (isset($_REQUEST['tx']) && $_REQUEST['tx'] != '') {
                $transactionId = $_REQUEST['tx'];
                $amountPaid = $_REQUEST['amt'];
            }
            if ($transactionId == '') {
                $transactionId = $paymentInfo->order_number;
            }
            if ($transactionId) {
                $updateData = array();
                $updateData['transaction_id'] = $transactionId;
                $updateData['status'] = 1;
                Payment::where('id', $paymentInfo->id)->update($updateData);

                Servicesoffer::where('id', $paymentInfo->serviceoffer_id)->update(array('status' => 1));
                $servicesofferInfo = Servicesoffer::where('id', $paymentInfo->serviceoffer_id)->first();

                Service::where('id', $paymentInfo->service_id)->update(array('status' => 5, 'serviceoffer_slug' => $servicesofferInfo->slug));
                Session::flash('success_message', "You have successfully make payment for your service accrpted");
                return Redirect::to('services/management');
            }
        }
    }

    public function cancel($slug = null) {
        $paymentInfo = Payment::where('order_slug', $slug)->first();
        Session::flash('error_message', "Your transaction failed. Please try again.");
        return Redirect::to('services/management');
    }

    /*     * **Pay With PayPal** */

    public function paywithpaypal(Request $request) {
        $pageTitle = 'Payment With PayPal';

        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

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
        $allrecords = $query->get();

        $total = array();
        $courseIds = array();
        foreach ($allrecords as $allrecord) {
            $total[] = $allrecord->Course->price;
            $courseIds[] = $allrecord->Course->id;
        }

        $total_amount = array_sum($total);
        $course_ids = implode(',', $courseIds);

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $totalAmt = urlencode($total_amount);
        $currency = urlencode('USD');

        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $paypal_url = PAYPALURL;
        if ($settingsInfo->payment_mode == 1) {
            $paypal_url = PAYPALURLLIVE;
        }
        $paypal_email = $settingsInfo->paypal_email_address;
        $item_number = strtoupper(bin2hex(openssl_random_pseudo_bytes(8)));

        return view('payments.paywithpaypal', ['paypal_url' => $paypal_url, 'paypal_email' => $paypal_email, 'title' => $pageTitle, 'amount' => $totalAmt, 'item_number' => $item_number, 'currency' => $currency, 'product_name' => 'Payment for course', 'success_url' => HTTP_PATH . '/payments/success', 'cancel_url' => HTTP_PATH . '/payments/paypalcancel']);
    }

    public function paypalcancel(Request $request) {

        Session::flash('error_message', "Sorry, your payment could not be completed, please try again");
        return Redirect::to('viewcart');
    }

    public function success(Request $request) {
        $pageTitle = 'Payment With PayPal';

        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

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
        $allrecords = $query->get();

        $total = array();
        $courseIds = array();
        foreach ($allrecords as $allrecord) {
            $total[] = $allrecord->Course->price;
            $courseIds[] = $allrecord->Course->id;
        }

        $total_amount = array_sum($total);
        $course_ids = implode(',', $courseIds);

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        if (isset($_REQUEST['txn_id'])) {
            $transactionId = $_REQUEST['txn_id'];
            $amountPaid = $_REQUEST['mc_gross'];
        } elseif ($_REQUEST['tx']) {
            $transactionId = $_REQUEST['tx'];
            $amountPaid = $_REQUEST['amt'];
        }
        $st = 'completed';
//echo '<pre>';print_r($transactionId);exit;
        $wallet_trn_id = $transactionId;
        $paymenttype = 'PayPal';

        $amount = $amountPaid;

        if ($transactionId) {
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['course_id'] = $course_ids;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData);
            
            $paymentId = DB::getPdo()->lastInsertId();

            $serialisedData = array();
            $serialisedData['buyer_id'] = Session::get('user_id');
            $serialisedData['course_id'] = $course_ids;
            $serialisedData['amount'] = $amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] = $amount;
            $serialisedData['admin_amount'] = 0;
            $serialisedData['admin_commission'] = 0;
            $serialisedData['quantity'] = $cartCount;
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);
            $orderId = DB::getPdo()->lastInsertId();
            
            Payment::where('id', $paymentId)->update(array('order_id'=>$orderId));


            foreach ($allrecords as $allrecord) {
                $serialisedData = array();
                $serialisedData['buyer_id'] = Session::get('user_id');
                $serialisedData['course_id'] = $allrecord->Course->id;
                $serialisedData['order_id'] = $orderId;
                $serialisedData['seller_id'] = $allrecord->Course->user_id;
                $serialisedData['amount'] = $allrecord->Course->price;
                $serialisedData['total_amount'] = $allrecord->Course->price + 200;
                $serialisedData['revenue'] = $allrecord->Course->price;
                $serialisedData['admin_amount'] = 0;
                $serialisedData['admin_commission'] = 0;
                $serialisedData['quantity'] = 1;
                $serialisedData['pay_type'] = 'PayPal';
                $serialisedData['paypal_trn_id'] = $wallet_trn_id;
                $serialisedData['status'] = 1;
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
                $serialisedData = $this->serialiseFormData($serialisedData);
                Orderitem::insert($serialisedData);

                $loginUserInfo = User::where('id', Session::get('user_id'))->first();
                $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;

                $title = $allrecord->Course->title;
                $amountseller = CURR . $allrecord->Course->price;
                $transactionId = $wallet_trn_id;
                $datetime = date('M d, Y');
                // Email sent to seller user
                $sellerInfo = User::where('id', $allrecord->Course->user_id)->first();
                $emailId = $sellerInfo->email_address;
                $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

                $emailTemplate = DB::table('emailtemplates')->where('id', 15)->first();
                $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($loginuser, $title, $amountseller, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
                
                $serialisedData = array();
                $serialisedData['from_name'] = Session::get('user_name');
                $serialisedData['user_id'] = $sellerInfo->id;
                $serialisedData['message'] = 'User purchased a course '.$title;
                $serialisedData['url'] = 'selling-orders';
                $serialisedData['status'] = 0;
                $serialisedData = $this->serialiseFormData($serialisedData);
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)) . time() . rand(10, 99);
                Notification::insert($serialisedData);
            }




            // Email sent to login user
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;

            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 13)->first();
            $toRepArray = array('[!username!]', '[!amount!]', '[!title!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $amount, $title, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 14)->first();
            $toRepArray = array('[!username!]', '[!amount!]', '[!title!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $amount, $title, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
            
            $serialisedData = array();
            $serialisedData['from_name'] = 'Admin';
            $serialisedData['user_id'] = $loginUserInfo->id;
            $serialisedData['message'] = 'Your payment completed successfully for your order.';
            $serialisedData['url'] = 'purchase-history';
            $serialisedData['status'] = 0;
            $serialisedData = $this->serialiseFormData($serialisedData);
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)) . time() . rand(10, 99);
            Notification::insert($serialisedData);

            foreach ($allrecords as $allrecord) {
                Cart::where('id', $allrecord->id)->delete();
            }

            Session::flash('success_message', "You have successfully purchased course using paypal payment.");
            return Redirect::to('purchase-history');
        }
    }


    public function paywithcard(Request $request) {
        $pageTitle = 'Order Summary';
        if (Cookie::get('cookname_broserId') != '') {
            $browser_session_id = Cookie::get('cookname_broserId');
        } else {
            $browser_session_id = Session::getId();
            Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
        }

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
        $allrecords = $query->get();

        $total = array();
        $courseIds = array();
        foreach ($allrecords as $allrecord) {
            $total[] = $allrecord->Course->price;
            $courseIds[] = $allrecord->Course->id;
        }

        $total_amount = array_sum($total);
        $course_ids = implode(',', $courseIds);

        $card_number = $request->get('card_number');
        $card_type = $request->get('card_type');
        $expiry_month = $request->get('expiry_month');
        $expiry_year = $request->get('expiry_year');
        $cvv = $request->get('cvv');
        $name_on_card = $request->get('name_on_card');

        $nameArr = explode(' ', $name_on_card);
        $firstName = urlencode($nameArr[0]);
        $lastName = '';
        if (isset($nameArr[1])) {
            $lastName = urlencode($nameArr[1]);
        }

        $city = 'Charleston';
        $zipcode = '25301';
        $countryCode = 'US';

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $creditCardType = urlencode($card_type);
        $creditCardNumber = urlencode($card_number);
        $padDateMonth = urlencode(str_pad($expiry_month, 2, '0', STR_PAD_LEFT));
        $expDateYear = urlencode($expiry_year);
        $cvv2Number = urlencode($cvv);

        $zip = urlencode($zipcode);
        $country = urlencode($countryCode);    // US or other valid country code
        $amount = urlencode($total_amount);

        $nvpStr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                "&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";

        $httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);

        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
            $transactionId = $httpParsedResponseAr['TRANSACTIONID'];
            $wallet_trn_id = $transactionId;
            $paymenttype = $creditCardType;
            
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['course_id'] = $course_ids;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData); 
            
            $paymentId = DB::getPdo()->lastInsertId();
            
            $serialisedData = array();
            $serialisedData['buyer_id'] = Session::get('user_id');
            $serialisedData['course_id'] = $course_ids;
            $serialisedData['amount'] = $amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] = $amount;
            $serialisedData['admin_amount'] = 0;
            $serialisedData['admin_commission'] = 0;
            $serialisedData['quantity'] = $cartCount;
            $serialisedData['pay_type'] = $card_type;
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);
            $orderId = DB::getPdo()->lastInsertId();
            
            Payment::where('id', $paymentId)->update(array('order_id'=>$orderId));
            
            foreach ($allrecords as $allrecord) {
                $serialisedData = array();
                $serialisedData['buyer_id'] = Session::get('user_id');
                $serialisedData['course_id'] = $allrecord->Course->id;
                $serialisedData['order_id'] = $orderId;
                $serialisedData['seller_id'] = $allrecord->Course->user_id;
                $serialisedData['amount'] = $allrecord->Course->price;
                $serialisedData['total_amount'] = $allrecord->Course->price + 200;
                $serialisedData['revenue'] = $allrecord->Course->price;
                $serialisedData['admin_amount'] = 0;
                $serialisedData['admin_commission'] = 0;
                $serialisedData['quantity'] = 1;
                $serialisedData['pay_type'] = $card_type;
                $serialisedData['paypal_trn_id'] = $wallet_trn_id;
                $serialisedData['status'] = 1;
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
                $serialisedData = $this->serialiseFormData($serialisedData);
                Orderitem::insert($serialisedData);

                $loginUserInfo = User::where('id', Session::get('user_id'))->first();
                $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;

                $title = $allrecord->Course->title;
                $amountseller = CURR . $allrecord->Course->price;
                $transactionId = $wallet_trn_id;
                $datetime = date('M d, Y');
                // Email sent to seller user
                $sellerInfo = User::where('id', $allrecord->Course->user_id)->first();
                $emailId = $sellerInfo->email_address;
                $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

                $emailTemplate = DB::table('emailtemplates')->where('id', 15)->first();
                $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($loginuser, $title, $amountseller, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));                
                                
                $serialisedData = array();
                $serialisedData['from_name'] = Session::get('user_name');
                $serialisedData['user_id'] = $sellerInfo->id;
                $serialisedData['message'] = 'User purchased a course '.$title;
                $serialisedData['url'] = 'selling-orders';
                $serialisedData['status'] = 0;
                $serialisedData = $this->serialiseFormData($serialisedData);
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)) . time() . rand(10, 99);
                Notification::insert($serialisedData);
            }

            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 13)->first();
            $toRepArray = array('[!username!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 14)->first();
            $toRepArray = array('[!username!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            $serialisedData = array();
            $serialisedData['from_name'] = 'Admin';
            $serialisedData['user_id'] = $loginUserInfo->id;
            $serialisedData['message'] = 'Your payment completed successfully for your order.';
            $serialisedData['url'] = 'purchase-history';
            $serialisedData['status'] = 0;
            $serialisedData = $this->serialiseFormData($serialisedData);
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)) . time() . rand(10, 99);
            Notification::insert($serialisedData);

            foreach ($allrecords as $allrecord) {
                Cart::where('id', $allrecord->id)->delete();
            }
            Session::flash('success_message', "You have successfully purchased Gig using cradit card payment.");
            return 1;
        } else {
            return urldecode($httpParsedResponseAr['L_LONGMESSAGE0']);
        }
    }

    public function history(Request $request) {
        $pageTitle = 'Purchase History';
        $allrecords = Payment::where('user_id', Session::get('user_id'))->orderBy('id', 'DESC')->get();
        return view('payments.history', ['title' => $pageTitle, 'allrecords' => $allrecords]);
    }

    public function acceptandpay(Request $request, $slug = null) {
        $pageTitle = 'Order Summary';
        $siteSettings = DB::table('settings')->where('id', 1)->first();
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $amountArray = $this->getWallerAmount(Session::get('user_id'));
        return view('payments.acceptandpay', ['title' => $pageTitle, 'siteSettings' => $siteSettings, 'serviceInfo' => $serviceInfo, 'servicesofferInfo' => $servicesofferInfo, 'amountArray' => $amountArray]);
    }

    public function paywithcardservice(Request $request) {
        $pageTitle = 'Order Summary';
        $slug = $request->get('slug');
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;
        $admin_commission_per = $settingsInfo->admin_commission_per;
        $commission_admin_per = $settingsInfo->commission_admin_per;

        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;
        $admin_commission_per = round($revenue * $admin_commission_per / 100, 2);
        $commission_amount_per = round($revenue * $commission_admin_per / 100, 2);

        if ($admin_commission_per > $admin_commission) {
            $admin_amount = $admin_commission_per;
        } else {
            $admin_amount = $admin_commission;
        }
        if ($commission_amount_per > $commission_admin) {
            $commission_amount = $commission_amount_per;
        } else {
            $commission_amount = $commission_admin;
        }

        $total_amount = $revenue + $admin_amount;

        $card_number = $request->get('card_number');
        $card_type = $request->get('card_type');
        $expiry_month = $request->get('expiry_month');
        $expiry_year = $request->get('expiry_year');
        $cvv = $request->get('cvv');
        $name_on_card = $request->get('name_on_card');

        $nameArr = explode(' ', $name_on_card);
        $firstName = urlencode($nameArr[0]);
        $lastName = '';
        if (isset($nameArr[1]) && $nameArr[1] != '') {
            $lastName = urlencode($nameArr[1]);
        }
        $city = 'Charleston';
        $zipcode = '25301';
        $countryCode = 'US';

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $creditCardType = urlencode($card_type);
        $creditCardNumber = urlencode($card_number);
        $padDateMonth = urlencode(str_pad($expiry_month, 2, '0', STR_PAD_LEFT));
        $expDateYear = urlencode($expiry_year);
        $cvv2Number = urlencode($cvv);

        $zip = urlencode($zipcode);
        $country = urlencode($countryCode);    // US or other valid country code
        $amount = urlencode($total_amount);

        $nvpStr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                "&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";

        $httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);

        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
            $transactionId = $httpParsedResponseAr['TRANSACTIONID'];
            $wallet_trn_id = $transactionId;

            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['service_id'] = $service_id;
            $serialisedData['serviceoffer_id'] = $serviceoffer_id;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData);

            // Add amount to seller wallet
            $serialisedData = array();
            $serialisedData['user_id'] = $servicesofferInfo->user_id;
            $serialisedData['service_id'] = $service_id;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['revenue'] = $total_amount - $adminAmount;
            $serialisedData['admin_commission'] = $adminAmount;
            $serialisedData['commission_admin'] = $commission_amount;
            $serialisedData['trn_id'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['type'] = 6;
            $serialisedData['add_minus'] = 1;
            $serialisedData['source'] = 'From Service: <b>' . $serviceInfo->title . '</b>';
            $serialisedData['status'] = 1;
            Wallet::insert($serialisedData);

            $paymenttype = 'PayPal';
            Servicesoffer::where('id', $serviceoffer_id)->update(array('status' => 1, 'total_amount' => $total_amount, 'admin_amount' => $adminAmount));
            Service::where('id', $service_id)->update(array('status' => 5, 'payment_status' => 1, 'pay_type' => $paymenttype, 'serviceoffer_slug' => $servicesofferInfo->slug));

            // Email sent to login user
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');
            $title = $serviceInfo->title;

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to seller user
            $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

            $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "You have successfully make payment for your service acccpted.");
            return 1;
        } else {
            return urldecode($httpParsedResponseAr['L_LONGMESSAGE0']);
        }
    }

    public function payviawalletservice(Request $request) {
        $pageTitle = 'Order Summary';
        $slug = $request->get('slug');
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $siteSettings = DB::table('settings')->where('id', 1)->first();

        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;
        $adminAmount = round(($servicesofferInfo->amount * $siteSettings->admin_commision / 100), 2);
        $total_amount = $servicesofferInfo->amount + $adminAmount;
        $wallet_trn_id = strtoupper(bin2hex(openssl_random_pseudo_bytes(8)));

        // Add amount to seller wallet
        $serialisedData = array();
        $serialisedData['user_id'] = $servicesofferInfo->user_id;
        $serialisedData['service_id'] = $service_id;
        $serialisedData['amount'] = $total_amount;
        $serialisedData['revenue'] = $total_amount - $adminAmount;
        $serialisedData['admin_commission'] = $adminAmount;
        $serialisedData['commission_admin'] = $commission_amount;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 6;
        $serialisedData['add_minus'] = 1;
        $serialisedData['source'] = 'From Service: <b>' . $serviceInfo->title . '</b>';
        $serialisedData['status'] = 1;
        Wallet::insert($serialisedData);

        // Deduct amount to buyer wallet who accept request
        $serialisedData = array();
        $serialisedData['user_id'] = Session::get('user_id');
        $serialisedData['service_id'] = $service_id;
        $serialisedData['amount'] = $servicesofferInfo->amount;
        $serialisedData['revenue'] = -$total_amount;
        $serialisedData['admin_commission'] = $adminAmount;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 5;
        $serialisedData['add_minus'] = 0;
        $serialisedData['source'] = 'Pay for Service Accept: <b>' . $serviceInfo->title . '</b>';
        $serialisedData['status'] = 1;
        Wallet::insert($serialisedData);

        $paymenttype = 'Wallet';
        Servicesoffer::where('id', $serviceoffer_id)->update(array('status' => 1, 'total_amount' => $total_amount, 'admin_amount' => $adminAmount));
        Service::where('id', $service_id)->update(array('status' => 5, 'payment_status' => 1, 'pay_type' => $paymenttype, 'serviceoffer_slug' => $servicesofferInfo->slug));

        // Email sent to login user
        $loginUserInfo = User::where('id', Session::get('user_id'))->first();
        $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
        $amount = CURR . $total_amount;
        $transactionId = $wallet_trn_id;
        $datetime = date('M d, Y');
        $title = $serviceInfo->title;

        $emailId = $loginUserInfo->email_address;
        $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

        // Email sent to admin user
        $adminInfo = DB::table('admins')->where('id', 1)->first();
        $emailId = $adminInfo->email;
        $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

        // Email sent to seller user
        $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
        $emailId = $sellerInfo->email_address;
        $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

        $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

        Session::flash('success_message', "You have successfully make payment using wallet balance your service acccpted.");
        return 1;
    }

    public function paywithpaypalservice(Request $request, $slug = null) {
        $pageTitle = 'Payment With PayPal';

        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;

        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;

        $admin_amount = $admin_commission;

        $commission_amount = $commission_admin;


        $total_amount = $revenue + $admin_amount;

        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;

        $currencyID = urlencode('EUR');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $totalAmt = urlencode($total_amount);
        $currency = urlencode('EUR');

        $paypal_url = PAYPALURL;
        if ($settingsInfo->payment_mode == 1) {
            $paypal_url = PAYPALURLLIVE;
        }
        $paypal_email = $settingsInfo->paypal_email_address;

        return view('payments.paywithpaypal', ['paypal_url' => $paypal_url, 'paypal_email' => $paypal_email, 'title' => $pageTitle, 'amount' => $totalAmt, 'currency' => $currency, 'item_number' => $slug, 'product_name' => $serviceInfo->title, 'success_url' => HTTP_PATH . '/payments/successservice/' . $slug, 'cancel_url' => HTTP_PATH . '/payments/paypalcancelservice/' . $slug]);
    }

    public function paypalcancelservice(Request $request, $slug = null) {
        Session::flash('error_message', 'Sorry, your payment could not be completed, please try again');
        return Redirect::to('payments/history');
    }

    public function successservice(Request $request, $slug = null) {
        $pageTitle = 'Payment With PayPal';

        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;

        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;

        $admin_amount = $admin_commission;

        $commission_amount = $commission_admin;


        $total_amount = $revenue + $admin_amount;

        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;

        $currencyID = urlencode('EUR');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        if (isset($_REQUEST['txn_id'])) {
            $transactionId = $_REQUEST['txn_id'];
            $amountPaid = $_REQUEST['mc_gross'];
        } elseif ($_REQUEST['tx']) {
            $transactionId = $_REQUEST['tx'];
            $amountPaid = $_REQUEST['amt'];
        }
//        $transactionId = 'TTT5645645';
//            $amountPaid = 60;
        $st = 'completed';
//echo '<pre>';print_r($transactionId);exit;
        $wallet_trn_id = $transactionId;
        $paymenttype = 'PayPal';

        $amount = $amountPaid;

        if ($transactionId) {
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['service_id'] = $serviceInfo->id;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData);

            $serialisedData = array();
            $serialisedData['buyer_id'] = $servicesofferInfo->user_id;
            $serialisedData['service_id'] = $serviceInfo->id;
            $serialisedData['seller_id'] = $serviceInfo->user_id;
            $serialisedData['package'] = 0;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['extra_amount'] = $extra_amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] = $revenue;
            $serialisedData['admin_amount'] = $admin_amount;
            $serialisedData['admin_commission'] = $commission_amount;
            $serialisedData['quantity'] = 1;
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);

            // Add amount to seller wallet
            $serialisedData = array();
            $serialisedData['user_id'] = $serviceInfo->user_id;
            $serialisedData['service_id'] = $serviceInfo->id;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['revenue'] = $revenue;
            $serialisedData['admin_commission'] = $commission_amount;
            $serialisedData['trn_id'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['type'] = 6;
            $serialisedData['add_minus'] = 1;
            $serialisedData['source'] = 'From Service: <b>' . $serviceInfo->title . '</b>';
            $serialisedData['status'] = 1;
            Wallet::insert($serialisedData);
            $amountseller = CURR . $revenue;

            // Email sent to login user
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');
            $title = $serviceInfo->title;

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to seller user
            $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

            $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', 'You have successfully purchased service using paypal payment');
            return Redirect::to('payments/history');
        }
    }

}
