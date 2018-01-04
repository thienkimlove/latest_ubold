@extends('frontend.cagaileo.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li>{{$tag->name}}</li>
            </ul>
            <div class="col-left">
                <div class="box-news">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="{{url('tag', $tag->slug)}}"><span>{{$tag->name}}</span></a>
                        </h3>
                    </div>
                    @foreach ($posts as $post)
                        <article class="item cf">
                        <a href="{{url($post->slug.'.html')}}" title="" class="thumbs">
                            <img src="{{url('img/cache/310x230/'.$post->image)}}" width="310" height="230" alt=""/>
                        </a>
                        <h3>
                            <a href="{{url($post->slug.'.html')}}" title="">{{$post->title}}</a>
                        </h3>
                        <p>
                            {{$post->desc}}
                        </p>
                    </article>
                    @endforeach
                    <!-- /paging -->
                    <div class="boxPaging">
                        @include('frontend.cagaileo.pagination', ['paginate' => $posts])
                    </div><!--//news-list-->
                </div>
                @foreach ($middleIndexBanner as $banner)
                    <div class="box-adv-center">
                        <a href="{{$banner->url}}"><img src="{{url('files/'.$banner->image)}}" alt=""></a>
                    </div><!--//box-adv-center-->
                @endforeach
            </div><!--//col-left-->
            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section><!--//section-->

@endsection