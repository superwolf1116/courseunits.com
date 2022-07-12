@extends('layouts.checkout')
@section('content')
{{ HTML::style('public/css/front/card.css')}}
{{ HTML::script('public/js/creditCardValidator.js')}}
<script>
    function cardFormValidate() {
        var cardValid = 0;

        //card number validation
        $('#card_number').validateCreditCard(function (result) {
            var cardType = (result.card_type == null) ? '' : result.card_type.name;
            if (cardType == 'Visa') {
                var backPosition = result.valid ? '2px -163px, 312px -87px' : '2px -163px, 312px -61px';
            } else if (cardType == 'MasterCard') {
                var backPosition = result.valid ? '2px -247px, 312px -87px' : '2px -247px, 312px -61px';
            } else if (cardType == 'Maestro') {
                var backPosition = result.valid ? '2px -289px, 312px -87px' : '2px -289px, 312px -61px';
            } else if (cardType == 'Discover') {
                var backPosition = result.valid ? '2px -331px, 312px -87px' : '2px -331px, 312px -61px';
            } else if (cardType == 'Amex') {
                var backPosition = result.valid ? '2px -121px, 312px -87px' : '2px -121px, 312px -61px';
            } else {
                var backPosition = result.valid ? '2px -121px, 312px -87px' : '2px -121px, 312px -61px';
            }
            $('#card_number').css("background-position", backPosition);
            if (result.valid) {
                $("#card_type").val(cardType);
                $("#card_number").removeClass('required');
                cardValid = 1;
            } else {
                $("#card_type").val('');
                $("#card_number").addClass('required');
                cardValid = 0;
            }
        });

        //card details validation

        var cardName = $("#name_on_card").val();
        var expMonth = $("#expiry_month").val();
        var expYear = $("#expiry_year").val();
        var cvv = $("#cvv").val();
        var regName = /^[a-z ,.'-]+$/i;
        var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
        var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
        var regCVV = /^[0-9]{3,3}$/;
        if (cardValid == 0) {
            $("#card_number").addClass('required');
            $("#card_number").focus();
            return false;
        } else if (!regMonth.test(expMonth)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").addClass('required');
            $("#expiry_month").focus();
            return false;
        } else if (!regYear.test(expYear)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").addClass('required');
            $("#expiry_year").focus();
            return false;
        } else if (!regCVV.test(cvv)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").addClass('required');
            $("#cvv").focus();
            return false;
        } else if (!regName.test(cardName)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").addClass('required');
            $("#name_on_card").focus();
            return false;
        } else {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").removeClass('required');
            $('#cardSubmitBtn').prop('disabled', false);
            $("#error_show").hide();
            return true;
        }
    }

    $(document).ready(function () {
        $('#paymentForm input[type=text]').on('keyup', function () {
            cardFormValidate();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#checkout").validate();

        $("#country_id").change(function () {
            var countryid = $("#country_id").val();
            $("#selectstate").load('<?php echo HTTP_PATH . '/users/getstatelist/' ?>' + countryid);
        });

        $("#radio-1").click(function () {
            $('#crediCardSec').show();
            $('#paypalSec').hide();
            $('#card_btn').show();
            $('#paypal_btn').hide();
        });
        $("#radio-3").click(function () {
            $('#crediCardSec').hide();
            $('#paypalSec').show();
            $('#card_btn').hide();
            $('#paypal_btn').show();
        });
    });
</script>
<section class="checkout-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                <h1>Checkout</h1>
                {{ Form::open(array('method' => 'post', 'id' => 'paymentForm')) }}
                <div class="billing-address-bx">
                    <div class="card_error_pay" id="card_error_pay"></div>
                    <h2>Billing Address (Country and state are required fields)</h2>

                    <div class="billing-address">
                        <label>Country</label>

                        <div class="filter-courses-select">
                            <span>
                                {{Form::select('country_id', $countryList,'', ['id'=>'country_id','class' => 'form-control required','placeholder' => 'Select Country'])}}
                            </span>
                        </div>
                    </div>

                    <div class="billing-address billing-address-right">
                        <label>State / Union Territory</label>

                        <div class="filter-courses-select" id="selectstate">
                            <span>
                                {{Form::select('state_id', $stateList,'', ['id'=>'statename','class' => 'form-control required','placeholder' => 'Select State'])}}

                            </span>
                        </div>
                    </div>

                    <div class="payment-option">
                        <div class="payment-radio">
                            <input id="radio-1" name="payment_type" type="radio" checked>
                            <label for="radio-1" class="payment-radio-label">Credit or Debit Card</label>
                        </div>

                        <div class="payment-radio">
                            <input id="radio-3" name="payment_type" type="radio">
                            <label  for="radio-3" class="payment-radio-label">PayPal </label>
                        </div>
                    </div>

                    <div class="payment-card-option" id="crediCardSec">
                        
                        <div class="form-group">
                            <input type="text" placeholder="Card number" id="card_number"  class="form-control" name="card_number">

                        </div>

                        <div class="form-group">
                            <div class="filter-courses-select">
                                <input type="text" class="form-control" placeholder="MM" maxlength="2" id="expiry_month" name="expiry_month">
                            </div>


                            <div class="filter-courses-select">
                                <input type="text" class="form-control" placeholder="YYYY" maxlength="4" id="expiry_year" name="expiry_year">
                            </div>
                            <div class="security-code-input">
                                <input type="text" class="form-control" placeholder="Security Code" maxlength="4" id="cvv" name="cvv">
                                <div class="security-code-view">
                                    <i class="fa fa-question-circle"></i>
                                    <div class="security-code-img">
                                        {{HTML::image("public/img/front/security_code-livetext-nocopy.svg", SITE_TITLE)}}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="text"  class="form-control" placeholder="Name on card" id="name_on_card" name="name_on_card">

                        </div>
                        <!--                        <div class="form-group remember-card">
                                                    <input type="checkbox" id="remember-card" >
                                                    <label for="remember-card">Remember this card</label>
                                                </div>-->
                        <div class="billing__secure-connection">
                            <i class="fa fa-lock"></i>
                            <span>
                                Secure<br>
                                Connection
                            </span>
                        </div>
                    </div>

                    <div class="payment-card-option"  id="paypalSec" style="display: none;">
                        <p>In order to complete your transaction, we will transfer you over to PayPal's secure servers.</p>
                        <div class="billing__secure-connection">
                            <i class="fa fa-lock"></i>
                            <span>
                                Secure<br>
                                Connection
                            </span>
                        </div>
                    </div>


                </div>
                {{ Form::close()}} 
            </div>



            <div class="col-xs-12 col-md-4 col-lg-4">
                <div class="checkout-billing-bx">
                    <h2>Summary</h2>
                    <?php
                    $subtotal = array();
                    $total = array();
                    ?>
                    @foreach($allrecords as $allrecord)
                    <?php
                    $subtotal[] = $allrecord->Course->price;
                    $total[] = $allrecord->Course->price + 200;
                    ?>
                    @endforeach
                    <div class="billing-summary">
                        <label>Original price:</label>
                        <span><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format(array_sum($total),2)}}</span>
                    </div>
                    <div class="billing-summary">
                        <label>Discounts:</label>
                        <span>{{CURR}} {{number_format(array_sum($total)-array_sum($subtotal),2)}}</span>
                    </div>

                    <div class="billing-summary-total">
                        <label>Total:</label>
                        <span><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format(array_sum($subtotal),2)}}</span>
                    </div>
                    <p>Udemy is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                    <p>By completing your purchase you agree to these <a target="_black" href="{{ URL::to( '/terms-and-condition')}}">Terms of Service</a>.</p>

                    <!--<a href="#" class="btn btn-primary">Complete Payment</a>-->
                    <div id="card_btn">
                        <input type="hidden" name="card_type" id="card_type" value=""/>
                        <input name="card_submit" id="cardSubmitBtn" value="Complete Payment" class="btn btn-primary" disabled="true" type="button" onclick="paywithcard()">
                    </div>
                    <div id="paypal_btn" style="display: none;">
                        <a href="javascript:void();" class="btn btn-primary" onclick="paywithpaypal()">Complete Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    function paywithcard() {
        if (cardFormValidate()) {
            var country = $("#country_id").val();
            var state = $("#state_id").val();
            if (country == '' || state == '') {
                $('#card_error_pay').html('<div class="alert alert-block alert-danger"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Please select country and state first</div>');
            } else {
                $('#btndivecard').hide();
                $('#gigdloader').show();
                $('#card_error_pay').html('');
                $('#paywithcard').addClass('makefad');

                $.ajax({
                    url: "{!! HTTP_PATH !!}/payments/paywithcard",
                    type: "POST",
                    data: $('#paymentForm').serialize(),
                    success: function (result) {
                        if (result == 1) {
                            window.location = "{!! HTTP_PATH !!}/my-courses";
                        } else {
                            $('#gigdloader').hide();
                            $('#btndivecard').show();
                            $('#paywithcard').removeClass('makefad');
                            $('#card_error_pay').html('<div class="alert alert-block alert-danger"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + result + '</div>');
                        }
                    }
                });
            }

        }
    }
    
    function paywithpaypal() {
        var country = $("#country_id").val();
            var state = $("#state_id").val();
            if (country == '' || state == '') {
                $('#card_error_pay').html('<div class="alert alert-block alert-danger"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Please select country and state first</div>');
            } else {
                window.location = "{!! HTTP_PATH !!}/payments/paywithpaypal";
                
            }
    }
</script>
@endsection