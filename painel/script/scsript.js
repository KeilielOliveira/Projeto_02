menu();
let count = 0;
function menu() {
    $('i.icon').click(function() {
        $(this).attr('res','hidden')
        let page = $('.page');
        let header = $('.header-painel');
        let menu = $('.controller');
        if(count == 0) {
            page.css('width','80%').css('left','20%');
            header.css('width','80%').css('left','20%');
            menu.css('left','0')
            count++;
        }else if(count > 0) {
            page.css('width','100%').css('left','0');
            header.css('width','100%').css('left','0');
            menu.css('left','-20%')
            count = 0;
        }
    })
}

$(window).on('resize',function() {
    if($(window).innerWidth() == 900) {
        location.reload();
    }
})

