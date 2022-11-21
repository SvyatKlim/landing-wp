
const headerOnScroll = () => {
    const header = $('.header');
    if(header.hasClass('open-menu') && $(window).width() <= 1250) {
        return 0;
    }

        const offsetScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (offsetScroll > 0) {
            header.addClass('header-fixed');
        } else {
            header.removeClass('header-fixed');
        }

};

const initHeader = () => {

    headerOnScroll();

    $(window).on('scroll', () => {
        headerOnScroll();
    });

    $(window).on('resize', function () {
        headerOnScroll();
    })

};

export default initHeader;
