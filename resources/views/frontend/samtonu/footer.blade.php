<div class="" id="scrollPoint"></div>
<footer class="pr" id="footer">
    <div class="top">Bổ sung nội tiết - Căng tràn sức xuân</div>
    <div class="content fixCen">
        <div class="left">
            <a href="{{url('sam-to-nu')}}"  title="Sâm tố nữ">Sâm tố nữ</a>
            <a href="{{url('sam-to-nu')}}"  title="Sâm nhung tố nữ Tuệ Linh">Sâm nhung tố nữ Tuệ Linh</a>
            <a href="{{ url('danh-gia-tac-dung') }}"  title="Đánh giá tác dụng">Đánh giá tác dụng</a>
            <a href="{{ url('su-kien-nhan-hang') }}"  title="Sự kiện nhãn hàng">Sự kiện nhãn hàng</a>
        </div>
        <div class="center">
            Ngại gọi điện ? vui lòng để lại số điện thoại, chúng tôi sẽ liên lạc lại với bạn.

            {!! Form::open(array('url' => 'saveContact', 'class' => 'getPhone', 'id' => 'form_footer')) !!}
                <input type="text" name="phone" placeholder="Nhập số điện thoại của bạn">
                <input type="hidden" name="title" value="Nhập số điện thoại tại footer" />
                <input type="hidden" name="name" value="N/A" />
                <input type="hidden" name="email" value="N/A" />
                <input type="hidden" name="content" value="Nhập số điện thoại tại footer" />
                <button id="send_phone" class="getPhone-btn">Gửi</button>
            {!! Form::close() !!}


        </div>
        <div class="right">
            <a href="tel:18001190" title="Gọi 1800 1190">
                <img src="{{url('frontend/samtonu/images/img-tuvan.jpg')}}" alt="">
            </a>
            <a href="{{url('phan-phoi')}}" title="Điểm bán" >
                <img src="{{url('frontend/samtonu/images/img-diemban.jpg')}}" alt="">
            </a>
        </div>
    </div>
</footer>
<div class="left-banner-fixed pa scrollPage">
    @foreach ($sliderLeftBanners as $banner)
    <a href="{{ $banner->url }}"  >
        <img src="{{url('files/'.$banner->image)}}" alt="" class="imgFull">
    </a>
    @endforeach
</div>
<div class="right-btns-fixed pa scrollPage">
    <a href="https://www.facebook.com/samtonu.vn" class="fb-btn" target="_blank"><img src="{{url('frontend/samtonu/images/icon-fb.jpg')}}" alt=""></a>
    <a href="tel:18001190" class="phone-btn"><img src="{{url('frontend/samtonu/images/icon-hotline.jpg')}}" alt=""></a>
    <a href="{{url('phan-phoi')}}" class="cart-btn" target="_blank"><img src="{{url('frontend/samtonu/images/icon-cart.jpg')}}" alt=""></a>
</div>
<a href="javascript:void(0)" class="goTop-btn px" title="Lên đầu trang" onclick="$('html,body').animate({scrollTop: 0},500)">
    <img src="{{url('frontend/samtonu/images/btn-top.jpg')}}" alt="">
</a>