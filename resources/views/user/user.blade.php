<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" href="/icons/logo.png">
    <link rel="icon" href="/icons/logo.png">

    <title>Buitenhof</title>
    @vite(['resources/css/user.css'])
  </head>
  <body>
    <header class="app-bar">
      <div class="app-bar__logo">
        <img src="/icons/logo.png" alt="">
      </div>
      <nav id="navigationDrawer" class="app-bar__navigation">
        <ul>
          <li>
            <button class="cart-button">
              <i class="fa-solid fa-cart-shopping"></i>
            </button>
          </li>
          <li>
            <button class="search-button">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </li>
          <li class="dropdown">
            <button class="dropdown-button">
              <i class="fa-solid fa-globe"></i>
            </button>
            <ul class="dropdown-menu">
              <li><button class="active" data-lang="id"><img src="/icons/indonesia-flag.svg" alt=""> Indonesia</button></li>
              <li><button data-lang="en"><img src="/icons/english-flag.svg" alt=""> English</button></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <main id="mainContent">
      @yield('content')

      <div class="popup-search">
        <div class="popup__header">
          <img src="/icons/logo.png" />
          <button>
            <i class="fa-solid fa-x"></i>
          </button>
        </div>
        <div class="popup-search__input">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input placeholder="Masukkan makanan yang ingin anda cari" />
        </div>
        <div class="category-item__container">
          @foreach ([
            ['name' => 'Tempe Bacem', 'price' => 'Rp. 25.000'],
            ['name' => 'Sate Telur Puyuh', 'price' => 'Rp. 25.000'],
            ['name' => 'Bakwan Sayur', 'price' => 'Rp. 25.000'],
            ['name' => 'Bakwan Jagung', 'price' => 'Rp. 20.000'],
          ] as $item)
            <figure class="card">
              <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="{{ $item['name'] }}" />
              <figcaption>
                <button>{{ $item['name'] }}</button>
                <div class="card__price">
                  <img src="/icons/money-icon.svg" />
                  <p>{{ $item['price'] }}</p>
                </div>
              </figcaption>
            </figure>
          @endforeach
        </div>
      </div>

      <div class="popup-cart">
        <div class="popup__header">
          <img src="/icons/logo.png" />
          <h2>
            <i class="fa-solid fa-cart-shopping"></i>Keranjang
          </h2>
          <button>
            <i class="fa-solid fa-x"></i>
          </button>
        </div>
        <div class="popup-cart__content">
          <div class="cart-item">
            <div class="cart-item__image">
              <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="Sate Ayam" />
            </div>
            <div class="cart-item__content">
              <p class="cart-item__content__name">Sate Ayam</p>
              <p class="cart-item__content__price">Rp. 25.000</p>
              <div class="cart-item__content__action">
                <div class="cart-item__content__action__setting">
                  <button class="cart-item__content__action__setting__minus">-</button>
                  <p class="cart-item__content__action__setting__quantity">2</p>
                  <button class="cart-item__content__action__setting__plus">+</button>
                </div>
                <button class="cart-item__content__action__remove">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="cart-item">
            <div class="cart-item__image">
              <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="Sate Ayam" />
            </div>
            <div class="cart-item__content">
              <p class="cart-item__content__name">Sate Ayam</p>
              <p class="cart-item__content__price">Rp. 25.000</p>
              <div class="cart-item__content__action">
                <div class="cart-item__content__action__setting">
                  <button class="cart-item__content__action__setting__minus">-</button>
                  <p class="cart-item__content__action__setting__quantity">2</p>
                  <button class="cart-item__content__action__setting__plus">+</button>
                </div>
                <button class="cart-item__content__action__remove">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="popup-cart__content__footer">
          <h3>Detail Pembayaran</h3>
          <table class="summary-table">
            <tbody>
              <tr>
                <td class="label">Sub Total</td>
                <td class="value">Rp. 50.000</td>
              </tr>
              <tr>
                <td class="label">Taxes & Fees</td>
                <td class="value">Rp. 2.000</td>
              </tr>
              <tr class="total-row">
                <td class="label">Total</td>
                <td class="value">Rp. 52.000</td>
              </tr>
            </tbody>
          </table>
          <a href="/order-detail">Pesan</a>
        </div>
      </div>
    </main>

    @include('user.footer')
    @vite(['resources/js/user/user.js'])
  </body>
</html>
