import IsInViewPort from '../util/IsInViewPort'
import elementInViewport from '../util/elementInViewport'

const CONFIG = {
  ELEM: '[data-extra-menu]',
  HEADER: '[header]',
  SECTIONS: '[data-single-section]',
  CLASS: '-is-active',
};

const ExtraMenu = {
  init() {
    const { ELEM, CLASS, HEADER, SECTIONS } = CONFIG;

    this.$elem = document.querySelectorAll(ELEM);
    this.$header = document.querySelector(HEADER);
    this.sections = document.querySelectorAll(SECTIONS);
    this.allowScroll = true;

    this.class = CLASS;

    if(this.$elem.length) {
      this.$currentLocation = this.getLastPartOfLink();

      this.addEvent();
      this.changeMainMenu();
      // this.checkCurrentPage();
    }
  },

  changeMainMenu() {
    this.$header.classList.add('-is-static')
  },

  checkCurrentPage() {
    console.log('check');

    this.$elem.forEach(element => {
      const link = element.getAttribute('href');
      const location = this.getLastPartOfLink(link);

      if (this.$currentLocation === location) {
        element.classList.add('-is-active');
      }

    });
  },


  getLastPartOfLink(link = window.location.href) {
    const splitedArray = link.split('/');
    const result = splitedArray[splitedArray.length - 2];

    return result
  },

  addEvent() {
    this.$elem.forEach(element => {
        element.addEventListener('click', e => {
            e.preventDefault();

            this.allowScroll = false;

            const $this = e.currentTarget;

            this.$elem.forEach(element => { element.classList.remove(this.class) });

            $this.classList.add(this.class);

            const name = $this.getAttribute('href');
            let offset = $(`${name}`).offset().top;
            let extraOffset = name == '#opis' ? 0 : 100;

            $('html, body').animate({
                scrollTop: offset - extraOffset,
            }, 800);

            setTimeout(()=> {
                this.allowScroll = true;
            }, 900)
        })
    });

    window.addEventListener('scroll', () => {
        this.sections.forEach((elem, index) => {
            if(this.allowScroll) {
                if (IsInViewPort(elem)) {
                    console.log('IsInViewPort', this.$elem[1]);
                    this.$elem.forEach(element => { element.classList.remove(this.class) });
                    this.$elem[index].classList.add(this.class)
                }

                else if(elementInViewport(elem)) {
                  console.log('elementInViewport');
                    this.$elem.forEach(element => { element.classList.remove(this.class) });
                    this.$elem[index].classList.add(this.class)
                }
            }
        })
    });
},
}

export default ExtraMenu;
