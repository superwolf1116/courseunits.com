@extends('layouts.login')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#loginform").validate();
    });
</script>
<div class="detai_page">
    <div class="login-wapper">        
        <div class="login-bg">
            <div class="signn frpassword">Forgot Password</div>
            <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
            <div class="socila_login">
                <?php //echo $this->element('social_register', array('type' => 'register')); ?>
            </div>
            <div normal_login>
                {{ Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin')) }}
                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            {{Form::text('email_address', Cookie::get('user_email_address'), ['class'=>'form-control required', 'placeholder'=>'Email Address', 'autocomplete'=>'OFF'])}}
                        </span>
                    </div>
                    <div class="clear"></div>            
                    <div class="sign_in" id="sub_btn_dive">
                        {{Form::submit('Submit', ['class' => 'btn btn-primary btn-block btn-flat'])}}
                    </div>
                </div>
                <div class="sign_center ">
                    <div class="always_btn">Oops, I just remembered it! Take me back to the <a href="{{ URL::to( 'login')}}"></i>Login</a></div> 
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection