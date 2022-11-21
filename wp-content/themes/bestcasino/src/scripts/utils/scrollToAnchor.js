const scrollToAnchor = () => {

    const scrollToHash = (hash) => {
        let $target = $(hash);
        if ($target.length) {
            let headerHeight = $('header').outerHeight();

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - headerHeight
            }, 900, 'swing', function () {
                history.replaceState(null, null, ' ');
                $(window).trigger('scroll');
            });
        }
    };

    $(document).on('click', 'a[href^="#"]', function (e) {
            e.preventDefault();
            let hash = this.hash;
            scrollToHash(hash);
    });

    if (window.location.hash !== '') {
        scrollToHash();
    }

};
export default scrollToAnchor;