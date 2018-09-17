@extends('frontend.hoaxuan.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">

            <div class="box-news cf">
                <div class="title-panel cf">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="{{url($news_category->slug)}}"><span>{{$news_category->name}}</span></a>
                        </h3>
                    </div>
                    <div class="menu-tabs">
                        <div class="menu-tabs">
                            <ul class="news-type">
                                @foreach ($news_category->children as $k=>$sub)
                                    <li>
                                        <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-{{$k}}" data-parent="news-type" data-reset="news-home" title="{{$sub->name}}">
                                            {{$sub->name}}
                                        </a>
                                    </li>
                                    @if ($k < ($news_category->children->count() - 1))
                                        <li class="line">|</li>
                                    @endif
                                @endforeach
                            </ul><!--//news-type-->
                        </div>
                    </div>
                </div>

                <div class="news-home" id="tab-categories" style="display: block">
                    @foreach ($news_category->list_new_post->splice(0, 6) as $post)
                        <article class="item-products">
                            <a href="{{url($post->slug.'.html')}}" title="" class="thumbs">
                                <img src="{{url('img/cache/310x230/'.$post->image)}}" width="310" height="230" alt=""/>
                            </a>
                            <h3>
                                <a href="{{url($post->slug.'.html')}}" title="">{{str_limit($post->title, 60)}}</a>
                            </h3>
                            <p>
                                {{str_limit($post->desc, 140)}}
                            </p>
                        </article>
                    @endforeach
                </div>

            </div>
          
            <div class="box-news cf">
                <div class="title-panel cf">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="{{url($topIndexCategory->slug)}}"><span>{{$topIndexCategory->name}}</span></a>
                        </h3>
                    </div>
                    <div class="menu-tabs">
                        <div class="menu-tabs">
                            <ul class="news-type">
                                @foreach ($topIndexCategory->children as $k=>$sub)
                                    <li>
                                        <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-{{$k}}" data-parent="news-type" data-reset="news-home" title="{{$sub->name}}">
                                            {{$sub->name}}
                                        </a>
                                    </li>
                                    @if ($k < ($topIndexCategory->children->count() - 1))
                                        <li class="line">|</li>
                                    @endif
                                @endforeach
                            </ul><!--//news-type-->
                        </div>
                    </div>
                </div>

                <div class="news-home" id="tab-index" style="display: block">
                    @foreach ($topIndexCategory->list_post_top1->splice(0, 3) as $post)
                        <article class="item-products">
                            <a href="{{url($post->slug.'.html')}}" title="" class="thumbs">
                                <img src="{{url('img/cache/310x230/'.$post->image)}}" width="310" height="230" alt=""/>
                            </a>
                            <h3>
                                <a href="{{url($post->slug.'.html')}}" title="">{{$post->title}}</a>
                            </h3>
                            <p>
                                {{str_limit($post->desc, 140)}}
                            </p>
                        </article>
                     @endforeach
                </div>

                @foreach ($topIndexCategory->children as $k=>$sub)

                    <div class="news-home" id="tab-{{$k}}" style="display: none">
                        @foreach ($sub->list_post_top1->splice(0, 3) as $post)
                            <article class="item-products">
                                <a href="{{url($post->slug.'.html')}}" title="" class="thumbs">
                                    <img src="{{url('img/cache/310x230/'.$post->image)}}" width="310" height="230" alt=""/>
                                </a>
                                <h4>
                                    <a href="{{url($post->slug.'.html')}}" title="">{{$post->title}}</a>
                                </h4>
                                <p>
                                    {{str_limit($post->desc, 140)}}
                                </p>
                            </article>
                        @endforeach
                    </div>
                @endforeach

            </div>

            @if ($hotProducts)
                <div class="box-hots">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="{{url('mua-hang')}}"><span>Sản phẩm hot</span></a>
                        </h3>
                    </div>
                    <div class="slide-hots">
                        <div class="owl-carousel" id="slide-hots">
                            @foreach ($hotProducts as $product)
                                <div class="item">
                                    <a class="thumb" href="{{url('mua-hang')}}" title="">
                                        <img src="{{url('img/cache/188x188', $product->image)}}"/>
                                    </a>
                                    <h3><a href="{{url('mua-hang')}}">{{$product->title}}</a></h3>
                                    <div class="info-price">
                                        <p class="price">{{$product->giamoi}}</p>
                                    </div>
                                    <p class="buy"><a href="{{url('mua-hang')}}" class="buy-now">Mua ngay</a></p>
                                    <div class="rate-star">
                                        <div style="width:90%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif



            <div class="box-news cf">
                <div class="title-panel cf">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="#"><span>{{$secondIndexCategory->name}}</span></a>
                        </h3>
                    </div>
                    <div class="menu-tabs">
                        <div class="menu-tabs">
                            <ul class="news-type">
                                @foreach ($secondIndexCategory->children as $k=>$sub)
                                    <li>
                                        <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-{{$k}}" data-parent="news-type" data-reset="news-home" title="{{$sub->name}}">
                                            {{$sub->name}}
                                        </a>
                                    </li>
                                    @if ($k < ($secondIndexCategory->children->count() - 1))
                                        <li class="line">|</li>
                                    @endif
                                @endforeach
                            </ul><!--//news-type-->
                        </div>
                    </div>
                </div>

                <div class="news-home" id="tab-demo" style="display: block">
                    @foreach ($secondIndexCategory->list_post_top1->splice(0, 6) as $post)
                        <article class="item-products">
                            <a href="#" title="" class="thumbs">
                                <img src="{{url('img/cache/310x230/'.$post->image)}}" width="310" height="230" alt=""/>
                            </a>
                            <h3>
                                <a href="#" title="">{{$post->title}}</a>
                            </h3>
                            <p>
                                {{str_limit($post->desc, 140)}}
                            </p>
                        </article>
                    @endforeach
                </div>

            </div>


            <!-- chia se nguoi dung -->


            <div class="box-news cf">
                <div class="title-panel cf">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="#"><span>BÌNH LUẬN</span></a>
                        </h3>
                    </div>
                    <div class="menu-tabs">
                        <div class="menu-tabs"></div>
                    </div>
                </div>

                <div class="news-home" id="tab-comment" style="display: block">
                    @foreach (\App\Models\Share::all()->splice(0, 9) as $sharing)
                        <article class="item-products">
                            <a href="#" title="" class="thumbs">
                                <img src="{{url('img/cache/310x530/'.$sharing->image)}}" width="310" height="530" alt=""/>
                            </a>
                        </article>
                    @endforeach
                </div>

            </div>




            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section><!--//section-->

@endsection
