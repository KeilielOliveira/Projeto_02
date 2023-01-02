var count = 0;
$(
    $('.menu-icon').click(() => {
        count ++;
        var icon = $('.icon');
        var menuMobile = $('.ul-menu-mobile');
        if(count == 1) {
            icon.removeClass('fa-bars').addClass('fa-xmark');
        }else if(count >= 2) {
            icon.removeClass('fa-xmark').addClass('fa-bars');
            count = 0;
        }
        menuMobile.slideToggle();
    })
    
)

resizeWindow();
function resizeWindow() {
    var width = $(window).width();
    $(window).resize(() => {
        var width = $(window).width();
        if(width < 900) {
            $('.ul-menu-mobile').css('display','none');
            if($('.icon').hasClass('fa-xmark')) {
                count = 0;
                $('.icon').removeClass('fa-xmark').addClass('fa-bars');
            }
        }
    })

}



