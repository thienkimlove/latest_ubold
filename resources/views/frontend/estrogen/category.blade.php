@extends('frontend.estrogen.frontend')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url( $category->slug)}}" title="Video">{{$category->name}}</a></h3>
                    </div>
                    <div class="list-news">
                        <div class="news">
                            @foreach ($posts as $post)
                                <div class="post post-news">
                                <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title thumbs" style="background-image: url({{url('files', $post->image)}})">
                                    <img src="{{url('files', $post->image)}}" alt="" width="276" height="157">
                                </a>
                                <div class="right">
                                    <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                        {{$post->title}}
                                    </a>
                                    <div class="sumary">
                                        {{str_limit($post->desc, 150)}}
                                    </div><br />
                                    <a href="{{url($post->slug.'.html')}}" class="view-detail" title="Xem chi tiết">Xem chi tiết >></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @include('frontend.estrogen.pagination', ['paginate' => $posts])
                        @include('frontend.estrogen.list_button')
                    </div>
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection