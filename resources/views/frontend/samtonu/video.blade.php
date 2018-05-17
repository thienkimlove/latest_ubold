@extends('frontend.samtonu.frontend')

@section('content')

    <div class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{ url('/') }}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('video')}}" title="Video">Video</a></h3>
                    </div>
                    <div class="video-content">
                        @if (isset($mainVideo))
                            <div class="video" id="bigVideo">
                                <iframe src="{{$mainVideo->url}}" frameborder="0" allowfullscreen width="720" height="425"></iframe>
                            </div>
                        @endif


                        <div class="thumb-video">
                            @foreach ($videos as $video)
                            <a href="{{url('video/'.$video->slug)}}" title="{{$video->title}}">
                                <img src="{{ \App\Lib\Helpers::getYoutubeImage($video->url) }}" alt="" class="imgFull">
                                <span class="title">{{$video->title}}</span>
                                <span class="view-count">
                                    Lượt xem {{$video->views}}
                                </span>
                            </a>
                            @endforeach
                        </div>
                        @include('frontend.samtonu.pagination', ['paginate' => $videos])
                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>

@endsection