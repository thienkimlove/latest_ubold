<footer class="footer" id="footer">
    <div class="infoFooter">
        <div class="fix">

            <div class="col-03">
                <h3>Hỗ trợ khách hàng</h3>
                <ul class="list-support">
                    <li><a href="{{ route('frontend.delivery') }}" target="_blank">Các bệnh về gan</a></li>
                    <li><a href="{{ route('frontend.question') }}" target="_blank">Những câu hỏi thường gặp</a></li>
                    <li><a href="{{ url('phuong-thuc-thanh-toan.html') }}" target="_blank">Phương thức thanh toán</a></li>
                    <li><a href="{{ url('cach-dat-hang-truc-tuyen.html') }}" target="_blank">Hướng dẫn đặt hàng</a></li>
                    <li><a href="{{ url('giao-nhan-hang.html') }}" target="_blank">Giao nhận hàng</a></li>
                    <li><a href="{{ url('huong-dan-doi-tra.html') }}" target="_blank">Hướng dẫn đổi trả hàng</a></li>
                </ul>
            </div>

            <div class="col-03">
                <h3>Liên hệ</h3>
                <div class="list-contact">
                    <p>
                        <strong>Tại Hà Nội</strong> <br>
                        ĐT: 024.62824344 <br>
                        Fax: 024.62824263 <br>
                        Đường dây nóng: 1800.1190. <br>
                    </p>
                    <p>
                    <br>
                        <strong>Chi nhánh TP. HCM</strong> <br>
                        ĐT: 0283.9797779 <br>
                        Fax: 0286.2646832 <br>
                        Đường dây nóng: 1800.1190. <br>
                    </p>
                </div>
            </div>

            <div class="col-03">
                <div class="reg-sale">
                    <h3>
                        Đăng ký nhận tin
                        <p>Điền ngay email của bạn để nhận những thông tin hữu ích của chúng tôi</p>
                    </h3>
                    {!! Form::open(array('url' => 'saveContact')) !!}
                        <input type="text" name="email" placeholder="Nhập địa chỉ email">
                        <input type="hidden" name="title" value="Email đăng ký nhận khuyến mại" />
                        <input type="hidden" name="name" value="N/A" />
                        <input type="hidden" name="phone" value="N/A" />
                        <input type="hidden" name="content" value="Email đăng ký nhận khuyến mại" />
                        <button class="btn-send">Gửi</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="boxFooter clearFix">
            <div class="areaSocial">
                <ul class="listSocial clearFix">
                    <li><a href="https://www.google.com.vn/?gfe_rd=cr&ei=itHMV-DHNrPY8gfOkrLACA#q=gi%E1%BA%A3i+%C4%91%E1%BB%99c+gan+tu%E1%BB%87+linh" target="_blank" class="se">Search</a></li>
                    <li><a href="https://www.youtube.com/playlist?list=PL6cgnq2l30jJhdUO50sOlMv3adPJ306R1" target="_blank" class="yu">Youtube</a></li>
                    <li><a href="https://www.facebook.com/viemgan.com.vn/" target="_blank" class="sk">Skype</a></li>
                    <li><a href="https://www.facebook.com/viemgan.com.vn/" target="_blank" class="go">googleplus</a></li>
                </ul>
            </div>
            <div class="areaLink">
                <ul class="listCategory clearFix">
                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                    @foreach ($footerCategories as $category)
                        <li><a href="{{url($category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                    <li><a href="{{url('cau-hoi-thuong-gap')}}">CÂU HỎI THƯỜNG GẶP</a></li>
                    <li><a href="{{url('lien-he')}}">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyRight">
        <div class="container">
            <p class="copy">HỖ TRỢ ĐIỀU TRỊ VIÊM GAN VI RÚT, ĐIỀU TRỊ MEN GAN CAO, XƠ GAN<br />
            © 2016 VUI LÒNG GHI RÕ NGUỒN KHI SỬ DỤNG NỘI DUNG TỪ WEBSITE NÀY.</p>
      </div>
    </div>
</footer>