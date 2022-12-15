class Dropdown {
    constructor(dropdown, dropList, btnClass) {
        this.dropdown = document.querySelector(dropdown);
        this.dropdownClass = dropdown;
        this.dropList = dropList;
        this.btnClass = btnClass;
        this.overlay = document.querySelector('.js-header-overlay');
        this.document = document.querySelector('.main-wrapper');
        this.toggleEvent = this.toggleClass.bind(this);
        this.initialized = false;
    }

    removeClass() {
        this.overlay.classList.add('close');
        this.dropdown.classList.remove('open');
        setTimeout(() => {
            this.overlay.classList.remove('open');
        }, 300)
    }

    openClass() {
        if (this.overlay.classList.contains('close')) {
            this.overlay.classList.remove('close');
        }
        this.overlay.classList.add('open');
        this.dropdown.classList.add('open');
    }

    toggleClass() {
        if (this.dropdown.classList.contains('open')) {
            this.removeClass(this.dropdown);
        } else {
            this.openClass(this.dropdown);
        }
    }

    clickHandler() {
        this.dropdown.addEventListener('click', this.toggleEvent)
        this.overlay.addEventListener('click', () => {
            if (this.overlay.classList.contains('open')) {
                this.removeClass();
            }
        })
    }

    init() {
        this.clickHandler();
        this.initialized = true;
    }

    destroy() {
        console.log('destroy')
        if (this.initialized) {
            this.dropdown.removeEventListener('click', this.toggleEvent);
            this.initialized = false;
        }
    }
}

export default Dropdown;