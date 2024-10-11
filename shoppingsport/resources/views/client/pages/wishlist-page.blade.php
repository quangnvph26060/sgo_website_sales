@extends('client.layouts.master')

@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="https://thanhloisport.com" style="display: inline;">
                        <span itemprop="name">
                            Trang chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        Sản phẩm yêu thích
                    </span>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>
    <div class="product-categories">
        <div class="container">

            {{-- <div class="product-categories">
                <div class="container">
                    <div class="alert-none" style="margin-top: 1rem;">
                        <p>Bạn chưa có sản phẩm yêu thích nào</p>
                        <a href="index.html">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div> --}}
            <div class="product-categories__data w-100">
                <div class="datas w-100 pd-35">
                    <div id="listdata" class="w-100">
                        <div class="product flex-left column-5">


                            @if (Cart::instance('wishlist')->count() > 0)
                                @foreach (Cart::instance('wishlist')->content() as $item)
                                    <div class="product-item custom-hover">
                                        <div class="product-item__wrap">
                                            <div class="image">
                                                <div class="product-buttons">
                                                    <p class="product-buttons__wishlist" data-id="814" data-type="remove">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width=20
                                                            height=20>
                                                            <path
                                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"
                                                                d="M4.996 2.004C3.98 1.95 2.961 2.29 2.211 3.04.71 4.544.867 7.068 2.473 8.676l.513.513 4.662 4.666a.5.5 0 0 0 .706 0l4.66-4.666.513-.513c1.606-1.608 1.762-4.132.26-5.635-1.501-1.503-4.02-1.343-5.625.264L8 3.467l-.162-.162C7.035 2.5 6.013 2.058 4.996 2.004zm6.049.994V3c.76-.043 1.497.21 2.037.75 1.08 1.08 1.004 2.951-.26 4.217l-.517.517L8 12.793 3.695 8.484l-.515-.517C1.916 6.7 1.84 4.83 2.92 3.75c.54-.54 1.261-.788 2.023-.748.762.04 1.554.375 2.186 1.008l.52.517a.5.5 0 0 0 .706 0l.516-.52c.632-.632 1.414-.967 2.174-1.009z"
                                                                color="#000" font-family="sans-serif" font-weight="400"
                                                                overflow="visible" fill="#000000" class="color000 svgShape">
                                                            </path>
                                                        </svg></p>
                                                    <p class="product-buttons__compare"
                                                        onclick="addCompare('814', 'Máy chạy bộ điện Impulse PT400', 'https://thanhloisport.com/thumbnails/products/medium/wp-content/uploads/2022/07/may-chay-bo-co-lon-Impulse-PT400-300-1.jpg', '64,500,000đ', '37')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                            viewBox="0 0 24 24" width=20 height=20>
                                                            <path
                                                                d="M4.5,9.44946V16A2.50294,2.50294,0,0,0,7,18.5H9.793L7.64648,20.64648a.5.5,0,1,0,.707.707l3-3a.49983.49983,0,0,0,0-.707l-3-3a.5.5,0,0,0-.707.707L9.793,17.5H7A1.50164,1.50164,0,0,1,5.5,16V9.44946a3.5,3.5,0,1,0-1,0ZM5,3.5A2.5,2.5,0,1,1,2.5,6,2.50294,2.50294,0,0,1,5,3.5ZM19.5,14.55054V8A2.50294,2.50294,0,0,0,17,5.5H14.207l2.14649-2.14648a.5.5,0,0,0-.707-.707l-3,3a.49983.49983,0,0,0,0,.707l3,3a.5.5,0,0,0,.707-.707L14.207,6.5H17A1.50164,1.50164,0,0,1,18.5,8v6.55054a3.5,3.5,0,1,0,1,0ZM19,20.5A2.5,2.5,0,1,1,21.5,18,2.50294,2.50294,0,0,1,19,20.5Z"
                                                                fill="#000000" class="color000 svgShape"></path>
                                                        </svg>
                                                    </p>
                                                    <a class="product-buttons__quickview"
                                                        href="https://thanhloisport.com/chay-bo-dien-impulse-pt400.html"
                                                        aria-label="Máy chạy bộ điện Impulse PT400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"
                                                            id="eye" width=20>
                                                            <path
                                                                d="M25 39c13.036 0 23.352-12.833 23.784-13.379l.491-.621-.491-.621C48.352 23.833 38.036 11 25 11S1.648 23.833 1.216 24.379L.725 25l.491.621C1.648 26.167 11.964 39 25 39zm0-26c10.494 0 19.47 9.46 21.69 12C44.473 27.542 35.509 37 25 37 14.506 37 5.53 27.54 3.31 25 5.527 22.458 14.491 13 25 13z" />
                                                            <path
                                                                d="M25 34c4.963 0 9-4.038 9-9s-4.037-9-9-9-9 4.038-9 9 4.037 9 9 9zm0-16c3.859 0 7 3.14 7 7s-3.141 7-7 7-7-3.14-7-7 3.141-7 7-7z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <a class="image-link"
                                                    href="https://thanhloisport.com/chay-bo-dien-impulse-pt400.html"
                                                    aria-label="Máy chạy bộ điện Impulse PT400">
                                                    <img loading="lazy"
                                                        src="https://thanhloisport.com/thumbnails/products/medium/wp-content/uploads/2022/07/may-chay-bo-co-lon-Impulse-PT400-300-1.jpg.webp"
                                                        alt="may-chay-bo-co-lon-Impulse-PT400-300-1"
                                                        title="Máy chạy bộ điện Impulse PT400" width=224px height=224px>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="content-top">
                                                    <h3 class="content-top__title">
                                                        <a href="https://thanhloisport.com/chay-bo-dien-impulse-pt400.html"
                                                            aria-label="Máy chạy bộ điện Impulse PT400">{{ $item->name }}</a>
                                                    </h3>
                                                    <div class="content-top__vote flex-center-left">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 12.705 512 486.59" x="0px" y="0px"
                                                            xml:space="preserve" width=20px height=20px fill="#F7B500"
                                                            style="margin-left: 1px; width: 15px;">
                                                            <polygon
                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                            </polygon>
                                                        </svg>
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 12.705 512 486.59" x="0px" y="0px"
                                                            xml:space="preserve" width=20px height=20px fill="#F7B500"
                                                            style="margin-left: 1px; width: 15px;">
                                                            <polygon
                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                            </polygon>
                                                        </svg>
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 12.705 512 486.59" x="0px" y="0px"
                                                            xml:space="preserve" width=20px height=20px fill="#F7B500"
                                                            style="margin-left: 1px; width: 15px;">
                                                            <polygon
                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                            </polygon>
                                                        </svg>
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 12.705 512 486.59" x="0px" y="0px"
                                                            xml:space="preserve" width=20px height=20px fill="#F7B500"
                                                            style="margin-left: 1px; width: 15px;">
                                                            <polygon
                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                            </polygon>
                                                        </svg>
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 12.705 512 486.59" x="0px" y="0px"
                                                            xml:space="preserve" width=20px height=20px fill="#F7B500"
                                                            style="margin-left: 1px; width: 15px;">
                                                            <polygon
                                                                points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                            </polygon>
                                                        </svg>
                                                        <span class="number">1 đánh giá</span>
                                                    </div>
                                                    <div class="content-top__price flex-center-left">
                                                        <p class="price"><ins>{{ showPrice($item->price) }}</ins></p>
                                                    </div>
                                                    <div class="content-top__stock in-stock">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            height=12>
                                                            <path
                                                                d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z" />
                                                        </svg>
                                                        <span>Còn hàng</span>
                                                    </div>
                                                </div>
                                                <div class="content-bottom">
                                                    <div class="content-bottom__wrap">
                                                        <ul class="desciption">
                                                            <li>Hãng: Impulse</li>
                                                            <li>Mã sản phẩm: Impulse PT 300H</li>
                                                            <li>Bảo hành:2 năm</li>
                                                            <li>Tình trạng: Còn hàng</li>
                                                        </ul>
                                                        <p class="btn btn-primary btn-add__cart" data-id="814"
                                                            data-variant_id="2812">Thêm giỏ hàng</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content-fade"></div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="pagination">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            if (window.innerWidth < 768) {
                $('#listdata .product').addClass('column-2').removeClass('column-5');

            } else {
                $('.btn-mobile').css('display', 'none');

            }



        });
    </script>
@endpush
