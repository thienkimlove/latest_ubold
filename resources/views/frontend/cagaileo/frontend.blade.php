<!DOCTYPE html>
<html lang="vi">
<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
    <link type="image/x-icon" href="{{url('frontend/cagaileo/favicon.ico')}}" rel="shortcut icon"/>
    <link href="https://plus.google.com/107515763736347546999" rel="publisher"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,700,800&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{url('frontend/cagaileo/css/cagaileo.css')}}" type="text/css"/>
    <meta content='GCL' name='generator'/>
    <title>{{$meta_title}}</title>

    <meta property="og:title" content="{{$meta_title}}">
    <meta property="og:description" content="{{$meta_desc}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$meta_url}}">
    <meta property="og:image" content="{{$meta_image}}">
    <meta property="og:site_name" content="Cà gai leo Tuệ Linh">
    <meta property="fb:app_id" content="188252524956805" />

    <meta name="twitter:card" content="Card">
    <meta name="twitter:url" content="{{$meta_url}}">
    <meta name="twitter:title" content="{{$meta_title}}">
    <meta name="twitter:description" content="{{$meta_desc}}">
    <meta name="twitter:image" content="{{$meta_image}}">


    <meta itemprop="name" content="{{$meta_title}}">
    <meta itemprop="description" content="{{$meta_desc}}">
    <meta itemprop="image" content="{{$meta_image}}">

    <meta name="ABSTRACT" content="{{$meta_desc}}"/>
    <meta http-equiv="REFRESH" content="1200"/>
    <meta name="REVISIT-AFTER" content="1 DAYS"/>
    <meta name="DESCRIPTION" content="{{$meta_desc}}"/>
    <meta name="KEYWORDS" content="{{$meta_keywords}}"/>
    <meta name="ROBOTS" content="index,follow"/>
    <meta name="AUTHOR" content="Cà gai leo Tuệ Linh"/>
    <meta name="RESOURCE-TYPE" content="DOCUMENT"/>
    <meta name="DISTRIBUTION" content="GLOBAL"/>
    <meta name="COPYRIGHT" content="Copyright 2013 by Goethe"/>
    <meta name="Googlebot" content="index,follow,archive" />
    <meta name="RATING" content="GENERAL"/>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570f69bb385fe2f2"></script>
</head>
<body class="home">
<div class="wrapper" id="wrapper">
    @include('frontend.cagaileo.header')

    @yield('content')

    @include('frontend.cagaileo.footer')
    <div class="overlay" id="overlay"></div>
    @include('frontend.cagaileo.mobile_menu')
</div>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '188252524956805',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript" src="{{url('frontend/cagaileo/js/jquery-1.10.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/SmoothScroll.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/jquery.matchHeight-min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/common.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/fixedsidebar.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/cagaileo/js/slideAdvs.js')}}"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84352576-1', 'auto');
  ga('send', 'pageview');

</script>

<a id="callNowButton" href="tel:0912571190" class="ft-btn"></a>
<style>
    @media (max-width: 640px) {
        #callNowButton {
            display: block;
            height: 80px;
            position: fixed;
            left: 0;
            border-bottom-right-radius: 40px;
            border-top-right-radius: 40px;
            width: 100px;
            bottom: -20px;
            border-top: 2px solid rgba(51, 187, 51, 1);
            background: url("http://www.nuocsucmieng.vn/files/hotline3.png") center 10px no-repeat #fafdfa;
            text-decoration: none;
            box-shadow: 0 0 5px #888;
            -webkit-box-shadow: 0 0 5px #888;
            -moz-box-shadow: 0 0 5px #888;
            z-index: 9999;
        }
    }
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/vi_VN/sdk.js#x...";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="position:fixed; z-index:9999999; right:10px; bottom:10px;" class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/tuelinh.vn" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>

  <!-- Google Code dành cho Thẻ tiếp thị lại -->
<script type="text/javascript">
    var google_tag_params = {
        dynx_itemid: 'REPLACE_WITH_VALUE',
        dynx_itemid2: 'REPLACE_WITH_VALUE',
        dynx_pagetype: 'REPLACE_WITH_VALUE',
        dynx_totalvalue: 'REPLACE_WITH_VALUE',
    };
</script>
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 964027423;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/964027423/?guid=ON&amp;script=0"/>
    </div>
</noscript>
@yield('frontend_script')
</body>
</html>