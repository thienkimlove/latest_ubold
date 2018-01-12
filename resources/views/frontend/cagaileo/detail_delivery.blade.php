@extends('frontend.cagaileo.frontend')

@section('content')
    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li><a href="{{url('phan-phoi')}}">Phân phối</a></li>
                <li>{{$province->name}}</li>
            </ul>
            <div class="col-left">
                <div class="box-uses">
                    <article class="detail delivery-detail">
                        <h3 class="note-pp-chitiet">
                            Danh sách đại lý, nhà thuốc phân phối tại <span class="district">{{$province->name}}</span> <br>
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
                                <select name="district_id" id="district_id">
                                    <option value="0">Chọn Quận/ Huyện</option>
                                    @foreach ($province->districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="show-name-store" id="show_store">

                            </div>
                        </div>
                        <ul class="listButton rs">
                            <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                    <img src="{{ url('frontend/cagaileo/images/diem-ban.png') }}" alt="Điểm bán sản phẩm" width="244" height="74">
                                </a></li>
                            <li class="icall rs"><a href="tel:0912571190">
                                    <img src="{{ url('frontend/cagaileo/images/phan-phoi.png') }}" alt="Tư vấn miễn phí" width="244" height="74">
                                </a></li>
                        </ul>
                    </article>
                    <div class="social-follow">
                        <div class="fb-share-button" data-href="{{url('phan-phoi', $province->slug)}}" data-layout="button_count" data-mobile-iframe="true"></div>
                    </div>
                    <div class="comment-post">
                        <div class="fb-comments" data-href="{{url('phan-phoi', $province->slug)}}" data-numposts="5"></div>
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
        function getStore() {
            var  district_id = $('#district_id').val();
            $('#show_store').html('');
            if (district_id) {
                $.get('/ajaxStore', { 'district_id' : district_id }, function(res){
                    $('#show_store').html(res.html);
                });
            }
        }
        $(function(){
            getStore();
            $('#district_id').change(function(){
                getStore();
                return false;
            });
        });
    </script>
@endsection