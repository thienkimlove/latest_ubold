@extends('frontend.cagaileo.frontend')

@section('content')
    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li><a href="{{url('phan-phoi')}}">Phân phối</a></li>
                <li>{{config('delivery')['city'][$delivery->city]}}</li>
            </ul>
            <div class="col-left">
                <div class="box-uses">
                    <article class="detail delivery-detail">
                        <h3 class="note-pp-chitiet">
                            Danh sách đại lý, nhà thuốc phân phối tại <span class="district">{{config('delivery')['city'][$delivery->city]}}</span> <br>
                            Để mua sản phẩm tại các tỉnh thành khác, vui lòng click: <a href="{{url('phan-phoi')}}" title="Điểm bán hàng toàn quốc" target="_blank">ĐIỂM BÁN HÀNG TOÀN QUỐC</a>
                            <br>
                            Các nhà thuốc được in đậm là các nhà thuốc chắc chắn còn hàng. Nếu không tìm thấy điểm bán hàng thuận tiện, hãy gọi đến Hotline (miễn cước)
                            1900 4682 để được hướng dẫn hoặc muốn mua hàng online thì xem <a href="#" title="Đặt hàng online">" TẠI ĐÂY "</a>
                        </h3>
                        <div class="pp-chitiet-content">
                            <div class="title">
                                <a href="{{url('phan-phoi')}}" title="Điểm bán hàng" target="_blank">ĐIỂM BÁN HÀNG</a> <br>
                                <span>Mời Quý khách chọn Quận/ Huyện để xem điểm bán Giải Độc Gan</span>
                            </div>
                            <div class="choose-dis">
                                <select name="" id="">
                                    <option value="0">Chọn Quận/ Huyện</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Hà Nội</option>
                                </select>
                            </div>
                            <div class="show-name-store">
                                {!! $delivery->content !!}
                            </div>
                        </div>
                        <ul class="listButton rs">
                            <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                    <img src="http://www.cagaileo.vn/files/cc2d746ed56741370dcaa755ca9266ff.png" alt="Điểm bán sản phẩm" width="244" height="74">
                                </a></li>
                            <li class="icall rs"><a href="tel:0912571190">
                                    <img src="http://www.cagaileo.vn/files/dd3310aebde5ad4ea5a769601ad19604.png" alt="Tư vấn miễn phí" width="244" height="74">
                                </a></li>
                        </ul>
                    </article>
                    <div class="social-follow">
                        <div class="fb-share-button" data-href="{{url('phan-phoi', $delivery->id)}}" data-layout="button_count" data-mobile-iframe="true"></div>
                    </div>
                    <div class="comment-post">
                        <div class="fb-comments" data-href="{{url('phan-phoi', $delivery->id)}}" data-numposts="5"></div>
                    </div>
                </div>
            </div><!--//col-left-->
            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>
@endsection