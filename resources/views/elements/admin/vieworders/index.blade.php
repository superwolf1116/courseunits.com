{{ HTML::script('public/js/facebox.js')}}
{{ HTML::style('public/css/facebox.css')}}
<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
        });
    });
</script>
<div class="admin_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
@if(!$allrecords->isEmpty())
<div class="panel-body marginzero">
    <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
    {{ Form::open(array('method' => 'post', 'id' => 'actionFrom')) }}
    <section id="no-more-tables" class="lstng-section">
        <div class="topn">
            <div class="topn_left">Course Order List</div>
            <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                <div class="panel-heading" style="align-items:center;">
                    {{$allrecords->appends(Input::except('_token'))->render()}}
                </div>
            </div>                
        </div>
        <div class="tbl-resp-listing">
            <table class="table table-bordered table-striped table-condensed cf">
                <thead class="cf ddpagingshorting heafboldd">
                    <tr>
                        <th class="sorting_paging">Course Title (Instructor Name)</th>
                        <th class="sorting_paging">Student Name</th>
                        <th class="sorting_paging">Order ID</th>
                        <th class="sorting_paging">Amount</th>
                        <!--<th class="sorting_paging">Status</th>-->
                        <th class="sorting_paging">Date</th>
                        <th class="action_dvv"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php global $gigOrderStatus; ?>
                    @foreach($allrecords as $allrecord)
                    <tr>
                        <td data-title="Course Title (Instructor Name)">
                            <?php
                            $items = DB::table('orderitems')->where('order_id', $allrecord->id)->get();
                            if(count($items)>0){
                                foreach ($items as $item) {
                                    $course = DB::table('courses')->where('id', $item->course_id)->first();
                                    $seller = DB::table('users')->where('id', $item->seller_id)->first();
                                    echo isset($course->title)?$course->title:'Record Deleted';
                                    echo isset($seller->first_name)?' ('.$seller->first_name . ' ' . $seller->last_name.')':'';
                                    echo '<br>';
                                }
                            }else{
                                echo 'Record Deleted';
                            }
                                
                            ?>
                        </td>
                        <td data-title="Date">@if(isset($allrecord->Buyer->first_name)){{$allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name}}@else{{'N/A'}}@endif</td>
                        <td data-title="Date">
                            @if($allrecord->pay_type === 'Wallet')
                            {{$allrecord->wallet_trn_id}}
                            @else 
                            {{$allrecord->paypal_trn_id}}
                            @endif
                        </td>
                        <td data-title="Date">{{CURR.$allrecord->revenue}}</td>
                        <!--<td data-title="Date">{{$gigOrderStatus[$allrecord->status]}}</td>-->
                        <td data-title="Date">{{$allrecord->created_at->format('d M, Y')}}</td>
                        <td data-title="Action">
                            <a href="#info{!! $allrecord->id !!}" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    {{ Form::close()}}
</div>         
</div>
@else 
<div id="listingJS" style="display: none;" class="alert alert-success alert-block fade in"></div>
<div class="admin_no_record">No record found.</div>
@endif

@if(!$allrecords->isEmpty())
@foreach($allrecords as $allrecord)
<div id="info{!! $allrecord->id !!}" style="display: none;" class="frnt_div">
    <div class="nzwh-wrapper">
        <fieldset class="nzwh">
            <legend class="head_pop">
                Order #
                @if($allrecord->pay_type === 'Wallet')
                {{$allrecord->wallet_trn_id}}
                @else 
                {{$allrecord->paypal_trn_id}}
                @endif
            </legend>
            <div class="drt">
                <div class="admin_pop"><span>Course Title (Instructor Name): </span>  <label>
                        
                       <?php
                            $items = DB::table('orderitems')->where('order_id', $allrecord->id)->get();
                            if(count($items)>0){
                                foreach ($items as $item) {
                                    $course = DB::table('courses')->where('id', $item->course_id)->first();
                                    $seller = DB::table('users')->where('id', $item->seller_id)->first();
                                    echo isset($course->title)?$course->title:'Record Deleted';
                                    echo isset($seller->first_name)?' ('.$seller->first_name . ' ' . $seller->last_name.')':'';
                                    echo '<br>';
                                }
                            }else{
                                echo 'Record Deleted';
                            }
                            ?>
                    </label></div>
                <div class="admin_pop"><span>Student Name: </span>  <label>@if(isset($allrecord->Buyer->first_name)){!! $allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name !!}@else{{'N/A'}}@endif</label></div>
                <div class="admin_pop"><span>Order Date: </span>  <label>{{$allrecord->created_at->format('d M, Y')}}</label></div>
                <div class="admin_pop"><span>Order ID: </span>  <label>
                        @if($allrecord->pay_type === 'Wallet')
                        {{$allrecord->wallet_trn_id}}
                        @else 
                        {{$allrecord->paypal_trn_id}}
                        @endif
                    </label>
                </div>
                <div class="admin_pop"><span>Amount: </span>  <label>{{CURR.$allrecord->revenue}}</label></div>
        </fieldset>
    </div>
</div>
@endforeach
@endif

