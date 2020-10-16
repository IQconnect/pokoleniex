const Flickity = require('flickity-bg-lazyload');

const CONFIG = {
  ELEM : 'ytvideo',
};


// deklarowanie obiektu
const slidervideo = {
  init() {
    const { ELEM } = CONFIG;
    this.elem = document.querySelectorAll(`[${ELEM}]`);

    this.slidervideo = new Flickity('.carousel-slidervideo', {
      prevNextButtons: true,
      pageDots: false,
      wrapAround: true,
      autoPlay: false,
      imagesLoaded: true,
      draggable: false,
    });
    this.resize();

    this.slidervideo.on( 'change',() => {
      this.elem.forEach((element)=>{
        element.contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
      });

    });
  },

  resize() {
    window.onload = () => {
      this.slidervideo.resize();
    };
  },
};

export default slidervideo;
