//! Add Event
function add_event(selector, event, callback) {
   let el = document.querySelectorAll(selector);
   el.forEach(function (value) {
       value.addEventListener(event, callback);
   });
}


// //! Swiper
var swiper = new Swiper(".mySwiper", {
   loopFillGroupWithBlank: true,
   
   breakpoints : {
      480: {
         slidesPerView: 2,
         spaceBetween: 10
      },

      640: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      900: {
         slidesPerView: 4,
         spaceBetween: 10
      },

      1200: {
         slidesPerView: 5,
         spaceBetween: 10
      },
   },

   // loop: true,

   navigation: {
     nextEl: ".swiper-arrow-next",
     prevEl: ".swiper-arrow-previous",
   },
 });

 var swiper = new Swiper(".mySwiper2", {
   loopFillGroupWithBlank: true,
   
   breakpoints : {
      480: {
         slidesPerView: 1,
         spaceBetween: 10
      },

      640: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      900: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      1200: {
         slidesPerView: 4,
         spaceBetween: 10
      },
   },

   // loop: true,

   navigation: {
     nextEl: ".swiper-arrow-next",
     prevEl: ".swiper-arrow-previous",
   },
 });

 
 //! Product Gallery
 var swiper = new Swiper(".mySwiper3", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
   });
var swiper2 = new Swiper(".mySwiper4", {
   spaceBetween: 10,
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },
   thumbs: {
   swiper: swiper,
   },
});

   
//! More Category
let categoryButton = document.querySelectorAll('.category-text');
categoryButton.forEach(function(value){
   value.addEventListener('click', function(){
      this.nextElementSibling.classList.toggle('active');
   });
}); 



//! Mobile Menu
let openCategory = document.querySelector('.open-category'); 
let openNav = document.querySelector('.open-nav'); 

let closeNav = document.querySelector('.close-nav'); 

let categoryMobile = document.querySelector('.category-mobile'); 
let navMobile = document.querySelector('.nav-mobile'); 

let backClose = document.querySelector('.back-close');

openCategory.addEventListener('click', function(){
   categoryMobile.classList.add('active-right');
   backClose.classList.add('active-left');
});

backClose.addEventListener('click', function(){
   categoryMobile.classList.remove('active-right');
   navMobile.classList.remove('active-left');
   backClose.classList.remove('active-left');
});

openNav.addEventListener('click', function(){
   navMobile.classList.add('active-left');
   backClose.classList.add('active-left');
});


//! Active Content Box
let tabProductItem = document.querySelectorAll('.tab-product-item');
let ContentBox = document.querySelectorAll('.content-box');

tabProductItem.forEach(function(tab, tab_index){
   tab.addEventListener('click', function(){
      tabProductItem.forEach(function(tab){
         tab.classList.remove('active');
         tab.classList.remove('tab-product-item-active');
      });
      tab.classList.add('active');
      tab.classList.add('tab-product-item-active');

      ContentBox.forEach(function(content, content_index){
         if(content_index == tab_index){
            content.style.display = 'block';
         } else {
            content.style.display = 'none';
         }
      });
   });
});


//! Brand Filter
let brandIcon = document.querySelector('.brand-icon');
let brands = document.querySelector('.brands');

brandIcon.addEventListener('click', function(){
   brands.classList.toggle('active-brands');
});


//! Filter Mobile
let filterMobile = document.querySelector('.filter-mobile');
let filterBox = document.querySelector('.filter-box');

filterMobile.addEventListener('click', function(){
   filterBox.classList.add('active-right');
   backClose.classList.add('active-right');
});

backClose.addEventListener('click', function(){
   filterBox.classList.remove('active-right');
   backClose.classList.remove('active-right');
});


//! More Option Cart
// let dots = document.querySelector('.dots'); 
// let moreOptionCart = document.querySelector('.more-option-cart'); 

// dots.addEventListener('click', function(){
//    moreOptionCart.classList.toggle('active-more-option-cart');
// });


//! Filters
function change() {
   let results = Array.from(document.querySelectorAll('.filters > div'));
   // Hide all results
   results.forEach(function (result) {
      result.style.display = 'none';
   });
   // Filter results to only those that meet ALL requirements:
   Array.from(document.querySelectorAll('input[rel]:checked'), function (input) {
      const attrib = input.getAttribute('rel');
      results = results.filter(function (result) {
         return result.classList.contains(attrib);
      });
   });
   // Show those filtered results:
   results.forEach(function (result) {
      result.style.display = 'block';
   });
}

change();





