@extends('frontend.samtonu.frontend')

@section('content')
    <div class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url($post->category->slug)}}" title="{{$post->category->name}}">{{$post->category->name}}</a></h3>
                        <span>|</span>
                    </div>
                    <div class="detail-content pr">
                        <article class="detail">
                            <span class="detail-title">{{$post->title}}</span>
                            <div class="detail-tab-content">
                                <div class="content">
                                   {!! $post->content !!}
                                </div>
                            </div>
                        </article>
                        <ul class="listButton rs">
                            <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                    <img src="{{url('frontend/samtonu/images/img-diemban3.jpg')}}" alt="Điểm bán sản phẩm" width="244" height="74">
                                </a></li>
                            <li class="icall rs"><a href="tel:18001190">
                                    <img src="{{url('frontend/samtonu/images/img-tuvan3.jpg')}}" alt="Tư vấn miễn phí" width="244" height="74">
                                </a></li>
                        </ul>
                        <div class="ads">

                            @foreach ($middleIndexBanner as $banner)
                                <a href="{{$banner->url}}" title="Quảng cáo" >
                                    <img src="{{url('files/'.$banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                           
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($post->tags as $tag)
                                <a href="{{url('tag/'.$tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="social-bt">
                            <div class="addthis_native_toolbox"></div>
                        </div>
                        <div class="comment-post">
                            <div class="tabs tabComment">
                                <a href="javascript:void(0)" class="fb-tab active" title="Bình luận Facebook" data-content=".fb-cmt-content">Bình luận facebook</a>
                                <a href="javascript:void(0)" class="default-tab" title="Bình luận" data-content=".default-comments">Bình luận</a>
                            </div>
                            <div class="fb-cmt-content cmtContent active">
                                <div class="title">Ý kiến của bạn</div>
                                <div class="fb-comments" data-href="{{url($post->slug.'.html')}}" data-numposts="2" data-width="450px, 100%"></div>
                            </div>
                            <div class="default-comments cmtContent">
                                <div class="title">Bình luận về bài viết</div>
                                <div class="content">
                                    @foreach (\App\Lib\Helpers::getCommentByContentId($post->id, 'posts') as $comment)
                                        <div class="old-cmt">
                                            <div class="name">{{$comment->name}} đã bình luận</div>
                                            <div class="date">{{$comment->created_at->toDateTimeString()}}</div>
                                            <div class="cmt-content">{{$comment->content}}</div>
                                            <a href="javascript:void(0)" class="your-answer-btn" title="Trả lời">Trả lời</a>
                                        </div>
                                    @endforeach
                                    <div class="new-cmt">
                                        <div class="title">Ý kiến của bạn</div>
                                        {!! Form::open(array('url' => 'saveComment', 'class' => 'cmt-form', 'id' => 'post_detail_comment_form')) !!}
                                            <input type="text" name="name" placeholder="Nhập tên của bạn">
                                            <input type="text" name="email" placeholder="Nhập email của bạn">
                                            <input type="hidden" name="content_id" value="{{$post->id}}">
                                            <input type="hidden" name="content_type" value="posts">
                                            <textarea name="content" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                                            <button id="post_detail_send_comment" class="send-cmt">Gửi bình luận</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block16 pr onsubPage">
                            <h3 class="globalTitle">Tin liên quan</h3>
                            <div class="content" id="block16_slider">
                                @foreach ($latestNews as $index => $rPost)
                                    <div class="item item{{$index+1}}">
                                        <a href="{{url($rPost->slug.'.html')}}" class="setBg" style="background: url({{url('files/'.$rPost->image)}})" >
                                            <img src="{{url('files/'.$rPost->image)}}" alt="" class="imgFull">
                                        </a>
                                        <a href="{{url($rPost->slug.'.html')}}" class="title"  title="{{$rPost->title}}">{{$rPost->title}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>
@endsection