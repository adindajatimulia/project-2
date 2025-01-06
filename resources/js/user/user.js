import '@fortawesome/fontawesome-free/css/all.min.css';

const button = document.querySelector('#hamburgerButton');
const drawer = document.querySelector('#navigationDrawer');
const content = document.querySelector('#mainContent');
const cartButton = document.querySelector('.cart-button'); 
const searchButton = document.querySelector('.search-button'); 
const closeButtons = document.querySelectorAll('.popup__header button');
const popupSearch = document.querySelector('.popup-search');
const popupCart = document.querySelector('.popup-cart');
const popupMenuDetail = document.querySelector('.popup-menu-detail');
const cards = document.querySelectorAll('.card');

cards.forEach((card) => {
  card.addEventListener('click', () => {
    popupMenuDetail.classList.add('open');
  });
});

searchButton.addEventListener('click', () => {
  popupSearch.classList.add('open');
});

cartButton.addEventListener('click', () => {
  popupCart.classList.add('open');
});

closeButtons.forEach((closeButton) => {
  closeButton.addEventListener('click', () => {
    closeButton.parentElement.parentElement.classList.remove('open');
  });
});

content.addEventListener('click', (event) => {
  event.stopPropagation();
  drawer.classList.remove('open');
});