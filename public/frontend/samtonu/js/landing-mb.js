$(document).ready(function(){
    showPopupVideo('.play-btn','.popup-video');
    showPopup('.rule-btn','.popup-rule');
    showPopup('.his-btn','.popup-his');
});
function showPopupVideo(btnCall, popupName) {
    $(btnCall).click(function () {
        var src = $(this).data('src');
        $(popupName).fadeIn();
        $(popupName).find('iframe').attr('src', src);
        $(popupName + ' .close-popup').click(function () {
            $(popupName).find('iframe').attr('src', '');
            $(popupName).fadeOut();
        });
    });
}
function showPopup(btnCall,popupName) {
    $(btnCall).click(function () {
        $(popupName).fadeIn();
        $(popupName + ' .close-popup').click(function () {
            $(popupName).fadeOut();
        });
    });
}
function showPopupNotify(popupName, message) {
    $(popupName).fadeIn();
    $(popupName).find('.content').html(message);
    $(popupName + ' .close-popup').click(function () {
        $(popupName).fadeOut();
    });
}