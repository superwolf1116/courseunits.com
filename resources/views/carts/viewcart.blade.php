@extends('layouts.inner')
@section('content')

<div class="cart-banner">
    <div class="container container-header">
        <h1>Shopping Cart</h1>
    </div>
</div>
</div>
<section class="cart-details-section">
    <div class="container container-header">

        <input name="totalcount" type="hidden" id="totalcount" value="{{$cartCount}}">
        
        @if(!$allrecords->isEmpty())
        <div class="row" id="cours_scc">
            <div class="col-xs-12 col-md-8 col-lg-9">
                <div class="shopping-cart-details">
                    <h2 id="cart_lst">{{$cartCount}} Courses in Cart</h2>


                    <div class="cart-details">
                        <?php 
                        $subtotal = array();
                        $total = array();
                        ?>
                        @foreach($allrecords as $allrecord)
                        <ul id="cartlist_{{$allrecord->id}}">
                            <li class="product-imgages">
                                <?php
                                $gigimgname = '';
                                if ($allrecord->Course->image) {
                                    $path = COURSE_FULL_UPLOAD_PATH . $allrecord->Course->image;
                                    if (file_exists($path) && !empty($allrecord->Course->image)) {
                                        $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->Course->image;
                                    }
                                }
                                ?>
                                {{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->Course->title,'class'=>''])}}
                            </li>
                            <li class="cart-product-details">
                                <h4>{{$allrecord->Course->title}}</h4>
                                <p>By {{$allrecord->Course->User->first_name.' '.$allrecord->Course->User->last_name}}</p>
                            </li>
                            <li class="cart-product-action">
                                <span><a href="javascript:void();" onclick = 'remove("<?php echo $allrecord->id; ?>","<?php echo $allrecord->Course->price; ?>")'>Remove</a></span>
                            </li>
                            <li class="cart-product-price">
                                <strong><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format($allrecord->Course->price,2)}} </strong>
                                <span><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format($allrecord->Course->price+200,2)}}</span>
                            </li>
                        </ul>
                        <?php 
                        $subtotal[] = $allrecord->Course->price;
                        $total[] = $allrecord->Course->price+200;
                        ?>
                        
                        @endforeach
                    </div>

                </div>


            </div>
            <div class="col-xs-12 col-md-4 col-lg-3">
                <div class="checkout-price-bx">
                    <h4>Total:</h4>
                    <h2 id="subtotal">{{CURR}} {{number_format(array_sum($subtotal),2)}}</h2>
                    <span id="total">{{CURR}} {{number_format(array_sum($total),2)}}</span>
                    <h5 id="perct">
                        <?php 
                        $per = round((100-((array_sum($subtotal)*100)/array_sum($total))));
                        echo $per; ?>% off</h5>
                    <input name="subtotalcost" type="hidden" id="subtotalcost" value="{{array_sum($subtotal)}}">
        <input name="totalcost" type="hidden" id="totalcost" value="{{array_sum($total)}}">
        <input name="pertg" type="hidden" id="pertg" value="{{$per}}">
                    <a href="{{ URL::to( '/checkout')}}" class="btn btn-primary">Checkout</a>

                </div>
            </div>
        </div>
        <div class="row" id="empty_scc" style="display: none;">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="shopping-cart-details">
                    <h2 id="cart_lst1">{{$cartCount}} Courses in Cart</h2>
                    <div class="empty_cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <p>Your cart is empty. Keep shopping to find a course!</p>
                        <a class="btn btn-primary" href="{{ URL::to( '/courses')}}">Keep shopping</a>
                    </div>
                </div>
            </div>
        </div>
        @else  
        <div class="row" id="empty_scc">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="shopping-cart-details">
                    <h2 id="cart_lst">{{$cartCount}} Courses in Cart</h2>
                    <div class="empty_cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <p>Your cart is empty. Keep shopping to find a course!</p>
                        <a class="btn btn-primary" href="{{ URL::to( '/courses')}}">Keep shopping</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

</section>
<script>

    function remove(cid,price) {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/removecart/" + cid,
            cache: false,
//            data: $('#AddToCartMain' + cid).serialize(),            
            success: function (result) {

                $("#cartlist_" + cid).remove();
                updateHeaderCount();
                var subtotalcost = $('#subtotalcost').val();
                var totalcost = $('#totalcost').val();
                var pertg = $('#pertg').val();
                
                var updatesubtotal = parseFloat(subtotalcost) - parseFloat(price);
                var updatetotal = (parseFloat(totalcost) - parseFloat(price))-200;
                var per = Math.round(100 - ((updatesubtotal*100)/updatetotal));
                
                $('#subtotalcost').val(updatesubtotal);
                $('#subtotal').html('{{CURR}} '+updatesubtotal.toFixed(2));
                $('#totalcost').val(updatetotal);
                $('#total').html('{{CURR}} '+updatetotal.toFixed(2));
                $('#pertg').val(per);
                $('#perct').html(per+'% off');
                
            },
            error: function () {

            }
        });


    }

    function updateHeaderCount() {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/updateCount",
            cache: false,
            data: {},
            success: function (result) {
                if (result) {
                    $("#update_cart").html(result);
                    
                    
                    var totalcount = $('#totalcount').val();
                    var totaal = parseInt(totalcount) - 1;
                    if (totaal == 0) {
                        $('#cours_scc').hide();
                        $('#empty_scc').show();
                    }
                    $('#totalcount').val(totaal);
                    $('#cart_lst').html(totaal + ' Courses in Cart');
                    $('#cart_lst1').html(totaal + ' Courses in Cart');

                }
            }
        });
    }


</script>
<script>
    function removesavedgig(cid) {
        if (confirm('Are you sure you want to remove course from wishlist?') == true) {
            $.ajax({
                url: "{!! HTTP_PATH !!}/users/deletelikeunlike",
                type: "POST",
                data: {'cid': cid, _token: '{{csrf_token()}}'},
                beforeSend: function () {
                    $('#wish_loader').show();
                },
                complete: function () {
                    $('#wish_loader').hide();
                },
                success: function (result) {
                    $('#coursediv' + cid).remove();
                }
            });
        }
    }
</script>
@endsection