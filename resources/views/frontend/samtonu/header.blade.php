<header class="pr">
    <div class="fixCen">
        <h1 class="logo pa">
            <a href="{{url('product/sam-to-nu')}}" title="Sâm tố nữ">
                <img src="{{url('frontend/samtonu/images/logo.png')}}" alt="">
            </a>
        </h1>
        <a href="javascript:void(0)" class="btnMenu btnClose"></a>
        <nav class="menuTop">
            <div class="left pr">

                <a href="{{url('/')}}" class="home-btn pa" title="Trang chủ" ><img src="{{url('frontend/samtonu/images/icon-home.png')}}" alt=""></a>

                <ul class="rs">
                    <li><a href="{{url('noi-tiet-to-nu')}}" title="Nội tiết tố nữ">Nội tiết tố nữ</a>
                        <ul class="subMenu pr">
                            <li><a href="{{url('hieu-dung-ve-noi-tiet-to-nu')}}" title="Hiểu đúng về nội tiết tố nữ" >Hiểu đúng về nội tiết tố nữ</a></li>
                            <li><a href="{{url('can-bang-noi-tiet-to-nu')}}" title="Cân bằng nội tiết tố nữ" >Cân bằng nội tiết tố nữ</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('thong-tin-khoa-hoc')}}"  title="Thông tin khoa học">Thông tin khoa học</a></li>
                    <li><a href="{{url('sam-to-nu')}}"  title="Sâm tố nữ">Sâm tố nữ</a>
                        <ul class="subMenu pr">
                            <li><a href="{{ url('thong-tin-duoc-lieu') }}" title="Thông tin dược liệu" >Thông tin dược liệu</a></li>
                            <li><a href="{{ url('nghien-cuu-lam-sang') }}" title="Nghiên cứu lâm sàng" >Nghiên cứu lâm sàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right pr">
                <ul class="rs">
                    <li><a href="{{ url('danh-gia-tac-dung') }}"  title="Đánh giá tác dụng">Đánh giá tác dụng</a>
                        <ul class="subMenu pr">
                            <li><a href="{{url('trai-nghiem-nguoi-dung')}}" title="Trải nghiệm người dùng" >Trải nghiệm người dùng</a></li>
                            <li><a href="{{url('y-kien-chuyen-gia')}}" title="Ý kiến chuyên gia" >Ý kiến chuyên gia</a></li>
                            <li><a href="{{url('cau-hoi-thuong-gap')}}" title="Hỏi đáp" >Hỏi đáp</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('su-kien-nhan-hang') }}" title="Sự kiện nhãn hàng">Sự kiện nhãn hàng</a>
                        <ul class="subMenu pr">
                            <li><a href="{{url('tin-tuc')}}" title="Tin tức">Tin tức</a></li>
                            <li><a href="{{url('video')}}" title="Video">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('phan-phoi')}}" title="">Phân phối</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="banner" id="slide_header">
    @foreach ($headerIndexBanners as $banner)
            <a href="javascript:void(0)" title=""><img src="{{url('files/'.$banner->image)}}" alt="" class="imgFull"></a>
    @endforeach
</div>