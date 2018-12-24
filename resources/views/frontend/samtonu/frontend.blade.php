<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='GCL' name='generator'/>
    <meta property="fb:app_id" content="1718537594891325" />
    <title>{{$meta_title}}</title>

    <meta property="og:title" content="{{$meta_title}}">
    <meta property="og:description" content="{{$meta_desc}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$meta_url}}">
    <meta property="og:image" content="{{$meta_image}}">
    <meta property="og:site_name" content="Sâm nhung tố nữ Tuệ Linh">

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
    <meta name="AUTHOR" content="Sâm nhung tố nữ Tuệ Linh"/>
    <meta name="RESOURCE-TYPE" content="DOCUMENT"/>
    <meta name="DISTRIBUTION" content="GLOBAL"/>
    <meta name="COPYRIGHT" content="Copyright 2013 by Goethe"/>
    <meta name="Googlebot" content="index,follow,archive" />
    <meta name="RATING" content="GENERAL"/>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>

    <link rel="stylesheet" href="{{url('frontend/samtonu/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/samtonu/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/samtonu/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/samtonu/css/home.css')}}">

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570f69bb385fe2f2"></script>
</head>
<body>
<div class="wrapper">
    @include('frontend.samtonu.header')
    @yield('content')
    @include('frontend.samtonu.footer')
</div>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1718537594891325',
      xfbml      : true,
      version    : 'v2.12'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script src="{{url('frontend/samtonu/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('frontend/samtonu/js/SmoothScroll.js')}}"></script>
<script src="{{url('frontend/samtonu/js/jquery.easing.min.js')}}"></script>
<script src="{{url('frontend/samtonu/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/samtonu/js/wow.min.js')}}"></script>
<script src="{{url('frontend/samtonu/js/index.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126876426-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126876426-1');
</script>


</body>
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

<script>
    $(function(){
        $('#send_phone').click(function(e){
            e.preventDefault();
            $('form#form_footer').submit();
            return false;
        });

        $('#post_detail_send_comment').click(function(e){
            e.preventDefault();
            $('form#post_detail_comment_form').submit();
            return false;
        });
    });
</script>
</html>