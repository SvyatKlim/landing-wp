import initHeader from "./components/headerInit";
import dropdown from "./components/dropdown";
import hover from "./utils/hover";
import scrollAnimations from "./components/scrollAnimations";
import scrollToAnchor from "./utils/scrollToAnchor";
import casinoSort from "./components/casinoSort";

$(document).ready(function () {
    $('body').addClass('loaded')
    initHeader();
    hover('.js-hover', false, '.js-hover-parent');
    scrollAnimations();
    scrollToAnchor();
    dropdown('.header__nav__item--dropdown', '.nav-link', '.js-submenu');
    casinoSort();
});