var Flickity = require('flickity-as-nav-for');

const CONFIG = {
  ELEM: '.-is-active .flickity-main-gallery',
  NAV: '.-is-active .flickity-gallery-nav',
};

const Slider = {
  init() {
    const { ELEM, NAV } = CONFIG;
    this.elem = document.querySelector(ELEM);
    this.nav = document.querySelector(NAV);

    if (this.elem) {
      this.slider = new Flickity(ELEM, {
        pageDots: false,
        contain: true,
        cellSelector: '.gallery-invest__cell',
        wrapAround: true,
        draggable: false,
        prevNextButtons: false,
        adaptiveHeight: true,
      });

      this.nav = new Flickity(NAV, {
        cellSelector: '.gallery-invest__cell',
        asNavFor: document.querySelector(ELEM),
        contain: true,
        pageDots: false,
        prevNextButtons: false,
      });

      this.slider.resize();
      this.nav.resize();

      setTimeout(() => {
        this.resize();
      }, 100);
    }
  },

  resize() {
    if (this.elem) {
      console.log('resize gi');

      this.slider.resize();
      this.nav.resize();
    }
  },
};

export default Slider;