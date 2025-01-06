<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CWB Resto</title>
    @vite(['resources/css/home.css'])
    @vite(['resources/css/carousel.css'])
  </head>
  <body>
    <header class="app-bar">
      <div class="app-bar__logo">
        <img src="" alt="Logo" />
      </div>
      <nav id="navigationDrawer" class="app-bar__navigation">
        <ul>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="/menu">Order Now</a></li>
        </ul>
      </nav>
      <a href="/menu">Order Now</a>
      <button id="hamburgerButton">☰</button>
    </header>

    <main id="mainContent">
      <section class="jumbotron">
        <figure>
          <img src="../icons/carousel-landingpage.png" alt="Jumbotron Image" />
          <figcaption>
            <h1 class="font-organetto">BUITENHOF</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#">Lihat Menu</a>
          </figcaption>
        </figure>
      </section>

      <section class="about-us">
        <h3 class="heading font-organetto">Tentang Kami</h3>
        <div class="about-us__content">
          <figure>
            <img src="https://awsimages.detik.net.id/community/media/visual/2023/12/25/rumah-berusia-ratusan-tahun-milik-emah-84-di-dusun-hambawang-desa-padaasih-kecamatan-conggeang-sumedang-1.jpeg?w=600&q=90" alt="About Us Image 1" />
            <figcaption>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae quas quibusdam dignissimos magni veniam temporibus ipsa voluptates in expedita nisi maxime doloremque quae, provident ea doloribus sapiente numquam consequuntur aperiam.
            </figcaption>
          </figure>
          <figure>
            <img src="https://awsimages.detik.net.id/community/media/visual/2023/12/25/rumah-berusia-ratusan-tahun-milik-emah-84-di-dusun-hambawang-desa-padaasih-kecamatan-conggeang-sumedang-1.jpeg?w=600&q=90" alt="About Us Image 2" />
            <figcaption>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae quas quibusdam dignissimos magni veniam temporibus ipsa voluptates in expedita nisi maxime doloremque quae, provident ea doloribus sapiente numquam consequuntur aperiam.
            </figcaption>
          </figure>
        </div>
      </section>

      <section class="carousel homepage">
        <h3 class="heading font-organetto">Our Signature</h3>
        <div class="carousel__slider">
          <div class="carousel__slider__container">
            @foreach ([
              ['id' => 1, 'src' => 'https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg', 'alt' => 'Delicious food with 30% discount'],
              ['id' => 2, 'src' => 'https://cdn0-production-images-kly.akamaized.net/hSeBOXCB-KjHC_0916jn3J95P6Y=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1697136/original/002803100_1504182506-amazingraze.s3.amazonaws.com1.jpg', 'alt' => 'Delicious food with 30% discount'],
              ['id' => 3, 'src' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/93/2024/08/14/telur-puyuh-20220531-121025-1450890706.jpg', 'alt' => 'Delicious food with 30% discount']
            ] as $item)
              <figure class="carousel__slider__container__item" id="{{ $item['id'] }}">
                <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" />
                <figcaption class="carousel__slider__container__item__caption">
                  <h4>Kopi Susu</h4>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus explicabo provident magnam laudantium ab! Nulla corporis maxime atque quasi dolorem, ullam deserunt optio iusto odio ut, esse dicta doloribus saepe!</p>
                </figcaption>
              </figure>
            @endforeach
          </div>
          <div class="carousel__slider__dots">
            @foreach ([1, 2, 3] as $id)
              <button class="{{ $id === 1 ? 'active' : '' }}" data-target="{{ $id }}"></button>
            @endforeach
          </div>
        </div>
      </section>
    </main>

    @include('user.footer')
    @vite(['resources/js/user/home.js'])
  </body>
</html>
