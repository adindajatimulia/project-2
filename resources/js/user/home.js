import '@fortawesome/fontawesome-free/css/all.min.css';

const button = document.querySelector('#hamburgerButton');
const drawer = document.querySelector('#navigationDrawer');
const content = document.querySelector('#mainContent');
const dropdownToggle = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown ul');

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

button.addEventListener('click', (event) => {
  event.stopPropagation();
  drawer.classList.toggle('open');
});

content.addEventListener('click', (event) => {
  event.stopPropagation();
  drawer.classList.remove('open');
});

window.addEventListener('scroll', () => {
  drawer.classList.remove('open');
});