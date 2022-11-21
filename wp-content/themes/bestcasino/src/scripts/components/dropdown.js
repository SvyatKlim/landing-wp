const dropdown = (drop = '.js-dropdown', onChange, dropBtn = '.js-dropdown-btn', dropList = '.js-dropdown-list') => {
    $(drop).each((i, el) => {
        let btn = $(el).find(dropBtn),
            list = $(el).find(dropList),
            items = $(list).find('li');


        $(btn).on('click', () => {
            $(list).slideDown().addClass('open');
        });

        $(document).on('click', (ev) => {
            let target = $(ev.target);

            if ($(dropList).hasClass('open') && !target.is(drop) && $(drop).find(target).length < 1 ) {
                $(list).slideUp().removeClass('open');
            }
        })


        $(items).on('click', (ev) => {
            let target = $(ev.currentTarget);

            $(items).each((i, item) => {
                if ($(item).is(target)) {
                    if (!$(item).hasClass('active')) {
                        $(item).addClass('active');
                        $(btn).text($(target).text());
                        if (onChange) {
                            onChange(ev);
                        }
                    }
                } else {
                    $(item).removeClass('active');
                }
            });

            $(list).slideUp().removeClass('open');
        })


    })
}

export default dropdown;