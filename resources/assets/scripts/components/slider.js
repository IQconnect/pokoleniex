const Flickity = require('flickity-bg-lazyload');

// deklarowanie obiektu
const slider = {
  init() {
    this.slider = new Flickity('.carousel-slider', {
      prevNextButtons: true,
      pageDots: false,
      wrapAround: true,
      autoPlay: true,
      contain: true,
      cellAlign: 'left',
      bgLazyLoad: 1,
      percentPosition: true,
      arrowShape:'M98.8,42.4v15.7H30.3l25.3,14.7v15.9L1.2,56.9V43.6l54.5-32.3V27L30.3,42.4H98.8z',
    });
    this.resize();
  },

  resize() {
    window.onload = () => {
      this.slider.resize();
    };
  },
};

export default slider;
