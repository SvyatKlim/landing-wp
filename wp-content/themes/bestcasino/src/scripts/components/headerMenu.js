const headerMenu = () => {
    const header = $('header'),
        navBtn= $('.js-nav-btn'),
        navWrapper = $('.js-header-wrapper');

    function open() {
        header.addClass('open-menu');
        navBtn.addClass('active');
        navWrapper.removeClass('menu-down')
        navWrapper.addClass('menu-up')
    }
    function close() {
        header.removeClass('open-menu');
        navBtn.removeClass('active');
        navWrapper.removeClass('menu-up')
        navWrapper.addClass('menu-down')
    }
    navBtn.on('click', () => {
        if (!header.hasClass('open-menu')) {
            open();
        }else{
            close();
        }
   })
}
export default headerMenu;
