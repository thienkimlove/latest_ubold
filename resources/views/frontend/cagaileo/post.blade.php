@extends('frontend.cagaileo.frontend')

@section('content')
    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li><a href="{{url($post->category->slug)}}">{{$post->category->name}}</a></li>
                <li>{{$post->title}}</li>
            </ul>
            <div class="col-left">
                <div class="box-uses">
                    <div class="title">
                        <h3 class="global-title">
                            <a>{{$post->category->name}}</a>
                        </h3>
                        <h3 class="sub-title">{{$post->title}}</h3>
                    </div>
                    <article class="detail">
                        <div class="content">
                             {!! $post->content !!}
                        </div>
                    </article>

                    <div class="box-tags">
                        <span>TAG</span>
                        @foreach ($post->tags as $tag)
                          <a href="{{url('tag/'.$tag->slug)}}" title="">{{$tag->name}}</a>
                        @endforeach
                    </div><!--//box-tags-->

                    <div class="boxLike">
                        <div class="addthis_native_toolbox"></div>
                    </div>
					
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
                    </div><!--//box-adv-center-->

                    <div class="released-post">
                        <div class="title">
                            <h3 class="global-title"><a href="#">Tin liên quan</a></h3>
                        </div>
                        <ul class="list-released">
                            @foreach ($post->related_posts as $rPost)
                              <li><a href="{{url($rPost->slug.'.html')}}">{{$rPost->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="comment-post">
                        <div class="fb-comments" data-href="{{url($post->slug.'.html')}}" data-numposts="5"></div>
                    </div>
                    <div class="box-product">
                        <h3 class="title">Bài liên quan</h3>
                        <div class="owl-carousel" id="slide-product">
                            @foreach ($latestNews as $rPost)
                                <div class="item">
                                <a href="{{url($rPost->slug.'.html')}}" title="">
                                    <img src="{{url('img/cache/218x128/'.$rPost->image)}}" width="218" height="128" alt=""/>
                                </a>
                                <h3>
                                    <a href="{{url($rPost->slug.'.html')}}" title="">{{$rPost->title}}</a>
                                </h3>
                            </div>
                            @endforeach
                        </div>
                    </div><!--//box-product-->
                </div>
            </div><!--//col-left-->
            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>
@endsection