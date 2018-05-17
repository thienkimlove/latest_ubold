(function($){
    var statusSearch = 0;
    var timeSearch = null;
    var delaySearch = 5000;

    var setMenuMobile = function(){
        $("#btn-menu").on("click",function(){
            if($("body").hasClass("show-menu")){
                closeMenuMobile();
                $("html,body").css({'height': "auto", 'overflow':'visible'});
            }else{
                $("body").addClass("show-menu");
                var height_device = $(window).height();
//                var width_device = $(window).width();
                var padding_menu = 30;
               /* if(width_device < 640){
                    padding_menu = 45;
                }*/
                var height_menu = $("#menu-left .inner").height() + padding_menu;
                /*if(height_menu <= height_device){
                    height_menu = height_device;
                }*/
                // $("#wrapper").css({height: height_menu});
                $("#overlay").css({display: "block"});
                $("html,body").css({'height': "100%", 'overflow':'hidden'});
            }
        });
    };

    var resetMenuMobile = function(){
        $("#overlay").on("click",function(){
            closeMenuMobile();
        });
    };
    var closeMenuMobile = function(){
        $("body").removeClass("show-menu");
        $("#wrapper").removeAttr("style");
        $("#overlay").css({display: "none"});
    };

    var checkSearch = function(){
        if(statusSearch == 0){
            window.clearTimeout(timeSearch);
            timeSearch = window.setTimeout(function(){
                $("#box-find").stop().animate({width: 210});
            },0);
        }else{
            window.clearTimeout(timeSearch);
            timeSearch = window.setTimeout(function(){
                $("#box-find").stop().animate({width: 23});
            },delaySearch);
        }
    };

    var changeSearch = function(){
        $("#box-find").hover(function(){
            checkSearch();
            statusSearch = 1;
        },function(){
            checkSearch();
            statusSearch = 0;
        });
    };

    var slideHomepage = function(){
        $('#slide-homepage').owlCarousel({
            loop:true,
            margin:0,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots: false
                },
                640:{
                    items:1,
                    nav:true,
                    dots: false
                },
                1000:{
                    items:1,
                    nav:true,
                    loop:true,
                    dots: true
                }
            }
        });
    };

    var slideHots = function(){
        $('#slide-hots').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots: false
                },
                640:{
                    items:1,
                    nav:true,
                    dots: false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:true,
                    dots: true
                }
            }
        });
    };

    var slideDis = function(){
        $('#slide-dis').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots: false
                },
                640:{
                    items:1,
                    nav:true,
                    dots: false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:true,
                    dots: true
                }
            }
        });
    };

    var slideCompany = function(){
        $('#slide-company').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots: false
                },
                640:{
                    items:2,
                    nav:true,
                    dots: false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:true,
                    dots: false
                }
            }
        });
    };

    var slideLink = function(){
        $('#slide-link').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:false,
                    dots: false
                },
                640:{
                    items:4,
                    nav:false,
                    dots: false
                },
                1000:{
                    items:6,
                    nav:false,
                    loop:true,
                    dots: false
                }
            }
        });
    };

    var slideProduct = function(){
        $('#slide-product').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots: false
                },
                640:{
                    items:2,
                    nav:true,
                    dots: false
                },
                1000:{
                    items:3,
                    nav:true,
                    loop:true,
                    dots: false
                }
            }
        });
    };


    var slidePartner = function(){
        $('#slide-partner').owlCarousel({
            loop:true,
            margin:20,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                    dots: false
                },
                640:{
                    items:2,
                    nav:false,
                    dots: false
                },
                1000:{
                    items:4,
                    nav:false,
                    loop:false,
                    dots: false
                }
            }
        });
    };

    var slideProject = function(){
        $('#slide-project').owlCarousel({
            loop:true,
            margin:30,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                640:{
                    items:2,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:false,
                    loop:true
                }
            }
        });
    };

    /*equalHeight*/
       equalHeight($('.col-left .box-news .item, .col-left .box-media .item,.list-product .item-product '));
        function equalHeight(obj) {
          if($(window).width() > 960 && obj.length>0){
              obj.matchHeight();
              $.fn.matchHeight._update();
          } else {
            obj.removeAttr('style');
          }
        }

    var tabContent = function(){
        $("a[data-type='tab']").on('click',function(e){
            e.preventDefault();
            var parent = $(this).data('parent');
            var content = $(this).data('content');
            var reset = $(this).data('reset');
            $("." + parent + " li").removeClass('active');
            $(this).parent("li").addClass('active');
            $("."+reset).css({display:"none"});
            $("#"+content).css({display:"block"});
        });
    };
    //Accordion
     $(function() {
        $("#accordion .accordion").hide();
        $("#accordion a").click(function() {
          $('#accordion .accordion').slideUp(500);
          $('#accordion .accordion').addClass('open');
          $(this).next().slideDown(300);
        });
      });
  //endAccordion
    jQuery(document).ready(function() {
        changeSearch();
        slideCompany();
        slideHomepage();
        slideHots();
        slideDis();
        slideProduct();
        slideProject();
        slideLink();
        slidePartner();
        tabContent();
        setMenuMobile();
        resetMenuMobile();
    });
})(jQuery);

