<div class="right-content pr">
    <div class="most-readed on-top">
        <h3 class="globalTitle">
            <a href="#">TIN NỔI BẬT</a>
        </h3>
        <div class="box-bd boxHot">

            @foreach ($rightNormalPosts as $post)

                <div class="item cf">
                <a href="{{url($post->slug.'.html')}}" class="thumb">
                    <img src="{{url('files/'.$post->image)}}" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                </h4>
            </div>

            @endforeach

        </div>
    </div>
    <div class="box-adv">
        <a href="tel:1800 1190">
            <img src="{{url('frontend/samtonu/images/img-tuvan2.jpg')}}" alt="Tư vấn miễn phí">
        </a>
    </div>
    <div class="box-adv">
        <a href="{{url('phan-phoi')}}">
            <img src="{{url('frontend/samtonu/images/img-diemban2.jpg')}}" alt="Điểm bán sản phẩm" width="317" height="76">
        </a>
    </div>



    @if ($rightNormalVideos->count() > 0)
    <div class="box-video">
        <h3 class="globalTitle">
            <a href="{{url('video')}}">Góc video</a>
        </h3>
        <div class="box-bd video-group">
            @if ($firstVideo = $rightNormalVideos->shift())
                <div class="data">
                    <iframe width="100%" height="250" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                    <h3>

                    </h3>
                </div>
            @endif

            @if ($rightNormalVideos->count() > 0)
                <div class="item cf item-r">
                    @foreach ($rightNormalVideos as $video)
                        <h3><a href="{{url('video/'.$video->slug)}}">{{$video->title}}</a></h3>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @endif
    <div class="box-usual-ques">
        <h3 class="globalTitle">
            <a href="{{route('frontend.question')}}">CÂU HỎI THƯỜNG GẶP</a>
        </h3>
        <div class="box-bd">
            @foreach ($rightNormalQuestions as $rightNormalQuestion)
                <div class="item cf item-r">
                    <h3>
                        <a href="{{ route('frontend.question', $rightNormalQuestion->slug) }}">{{$rightNormalQuestion->title}}</a>
                    </h3>
                </div>

            @endforeach
        </div>
    </div>

    <div class="Social">
        <div class="fb-page" data-href="https://www.facebook.com/samtonu.vn" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/samtonu.vn" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/samtonu.vn">Sâm nhung tố nữ Tuệ Linh</a></blockquote>
        </div>
    </div>
    <div class="form-question-right">
        <h3 class="globalTitle">
            <a href="{{route('frontend.question')}}">GỬI CÂU HỎI</a>
        </h3>
        <div class="box-bd">
            {!! Form::open(array('url' => 'saveContact')) !!}
                    <input type="text" name="name" class="txt txt-name" placeholder="Họ và tên"/>
                    <input type="hidden" name="title" value="Gửi câu hỏi từ form cột bên phải">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                    <input type="number" name="phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                    <input type="email" name="email" class="txt txt-email" placeholder="Email"/>
                    <textarea name="content" class="txt txt-content" placeholder="Câu hỏi"></textarea>
                    <div class="btn-groups">
                        <input type="submit" value="Gửi" class="btn btn-submit"/>
                        <input type="reset" value="Hủy" class="btn btn-reset"/>
                    </div>
            {!! Form::close() !!}
        </div>
    </div>

        <div class="most-readed share-exp" id="sidebar">
        <h3 class="globalTitle">
            <a href="{{url('danh-gia-tac-dung')}}">Bài đọc nhiều nhất</a>
        </h3>
        <div class="box-bd boxHot">

            @foreach (\App\Lib\Helpers::getContentByModule('posts', 'right_below')->slice(0, 4) as $rightBelow)
                <div class="item cf">
                    <a href="{{url($rightBelow->slug.'.html')}}" class="thumb">
                        <img src="{{url('img/cache/120x84', $rightBelow->image)}}" alt="hot" width="120" height="84">
                    </a>
                    <h4>
                        <a href="{{url($rightBelow->slug.'.html')}}">{{$rightBelow->title}}</a>
                    </h4>
                </div>
            @endforeach
        </div>
    </div>

</div>