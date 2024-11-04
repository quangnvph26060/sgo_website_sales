<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @dd($config) --}}
    <title>@yield('title',  $config->title_seo ?? $config->name )</title>
    <meta name="description" content="@yield('description',  $config->description ?? $description_seo  )">
    <meta name="keywords" content="@yield('keywords',  $config->meta_seo )">


    <meta property="og:title"
        content="{{ $config->title_seo ?? 'THÀNH LỢI SPORT - PHÂN PHỐI THIẾT BỊ VÀ DỤNG CỤ THỂ THAO CHÍNH HÃNG' }}">
    <meta property="og:description"
        content="{{ $config->description_seo ?? 'THÀNH LỢI SPORT - PHÂN PHỐI THIẾT BỊ VÀ DỤNG CỤ THỂ THAO CHÍNH HÃNG' }}">

    <meta property="og:url" content="{{ $config->website ?? url('/') }}">
    <meta name="robots" content="index, follow">

    <link href="{{asset('assets/client-assets/image/cropped-Icon-Logo-thanh-loi-sport.png')}}"
        type=image/x-icon rel="shortcut icon">

    @include('client.layouts.partials.style')
</head>

<body>
    <div id="wrapper" class="page-wrapper">
        <header class="header">
            @include('client.layouts.partials.header-top')

            @include('client.layouts.partials.header-middle')

            @if (request()->routeIs('user.home-page'))
                @include('client.layouts.partials.header-bottom')
            @endif


        </header>

        <main class="main">

            @yield('content')

        </main>

        <footer class="footer">
            @include('client.layouts.partials.footer-top')

            @include('client.layouts.partials.footer-bottom')

        </footer>
    </div>
    <section id="show_compare" class="compare" data-compare_box=""></section>

    <section id="loading_box" data-device="web" data-error="Có lỗi xảy ra vui lòng thử lại!">
        <div id="loading_image"></div>
    </section>

    @include('client.layouts.partials.toast-container')

    <div class="cta">
        <ul class="cta-list">
            <li class="cta-list__item flex-center">
                <p class="backtop item flex-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                        <path
                            d="M214.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 109.3V480c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128z" />
                    </svg>
                </p>
            </li>
        </ul>
    </div>

    @include('client.layouts.partials.call-action')

    <div class="fixed"></div>

    <div class="notice-cart">
        <div class="notice-cart__message" role="alert">
            <p><span class="name"></span>&nbspđã được thêm vào giỏ hàng của bạn.</p>
            <a href="{{ route('user.cart') }}" class="button">Xem giỏ hàng</a>
            <div class="close">
                <svg width="14" viewBox="0 0 18 17" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4497 3.16142L3.81641 13.8379" stroke="#fff" stroke-width="2" stroke-linecap="square">
                    </path>
                    <path d="M4.18307 3.16142L14.8164 13.8379" stroke="#fff" stroke-width="2" stroke-linecap="square">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    @include('client.layouts.partials.navigation')

    @include('client.layouts.partials.mobile-bottom-menu')

    @include('client.layouts.partials.script')

    <script>
        $(function() {
            const web_datas = $('#web_datas').html();
            const mobile_datas = $('#mobile_datas').html();

            function checkScreenSize() {
                if ($(window).width() <= 575) {
                    $(".short-product__content .categories").addClass("mobile");
                    $(".short_code .banner-list").addClass("mobile").css({
                        "display": "block",
                    });
                    $('.short-product__content .product').addClass('mobile column-2').removeClass('column-5');
                    $('.short-product__content .product .product-item').addClass('mobile-item');
                    $('.home-special .home-special__content').addClass('mobile');
                    $('.home-special .home-special__content .special').addClass('w-100');
                    $('.footer-top .footer-top__wrap').removeClass('flex-left');
                    $('.footer-top .footer-top__wrap .footer-widget').removeClass('flex-left');
                    $('.footer-top .footer-top__wrap .footer-left').addClass('w-100');
                    $('.footer-bottom__wrap').removeClass('flex-center-between');
                    $('.footer-bottom__wrap .right').removeClass('flex-center-right').addClass('flex-center-left');
                    $('#listdata .product').addClass('column-2').removeClass('column-4').removeClass('column-5');
                    $('#listdata .product .product-item').addClass('mobile-item');
                    $('.product-categories__data').removeClass('flex-left');
                    $('#web_datas').remove();
                    $('.datas-top').html(mobile_datas);
                } else {
                    // Xóa các lớp đã thêm cho chế độ mobile
                    $(".short-product__content .categories").removeClass("mobile");
                    $(".short_code .banner-list").removeClass("mobile").css({
                        "display": "",
                    });
                    $('.short-product__content .product').removeClass('mobile column-2').addClass('column-5');
                    $('.short-product__content .product .product-item').removeClass('mobile-item');
                    $('.home-special .home-special__content').removeClass('mobile');
                    $('.home-special .home-special__content .special').removeClass('w-100');
                    $('.footer-top .footer-top__wrap').addClass('flex-left');
                    $('.footer-top .footer-top__wrap .footer-widget').addClass('flex-left');
                    $('.footer-top .footer-top__wrap .footer-left').removeClass('w-100');
                    $('.footer-bottom__wrap').addClass('flex-center-between');
                    $('.footer-bottom__wrap .right').addClass('flex-center-right').removeClass('flex-center-left');
                    $('#listdata .product').removeClass('column-2').addClass('column-4').addClass('column-5');
                    $('#listdata .product .product-item').removeClass('mobile-item');
                    $('.product-categories__data').addClass('flex-left');
                    $('#mobile_datas').remove();
                    $('.datas-top').html(web_datas);
                }
            }

            $(document).ready(function() {
                checkScreenSize();

                $(window).resize(function() {
                    checkScreenSize();
                });
            });
        });
    </script>
</body>

</html>
