var Flickity = require('flickity');

const CONFIG = {
    ELEM: '.slider__carousel',
    CELL: '.slider__cell',
};

const contentSlider = {
    init() {
        const { ELEM, CELL } = CONFIG;
        this.elem = document.querySelectorAll(ELEM);
        this.cell = document.querySelectorAll(CELL);
        console.log('Init slider', this.elem)
        if (this.elem) {
            this.elem.forEach(element => {
                this.slider = new Flickity(element, {
                    pageDots: true,
                    prevNextButtons: false,
                    cellSelector: CELL,
                    wrapAround: true,
                    autoPlay: 3000,
                    pauseAutoPlayOnHover: false,
                });

                setTimeout(()=> {
                    this.slider.resize();
                }, 1000)
            });
            this.checkImages()
        }
    },

    checkImages() {
        this.cell.forEach((element, index) => {
            const img = element.querySelector('img');
            const width = Number(img.getAttribute('width'));
            const height = Number(img.getAttribute('height'));

            const condiitions = width < height;

            if(condiitions) {
                console.log(index, ': ', width, height, condiitions);
                img.classList.add('-vertical');
            }
        });
    },
};

export default contentSlider;