@extends('frontend.hoaxuan.frontend')

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


                </div>
            </div><!--//col-left-->
            @include('frontend.hoaxuan.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>
@endsection