$(document).ready(function() {
    // check where the shoppingcart-div is
    // if($('#sidebar').length>0){
    //     var offset = $('#sidebar').offset();
    //     $(window).scroll(function () {
    //         var scrollTop = $(window).scrollTop();
    //         console.log(scrollTop);
    //         // check the visible top of the browser
    //         if (offset.top<scrollTop) {
    //             $('#sidebar').addClass('fixed');
    //         } else {
    //             $('#sidebar').removeClass('fixed');
    //         }
    //     });
    // }
    if( $('#sidebar').length >0){
        var h =  $("#sidebar").height();
        var e = $("#sidebar").offset().top + h + 100;
        $(window).scroll(function () {
            var o = $(window).scrollTop();
            var f = $("#footer").offset().top - h;
            (e <= o && o <= f) ? $("#sidebar").addClass("fixed") : $("#sidebar").removeClass("fixed");
        });
    }
});