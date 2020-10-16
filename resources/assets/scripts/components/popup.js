const CONFIG = {
    TRIGGER: '[data-toggle-popup]',
    ELEM: '[data-popup]',
    CLASS: '-is-active',
  };

  const Popup = {
    init() {
      const { TRIGGER, ELEM } = CONFIG;
      this.$trigger = document.querySelector(TRIGGER);
      this.$elem = document.querySelector(ELEM);

      if(this.$elem) {
        this.addEvent();
      }
    },

    addEvent() {
      const { CLASS } = CONFIG;
      this.$trigger.addEventListener('click', (event) => {
          const $this = event.currentTarget;
          $this.classList.toggle(CLASS);
          this.toggleElem(CLASS);
      });
    },

    toggleElem(CLASS) {
      this.$elem.classList.toggle(CLASS);
    },
  };

  export default Popup;
