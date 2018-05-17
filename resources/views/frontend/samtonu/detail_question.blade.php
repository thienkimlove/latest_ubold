@extends('frontend.samtonu.frontend')

@section('content')
    <div class="body pr">
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
                                  {{$mainQuestion->answer}}
                                </div>
                            </div>
                        </article>
                        <ul class="listButton rs">
                            <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                    <img src="{{url('frontend/samtonu/images/img-diemban3.jpg')}}" alt="Điểm bán sản phẩm" width="244" height="74">
                                </a></li>
                            <li class="icall rs"><a href="tel:092571190">
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
                            @foreach ($mainQuestion->tags as $tag)
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
                                <div class="fb-comments" data-href="{{url('cau-hoi-thuong-gap', $mainQuestion->slug)}}" data-numposts="2" data-width="100%"></div>
                            </div>
                            <div class="default-comments cmtContent">
                                <div class="title">Bình luận về bài viết</div>
                                <div class="content">

                                    @foreach (\App\Lib\Helpers::getCommentByContentId($mainQuestion->id, 'questions') as $comment)
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
                                        <input type="hidden" name="content_id" value="{{$mainQuestion->id}}">
                                        <input type="hidden" name="content_type" value="questions">
                                        <textarea name="content" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                                        <button id="post_detail_send_comment" class="send-cmt">Gửi bình luận</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>
@endsection