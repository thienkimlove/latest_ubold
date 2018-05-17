@extends('frontend.samtonu.frontend')

@section('content')
    <div class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('cau-hoi-thuong-gap')}}" title="Hỏi đáp">Hỏi đáp</a></h3>
                    </div>
                    <div class="contact-content">
                        <div class="box-intro">
                            <div class="some-intro">
                                <div class="pro-img">
                                    <img src="{{url('frontend/samtonu/images/img-chuyengia.png')}}" alt="" width="206" height="199">
                                </div>
                                <div class="text">
                                    Vui lòng gọi điện đến tổng đài tư vấn miễn cước 1800 1190 để được các Dược sĩ nhiều
                                    năm kinh nghiệm tư vấn trực tiếp.
                                    <br>
                                    Hoặc gửi câu hỏi cho ThS. BSCK II. Lê Thanh Thúy - Nguyên phó giám đốc bệnh viện Phụ Sản Hà Nội để được chuyên gia trả lời các thắc mắc của bạn <br>
                                    Việc đọc trước những câu hỏi sẽ tiết kiệm thời gian cho bạn. <br>
                                    Ngại gọi điện? Vui lòng để lại số điện thoại, chúng tôi sẽ liên lạc lại cho bạn.
                                    <br>
                                    <div class="form-get-phone">
                                        <input id="phone_value" type="number" placeholder="Số điện thoại" class="get-phone">
                                        <button id="send_phone_button">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{url('saveContact')}}" id="contact" method="POST">
                            <div class="form-row">
                                <label for="name">Họ và tên</label>
                                <input type="text" id="contact_name" name="name" placeholder="Nhập họ và tên" required>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                            </div>
                            <div class="form-row">
                                <label for="phone">Điện thoại</label>
                                <input type="tel" id="contact_phone" name="phone" placeholder="Nhập số điện thoại" required>
                            </div>
                            <div class="form-row">
                                <label for="email">Email</label>
                                <input type="email" id="contact_email" name="email" placeholder="Nhập email" required>
                            </div>
                            <div class="form-row">
                                <label for="title">Tiêu đề</label>
                                <input type="text" id="contact_title" name="title" placeholder="Nhập tiêu đề" required>
                            </div>
                            <div class="form-row">
                                <label for="content">Câu hỏi</label>
                                <textarea name="content" id="contact_content" cols="30" rows="10"
                                          placeholder="Nhập câu hỏi"></textarea>
                            </div>
                            @if (isset($success_delivery_form_message) && $success_delivery_form_message)
                                <div class="error" id="delivery_form_message">Bạn đã gửi thông tin thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất. Cảm ơn bạn.</div>
                            @else
                                <div class="error" id="delivery_form_message" style="display: none"></div>
                            @endif
                            <div class="contain-btn form-row">
                                <button id="delivery_form_submit" type="button">Gửi</button>
                                <button id="delivery_form_reset" type="reset">Nhập lại</button>
                            </div>
                        </form>
                        <div class="box-faq">
                            @foreach ($questions as $question)
                                <article class="item">
                                <h3 class="title-faq">
                                    <img src="{{ url('files/'.$question->image) }}" alt="" width="58" height="58" class="faq-icon">
                                    <div class="title-ques">
                                        <strong class="text">{{$question->title}}</strong> <br>
                                        <i class="normal">Hỏi bởi: {{$question->person}}</i>
                                    </div>
                                </h3>
                                <div class="content">
                                    <p>
                                          <span>
                                          {{$question->question}}
                                          </span>
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
                                            <img src="http://www.samtonu.vn/frontend/samtonu/images/bs-img.jpg" alt="" width="58" height="58" class="faq-icon">
                                            <div class="text">
                                                {{$question->short_answer}}
                                            </div>
                                            <a href="{{url('cau-hoi-thuong-gap', $question->slug)}}" class="viewMore">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            @include('frontend.samtonu.pagination', ['paginate' => $questions])
                        </div>
                    </div>
                </div>
                @include('frontend.samtonu.right')
            </div>
        </div>
    </div>
@endsection


@section('frontend_script')
    <script>
        $(function(){
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();

                var name = $('#contact_name').val();
                var email = $('#contact_email').val();
                var phone = $('#contact_phone').val();
                var title = $('#contact_title').val();
                var content = $('#contact_content').val();

                if (!name || !email || !phone || !title || !content) {
                    $('#delivery_form_message').html('Bạn vui lòng điền đầy đủ các thông tin').show();
                } else {
                    $('#contact').submit();
                }

                return false;
            });

            $('#delivery_form_reset').click(function(e){
                e.preventDefault();
                $('#contact').reset();
                return false;
            });

            $('#send_phone_button').click(function(e){
                e.preventDefault();
                $('#contact_name').val('N/A');
                $('#contact_title').val('Gửi số điện thoại trang hỏi đáp');
                $('#contact_content').val('Gửi số điện thoại trang hỏi đáp');
                $('#contact_phone').val($('#phone_value').val());
                $('#contact_email').val('N/A');
                $('#contact').submit();
                return false;
            });
        });
    </script>

@endsection