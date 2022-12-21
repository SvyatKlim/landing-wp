const headerMenu = () => {
    const header = $('header'),
        navBtn= $('.js-nav-btn'),
        state = false,
        navWrapper = $('.js-nav');

    function menuOpen() {
        navWrapper.classList.remove('menu-down')
        navWrapper.classList.add('menu-up')
    }

    function menuClose() {
        navWrapper.classList.remove('menu-up')
        navWrapper.classList.add('menu-down')
    }
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
