@extends('frontend.estrogen.frontend')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('cau-hoi-thuong-gap')}}" title="Hỏi đáp">Hỏi đáp</a></h3>
                    </div>
                    <div class="contact-content">

                        @include('frontend.estrogen.form_get_phone', ['is_full' => false])

                        <div class="box-faq">
                            @foreach ($questions as $question)
                                <article class="item">
                                <h3 class="title-faq">
                                    <img src="{{url('files', $question->image)}}" alt="" width="58" height="58" class="faq-icon">
                                    <div class="title-ques">
                                        <strong class="text"><a href="{{url('cau-hoi-thuong-gap', $question->slug)}}" class="text">{{$question->title}}</a></strong> <br>
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
                                              {{$question->created_at->format('Y/m/d')}}
                                            </span>
                                            <span>
                                             {{$question->created_at->format('H:i:s')}}
                                            </span>
                                        </div>
                                        <span class="answer">Trả lời</span>
                                        <div class="answer-faq">
                                            <img src="{{url('frontend/estrogen/images/bs-img.jpg')}}" alt="" width="58" height="58" class="faq-icon">
                                            <div class="text">
                                                {{$question->short_answer}}
                                            </div>
                                            <a href="{{url('cau-hoi-thuong-gap', $question->slug)}}" class="viewMore">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                            @include('frontend.estrogen.pagination', ['paginate' => $questions])
                        </div>
                    </div>
                    @include('frontend.estrogen.list_button')
                </div>
                @include('frontend.estrogen.right_normal')
            </div>
        </div>
        @include('frontend.estrogen.exp')
    </section>
@endsection