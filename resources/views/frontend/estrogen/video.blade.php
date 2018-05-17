@extends('frontend.estrogen.frontend')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('video')}}" title="Video">Video</a></h3>
                    </div>
                    <div class="video-content">
                        @if ($mainVideo)
                        <div class="video" id="bigVideo">

                            <iframe src="{{\App\Lib\Helpers::getYoutubeEmbedUrl($mainVideo->url)}}" frameborder="0" allowfullscreen width="720" height="425"></iframe>
                        </div>
                        @endif
                        <div class="thumb-video">
                            @foreach ($videos as $video)
                            <a href="{{url('video', $video->slug)}}" title="{{$video->title}}">
                                {{--<img src="{{url('files/images', $video->image)}}" alt="" width="190" height="129" class="imgFull">--}}
                                <iframe src="{{\App\Lib\Helpers::getYoutubeEmbedUrl($video->url)}}" frameborder="0" allowfullscreen width="329" height="224"></iframe>
                                <span class="title">{{$video->title}}</span>
                                <span class="view-count">
                                    Lượt xem {{$video->views}}
                                </span>
                            </a>
                            @endforeach
                        </div>
                        @include('frontend.estrogen.pagination', ['paginate' => $videos])
                    </div>
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection