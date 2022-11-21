const animationOnScroll = (elementClass, cb, cbNoAnimate) => {
    const animationShowClass = 'animate',
        animationHideClass = 'no-animate',
        defaultPosition = 'center';

    $(elementClass).each((i, element) => {
        const el = $(element);
        const pos = el.data('pos') ? el.data('pos') : defaultPosition;

        const windowHeight =  $(window).height();
        let elHeight = el.outerHeight();
        elHeight = elHeight < windowHeight ? elHeight: windowHeight;
        let objectTop = el.position().top + elHeight / 4;
        let objectCenter = el.position().top + elHeight / 3;


        let windowBot = $(window).scrollTop() + windowHeight;

        if (pos === 'top') {
            objectCenter = el.position().top;
        }

        if (windowBot >= objectCenter) {
            el.addClass(animationShowClass).removeClass(animationHideClass);
            if (cb) {
                cb(el);
            }
        } else if (windowBot < objectTop) {
            el.removeClass(animationShowClass).addClass(animationHideClass);
            if (cbNoAnimate) {
                cbNoAnimate(el);
            }
        }
    });

};

export default animationOnScroll;