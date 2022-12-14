const headerMenu = () => {
    const header = $('header'),
        navBtn= $('.js-nav-btn'),
        // nav = $('.js-nav-list'),
        navWrapper = $('.js-nav');

    function open() {
        header.addClass('open-menu');
        // nav.addClass('open-menu')
    }
    function close() {
        header.removeClass('open-menu');
        // nav.removeClass('open-menu')
    }
   // nav.on('click', () => {
   //      if (!header.hasClass('open-menu')) {
   //          open();
   //      }else{
   //          close();
   //      }
   // })
}
export default headerMenu;
