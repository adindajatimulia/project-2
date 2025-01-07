import '@fortawesome/fontawesome-free/css/all.min.css';

const button = document.querySelector('#hamburgerButton');
const drawer = document.querySelector('#navigationDrawer');
const content = document.querySelector('#mainContent');
const cartButton = document.querySelector('.cart-button'); 
const searchButton = document.querySelector('.search-button'); 
const closeButtons = document.querySelectorAll('.popup__header button');
const popupSearch = document.querySelector('.popup-search');
const popupCart = document.querySelector('.popup-cart');
const dropdownToggle = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownToggle.addEventListener('click', () => {
  if (dropdownMenu.classList.contains('show')) {
    dropdownMenu.classList.remove('show');
  } else {
    dropdownMenu.classList.add('show');
  }
});

document.addEventListener('click', (event) => {
  if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.classList.remove('show');
  }
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