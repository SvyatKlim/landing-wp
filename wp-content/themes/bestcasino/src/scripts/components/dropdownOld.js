const dropdown = (dropdown = '.js-menu-item', dropList = '.js-sub-menu', btnClass = '.nav-link') => {
    function toggleDropDown(ev, btn, list) {
        let target = $(ev.target);
console.log(target)
        if (!$(dropList).hasClass('open')) {
            if (target.is(dropdown) || $(dropdown).find(target).length > 0) {
                $(dropdown).addClass('open');
                $(list).slideDown().addClass('open');
            }
        } else if (target.is(btn) || $(dropdown).find(target).length < 1) {
            $(dropdown).removeClass('open');
            $(list).slideUp().removeClass('open');
        }
    }

    function dropdownInit() {
        if ($(window).width() > 992) {
            $(dropdown).each((i, item) => {
                const btn = $(item).children(btnClass),
                    list = $(item).find(dropList);

                // $(window).width() > 992 ?
                    document.body.addEventListener('click',  (ev) => toggleDropDown(ev,btn,list),true)
                //     :
                //     window.removeEventListener('click',toggleDropDown)
            })
        } else {
            console.log('else')
            document.body.removeEventListener('click', toggleDropDown,true)
        }

    }

    dropdownInit();

}

export default dropdown;