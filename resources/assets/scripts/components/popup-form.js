const CONFIG = {
    TOGGLE: 'data-toggle-form',
    ELEM: 'data-popup-form',
    CLASS: {
        active: '-is-active',
    },
};

const { TOGGLE, ELEM, CLASS } = CONFIG;

const toggleForm = {
    init() {
        this.toggle = document.querySelectorAll(`[${TOGGLE}]`);
        this.elem = document.querySelector(`[${ELEM}]`);
        this.class = CLASS;

        this.addEvents();
    },

    addEvents() {
        this.toggle.forEach(element => {
            element.addEventListener('click', () => {
                console.log('hello');

                this.elem.classList.toggle(this.class.active);
            });
        });
    },
}

export default toggleForm;