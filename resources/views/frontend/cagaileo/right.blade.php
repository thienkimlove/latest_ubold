<div class="col-right right-content pr">
    <div class="most-readed on-top">
        <h3 class="global-title">
            <a href="#">BÀI VIẾT NỔI BẬT</a>
        </h3>
        @if (!in_array($page, []))
            <div class="box-bd boxHot">
                @foreach ($rightNormalPosts as $post)
                    <div class="item cf">
                        <a href="{{url($post->slug.'.html')}}" class="thumb" target="_blank">
                            <img src="{{url('img/cache/100x80/'.$post->image)}}" alt="hot" width="100" height="80">
                        </a>
                        <h4>
                            <a href="{{url($post->slug.'.html')}}" target="_blank">{{$post->title}}</a>
                        </h4>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @if ($rightNormalVideos->count() > 0)
        <div class="box-video">
            <h3 class="global-title"><a href="{{url('video')}}">Góc videos</a></h3>
            <div class="box-bd video-group">
                @if ($firstVideo = $rightNormalVideos->shift())
                    <div class="data">
                        <iframe width="100%" height="315" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                        <h3>
                            {{--{{$featureVideos->title}}--}}
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

    @if ($rightBanners->count() > 0)
        @foreach ($rightBanners as $rightBanner)
            <div class="box-adv">
                <a href="{{$rightBanner->link}}">
                    <img src="/files/{{$rightBanner->image}}">
                </a>
            </div>
        @endforeach
    @endif

    @if ($rightNormalQuestions->count() > 0)
    <div class="box-usual-ques">
        <h3 class="global-title">
            <a href="{{route('frontend.question')}}"> CÂU HỎI THƯỜNG GẶP</a>
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
    @endif
    <!-- /endHot -->
    <div class="form-question-right">
        <h3 class="global-title">
            <a href="{{route('frontend.question')}}">GỬI CÂU HỎI</a>
        </h3>
        <div class="box-bd">
            {!! Form::open(array('url' => 'saveContact')) !!}
                <input type="text" name="name" class="txt txt-name" placeholder="Họ và tên"/>
                <input type="hidden" name="title" value="Gửi câu hỏi từ form cột bên phải">
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
    <div class="Social">
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fviemgan.com.vn&tabs=timeline&width=340&height=150&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="340" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>

    @if ($rightNormalPosts->count() > 0)

        <div class="most-readed share-exp" id="sidebar">
            <h3 class="global-title">
                <a href="#">Chia sẻ của người dùng</a>
            </h3>
            <div class="box-bd boxHot">
                @foreach ($rightNormalPosts as $rightNormalPost)
                    <div class="item cf">
                    <a href="{{url($rightNormalPost->slug.'.html')}}" class="thumb">
                        <img src="{{url('img/cache/120x84', $rightNormalPost->image)}}" alt="hot" width="120" height="84">
                    </a>
                    <h4>
                        <a href="{{url($rightNormalPost->slug.'.html')}}">{{$rightNormalPost->title}}</a>
                    </h4>
                </div>
                 @endforeach
            </div>
        </div>
    @endif

</div><!--//col-right-->