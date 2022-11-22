import initHeader from "./components/headerInit";
import dropdown from "./components/dropdown";
import casinoSort from "./components/casinoSort";

$(document).ready(function () {
    $('body').addClass('loaded')
    initHeader();
    dropdown();
    casinoSort();
});