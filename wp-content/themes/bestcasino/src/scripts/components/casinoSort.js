const casinoSort = (container= '.js-tab-container', btnClass = '.js-tab-link', parent = '.js-top-list') => {

    $(parent).each((i, el) => {
        let btn = $(el).find(btnClass),
            currentContainer = $(el).find(container);

        $(btn).click(function(ev) {
            ev.preventDefault();
            let target = $(ev.currentTarget),
                termSlug = target.data('slug');

            $(btn).each((j, item) => {
                if($(item).is(target)) {
                    $(item).addClass('active');
                } else {
                    $(item).removeClass('active');
                }
            })

            currentContainer.animate({'opacity': 0}, 100);

                let data = {
                    action: 'casino_sort',
                    termSlug: termSlug,
                };

                ajaxRequest(data, (response)=> {
                    $(currentContainer).html(response);
                    currentContainer.animate({'opacity': 1}, 200);
                })
        });
    })


    function ajaxRequest(data, cb) {
        $.ajax({
            type: 'POST',
            url: ajax_url[0],
            dataType: "html",
            data: data,
            success: function (response) {
                cb(response);
            },
            error: function (error) {
                console.log('error', error);
            }
        });
    }
};

export default casinoSort;