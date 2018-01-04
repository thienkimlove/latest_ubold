@extends('frontend.cagaileo.frontend')

@section('content')
    <section class="section fix">
        <div class="layout-home">
            <div class="col-left left-content">
                <!-- BoxContact -->
            <div class="box-dis">
                <div class="steps">
                    <h2 class="rs"><a href="/" title="Trang chủ">Trang chủ</a></h2>
                    <span>|</span>
                    <h3 class="rs"><a href="{{url('new_phanphoi')}}" title="Phân phối">Phân phối</a></h3>
                </div>
                <div class="delivery">
                    <h3 class="note-pp">
                        Để mua đúng sản phẩm chính hãng, Quý khách có thể thực hiện một trong những cách sau:
                    </h3>
                    <div class="note1 note">
                        <div class="title">
                            <span class="number">1</span>
                            Điền thông tin đặt hàng online - giao hàng, thu tiền tại nhà <a href="#">[ ĐẶT HÀNG NGAY ]</a>
                        </div>
                        {!! Form::open(array('url' => 'save_question')) !!}
                        <div  id="order_online">
                            <div class="row1">
                                <input type="text" name="ask_person" class="txt-name" placeholder="Họ tên">
                                <input type="text" name="ask_address" class="txt-add" placeholder="Địa chỉ">
                            </div>
                            <div class="row2">
                                <input type="text" name="ask_phone" class="txt-phone" placeholder="Điện thoại">
                                <select name="product">
                                    <option value="0">Chọn sản phẩm</option>
                                    <option value="1">Giải độc gan</option>
                                    <option value="1">Giải độc gan</option>
                                    <option value="1">Giải độc gan</option>
                                    <option value="1">Giải độc gan</option>
                                    <option value="1">Giải độc gan</option>
                                </select>
                            </div>
                            <div class="row3 btn-form">
                                <input type="text" name="question" class="txt-content" placeholder="Ghi chú">
                                <input type="number" placeholder="Số lượng" class="sl-onl"> <label for="">hộp</label>
                                <button class="btn-order-onl btn-submit" type="submit">ĐẶT MUA HÀNG</button>
                            </div>
                            <div class="error">Điền đầy đủ các thông tin</div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="note2 note">
                        <div class="title">
                            <span class="number">2</span>
                            Gọi tới tổng đài tư vấn và chăm sóc khách hàng <a href="tel:19006482">1900 6482</a> - <a href="tel:0912571190">0912 571 190</a>
                        </div>
                    </div>
                    <div class="note3 note">
                        <div class="title">
                            <span class="number">3</span>
                            Hoặc mua tại các nhà thuốc trên toàn quốc
                        </div>
                    </div>
                    <div class="slide-dis">
                        <div class="owl-carousel" id="slide-dis">
                            @foreach ($deliveryProducts as $product)
                                <div class="item">
                                    <a class="thumb" href="{{url('product', $product->slug)}}" title="">
                                        <img src="{{url('img/cache/93x93', $product->image)}}"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="places">
                        @foreach ($totalDeliveries as $area => $cities)
                            <div class="places1">
                                <span class="captain">{{$area}}</span>
                                <div class="provines">
                                    @foreach ($cities->chunk(6) as $partCities)
                                        @foreach ($partCities as $city)
                                            <a href="{{url('phan-phoi/'. $city->id)}}" title="{{config('delivery')['city'][$city->city]}}" target="_blank">{{config('delivery')['city'][$city->city]}}</a>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
                <!-- EndBoxContact -->
            </div><!--//col-left-->
            @include('frontend.cagaileo.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section><!--//section-->
@endsection