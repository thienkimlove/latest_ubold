@extends('frontend.cagaileo.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <div class="col-left left-content">
                <!-- BoxContact -->
                <ul class="breadcrumbs cf">
                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                    <li>Liên hệ</li>
                </ul>
                <div class="contact-content">
                    <div class="box-intro">
                        <div class="some-intro">
                            <div class="pro-img">
                                <img src="http://www.giaidocgan.vn/frontend/images/bs-img.jpg" alt="" width="206" height="199">
                            </div>
                            <div class="text">
                                Vui lòng gọi điện đến tổng đài tư vấn miễn cước 1800 1258 để được các Dược sĩ nhiều năm kinh nghiệm tư vấn trực tiếp.
                                <br>
                                Hoặc gửi câu hỏi cho PGS.TS Bác sĩ Nguyễn Văn Mùi để được chuyên gia trả lời các thắc mắc của bạn <br>
                                Việc đọc trước những câu hỏi sẽ tiết kiệm thời gian cho bạn. <br>
                                Hoặc gửi câu hỏi cho PGS.TS Bác sĩ Nguyễn Văn Mùi để được chuyên gia trả lời các thắc mắc của bạn <br>
                                Việc đọc trước những câu hỏi sẽ tiết kiệm thời gian cho bạn. <br>
                                Ngại gọi điện? Vui lòng để lại số điện thoại, chúng tôi sẽ liên lạc lại cho bạn. <br>
                            </div>
                        </div>
                        <div class="form-get-phone">
                            <input id="send_phone_value" type="number" placeholder="Số điện thoại" class="get-phone">
                            <button id="send_phone">Gửi</button>
                        </div>
                    </div>
                    <div id="contact">
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
                        <div class="contain-btn form-row">
                            <button type="submit">Gửi đi</button>
                            <button type="reset">Nhập lại</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="address-group">
                        <strong>Tại Hà Nội</strong><br>
                        Tầng 5, tòa nhà 29T1, phố Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội. <br>
                        Điện thoại: (04) 62824263 <br>
                        Fax: 0426824263 <br> <br>
                        <strong>Chi nhánh Hồ Chí Mình</strong> <br>
                        156/17 Tô Hiến Thành - P15 - Quận 10, TP.HCM <br>
                        Điện thoại: (083) 9797779 <br>
                        Fax: 0862648632 <br>
                        Đường dây nóng: 0912571190
                    </div>
                    <div class="embed-ggmap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.483493048278!2d105.8014624!3d21.007829299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5a02fbb0f5%3A0x75b5e966c9fb8bc0!2zQ8O0bmcgdHkgVE5ISCBUdeG7hyBMaW5o!5e0!3m2!1svi!2s!4v1441615369587" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <ul class="listButton rs">
                        <li class="ilocal rs"><a href="{{url('phan-phoi')}}">
                                <img src="http://www.giaidocgan.vn/frontend/images/diem-ban-green-3.png" alt="Điểm bán sản phẩm" width="244" height="74">
                            </a></li>
                        <li class="icall rs"><a href="tel:0912571190">
                                <img src="http://www.giaidocgan.vn/frontend/images/tu-van-green-3.png" alt="Tư vấn miễn phí" width="244" height="74">
                            </a></li>
                    </ul>
                </div>
                <!-- EndBoxContact -->
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
               $('#contact_title').val('Để lại số ĐT trên trang liên hệ');
               $('#contact_content').val('Để lại số ĐT trên trang liên hệ');

               $('form#form_contact_page').submit();

                return false;
            });
        });
    </script>

@endsection
