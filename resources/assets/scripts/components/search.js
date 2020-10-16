const CONFIG = {
	TRIGGER: '.header__search',
	CLOSE: '.search-modal__close',
	SEARCH: '.search-modal',
	CLASS: 'search-modal--active',
  };

  const search = {
	init() {
	const { TRIGGER, SEARCH, CLOSE } = CONFIG;
	this.trigger = document.querySelector(TRIGGER);
	this.close = document.querySelector(CLOSE);
	this.search = document.querySelector(SEARCH);
	console.log(this.search);

	if(this.trigger && this.close) {
	this.addEvent();
	console.log(this.search);
	}
	},

	addEvent() {
	const { CLASS } = CONFIG;
	this.trigger.addEventListener('click', (event) => {
	event.preventDefault();
	this.search.classList.toggle(CLASS);
	document.body.parentElement.classList.toggle('is-hidden');
	});

	this.close.addEventListener('click', (event) => {
	event.preventDefault();
	this.search.classList.toggle(CLASS);
	document.body.parentElement.classList.toggle('is-hidden');
	});
	},
  };

  export default search;
