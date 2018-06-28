<div class="right-content pr">
    @if ($rightVideos = \App\Lib\Helpers::getRightIndexVideos())
    <div class="box-video">
        <h3 class="global-title">
            <a href="{{url('videos')}}">Góc video</a>
        </h3>
        <div class="box-bd">
            @if ($firstRightVideo = $rightVideos->shift())
                <div class="data">
                    <iframe width="100%" height="250" src="{{\App\Lib\Helpers::getYoutubeEmbedUrl($firstRightVideo->url)}}" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        {{$firstRightVideo->title}}
                    </h3>
                </div>
            @endif
            @foreach ($rightVideos as $rightVideo)
                <div class="item cf item-r">
                    <h3>
                        <a href="{{url('video', $rightVideo->slug)}}">{{$rightVideo->title}}</a>
                    </h3>
                </div>
            @endforeach

        </div>
    </div>
    @endif
    <div class="box-adv">
        <a href="tel:18001190">
            <img src="{{url('frontend/estrogen/images/tu-van-2.png')}}" alt="Tư vấn miễn phí" width="317" height="76">
        </a>
    </div>
    <div class="box-adv">
        <a href="{{url('phan-phoi')}}">
            <img src="{{url('frontend/estrogen/images/diem-ban-2.png')}}" alt="Điểm bán sản phẩm" width="317" height="76">
        </a>
    </div>
    <div class="Social">
        <div class="fb-page" data-href="https://www.facebook.com/Chuyên-gia-nội-tiết-tố-nữ-estrogen-902648509907211" data-width="300" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Chuyên-gia-nội-tiết-tố-nữ-estrogen-902648509907211"><a href="https://www.facebook.com/Chuyên-gia-nội-tiết-tố-nữ-estrogen-902648509907211">Chuyên gia nội tiết tố nữ estrogen</a></blockquote></div></div>
    </div>
    @if ($rightQuestions = \App\Lib\Helpers::getRightIndexQuestions())
        <div class="box-usual-ques">
            <h3 class="global-title">
                <a href="{{url('cau-hoi-thuong-gap')}}"> CÂU HỎI THƯỜNG GẶP</a>
            </h3>
            <div class="box-bd">
                @foreach ($rightQuestions as $question)
                    <div class="item cf item-r">
                        <h3>
                            <a href="{{url('cau-hoi-thuong-gap', $question->slug)}}">{{$question->title}}</a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>