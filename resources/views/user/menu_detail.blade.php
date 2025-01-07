<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" href="/icons/logo.png">
    <link rel="icon" href="/icons/logo.png">
    <title>CWB Resto</title>
    @vite(['resources/css/menu_detail.css'])
    @vite(['resources/css/carousel.css'])
  </head>
  <body>
    <header>
      <a href="/menu"><i class="fa-solid fa-arrow-left"></i></a>
      <img src="/icons/logo.png" alt="Logo" />
    </header>
    <main class="menu-detail">
    <div class="carousel__slider">
        <div class="carousel__slider__container">
            <img class="carousel__slider__container__item active" 
                 src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" 
                 alt="Delicious food with 30% discount" />

            <img class="carousel__slider__container__item" 
                 src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" 
                 alt="Delicious food with 30% discount" />
        </div>
        <div class="carousel__slider__dots">
            <button class="active" data-target="1"></button>
            <button data-target="2"></button>
        </div>
        <div class="menu-detail-content">
        <div class="menu-detail-content__info">
            <h2>Sate Telur Puyuh</h2>
            <div class="menu-detail-content__info__price">
                <img src="/icons/money-icon.svg" />
                <p>Rp. 25.000</p>
            </div>
            <p class="menu-detail-content__info__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium officiis natus odit, dicta eos fugit atque labore amet nulla hic dolor, pariatur minus sequi iste dolorum deleniti! Qui, voluptates! Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</p>
        </div>
    </div>
    <button class="add-to-cart">Tambah ke keranjang</button>
    </div>
</main>
    @vite(['resources/js/user/menu_detail.js'])
  </body>
</html>
