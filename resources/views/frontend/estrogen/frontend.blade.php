<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='GCL' name='generator'/>
    <title>{{$meta_title}}</title>

    <meta property="og:title" content="{{$meta_title}}">
    <meta property="og:description" content="{{$meta_desc}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$meta_url}}">
    <meta property="og:image" content="{{$meta_image}}">
    <meta property="og:site_name" content="Estrogen">
    <meta property="fb:app_id" content="2084164801908023" />
    <meta property="fb:admins" content="10201032801257933"/>

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
    <meta name="AUTHOR" content="Estrogen"/>
    <meta name="RESOURCE-TYPE" content="DOCUMENT"/>
    <meta name="DISTRIBUTION" content="GLOBAL"/>
    <meta name="COPYRIGHT" content="Copyright 2013 by Goethe"/>
    <meta name="Googlebot" content="index,follow,archive" />
    <meta name="RATING" content="GENERAL"/>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>


    <link rel="stylesheet" href="{{url('frontend/estrogen/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/estrogen/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/estrogen/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/estrogen/css/font-awesome.min.css')}}" media="all">
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570f69bb385fe2f2"></script>

<!-- Eclick Tracking Code -->
<script type="text/javascript">
(function () {
var _eclickq = window._eclickq || (window._eclickq = []);
if (!_eclickq.loaded) {
var eclickTracking = document.createElement('script');
            eclickTracking.async = true;
            eclickTracking.src = ('https:'==document.location.protocol?'https:':'http:')+'//s.eclick.vn/delivery/retargeting.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(eclickTracking, s);
            _eclickq.loaded = true;
                                                                                                            
}
_eclickq.push(['addPixelId', 15854
]);
})();
window._eclickq = window._eclickq || [];
window._eclickq.push(['track', 'PixelInitialized', {}]); 
</script>

<script type="text/javascript">
(function () {
var _eclickq = window._eclickq || (window._eclickq = []);
if (!_eclickq.loaded) {
var eclickTracking = document.createElement('script');
            eclickTracking.async = true;
            eclickTracking.src = ('https:'==document.location.protocol?'https:':'http:')+'//s.eclick.vn/delivery/retargeting.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(eclickTracking, s);
            _eclickq.loaded = true;
                                                                                                            
}
_eclickq.push(['addPixelId', 15853
]);
})();
window._eclickq = window._eclickq || [];
window._eclickq.push(['track', 'PixelInitialized', {}]); 
</script>


</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="215329132575996"
  logged_in_greeting="Chào bạn, bạn cần tư vấn ?"
  logged_out_greeting="Chào bạn, bạn cần tư vấn ?">
</div>
<div class="wrapper home pr">
    @include('frontend.estrogen.header')
     @yield('content')
   @include('frontend.estrogen.footer')
</div>
</body>
<!-- Facebook Code Comment-->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '2084164801908023',
            xfbml      : true,
            version    : 'v2.6'
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

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=2084164801908023";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Facebook Code Comment-->


<script src="{{url('frontend/estrogen/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/estrogen/js/angular.min.js')}}"></script>
<script src="{{url('frontend/estrogen/js/SmoothScroll.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/estrogen/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/estrogen/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{url('frontend/estrogen/js/common.js')}}" type="text/javascript"></script>

<!-- Admicro Tracking Code -->
<script type="text/javascript">
(function () {
	var a = ["//static.amcdn.vn/core/analytics.js", "//static.amcdn.vn/cpa/amc-core.min.js"];
	for (var i in a) {var b = document.createElement("script");b.type = "text/javascript"; b.async = !0; b.src = a[i];
	var c = document.getElementsByTagName("script")[0]; c.parentNode.insertBefore(b, c);}
	window.admicro_analytics_q = window.admicro_analytics_q || [];
	window.admicro_analytics_q.push({event: "pageviews", domain: "estrogen.vn", id: 2197});
	window.admicro_cpa_q = window.admicro_cpa_q || [];
	window.admicro_cpa_q.push(		
		{event: "retargeting", id: 5548}
	);
})();
</script>
<!-- End Admicro Tracking Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126894104-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126894104-1');
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

<script>
    var Config = {};
    Config.url = '{{ url('/') }}';

</script>
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

    $(function(){
        $('#box_submit').click(function(){
            var phone = $('#box_phone').val();
            var email = $('#box_email').val();
            var content = $('#box_content').val();

            if (!phone || !email || !content) {
                $('#box_message').show().text('Xin hãy nhập đủ thông tin!');
            } else {
                $('#getQues').submit();
            }
            return false;
        });
    });
</script>
</html>