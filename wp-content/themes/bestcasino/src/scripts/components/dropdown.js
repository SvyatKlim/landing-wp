const dropdown = (dropdown = '.js-menu-item', dropList = '.js-sub-menu', btnClass = '.nav-link') => {
    $(dropdown).each((i, item) => {
            const btn = $(item).children(btnClass),
                list = $(item).find(dropList);

        $(document).on('click', (ev) => {
            let target = $(ev.target);

            if(!$(dropList).hasClass('open') ) {
                if(target.is(dropdown) || $(dropdown).find(target).length > 0) {
                    $(dropdown).addClass('open');
                    $(list).slideDown().addClass('open');
                }
            } else if(target.is(btn) || $(dropdown).find(target).length < 1) {
                $(dropdown).removeClass('open');
                $(list).slideUp().removeClass('open');
            }
        })

    })
}

export default dropdown;