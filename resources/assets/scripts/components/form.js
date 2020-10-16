import 'jquery';

const CONFIG = {
    ELEM: '[data-form]',
    TEXTAREA: '[data-textarea]',
    CLASS: '-was-send',
};

const FORM = {
    init() {
        const { ELEM, TEXTAREA, CLASS } = CONFIG;

        this.elem = document.querySelector(ELEM);
        this.textarea = document.querySelector(TEXTAREA);
        this.class = CLASS;

        if(this.elem) {
            this.addEvents();
            this.autoSize();
        }
    },

    addEvents() {
        console.log('addEvents');
        this.elem.addEventListener('submit', e => {
            e.preventDefault();
            console.log(e, 'test');

            this.elem.classList.add(this.class);
        });
    },

    autoSize() {
        $('textarea').each(function () {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    },
};

export default FORM;