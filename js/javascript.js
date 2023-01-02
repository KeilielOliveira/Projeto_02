class Util {   
    static redirect(el) {
        if($(el).find('a').length > 0) {
            $(el).find('a').click()
        }
    }
}

let menuDesktop = $('.ul-menu-desktop');
let menuMobile = $('.ul-menu-mobile');
Util.redirect(menuDesktop);



