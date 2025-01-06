@extends('user.user')

@section('content')

<section class="carousel">
    <h1 class="carousel__header font-organetto">Enjoy delicious food</h1>
    <div class="carousel__slider">
        <div class="carousel__slider__container">
            @foreach ([
                ['id' => 1, 'src' => 'https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg', 'alt' => 'Delicious food with 30% discount'],
                ['id' => 2, 'src' => 'https://cdn0-production-images-kly.akamaized.net/hSeBOXCB-KjHC_0916jn3J95P6Y=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1697136/original/002803100_1504182506-amazingraze.s3.amazonaws.com1.jpg', 'alt' => 'Delicious food with 30% discount'],
                ['id' => 3, 'src' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/93/2024/08/14/telur-puyuh-20220531-121025-1450890706.jpg', 'alt' => 'Delicious food with 30% discount']
            ] as $item)
                <figure class="carousel__slider__container__item {{ $item['id'] === 1 ? 'active' : '' }}" id="{{ $item['id'] }}">
                    <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" />
                    <figcaption class="carousel__slider__container__item__caption">
                        Get your 30% daily discount now
                        <button>Get Your Discount</button>
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

<section class="category">
    <div class="category__container">
        <div class="category__container__slider">
            @foreach ([
                ['title' => 'Minuman'],
                ['title' => 'Makanan'],
                ['title' => 'Snack'],
                ['title' => 'Masakan Nusantara'],
                ['title' => 'Sate'],
                ['title' => 'Semua Menu']
            ] as $key => $category)
                @if ($key % 2 == 0)
                    <figure>
                        <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="{{ $category['title'] }}" />
                        <figcaption>{{ $category['title'] }}</figcaption>
                    </figure>

                @else
                    <figure class="second">
                        <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="{{ $category['title'] }}" />
                        <figcaption>{{ $category['title'] }}</figcaption>
                    </figure>
                @endif
            @endforeach
        </div>

        <div class="category__container__slider second">
            @foreach ([
                ['title' => 'Minuman'],
                ['title' => 'Makanan'],
                ['title' => 'Snack'],
                ['title' => 'Masakan Nusantara'],
                ['title' => 'Sate'],
                ['title' => 'Semua Menu']
            ] as $key => $category)
                @if ($key % 2 != 0)
                    <figure>
                        <img src="https://cdn0-production-images-kly.akamaized.net/EAbi53ClPFWop0gOwkZQS0J9Rjc=/1x135:1000x698/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4703886/original/010040500_1704118595-shutterstock_2290464261.jpg" alt="{{ $category['title'] }}" />
                        <figcaption>{{ $category['title'] }}</figcaption>
                    </figure>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="category-item">
    <div class="category-item__navigation">
        @foreach (['Rekomendasi', 'Populer', 'Koleksi'] as $nav)
            <button class="font-organetto {{ $loop->first ? 'active' : '' }}">{{ $nav }}</button>
        @endforeach
    </div>
    <div class="category-item__container">
        @foreach ([
            ['name' => 'Tempe Bacem', 'price' => 'Rp. 25.000'],
            ['name' => 'Sate Telur Puyuh', 'price' => 'Rp. 25.000'],
            ['name' => 'Bakwan Sayur', 'price' => 'Rp. 25.000'],
            ['name' => 'Bakwan Jagung', 'price' => 'Rp. 20.000'],
            ['name' => 'Sate Ayam', 'price' => 'Rp. 25.000']
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
</section>

<section class="popup-menu-detail">
    <div class="popup__header">
        <img src="" />
        <button><i class="fa-solid fa-x"></i></button>
    </div>
    
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
    </div>

    <div class="popup-menu-detail-content">
        <div class="popup-menu-detail-content__info">
            <h2>Sate Telur Puyuh</h2>
            <div class="popup-menu-detail-content__info__price">
                <img src="/icons/money-icon.svg" />
                <p>Rp. 25.000</p>
            </div>
            <p class="popup-menu-detail-content__info__description">Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</p>
        </div>
        <button>Tambah ke keranjang</button>
    </div>
</section>

@vite(['resources/js/user/menu.js'])

@endsection
