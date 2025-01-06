const carouselContainer = document.querySelector('.carousel__slider__container');
const carouselPaginations = document.querySelectorAll('.carousel__slider__dots button');
let slideInterval;

const scrollToItem = (nextElement, carouselContainer) => {    
  carouselContainer.scrollTo({
    left: nextElement.offsetLeft,
    behavior: 'smooth',
  });
}

const resetAutoSlide = () => {
  clearInterval(slideInterval);
  autoSlide(document.querySelector('.carousel__slider__container'));
};

const autoSlide = (carouselContainer) => {
  slideInterval = setInterval(() => {
    const currentElement = carouselContainer.querySelector('.carousel__slider__container__item.active');
    const nextElement = currentElement.nextElementSibling 
    ? currentElement.nextElementSibling 
    : carouselContainer.firstElementChild;

    currentElement.classList.remove('active');
    nextElement.classList.add('active');

    scrollToItem(nextElement, carouselContainer);
    updatePaginationOnScroll(carouselContainer);
  }, 3000);

  slideInterval = slideInterval;
};

const removeActiveClassFromPagination = () => {
  document.querySelector('.carousel__slider__dots button.active').classList.remove('active');
};

const updatePaginationOnScroll = (carouselContainer) => {
  const carouselPaginationIndex = carouselContainer.scrollLeft / carouselContainer.clientWidth;
  const activePaginationButton = document.querySelectorAll('.carousel__slider__dots button')[Math.round(carouselPaginationIndex)];
  removeActiveClassFromPagination();
  activePaginationButton.classList.add('active');
  carouselContainer.querySelector('.carousel__slider__container__item.active').classList.remove('active');
  carouselContainer.children[Math.round(carouselPaginationIndex)].classList.add('active');
};

const syncPaginationWithScroll = (carouselContainer) => {
  carouselContainer.addEventListener('scroll', () => {
    updatePaginationOnScroll(carouselContainer);
    resetAutoSlide();
  });
};

const handlePaginationClick = (carouselPagination) => {
  const target = carouselPagination.getAttribute('data-target');
  const targetElement = document.getElementById(target);

  removeActiveClassFromPagination();
  carouselPagination.classList.add('active');

  targetElement.scrollIntoView({
    behavior: 'smooth',
    block: 'nearest',
    inline: 'start',
  });
};


const initializePaginationButtons = (carouselPaginations) => {
  carouselPaginations.forEach((carouselPagination) => {
    carouselPagination.addEventListener('click', () => {
    handlePaginationClick(carouselPagination);
    });
  });
};

initializePaginationButtons(carouselPaginations);
syncPaginationWithScroll(carouselContainer);
autoSlide(carouselContainer);