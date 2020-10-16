const CONFIG = {
  TRIGGER: '[data-toggle-menu]',
  ELEM: '[data-nav]',
  CLASS: 'is-active',
  CLASS2: 'open',
  BODY: '[data-body]',
  HIDDEN: 'hidden',
};

const toggleMenu = {
  init() {
    const { TRIGGER, ELEM, BODY } = CONFIG;
    this.$trigger = document.querySelector(TRIGGER);
    this.$elem = document.querySelector(ELEM);
    this.$body = document.querySelector(BODY);
    this.addEvent();
  },

  addEvent() {
    const { CLASS, CLASS2, HIDDEN } = CONFIG;
    this.$trigger.addEventListener('click', (event) => {
        const $this = event.currentTarget;
        $this.classList.toggle(CLASS2);
        this.toggleElem(CLASS);
        this.toggleOverflow(HIDDEN);
    });
  },

  toggleElem(CLASS) {
    this.$elem.classList.toggle(CLASS);
  },

  toggleOverflow(HIDDEN) {
    this.$body.classList.toggle(HIDDEN);
  },
};

export default toggleMenu;
