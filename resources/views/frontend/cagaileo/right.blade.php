<div class="col-right right-content pr">
    <div class="most-readed on-top">
        <h3 class="global-title">
            <a href="#">BÀI VIẾT NỔI BẬT</a>
        </h3>
        @if (!in_array($page, ['video', 'lien-he', 'phan-phoi']))
            <div class="box-bd boxHot">
                @foreach ($rightNews as $post)
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
    <div class="box-adv">
        <a href="tel: 18001190">
            <img src="http://www.cagaileo.vn/files/dd3310aebde5ad4ea5a769601ad19604.png" alt="Tue linh">
        </a>
    </div>
    <div class="box-adv">
        <a href="http://www.viemgan.com.vn/phan-phoi">
            <img src="http://www.cagaileo.vn/files/cc2d746ed56741370dcaa755ca9266ff.png" alt="Tue linh">
        </a>
    </div>
    @if ($featureVideos->count() > 0)
        <div class="box-video">
            <h3 class="global-title"><a href="{{url('video')}}">Góc videos</a></h3>
            <div class="box-bd video-group">
                @if ($firstVideo = $featureVideos->shift())
                    <div class="data">
                        <iframe width="100%" height="315" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                        <h3>
                            {{--{{$featureVideos->title}}--}}
                        </h3>
                    </div>
                @endif
                @if ($featureVideos->count() > 0)
                    <div class="item cf item-r">
                        @foreach ($featureVideos as $video)
                            <h3><a href="{{url('video/'.$video->slug)}}">{{$video->title}}</a></h3>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
    <div class="box-usual-ques">
        <h3 class="global-title">
            <a href="#"> CÂU HỎI THƯỜNG GẶP</a>
        </h3>
        <div class="box-bd">
            <div class="item cf item-r">
                <h3>
                    <a href="#"> Sở thích vừa học, vừa hát Sở thích vừa học, vừa hát</a>
                </h3>
            </div>
            <div class="item cf item-r">
                <h3>
                    <a href="#"> Sở thích vừa học, vừa hát</a>
                </h3>
            </div>
        </div>
    </div>
    <!-- /endHot -->
    <div class="form-question-right">
        <h3 class="global-title">
            <a href="#">GỬI CÂU HỎI</a>
        </h3>
        <div class="box-bd">
            <form action="" method="post">
                <input type="text" name="name" class="txt txt-name" placeholder="Họ và tên"/>
                <input type="number" name="phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                <input type="email" name="email" class="txt txt-email" placeholder="Email"/>
                <textarea name="content" class="txt txt-content" placeholder="Câu hỏi"></textarea>
                <div class="btn-groups">
                    <input type="submit" value="Gửi" class="btn btn-submit"/>
                    <input type="reset" value="Hủy" class="btn btn-reset"/>
                </div>
            </form>
        </div>
    </div>
    <div class="Social">
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fviemgan.com.vn&tabs=timeline&width=340&height=150&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="340" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
    <div class="most-readed share-exp" id="sidebar">
        <h3 class="global-title">
            <a href="#">Chia sẻ của người dùng</a>
        </h3>
        <div class="box-bd boxHot">
            <div class="item cf">
                <a href="#" class="thumb">
                    <img src="http://www.giaidocgan.vn/files/3fc0eef097671c971442d49a538d2edd.jpg" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="#">Probiotics (men vi sinh) là những vi khuẩn có lợi cho đường ruột</a>
                </h4>
            </div>
            <div class="item cf">
                <a href="#" class="thumb">
                    <img src="http://www.giaidocgan.vn/files/3fc0eef097671c971442d49a538d2edd.jpg" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="#">Probiotics (men vi sinh) là những vi khuẩn có lợi cho đường ruột</a>
                </h4>
            </div>
            <div class="item cf">
                <a href="#" class="thumb">
                    <img src="http://www.giaidocgan.vn/files/3fc0eef097671c971442d49a538d2edd.jpg" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="#">Probiotics (men vi sinh) là những vi khuẩn có lợi cho đường ruột</a>
                </h4>
            </div>
            <div class="item cf">
                <a href="#" class="thumb">
                    <img src="http://www.giaidocgan.vn/files/3fc0eef097671c971442d49a538d2edd.jpg" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="#">Probiotics (men vi sinh) là những vi khuẩn có lợi cho đường ruột</a>
                </h4>
            </div>
        </div>
    </div>

</div><!--//col-right-->