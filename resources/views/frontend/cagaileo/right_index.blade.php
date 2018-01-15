<div class="col-right">
    @if ($rightIndexVideos->count() > 0)
        <div class="box-video">
            <h3 class="global-title"><a href="{{url('video')}}">Góc videos</a></h3>
            @if ($firstVideo = $rightIndexVideos->shift())
                <div class="data">
                    <iframe width="100%" height="315" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
            @if ($rightIndexVideos->count() > 0)
                <ul class="listVideo">
                    @foreach ($rightIndexVideos as $video)
                        <li><a href="{{url('video/'.$video->slug)}}">{{$video->title}}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    @if ($rightIndexBanners->count() > 0)
        @foreach ($rightIndexBanners as $rightBanner)
            <div class="box-adv">
                <a href="{{$rightBanner->link}}">
                    <img src="/files/{{$rightBanner->image}}">
                </a>
            </div>
        @endforeach
    @endif


        <div class="Social">
            <div class="fb-page" data-href="https://www.facebook.com/cagaileotuelinh" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cagaileotuelinh" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cagaileotuelinh">Cà Gai Leo Tuệ Linh</a></blockquote>
            </div>
        </div>

        @if ($rightIndexPosts->count() > 0)
            <div class="boxHot cf">
                <h3 class="global-title"><a href="{{url('tin-tuc')}}">Tin nổi bật</a></h3>
                @foreach ($rightIndexPosts as $post)
                    <div class="item cf">
                        <a href="{{url($post->slug.'.html')}}" class="thumb">
                            <img src="{{url('img/cache/100x80/'.$post->image)}}" alt="hot" width="100" height="80">
                        </a>
                        <h4>
                            <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                        </h4>
                    </div>
                @endforeach
            </div>
    @endif
    <!-- /endHot -->


</div><!--//col-right-->
