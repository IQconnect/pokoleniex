var Flickity = require('flickity');

const CONFIG = {
    ELEM: '.maingallery',
    CELL: '.maingallery__cell',
};

const Slider = {
    init() {
        const { ELEM } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        if (this.elem) {
            this.createSlider();
            this.resize();
        }
    },

    createSlider() {
        const { CELL } = CONFIG;

        this.elem.forEach(element => {
            this.slider = new Flickity(element, {
                pageDots: false,
                prevNextButtons: false,
                cellSelector: CELL,
                wrapAround: true,
                autoPlay: true,
            });
        });
    },

    resize() {
        if (this.elem.length) {
            this.slider.resize();
        }
    },
};

export default Slider;
