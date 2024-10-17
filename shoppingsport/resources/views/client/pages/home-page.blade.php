@extends('client.layouts.master')

@section('content')
    <div class="home w-100">
        <div class="container">
            <div class="ck ck-reset ck-editor ck-rounded-corners w-100" role="application" dir="ltr">
                <div class="ck-content w-100">
                    <section class="wrap w-100 short_code slider flex-center-right flex-75" style="">
                        <div class="wrap-flex w-100">
                            <div class="wrap-flex__full w-100">
                                <div class="s-wrap banner w-100" id="slider-1-flex-75" data-autoplay="0" data-nav="1"
                                    data-dot="1">
                                    <div class="slides s-content w-100">
                                        <div class="item">
                                            <div class="item-wrap" title="" data-href="">
                                                <div class="item-wrap__content flex-center-left">
                                                    <div>
                                                        <p class="title"></p>
                                                        <p class="description"></p>
                                                    </div>
                                                </div>
                                                <img src="{{showImageStorage($config->slider1)}}"
                                                    alt="slide1" width="930px" height="520px" />
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-wrap" title="" data-href="">
                                                <div class="item-wrap__content flex-center-left">
                                                    <div>
                                                        <p class="title"></p>
                                                        <p class="description"></p>
                                                    </div>
                                                </div>
                                                <img loading="lazy"
                                                    src="{{showImageStorage($config->slider2)}}"
                                                    alt="slide2" width="930px" height="520px" />
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-wrap" title="" data-href="">
                                                <div class="item-wrap__content flex-center-left">
                                                    <div>
                                                        <p class="title"></p>
                                                        <p class="description"></p>
                                                    </div>
                                                </div>
                                                <img loading="lazy"
                                                    src="{{showImageStorage($config->slider3)}}"
                                                    alt="slide3" width="930px" height="520px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="short_code w-100" style="">
                        <div class="banner-list web flex-center-between w-100">
                            <div class="banner-list__item">
                                <div class="wrap">
                                    <div class="thumnail">
                                        <img loading="lazy"
                                            src="https://thanhloisport.com/uploads/2023/07/ghe-tap-ta-4.png.webp"
                                            alt="ghe-tap-ta-4" width="400px" height="235px" />
                                    </div>
                                    <div class="content">
                                        <div class="content-wrap">
                                            <p class="content-wrap__badge">
                                                <span class="badge">CHẤT LƯỢNG CAO</span>
                                            </p>
                                            <p class="content-wrap__title">GHẾ TẬP TẠ</p>
                                            <a class="content-wrap__link flex-inline-center-left"
                                                href="https://thanhloisport.com/ghe-tap-ta" aria-label="XEM THÊM">XEM THÊM
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12"
                                                    fill="#fff">
                                                    <path
                                                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z">
                                                    </path>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-list__item">
                                <div class="wrap">
                                    <div class="thumnail">
                                        <img loading="lazy"
                                            src="https://thanhloisport.com/uploads/2023/07/gian-ta-da-nang-hq-808p-1.png.webp"
                                            alt="gian-ta-da-nang-hq-808p-1" width="400px" height="235px" />
                                    </div>
                                    <div class="content">
                                        <div class="content-wrap">
                                            <p class="content-wrap__badge">
                                                <span class="badge">CHUẨN PHÒNG GYM</span>
                                            </p>
                                            <p class="content-wrap__title">GIÀN TẠ ĐA NĂNG</p>
                                            <a class="content-wrap__link flex-inline-center-left"
                                                href="https://thanhloisport.com/dung-cu-tap-gym" aria-label="XEM THÊM">XEM
                                                THÊM
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12"
                                                    fill="#fff">
                                                    <path
                                                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z">
                                                    </path>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-list__item">
                                <div class="wrap">
                                    <div class="thumnail">
                                        <img loading="lazy"
                                            src="https://thanhloisport.com/uploads/2023/07/ghemassage.png.webp"
                                            alt="ghemassage" width="400px" height="235px" />
                                    </div>
                                    <div class="content">
                                        <div class="content-wrap">
                                            <p class="content-wrap__badge">
                                                <span class="badge">CHUẨN QUỐC TẾ</span>
                                            </p>
                                            <p class="content-wrap__title">GHẾ MASSAGE</p>
                                            <a class="content-wrap__link flex-inline-center-left" href="/ghe-massage"
                                                aria-label="XEM THÊM">XEM THÊM
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    height="12" fill="#fff">
                                                    <path
                                                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z">
                                                    </path>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="short-product short_code" style="">
                        <div class="short-product__title flex-center-between w-100">
                            <div class="left flex-inline-center-left">
                                <p>DANH MỤC SẢN PHẨM</p>
                            </div>
                            <a class="btn-link" href="https://thanhloisport.com/san-pham">
                                xem tất cả
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                    <path
                                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                </svg>
                            </a>
                        </div>
                        <div class="short-product__content w-100">
                            <div class="categories web">

                                @foreach ($productCategories->take(10) as $item)
                                    <div class="category-item">
                                        <a class="category-inner" href="{{ route('user.list', $item->slug) }}">
                                            <div class="entry-media">
                                                <img loading="lazy"
                                                    src="{{ showImageStorage($item->logo) }}"
                                                    alt="ghe-massage" title="Ghế MASSAGE" width="165px"
                                                    height="165px" />
                                            </div>
                                            <div class="entry-content text-center">
                                                <h3 class="category-name">{{ $item->name }}</h3>
                                                <span class="counter">{{ $item->products_count }}</span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="short_code image-ads text-center" style="">
                        <a href="/dung-cu-tap-gym/ghe-tap-ta" aria-label="home ads">
                            <img loading="lazy" src="https://thanhloisport.com/uploads/2023/07/hero.jpg.webp"
                                alt="hero" width="1200px" height="250px" />
                        </a>
                    </section>

                    @foreach ($productCategories as $item)
                        @if ($item->products_count > 0)
                            <section class="short-product short_code" style="">
                                <div class="short-product__title flex-center-between w-100">
                                    <div class="left flex-inline-center-left">
                                        <p class="child-title">{{ $item->name }}</p>
                                    </div>
                                    <a class="btn-link" href="https://thanhloisport.com/ghe-massage">
                                        xem tất cả
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                            <path
                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                        </svg>
                                    </a>
                                </div>
                                @if ($item->products->isNotEmpty())
                                    <div class="short-product__content w-100">
                                        <div class="product flex-left column-5">
                                            @foreach ($item->products as $product)
                                                @include('client/pages/include/product-item', [
                                                    'products' => $item->products,
                                                ])
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </section>
                        @endif
                    @endforeach

                    <section class="short_code flex post-list-short" style="">
                        <div class="short_code__content width_100">
                            <div class="short-product short_code">
                                <div class="short-product__title flex-center-between">
                                    <div class="left flex-inline-center-left">
                                        <p class="child-title">TIN TỨC &amp; SỰ KIỆN</p>
                                    </div>
                                    <a class="btn-link" href="https://thanhloisport.com/tin-tuc">
                                        xem tất cả
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                            <path
                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="home-special">
                                    <div class="home-special__content flex mt-20 mobile">


                                        @if ($news->isNotEmpty())
                                            @foreach ($news as $new)
                                                <div class="special">
                                                    <div class="special-img mb-15">
                                                        <a href="{{ route('user.details-page', $new->slug) }}"
                                                            aria-label="{{ $new->title }}" class="img_link">
                                                            <img loading="lazy" src="{{ showImageStorage($new->logo) }}"
                                                                alt="Ghế tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?"
                                                                title="TIN TỨC &amp; SỰ KIỆN" width="280px"
                                                                height="170px" />
                                                        </a>
                                                        <a href="https://thanhloisport.com/tin-tuc" aria-label="Tin tức"
                                                            class="category text-up fs-10 white fw-600">Tin tức</a>
                                                    </div>
                                                    <div class="special-content">
                                                        <span class="date text-up color_desc">{{\Carbon\Carbon::parse($new->created_at)->format('d/m/Y')}}</span>
                                                        <a href="{{ route('user.introduce', $new->slug) }}"
                                                            aria-label="{{ $new->title }}" class="title">
                                                            <h3 class="title_box color_head fs-18">
                                                                {{ $new->title }}
                                                            </h3>
                                                        </a>
                                                        <p class="fs-14 color_desc lh-22 mt-15">
                                                            {!! \Str::words(strip_tags($new->content), 45, '...') !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <div class="border short_code short-product"></div>




                    <section class="customer-reviews short-product short_code" style="">
                        <div class="customer-reviews__content w-100 flex-center">
                            <div class="w-100">
                                <p class="text-center bx-short__title">
                                    KHÁCH HÀNG NÓI VỀ THÀNH LỢI SPORT
                                </p>
                                <div class="description text-center"></div>
                            </div>
                        </div>
                        <div class="customer-reviews__slide s-wrap" id="customer-reviews__slide">
                            <div class="slides s-content">


                                @foreach ($evaluates as $item)
                                    <div class="item">
                                        <div class="item-wrap flex-center-left">
                                            <div class="item-wrap__thumnail">
                                                <img loading="lazy" src="{{ showImageStorage($item->avatar) }}"
                                                    alt="anh-1-280x280" width="80px" height="80px" />
                                            </div>
                                            <div class="item-wrap__content">
                                                <p class="star flex-center-left">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                </p>
                                                <div class="name">{{ $item->name }}</div>
                                                <div class="position">{{ $item->address }}</div>
                                                <div class="description">
                                                    {{ $item->content }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                    <section class="partner short_code short-product" style="">
                        <div class="partner-content flex-center w-100">
                            <div class="w-100">
                                <p class="text-center bx-short__title">
                                    Đối tác của chúng tôi
                                </p>
                                <div class="description text-center"></div>
                            </div>
                        </div>
                        <div class="partner-slide s-wrap" id="partner__slide">
                            <div class="slides s-content">

                                @foreach ($partners as $partner)
                                    <div class="item" data-href="/">
                                        <img loading="lazy" src="{{ showImageStorage($partner->logo) }}"
                                            alt="logo-adidas" width="150px" height="100px" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
