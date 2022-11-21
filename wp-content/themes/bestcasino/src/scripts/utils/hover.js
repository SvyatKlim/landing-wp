import touchDevice from "./touchDevice";

const hover = (el, mobile = false,parent) => {
    const element = el.length > 1 ? [...document.querySelectorAll(el)] : el;

    function toggleClass(item) {
        let parentClass;
        if (parent) {
             parentClass = item.closest(parent);
        }
        if (!touchDevice()) {
            item.addEventListener('mouseenter', (ev) => {
                if (!item.classList.contains('hover') && !parent) {
                    item.classList.add('hover');
                }
                if (parent && !parentClass.classList.contains('hover')) {
                    parentClass.classList.add('hover');
                }
                ev.stopPropagation()
            })
            item.addEventListener('mouseleave', (ev) => {
                if (parent) {
                    parentClass.classList.remove('hover');
                    ev.stopPropagation()
                }else{
                    item.classList.remove('hover');
                    ev.stopPropagation()
                }

            })
        }

        else if (touchDevice() && mobile) {
            item.addEventListener('click', () => {
                if (!item.classList.contains('hover')) {
                    item.classList.add('hover');
                } else {
                    item.classList.remove('hover');
                }
            })
        }
    }

    el.length > 1 ? element.map((item) => toggleClass(item)) : toggleClass(el)
};

export default hover;