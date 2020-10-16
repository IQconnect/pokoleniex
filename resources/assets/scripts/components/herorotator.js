const CONFIG = {
    TRIGGER : 'slide-button',
    ELEM : 'slide',
    IMAGE: 'slide-img',
    CLASS : {
        ADD: '-is-active',
        HOLD: '-on-hold',
    },
};

const rotator = {
    init() {
        const { TRIGGER, ELEM, IMAGE, CLASS } = CONFIG;
        this.trigger = document.querySelectorAll(`[${TRIGGER}]`);
        this.elem = document.querySelectorAll(`[${ELEM}]`);
        this.image = document.querySelectorAll(`[${IMAGE}]`);
        this.time = 8000;
        this.activ = 0;
        this.addClass = CLASS.ADD;
        this.holdClass = CLASS.HOLD;
        this.max = this.elem.length - 1;
        this.addEvents();
        this.autoSlide();
        this.setCurrent(0);
    },

    addEvents() {
        Array.from(this.trigger).forEach(element => {

            element.disabled = false;

            element.addEventListener('click', (event) => {
                const $this = event.currentTarget;
                const direction = $this.getAttribute('data-direction');
                
                this.holdController(this.activ);

                if(direction == 'next') this.increment();                   
                else this.decrement();

                this.setCurrent(this.activ);
                $this.disabled = true;

                setTimeout(()=> {
                    $this.disabled = false;
                }, 400)

                clearInterval(this.interval);
                this.autoSlide();
            })
        });
    },

    increment() {
        this.activ++;

        if(this.activ > this.max) {
            this.activ = 0;
        }
    },

    decrement() {
        this.activ--;

        if(this.activ < 0) {
            this.activ = this.max;
        }
    },

    setCurrent($i) {
        Array.from(this.elem).forEach((element, index) => {
            setTimeout(()=>{
                if(index == $i) element.classList.add(this.addClass);
                else element.classList.remove(this.addClass);
            }, 700);

            
            setTimeout(()=>{
                element.classList.remove(this.holdClass);
            }, 1000);
        });  

        Array.from(this.image).forEach((element, index) => {
            setTimeout(()=>{
                if(index == $i) element.classList.add(this.addClass);
                else element.classList.remove(this.addClass);
            }, 700);

            
            setTimeout(()=>{
                element.classList.remove(this.holdClass);
            }, 1000);
        });  
    },

    holdController($i) {
         this.elem[$i].classList.add(this.holdClass);
         this.image[$i].classList.add(this.holdClass);
    },

    autoSlide() {
        const intervalFunc = () => {
            this.increment();
            console.log('next');
            this.setCurrent(this.activ);
        }

        if(this.image.length > 1) {
            this.interval = setInterval(intervalFunc, this.time);
        }
    },
};

export default rotator;