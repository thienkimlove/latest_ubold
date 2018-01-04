<ul class="listButton cf">
    <li class="ilocal"><a href="{{url('phan-phoi')}}">Xem điểm bán Tuệ Linh</a></li>
    <li class="icall"><a href="{{url('lien-he')}}">1800 1190 - 0912 571 190</a></li>
</ul>
<div class="social-follow">
    <div class="fb-share-button" data-href="{{url('product', $product->slug)}}" data-layout="button_count" data-mobile-iframe="true"></div>
</div>
<div class="box-tags">
    <span>TAG</span>
    @foreach ($product->tags as $tag)
        <a href="{{url('tag/'.$tag->slug)}}" title="">{{$tag->name}}</a>
    @endforeach
</div><!--//box-tags-->
<div class="comment-post">
    <div class="fb-comments" data-href="{{url('product', $product->slug)}}" data-numposts="5"></div>
</div>