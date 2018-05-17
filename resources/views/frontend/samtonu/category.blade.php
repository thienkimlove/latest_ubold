@extends('frontend.samtonu.frontend')

@section('content')
    <div class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url($category->slug)}}" title="{{$category->name}}">{{$category->name}}</a></h3>
                    </div>
                    <div class="list-news">
                        <div class="news">
                            @foreach ($posts as $post)
                                <div class="post post-news">
                                <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title thumbs" style="background-image: url({{url('files/'.$post->image)}})">
                                    <img src="{{url('files/'.$post->image)}}" alt="" width="280" height="195">
                                </a>
                                <div class="right">
                                    <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                        {{$post->title}}
                                    </a>
                                    <div class="sumary">
                                      {{$post->desc}}
                                    </div>
                                    <a href="{{url($post->slug.'.html')}}" class="view-detail" title="Xem chi tiết">Xem chi tiết >></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <ul class="pagination">
                            @include('frontend.samtonu.pagination', ['paginate' => $posts])
                        </ul>
                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>
@endsection