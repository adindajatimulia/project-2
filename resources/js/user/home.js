import '@fortawesome/fontawesome-free/css/all.min.css';

const button = document.querySelector('#hamburgerButton');
const drawer = document.querySelector('#navigationDrawer');
const content = document.querySelector('#mainContent');

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