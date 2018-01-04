<div class="col-left">
    <div class="box-uses">
        <ul class="news-type bgList">
            <li class="active">
                <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-infoproduct" data-parent="news-type" data-reset="news-home" title="Thông tin sản phẩm">
                    Giải độc gan Tuệ Linh</a>
            </li>
            <li>
                <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-research01" data-parent="news-type" data-reset="news-home" title="Nhận biết bao bì">
                    Cà gai leo Tuệ Linh</a>
            </li>
            <li>
                <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-video" data-parent="news-type" data-reset="news-home" title="Hướng dẫn sử dụng">
                    Trà Giải độc gan Tuệ Linh
                </a>
            </li>
        </ul><!--//news-type-->
        <div class="news-home" id="tab-infoproduct" style="display: block">
            <article class="detail">
                {!! $product->content_tab1 !!}
            </article>
        </div><!--//news-list-->
        <div class="news-home" id="tab-research01">
            <article class="detail">
                {!! $product->content_tab2 !!}
            </article>
        </div><!--//news-list-->
        <div class="news-home" id="tab-video">
            <article class="detail">
                {!! $product->content_tab3 !!}
            </article>
        </div><!--//news-list-->

        <div class="box-adv-center">
            <div class="head"><span>Quảng cáo</span></div>
            <div class="data">
                @foreach ($middleIndexBanner as $banner)
                    <div class="item full">
                        <a href="{{$banner->url}}"><img src="{{url('files/'.$banner->image)}}" alt=""></a>
                    </div>
                @endforeach
            </div>
            <div class="clear"></div>
            <div class="fb-comments" data-href="http://www.cagaileo.vn/" data-numposts="5" data-width="100%"></div>
        </div><!--//box-adv-center-->

    </div>
    <div class="box-product">
        <div class="title">
            <h3 class="global-title"><a href="#">Tin liên quan</a></h3>
        </div>
        <div class="owl-carousel" id="slide-product">
            @foreach ($product->related_posts->chunk(2) as $rPost)
                <div class="item">
                    @foreach ($rPost as $post)
                        <div class="block">
                            <a href="{{url($post->slug.'.html')}}" title="">
                                <img src="{{url('img/cache/218x128/'.$post->image)}}" width="218" height="128" alt=""/>
                            </a>
                            <h3>
                                <a href="{{url($post->slug.'.html')}}" title="">{{$post->title}}</a>
                            </h3>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div><!--//col-left-->