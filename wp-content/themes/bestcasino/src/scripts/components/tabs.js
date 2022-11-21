export default class Tabs {
    constructor(linkClass, cb) {
        this.linkClass = linkClass;
        this.callbackOnChange = cb;
    }

    getTabContainer = (elem) => {
        let attr = $(elem).attr('data-slug');
        return $(`#tab-${attr}`);
    }

    getLinkByAttr = (attr) => {
        return $(`${this.linkClass}[data-slug=${attr}]`)
    }

    changeTab (link) {
        if (!link.hasClass('active')) {
            $(this.linkClass).each((j, elem) => {
                let tab = this.getTabContainer(elem);
                if ($(elem).is(link)) {
                    $(elem).addClass('active');
                    tab.addClass('active');
                } else {
                    $(elem).removeClass('active');
                    $(tab).removeClass('active');

                    $(tab).find('.js-support-accordion').removeClass('active')
                }
            });

            if (this.callbackOnChange) {
                this.callbackOnChange(link);
            }
        }
    }

    goToTab (attr) {
        let link = this.getLinkByAttr(attr);
        this.changeTab(link, attr);
    }


    init () {
        if ($(this.linkClass).length > 0) {
            $(this.linkClass).each((i, el) => {

                $(el).on('click', (ev) => {
                    let target = $(ev.currentTarget);

                    if (!$(ev.currentTarget).hasClass('active')) {
                        this.changeTab(target);
                    }
                })
            });
        }
    }
}