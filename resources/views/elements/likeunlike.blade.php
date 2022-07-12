<div class="likeunlike">
    <div class="liukeloader" id="lik{{$cid}}">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
    <div class="likeunlike_in" id="likeunlikeid{{$cid}}">
        @include('elements.likeunlikeinner', ['cid'=>$cid])
    </div>
</div>