@extends('frontend.cagaileo.frontend')
@section('content')
    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li>Sản phẩm chi tiết</li>
            </ul>
            <div class="col-left">
                <div class="product-detail cf">
                    <div class="img-intro">
                        <div class="img-product">
                            <div class="img-thumb">
                                <a href="{{url('files', $product->image)}}" target="_blank">Xem ảnh lớn</a>
                                <a href="">
                                    <img src="{{url('img/cache/200x200', $product->image)}}" alt="">
                                </a>
                            </div>
                        </div>
                        @foreach ($advProduct as $adv)
                            <div class="adv-product">
                                <img src="{{url('files', $adv->image)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="product-desc">
                        <h3>{{$product->title}}</h3>
                        <p class="rate-product">
                            Đánh giá tổng quát - <span>1 Nhận xét</span> | <a href="#">Them nhan xet cua ban</a>
                        </p>
                        <p><span class="tit-product">Công dụng:</span>{{\App\Lib\Helpers::getProductDetails($product, 'congdung')}}</p>
                        <p><span class="tit-product">Xuất xứ</span>{{\App\Lib\Helpers::getProductDetails($product, 'xuatxu')}}</p>
                        <p><span class="tit-product">Giấy phép</span>{{\App\Lib\Helpers::getProductDetails($product, 'giayphep')}}</p>
                        <p><span class="tit-product">Quy cách</span>{{\App\Lib\Helpers::getProductDetails($product, 'quycach')}}</p>
                        <p><span class="tit-product">Tình trạng</span>{{\App\Lib\Helpers::getProductDetails($product, 'tinhtrang')}}</p>
                        <p>
                            <span class="tit-product">Giá cũ</span>
                            <span class="old-price">{{\App\Lib\Helpers::getProductDetails($product, 'giacu')}}</span>
                        </p>
                        <p>
                            <span class="tit-product">Giá mới</span>
                            <span class="new-price">{{\App\Lib\Helpers::getProductDetails($product, 'giamoi')}}</span>
                        </p>
                        <p>
                            <span class="tit-product">Số lượng</span>
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </p>
                        <p class="buy-product">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSchHSToVoSGwbqz9SM1rZHhh_8m17edRTIkEdu_U8ahIBKW-g/viewform" target="_blank" class="btn-buy">Mua ngay</a>
                            <a class="guide">Hướng dẫn mua hàng</a>                        </p>
                        <div class="consult">
                            <p>Dược sỹ tư vấn: <span class="phone">0912571190</span></p>
                            <p class="enter-number">Ngại gọi điện? Vui lòng nhập số điện thoại.</p>
                            <p>
                                <input id="send_phone_value" type="number" placeholder="Số điện thoại" class="get-phone">
                                <button id="send_phone" class="btn-send">Gửi</button>
                            </p>
                            <div id="contact" style="display: none">
                                {!! Form::open(array('url' => 'saveContact', 'id' => 'form_contact_page')) !!}
                                <div class="form-row">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" id="contact_name" name="name" class="txt txt-name" placeholder="Nhập họ và tên"/>
                                </div>
                                <div class="form-row">
                                    <label for="phone">Điện thoại</label>
                                    <input type="number" id="contact_phone" name="phone" class="txt txt-phone" placeholder="Nhập số điện thoại"/>
                                </div>
                                <div class="form-row">
                                    <label for="email">Email</label>
                                    <input type="email" id="contact_email" name="email" class="txt txt-email" placeholder="Nhập email"/>
                                </div>
                                <div class="form-row">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" id="contact_title" name="title" placeholder="Nhập tiêu đề" required>
                                </div>
                                <div class="form-row">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="contact_content" class="txt txt-content" placeholder="Nhập nội dung" cols="30" rows="10"></textarea>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-uses">
                    <ul class="news-type bgList">
                        <li class="active">
                            <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-infoproduct" data-parent="news-type" data-reset="news-home" title="Nghiên cứu lâm sàng">
                                Thông tin sản phẩm</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-research01" data-parent="news-type" data-reset="news-home" title="Nghiên cứu lâm sàng">
                                Nhận biết bao bì</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" rel="nofollow" data-type="tab" data-content="tab-video" data-parent="news-type" data-reset="news-home" title="Video">
                                Hướng dẫn sử dụng
                            </a>
                        </li>
                    </ul><!--//news-type-->
                    <div class="news-home" id="tab-infoproduct" style="display: block">
                        <article class="detail">
                        {!! $product->content_tab1 !!}
                        <!-- //listButton -->
                            @include('frontend.cagaileo.social')
                        </article>
                    </div><!--//news-list-->
                    <div class="news-home" id="tab-research01">
                        <article class="detail">
                            {!! $product->content_tab2 !!}
                            @include('frontend.cagaileo.social')
                        </article>
                    </div><!--//news-list-->
                    <div class="news-home" id="tab-video">
                        <article class="detail">
                            {!! $product->content_tab3 !!}
                            @include('frontend.cagaileo.social')
                        </article>
                    </div><!--//news-list-->

                </div>
                <div class="box-hots">
                    <div class="title">
                        <h3 class="global-title">
                            <a href="#"><span>Sản phẩm hot</span></a>
                        </h3>
                    </div>
                    <div class="slide-hots">
                        <div class="owl-carousel" id="slide-hots">
                            @foreach ($hotProducts as $hotPro)
                                <div class="item">
                                    <a class="thumb" href="{{url('product', $hotPro->slug)}}" title="">
                                        <img src="{{url('img/cache/188x188', $hotPro->image)}}"/>
                                    </a>
                                    <h3><a href="{{url('product', $hotPro->slug)}}">{{$hotPro->title}}</a></h3>
                                    <!-- <div class="info-price">

                                    </div> -->
                                    <div class="info-price">
                                        <p class="price discount">{{\App\Lib\Helpers::getProductDetails($hotPro, 'giacu')}}</p>
                                        <p class="price">{{\App\Lib\Helpers::getProductDetails($hotPro, 'giamoi')}}</p>
                                    </div>
                                    <p class="buy"><a href="{{url('product', $hotPro->slug)}}" class="buy-now">Mua ngay</a></p>
                                    <div class="rate-star">
                                        <div style="width: 100%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!--//col-left-->
            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>
@endsection

@section('frontend_script')
    <script>
        $(function(){
            $('#send_phone').click(function(e){
                e.preventDefault();

                var phone = $('#send_phone_value').val();

                $('#contact_email').val('contact@cagaileo.vn');
                $('#contact_phone').val(phone);
                $('#contact_name').val('N/A');
                $('#contact_title').val('Để lại số ĐT trên trang san pham');
                $('#contact_content').val('Để lại số ĐT trên trang san pham');

                $('form#form_contact_page').submit();

                return false;
            });
        });
    </script>

@endsection
