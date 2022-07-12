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
                    <div class="topn_left">Testimonials List</div>
                    <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                        <div class="panel-heading" style="align-items:center;">
                            {{$allrecords->appends(Input::except('_token'))->render()}}
                        </div>
                    </div>                
                </div>
                <div class="tbl-resp-listing">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf ddpagingshorting">
                        <tr>
                            <th style="width:5%">#</th>
                            <th class="sorting_paging">@sortablelink('title', 'Title')</th>
                            <th class="sorting_paging">@sortablelink('client_name', 'Client Name')</th>
                            <th class="sorting_paging">@sortablelink('country', 'Country')</th>
                            <th class="sorting_paging">@sortablelink('description', 'Description')</th>
                            <th class="sorting_paging">@sortablelink('created_at', 'Date')</th>
                            <th class="action_dvv"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allrecords as $allrecord)
                            <tr>
                                <th style="width:5%"><input type="checkbox" onclick="javascript:isAllSelect(this.form);" name="chkRecordId[]" value="{{$allrecord->id}}" /></th>
                                <td data-title="Title">{{$allrecord->title}}</td>
                                <td data-title="Client Name">{{$allrecord->client_name}}</td>
                                <td data-title="Country">{{$allrecord->country}}</td>
                                <td data-title="Description">{{ str_limit($allrecord->description, $limit = 25, $end = '...') }}</td>
                                <td data-title="Date">{{$allrecord->created_at->format('M d, Y')}}</td>
                                <td data-title="Action">
                                    <div id="loderstatus{{$allrecord->id}}" class="right_action_lo">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
                                    <span class="right_acdc" id="status{{$allrecord->id}}">
                                        @if($allrecord->status == '1')
                                            <a href="{{ URL::to( 'admin/testimonials/deactivate/'.$allrecord->slug)}}" title="Deactivate" class="deactivate"><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                        @else
                                            <a href="{{ URL::to( 'admin/testimonials/activate/'.$allrecord->slug)}}" title="Activate" class="activate"><button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></button></a>
                                        @endif
                                    </span>
                                    <a href="{{ URL::to( 'admin/testimonials/edit/'.$allrecord->slug)}}" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ URL::to( 'admin/testimonials/delete/'.$allrecord->slug)}}" title="Delete" class="btn btn-danger btn-xs action-list delete-list" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                    <a href="#info{!! $allrecord->id !!}" title="View" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="search_frm">
                    <button type="button" name="chkRecordId" onclick="checkAll(true);"  class="btn btn-info">Select All</button>
                    <button type="button" name="chkRecordId" onclick="checkAll(false);" class="btn btn-info">Unselect All</button>
                    <?php global $accountStatus;?>
                    <div class="list_sel">{{Form::select('action', $accountStatus,null, ['class' => 'small form-control','placeholder' => 'Action for selected record', 'id' => 'action'])}}</div>
                <button type="submit" class="small btn btn-success btn-cons btn-info" onclick="return ajaxActionFunction();" id="submit_action">OK</button>
                </div>    
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
        <div id="info{!! $allrecord->id !!}" style="display: none;">
            <div class="nzwh-wrapper">
                <fieldset class="nzwh">
                    <legend class="head_pop">{!! $allrecord->first_name.' '.$allrecord->last_name !!}</legend>
                    <div class="drt">
                    <div class="admin_pop"><span>Title: </span>  <label>{!! $allrecord->title !!}</label></div>
                    <div class="admin_pop"><span>Client Name: </span>  <label>{!! $allrecord->client_name !!}</label></div>
                    <div class="admin_pop"><span>Country: </span>  <label>{!! $allrecord->country !!}</label></div>
                    <div class="admin_pop"><span>Description: </span>  <label>{!! $allrecord->description !!}</label></div>
                    @if($allrecord->image != '')
                        <div class="admin_pop"><span></span> <label>{{HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH.$allrecord->image, SITE_TITLE,['style'=>"max-width: 200px"])}}</label></div>
                    @endif
                </fieldset>
            </div>
        </div>
    @endforeach
@endif