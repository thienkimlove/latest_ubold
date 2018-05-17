@extends('frontend.samtonu.frontend')

@section('content')
    <div class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('phan-phoi')}}" title="Phân phối">Phân phối</a></h3>
                        <span>|</span>
                        <h4>{{$province->name}}</h4>
                    </div>
                    <div class="delivery-detail">
                        <h3 class="note-pp-chitiet">
                            Danh sách đại lý, nhà thuốc phân phối tại <span class="district">{{$province->name}}</span> <br>
                            Để mua sản phẩm tại các tỉnh thành khác, vui lòng click: <a href="{{url('phan-phoi')}}" title="Điểm bán hàng toàn quốc">ĐIỂM BÁN HÀNG TOÀN QUỐC</a>
                            <br>
                            Các nhà thuốc được in đậm là các nhà thuốc chắc chắn còn hàng. Nếu không tìm thấy điểm bán hàng thuận tiện, hãy gọi đến Hotline (miễn cước)
                            1800 1190 để được hướng dẫn hoặc muốn mua hàng online thì xem <a href="#" title="Đặt hàng online">" TẠI ĐÂY "</a>
                        </h3>
                        <div class="pp-chitiet-content">
                            <div class="title">
                                <a href="{{url('phan-phoi')}}" title="Điểm bán hàng">ĐIỂM BÁN HÀNG</a> <br>
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
                                    <img src="{{url('frontend/samtonu/images/img-diemban3.jpg')}}" alt="Điểm bán sản phẩm" width="244" height="74">
                                </a></li>
                            <li class="icall rs"><a href="tel:18001190">
                                    <img src="{{url('frontend/samtonu/images/img-tuvan3.jpg')}}" alt="Tư vấn miễn phí" width="244" height="74">
                                </a></li>
                        </ul>
                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>
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