@extends('frontend.cagaileo.frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <ul class="breadcrumbs cf">
                <li><a href="{{url('/')}}">Trang chủ</a></li>
                <li>Hỏi đáp chuyên gia</li>
            </ul>
            <div class="col-left contact-content">
                <div class="box-intro">
                    <div class="some-intro">
                        <div class="pro-img">
                            <img src="{{url('frontend/cagaileo/images/bs-img.jpg')}}" alt="" width="206" height="199">
                        </div>
                        <div class="text">
                            <strong>BẠN HỎI GIẢO SƯ TRẢ LỜI: </strong><br>Vui lòng để lại lời nhắn để được đội ngữ tư vấn giàu kinh nghiệm tư vấn trực tiếp.<br>
                              Để mua sản phẩm tại hiệu thuốc gần chỗ bạn nhất, vui lòng xem <a href="http://www.cagaileo.vn/phan-phoi">TẠI ĐÂY.</a><br>
                              Để mua hàng online – giao hàng, thu tiền tại nhà <a href="http://www.cagaileo.vn/phan-phoi"> ĐẶT HÀNG NGAY TẠI ĐÂY.</a>
                              <br>
                      </div>
                    </div>
                </div>
                <div id="contact">
                    <form action="{{url('saveContact')}}" id="order_online" method="POST">
                        <div class="form-row">
                            <label for="name">Họ và tên</label>
                            <input type="text" name="name" id="name" class="txt txt-name" placeholder="Nhập họ và tên"/>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                        </div>
                        <div class="form-row">
                            <label for="phone">Điện thoại</label>
                            <input type="number" name="phone" id="phone" class="txt txt-phone" placeholder="Nhập số điện thoại"/>
                        </div>
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="txt txt-email" placeholder="Nhập email"/>
                        </div>
                        <div class="form-row">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" placeholder="Nhập tiêu đề" required>
                        </div>
                        <div class="form-row">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" class="txt txt-content" placeholder="Nhập nội dung" cols="30" rows="10"></textarea>
                        </div>
                        <div class="contain-btn form-row">
                            <button id="delivery_form_submit" type="submit">Gửi đi</button>
                        </div>

                        @if (isset($success_delivery_form_message) && $success_delivery_form_message)
                            <div class="error" id="delivery_form_message">Bạn đã gửi thông tin thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất. Cảm ơn bạn.</div>
                        @else
                            <div class="error" id="delivery_form_message" style="display: none"></div>
                        @endif

                    </form>
                </div>
                <div class="box-faq">
                    @foreach ($questions as $question)
                        <article class="item">
                            <h3 class="title-faq">
                                <img src="http://www.giaidocgan.vn/files/59e5_HoiDap.png" alt="" width="58" height="58" class="faq-icon">
                                <div class="title-ques">
                                    <strong class="text"> {{$question->title}}</strong> <br>
                                    <i class="normal">Hỏi bởi: {{$question->person}}</i>
                                </div>
                            </h3>
                            <div class="content">
                                <p>
                                    <span>{{$question->question}}</span>
                                </p>

                                <div class="viewDetail clearFix">
                                    <div class="date">
                                        <span class="datePost">
                                          <time class="time" datetime="{{$question->updated_at->format('Y/m/d')}}">{{$question->updated_at->format('d/m/Y')}}</time>
                                        </span>
                                        <span>
                                         {{$question->created_at->format('H:i:s')}}
                                        </span>
                                    </div>
                                    <span class="answer">Trả lời</span>
                                    <div class="answer-faq">
                                        <img src="{{url('frontend/cagaileo/images/bs-img.jpg')}}" alt="" width="58" height="58" class="faq-icon">
                                        <div class="text">
                                            {{$question->answer}}
                                        </div>
                                        <a href="{{url('cau-hoi-thuong-gap', $question->slug)}}" class="viewMore">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    <!-- /paging -->
                    <div class="boxPaging">
                        @include('frontend.cagaileo.pagination', ['paginate' => $questions])
                    </div><!--//news-list-->
                </div>
            @foreach ($middleIndexBanner as $banner)
                <div class="box-banner">
                    <img src="{{url('files/'.$banner->image)}}" alt="">
                </div>
            @endforeach

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
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();

                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var title = $('#title').val();
                var content = $('#content').val();

                if (!name || !email || !phone || !title || !content) {
                    $('#delivery_form_message').html('Bạn vui lòng điền đầy đủ các thông tin').show();
                } else {
                    $('#order_online').submit();
                }

                return false;
            });
        });
    </script>

@endsection