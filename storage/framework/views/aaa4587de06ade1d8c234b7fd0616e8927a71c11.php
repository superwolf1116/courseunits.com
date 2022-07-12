<?php
if (Cookie::get('cookname_broserId') != '') {
    $browser_session_id = Cookie::get('cookname_broserId');
} else {
    $browser_session_id = Session::getId();
    Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
}

$user_id = Session::get('user_id');

if (!empty($user_id)) {
    $cartCount = DB::table('carts')->where('user_id', $user_id)->orWhere('session_id',$browser_session_id)->count();
} else {
    $cartCount = DB::table('carts')->where('user_id', 0)->where('session_id',$browser_session_id)->count();
}

?>


<a class="nav-link" href="<?php echo e(URL::to( 'viewcart')); ?>">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <span class="crtcnt"><?php echo isset($cartCount) ? $cartCount : 0; ?></span>
</a>

