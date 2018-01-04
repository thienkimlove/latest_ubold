@extends('frontend.cagaileo.frontend')

@section('content')
<section class="section fix">
    <div class="layout-home">
        <ul class="breadcrumbs cf">
            <li><a href="{{url('/')}}">Trang chủ</a></li>
            <li>Videos</li>
        </ul>
        <div class="col-left">
            <div class="box-media">
                <div class="hot-video cf">
                    <div class="col-left">
                        <iframe width="100%" height="315" src="{{$mainVideo->url}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="col-right">
                        <ul class="list-video">
                            @foreach ($latestVideos as $video)
                                <li><a class="{{($video->id == $mainVideo->id) ? 'active' : ''}}" href="{{url('video/'.$video->slug)}}">{{$video->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach ($videos as $video)
                <article class="item">
                    <a class="thumb" href="{{url('video/'.$video->slug)}}" title="">
                        <img src="{{url('img/cache/303x130/'.$video->image)}}" width="303" height="130" alt=""/>
                    </a>
                    <h3>
                        <a href="{{url('video/'.$video->slug)}}" title="">{{$video->title}}</a>

                    </h3>
                </article>
                @endforeach
                <!-- /paging -->
                <div class="boxPaging">
                    @include('pagination.default', ['paginate' => $videos])
                </div><!--//news-list-->
                <div class="clear"></div>
            </div><!--//box-media-->
        </div><!--//col-left-->
        @include('frontend.cagaileo.right')
        <div class="clear"></div>
    </div><!--//layout-home-->
    <div class="clear"></div>
</section>

@endsection