<div class="likeunlike">
    <div class="liukeloader" id="liklist{{$cid}}">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
    <div class="likeunlike_in" id="likeunlikelistid{{$cid}}">
        @include('elements.likeunlikeinner', ['cid'=>$cid])
    </div>
</div>