﻿<div class="banner-ads left">
    @foreach ($headerIndexBanners as $banner)
        <a href="{{$banner->link}}" title="" target="_blank">
            <img src="{{url('files', $banner->image)}}" alt="" width="171" height="454">
        </a>
    @endforeach
</div>
<div class="btn-group-fix banner-ads">
    <a href="https://www.facebook.com/estrogen.vn" title="Fanpage"><img
                src="{{url('frontend/estrogen/images/fb-icon.png')}}" alt="Fanpage" width="63" height="63"></a>
    <a href="" title="Gọi tư vấn"><img src="{{url('frontend/estrogen/images/call-icon.png')}}"
                                                    alt="Gọi tư vấn" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Mua hàng"><img src="{{url('frontend/estrogen/images/cart-icon.png')}}"
                                                         alt="Giỏ hàng" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Điểm bán sản phẩm"><img
                src="{{url('frontend/estrogen/images/location-icon.png')}}" alt="Điểm bán sản phẩm" width="63"
                height="63"></a>
</div>
<header class="pr">
    <div class="bg-top">
        <a href="javascript:void(0)" class="miniMenu-btn pa open-main-nav" data-menu="#main-nav"></a>
    </div>
    <div class="fixCen head-info">
        <h1 class="rs"><a href="{{url('/')}}" class="logo" title="estrogen">
                <img src="{{url('frontend/estrogen/images/logo.png')}}" alt="estrogen" width="170" height="99" class="imgFull">
            </a></h1>
        <span class="slogan">
                    Chuyên trang thông tin về nội tiết tố nữ estrogen
                    <i class="small"></i>
                </span>
        <div class="icon-header">
            <img src="{{url('frontend/estrogen/images/icon.png')}}" alt="" class="imgFull" width="67" height="71">
        </div>
        <span class="hotline" id="hotline">
                    <a href="tel:18001190">
                        <img src="{{url('frontend/estrogen/images/hotline.png')}}" alt="" width="166" height="56" class="imgFull">
                    </a>
                    <form action="{{url('search')}}" method="GET" class="search-on-top">
                        <input type="text" name="q" placeholder="Tìm kiếm">
                    </form>
                </span>
    </div>
    <nav id="main-nav" class="menu-mb">
        <ul class="fixCen pr rs">
            <li><a class="{{(isset($page) && $page == 'index')? 'active' : ''}}" href="{{url('/')}}" title="Trang chủ">
                    Home
                </a></li>
            @foreach ($headerCategories as $parentCategory)
                @if ($parentCategory->children->count() > 0)
                    <li class="parentMenu">
                        <a href="{{url( $parentCategory->slug)}}" title="{{$parentCategory->name}}"
                           class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a>
                        <ul class="submenu">
                            @foreach ($parentCategory->children as $subCategory)
                                <li><a href="{{url( $subCategory->slug)}}"
                                       title="{{$subCategory->name}}">{{$subCategory->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    @if ($parentCategory->slug == 'san-pham')
                        <li>
                            <a href="{{url('product')}}" title="{{$parentCategory->name}}"
                               class="{{(isset($page) && $page == 'product') ? 'active' : ''}}">{{$parentCategory->name}}</a>
                        </li>
                    @else

                    <li>
                        <a href="{{url( $parentCategory->slug)}}" title="{{$parentCategory->name}}"
                           class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a>
                    </li>

                     @endif


                @endif
            @endforeach

            <li><a class="{{(isset($page) && $page == 'cau-hoi-thuong-gap') ? 'active' : ''}}" href="{{url('cau-hoi-thuong-gap')}}"
                   title="Hỏi đáp">Hỏi đáp</a></li>
            <li><a class="{{(isset($page) && $page == 'video')? 'active' : ''}}" href="{{url('video')}}" title="Video">Video</a>
            </li>
            <li><a class="{{(isset($page) && $page == 'phan-phoi')? 'active' : ''}}" href="{{url('phan-phoi')}}"
                   title="Phân phối">Phân phối</a></li>
            <li><a class="{{(isset($page) && $page == 'lien-he')? 'active' : ''}}" href="{{url('lien-he')}}"
                   title="Liên hệ">Liên hệ</a></li>
        </ul>
    </nav>
</header>