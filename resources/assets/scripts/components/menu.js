const CONFIG = {
    TRIGGER: '[menu-button]',
    ATTR: 'menu-button',
    CLASS: 'menu__button--active',
    ATTRBG: 'menu-bg',
    CLASSBG: 'menu__bg--active',
    ATTRMENU: 'menu-content',
    CLASSMENU: 'menu__content--active',
  };

  const menu = {
    init() {
      const { TRIGGER } = CONFIG;
      this.triggers = document.querySelectorAll(TRIGGER);
      this.addEvent();
    },

    addEvent() {
      const { ATTR, CLASS, CLASSBG, CLASSMENU } = CONFIG;
      this.triggers.forEach(item => {
        let name = item.getAttribute(ATTR);

        item.addEventListener('click', (event) => {
          let target = event.currentTarget;
          event.preventDefault();
          console.log(name);

          let bg = document.querySelectorAll('[menu-bg]');
          bg.forEach(item => {
            item.classList.remove(CLASSBG);

            if(item.getAttribute('menu-bg') == name) {
              item.classList.add(CLASSBG);
            }
          });

          let menu = document.querySelectorAll('[menu-content]');
          menu.forEach(item => {
            item.classList.remove(CLASSMENU);

            if(item.getAttribute('menu-content') == name) {
              item.classList.add(CLASSMENU);
            }
          });

          this.removeActiveClass();
          target.classList.add(CLASS);
        });
      })
    },

    removeActiveClass() {
      const { CLASS } = CONFIG;
      this.triggers.forEach(trigger => {
        trigger.classList.remove(CLASS);
      });
    },
  };

  export default menu;
