var Flickity = require('flickity');

const CONFIG = {
    ELEM: '.hero',
    CELL: '.hero__cell',
    CLASS: '-is-active',
};

const Hero = {
    init() {
        const { ELEM, CLASS } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        this.class = CLASS;
        this.sliders = [];
        console.log('this.elem', this.elem.length);
        if (this.elem.length) {
            this.createSlider();
            this.resize();

            this.addEvents();
        }
    },

    createSlider() {
        const { CELL } = CONFIG;

        this.elem.forEach(element => {
            console.log(element);
            const slider = new Flickity(element, {
                pageDots: false,
                prevNextButtons: false,
                draggable: false,
                cellSelector: CELL,
                autoPlay: 6000,
                pauseAutoPlayOnHover: false,
                wrapAround: true,
            });

            console.log(slider);
            this.sliders.push(slider);
        });
    },



    addEvents() {
        this.btn.forEach(elem => {
            elem.addEventListener('click', (e) => {
                const index = e.currentTarget.dataset.index;
                this.changeSlide(index);
            })
        })
    },


    resize() {
        console.log('resize INIT', this.sliders);
        if (this.sliders) {
            this.sliders.forEach(element => {
                console.log('resize');
                element.resize();
            });
        }
    },
};

export default Hero;
