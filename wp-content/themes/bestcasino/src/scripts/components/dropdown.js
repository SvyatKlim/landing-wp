const dropdown = (drop = '.js-dropdown', dropBtn = '.js-dropdown-btn', dropList = '.js-dropdown-list') => {
    $(drop).each((i, el) => {
        let btn = $(el).find(dropBtn),
            list = $(el).find(dropList);


        $(btn).on('click', () => {
            $(list).slideDown().addClass('open');
        });

        $(document).on('click', (ev) => {
            let target = $(ev.target);

            if ($(dropList).hasClass('open') && !target.is(drop) && $(drop).find(target).length < 1 ) {
                $(list).slideUp().removeClass('open');
            }
        })

    })
}

export default dropdown;