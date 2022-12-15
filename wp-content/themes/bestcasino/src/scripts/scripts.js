import initHeader from "./components/headerInit";
import Dropdown from "./components/dropdown";
import casinoSort from "./components/casinoSort";

$(document).ready(function () {
    const dropdown = new Dropdown('.js-menu-item', '.js-sub-menu', '.nav-link');
    $('body').addClass('loaded')
    initHeader();
    casinoSort();

    if ($(window).width() > 992) {
        dropdown.init();
    }
    $(window).on('resize', function () {
        console.log('resize')
        dropdown.destroy()
        if ($(window).width() > 992) {
            dropdown.init()
        }
    })
});