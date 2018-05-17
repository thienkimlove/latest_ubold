@extends('frontend.estrogen.frontend')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('cau-hoi-thuong-gap')}}" title="Hỏi đáp">Hỏi đáp</a></h3>
                        <span>|</span>
                        <h4>{{$mainQuestion->title}}</h4>
                    </div>
                    <div class="box-faq-detail">
                        <article class="detail">
                            <h3 class="title-faq">{{$mainQuestion->title}}</h3>
                            <div class="content">
                                <p>
                                   {{$mainQuestion->question}}
                                </p>
                                <div class="answer">Trả lời</div>
                                <div class="answer-faq">
                                   {!! $mainQuestion->answer !!}
                                </div>
                            </div>
                        </article>
                        @include('frontend.estrogen.list_button')
                        <div class="ads">
                            @foreach ($middleNormalBanner as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($mainQuestion->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        <div class="social-bt">
                            <div class='fb-like' data-action='like' data-href='{{url('cau-hoi-thuong-gap', $mainQuestion->slug)}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>
                        </div>
                        <div class="comment-post">
                            <div class="fb-comments" data-href="{{url('cau-hoi-thuong-gap', $mainQuestion->slug)}}" data-numposts="2" data-width="100%"></div>
                        </div>
                        </div>
                        <div class="news-bt">
                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#"> TIN LIÊN QUAN</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach ($mainQuestion->related_posts as $post)
                                       <div class="item cf item-r">
                                        <h3>
                                            <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                                        </h3>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#">TIN MỚI</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach (\App\Lib\Helpers::getLatestNormalPosts() as $post)
                                    <div class="item cf item-r">
                                        <h3>
                                            <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                                        </h3>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection