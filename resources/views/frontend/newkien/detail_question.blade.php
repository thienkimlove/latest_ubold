@extends('frontend.newkien.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <div class="steps">
                <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ" target="_blank">Trang chủ</a></h2>
                <span>|</span>
                <h3 class="rs"><a href="{{url('cau-hoi-thuong-gap')}}" title="Hỏi đáp">Hỏi đáp chuyên gia</a></h3>
                <span>|</span>
                <h4>{{$mainQuestion->title}}</h4>
            </div>
            <div class="col-left contact-content">
                <div class="box-faq-detail">
                    @if ($mainQuestion)
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
                    @endif
                    <ul class="listButton rs">
                        <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                <img src="http://www.giaidocgan.vn/frontend/images/diem-ban-green-3.png" alt="Điểm bán sản phẩm" width="244" height="74">
                            </a></li>
                        <li class="icall rs"><a href="tel:0912571190">
                                <img src="http://www.giaidocgan.vn/frontend/images/tu-van-green-3.png" alt="Tư vấn miễn phí" width="244" height="74">
                            </a></li>
                    </ul>
                    @foreach ($middleIndexBanner as $banner)
                        <div class="ads">
                            <a href="javascript:void(0)" title="Quảng cáo" target="_blank">
                                <img src="{{url('files/'.$banner->image)}}" alt="" class="imgFull" width="658" height="136">
                            </a>
                        </div>
                    @endforeach
                    <div class="box-tags">
                        <span>Từ khóa: </span>
                        <a href="" title="">Thuốc diệt chuột</a>
                        <a href="" title="">Thuốc tốt</a>
                        <a href="" title="">Thuốc hay</a>
                        <a href="" title="">Thuốc diệt chuột</a>
                        <a href="" title="">Thuốc tốt</a>
                        <a href="" title="">Thuốc hay</a>
                        <a href="" title="">Thuốc diệt chuột</a>
                        <a href="" title="">Thuốc tốt</a>
                        <a href="" title="">Thuốc hay</a>
                    </div>
                    <div class="news-bt">
                        <div class="box-usual-ques">
                            <h3 class="global-title">
                                <a href="#"> TIN LIÊN QUAN</a>
                            </h3>
                            <div class="box-bd">
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="box-usual-ques">
                            <h3 class="global-title">
                                <a href="#">TIN MỚI</a>
                            </h3>
                            <div class="box-bd">
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                                <div class="item cf item-r">
                                    <h3>
                                        <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-bt">
                        <img src="images/social.jpg" alt="" width="341" height="24" class="imgFull">
                    </div>
                    <div class="comment-post">
                        <div class="fb-comments" data-href="https://www.facebook.com/tuelinh.vn" data-numposts="2" data-width="100%"></div>
                    </div>
                </div>
            </div><!--//col-left-->
            @include('frontend.newkien.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>

@endsection