const Parallax = require('parallax-js')

const CONFIG = {
    ELEM: '[movie]',
}

const { ELEM } = CONFIG;

const movie = {
    init() {
        this.elem = document.querySelector(ELEM);
        if(this.elem) {
            new Parallax(this.elem);
        }
    },
}

export default movie;