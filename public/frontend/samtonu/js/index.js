$(document).ready(function () {
    if(typeof WOW != 'undefined'){
        new WOW().init();
    }
    var clickMenu = 0;
    $(".btnMenu").unbind().click(function () {
        if(clickMenu == 0){
            $(this).removeClass('btnClose');
            $(this).addClass('btnOpen');
            $('.menuTop').css('right','0');
            clickMenu++;
        }else{
            $(this).removeClass('btnOpen');
            $(this).addClass('btnClose');
            $('.menuTop').css('right','-250px');
            clickMenu--;
        }
    });
    var clickSubMenu = 0;
    $(".menuTop>li").hover(function () {
        return;
    });
    $(".menuTop li").click(function () {
        if(clickSubMenu == 0){
            $(this).find('.subMenu').addClass('active');
            clickSubMenu++;
        }else{
            $(this).find('.subMenu').removeClass('active');
            clickSubMenu--;
        }
    });

    if($("#block2_slider").length > 0){
        $("#block2_slider").owlCarousel({
            navigation: false,
            pagination: true,
            autoPlay: true,
            autoPlaySpeed: 2000,
            responsive: true,
            items: 3,
            itemsDesktop: [1153, 3],
            itemsDesktopSmall: [1152, 2],
            itemsTablet: [800, 1],
            itemsMobile: [479, 1]
        });
    }
    if($("#block4_slider").length > 0){
        $("#block4_slider").owlCarousel({
            navigation: false,
            pagination: true,
            autoPlay: true,
            autoPlaySpeed: 2000,
            responsive: true,
            items: 4,
            itemsDesktop: [1220, 4],
            itemsDesktopSmall: [1024, 3],
            itemsTablet: [768, 2],
            itemsMobile: [500, 1]
        });
    }
    if($("#block7_slider").length > 0){
        $("#block7_slider").owlCarousel({
            navigation: false,
            pagination: true,
            autoPlay: true,
            autoPlaySpeed: 2000,
            responsive: true,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [980, 3],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1]
        });
    }
    if($("#block16_slider").length > 0){
        $("#block16_slider").owlCarousel({
            navigation: false,
            pagination: true,
            autoPlay: true,
            autoPlaySpeed: 2000,
            responsive: true,
            items: 4,
            itemsDesktop: [1220, 4],
            itemsDesktopSmall: [1024, 3],
            itemsTablet: [768, 2],
            itemsMobile: [500, 1]
        });
    }

    if( $('#sidebar').length >0){
        var h =  $("#sidebar").height();
        var e = $("#sidebar").offset().top + h + 100;
        $(window).scroll(function () {
            var o = $(window).scrollTop();
            var f = $("#scrollPoint").offset().top - h;
            (e <= o && o <= f) ? $("#sidebar").addClass("fixed") : $("#sidebar").removeClass("fixed");
        });
    }
    activeTab('.tabComment a');
    bannerAdsSide();
});//end document

function showPopupNotify(popupName, message) {
    $(popupName).fadeIn();
    $(popupName + ' .close-popup').click(function () {
        $(popupName).fadeOut();
    });
}
function activeTab(btnClick) {
    $(btnClick).click(function () {
        var content = $(this).data('content');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(content).siblings().removeClass('active');
        $(content).addClass('active');
    })
}
function bannerAdsSide() {
    var $banner = $('.scrollPage'), $window = $(window);
    var $topDefault = parseFloat($banner.css('top'), 10);
    $(window).on('scroll', function () {
        var $docHeight = $(window).innerHeight();
        $('.scrollPage').stop().animate({top: $(window).scrollTop() + $topDefault}, 100, 'easeOutCirc');
    });
}

