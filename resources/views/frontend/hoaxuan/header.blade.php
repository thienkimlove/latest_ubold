<div class="hotLine sp">
    <img src="{{url('frontend/hoaxuan/images/hot.png')}}" alt="">
  </div><header class="header">
    <div class="header-mid">
        <div class="fix">
            <h1>
                <a href="" title="" class="banner">
                    <img src="{{url('frontend/hoaxuan/images/banner.png')}}" alt="">
                </a>
            </h1>
            <div class="box-slogan">
                <span>
                    MẦM ĐẬU NÀNH NGUYÊN XƠ
                </span>
                <span>
                   Khơi dậy sắc xuân
                </span>
            </div>

            <div class="phone">
                <img src="{{url('frontend/hoaxuan/images/hotline.png')}}" alt="">
            </div>
        </div>
    </div>
    <nav class="bg-nav">
        <div class="fix">
            <ul class="nav-main">
                <li>
                    <a class="{{(isset($page) && $page == 'index') ? 'active' : ''}}" href="{{url('/')}}" title="">TRANG CHỦ</a>
                </li>

                   @if ($headerCategories->count() > 0)
                    @foreach ($headerCategories as $headerCategory)
                        @if ($headerCategory->slug != 'cam-nhan-khach-hang')
                        <li>
                            <a class="{{(isset($page) && ($page == $headerCategory->slug || in_array($page, $headerCategory->children->pluck('slug')->all()))) ? 'active' : ''}}" href="{{url($headerCategory->slug)}}">{{$headerCategory->name}}</a>
                            @if ($headerCategory->children->count() > 0)
                                <ul>
                                    @foreach ($headerCategory->children as $childCategory)
                                        <li><a class="{{(isset($page) && $page == $childCategory->slug) ? 'active' : ''}}" href="{{url($childCategory->slug)}}">{{$childCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </nav>
</header>
@if (isset($page) && $page == 'index')
<div class="box-slider">
    <div class="owl-carousel" id="slide-homepage">
        @foreach ($headerIndexBanners as $banner)
            <div class="item">
                <a class="thumb" href="{{$banner->url}}" title="">
                    <img src="{{url('files/'.$banner->image)}}"/>
                </a>
            </div>
        @endforeach
    </div>
</div><!--//box-slider-->
@endif

<div class="banner-ads left">
    @foreach ($sliderLeftBanners as $banner)
        <a href="{{$banner->url}}" title="" target="_blank">
            <img src="{{url('files/'.$banner->image)}}" alt="" width="171" height="454">
        </a>
    @endforeach

</div>
