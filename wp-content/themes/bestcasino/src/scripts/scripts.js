import initHeader from "./components/headerInit";
import hover from "./utils/hover";
import scrollAnimations from "./components/scrollAnimations";
import scrollToAnchor from "./utils/scrollToAnchor";

$(document).ready(function () {
    $('body').addClass('loaded')
    initHeader();
    hover('.js-hover', false, '.js-hover-parent');
    scrollAnimations();
    scrollToAnchor();
});