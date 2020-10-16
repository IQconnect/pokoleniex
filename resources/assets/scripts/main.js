// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
// import Router from './util/Router';
// import common from './routes/common';
// import home from './routes/home';
// import aboutUs from './routes/about';
// import AOS from 'aos';


import header from './components/header';
import menu from './components/menu';
import hamburger from './components/hamburger';
import slider from './components/slider';
import slidervideo from './components/slidervideo';

/** Populate Router instance with DOM routes */
// const routes = new Router({
//   // All pages
//   common,
//   // Home page
//   home,
//   // About Us page, note the change from about-us to aboutUs.
//   aboutUs,
// });

// Load Events
jQuery(document).ready(() => {
  console.log('READY');
  menu.init();
  header.init();
  hamburger.init();



  if($('.carousel-slider').length) {
    slider.init();
  }


  if($('.carousel-slidervideo').length) {
    slidervideo.init();
  }
});
