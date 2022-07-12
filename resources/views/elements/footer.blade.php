<footer class="footer">
    <div class="container">
        <div class="footer_center">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-3">
                    <div class="footer-logo">
                        <a href="{!! HTTP_PATH !!}"> {{HTML::image(HOME_LOGO_PATH, SITE_TITLE)}}</a>
                    </div>
                    <div class="social-icon">
                        @if($siteSettings->facebook_link)
                        <a href="{!! $siteSettings->facebook_link !!}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        @endif
                        @if($siteSettings->twitter_link)
                        <a href="{!! $siteSettings->twitter_link !!}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        @endif
                        @if($siteSettings->instagram_link)
                        <a href="{!! $siteSettings->instagram_link !!}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        @endif
                        @if($siteSettings->linkedin_link)
                        <a href="{!! $siteSettings->linkedin_link !!}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                        @endif
                        
                    </div>

                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <ul class="list-unstyled clear-margins">
                        <li class="widget-container widget_nav_menu">
                            <div class="title-widget ftdrop1"><span>Explore</span></div>
                            <div class="title-widget mobile_sh"><span>Explore</span></div>
                            <div class="ftblock1">
                                <ul class="user_link">
                                    <li><a  href="{!! HTTP_PATH !!}">Home</a></li>
                                    <li><a  href="{{URL::to( 'how-it-works')}}">How it works</a></li>
                                    <li><a  href="{{URL::to('teaching')}}">Teach on <?php echo SITE_TITLE;?></a></li>
                                    <li><a  href="{{URL::to( 'contact-us')}}">Contact us</a></li>
                                    <li><a  href="{{URL::to( 'trust-and-safety')}}">Trust & safety</a></li>
                                    <li><a  href="{{URL::to( 'faqs')}}">FAQ</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-5 col-lg-6">
                    <ul class="list-unstyled clear-margins">
                        <li class="widget-container widget_nav_menu">
                            <div class="title-widget ftdrop2"><span><?php echo SITE_TITLE;?></span></div>
                            <div class="title-widget mobile_sh"><span><?php echo SITE_TITLE;?></span></div>
                            <div class="ftblock2 lscademy-links">
                                <ul class="user_link">
                                    <li><a  href="{{URL::to( 'help-center')}}">Help Center</a></li>
                                    <li><a  href="{{URL::to( 'how-to-shop-courses-on-course-units-global')}}">How to shop courses on Course Units Global?</a></li>
                                    <li><a  href="{{URL::to( 'corporate-account')}}">Corporate Account</a></li>
                                    <li><a  href="{{URL::to( 'advertise-with-course-units-global')}}">Advertise with Course Units Global</a></li>
                                    <li><a  href="{{URL::to( 'report-a-product')}}">Report a Product</a></li>
                                    <li><a  href="{{URL::to( 'terms-and-condition')}}">Terms and Conditions</a></li>
                                    <li><a  href="{{URL::to( 'privacy-policy')}}">Privacy & Cookie Notice</a></li>
                                    <li><a  href="{{URL::to( 'sell-courses-on-course-units-global')}}">Sell courses on Course Units Global</a></li>
                                    <li><a  href="{{URL::to( 'become-a-tutor')}}">Become a Tutor</a></li>
                                </ul>
                                <ul class="user_link">
                                    
                                    <li><a  href="{{URL::to( 'become-an-affiliate')}}">Become an Affiliate</a></li>
                                    <li><a  href="{{URL::to( 'course-units-global-partner-program')}}">Course Units Global Partner Program</a></li>
                                    <li><a  href="{{URL::to( 'join-us-on-social-media')}}">Join us on social media</a></li>
                                    <li><a  href="{{URL::to( 'payment-methods')}}">Payment methods</a></li>
                                    <li><a  href="{{URL::to( 'get-to-know-us')}}">Get to Know Us</a></li>
                                    <li><a  href="{{URL::to( 'careers-course-units-global')}}">Careers@ Course Units Global</a></li>
                                    <li><a  href="{{URL::to( 'blog')}}">Blog</a></li>
                                    <li><a  href="{{URL::to( 'about-us')}}">About Course Units Global</a></li>
                                    <li><a  href="{{URL::to( 'investor-relations')}}">Investor Relations</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=VIVSr95NwMkrOG1yXgFCpCuIaMDwAuer2JnTN67RMiF1xWlMn5uah2PtwuHB"></script></span>
</footer>

<style>
    .displaynonenot {
        display: none !important;;
    }
</style>
{{HTML::script('public/js/front/jquery.lazyload.js')}}

<script>
function addtolike(cid, type){
    $.ajax({
        url: "{!! HTTP_PATH !!}/users/likeunlike",
        type: "POST",
        data: {'cid': cid, 'type': type, _token: '{{csrf_token()}}'},
        beforeSend: function() {$('#lik'+cid).show();$('#liklist'+cid).show();},
        complete: function() {$('#lik'+cid).hide();$('#liklist'+cid).hide();},
        success: function (result) {
           $('#likeunlikeid'+cid).html(result);
           $('#likeunlikelistid'+cid).html(result);
        }
    });
}

$(document).ready(function () {

    $("img.lazy").lazyload();
    
    $('a[data-toggle="tab"]').on('click', function (e) { 
        $(e.target.hash).find('.lazy').each(function(){
        var imageSrc = $(this).attr("data-original");
        $(this).attr("src", imageSrc).removeAttr("data-original");
     });
});

    });

    @if (Session::get('user_id') && Session::get('user_id') > 0)
            $(document).ready(function() {
    getmessage();
    });
    function getmessage(){
    $.ajax({
    url: "{!! HTTP_PATH !!}/check-new-notification",
            type: "GET",
            success: function (result) {
            if (result == 1){

            } else{
            $('#checkunreadmsg').removeClass('displaynone');
            $('#msgcontaine').removeClass('displaynonenot');
            $("#msgcontaine").html('');
            servers = $.parseJSON(result);
            $.each(servers, function(index, value) {
            $("#msgcontaine").append('<li><a href="{{HTTP_PATH}}/users/view-notification/' + value.url + '"><h3>' + value.message + '</h3><div class="job-tatle">' + value.from_name + '<span> ' + value.timeago + '</span></div></a></li>');
            });
            }
            }
    });
    }
    setInterval(function() { getmessage(); }, 30000);
    @endif
    
    
            </script>
          