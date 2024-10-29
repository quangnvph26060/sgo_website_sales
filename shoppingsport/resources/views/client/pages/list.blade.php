@extends('client.layouts.master')


@section('content')
    @include('client.components.breadcrumb', [
        'items' => $breadcrumbItems
    ])
    <div class="product-categories">
        <div class="container">
            <div class="product-categories__data w-100 flex-left">
                <div class="widget">
                    <nav class="filter-box filter-category">
                        <div class="filter-box__title toggle">
                            <p>Ngành hàng</p>
                        </div>
                        <ul class="filter-box__list">

                            @foreach ($categories as $item)
                                <li class="item flex-center-between ">
                                    <a href="{{ route('user.list', $item->slug) }}" aria-label="Giày bóng chuyền">
                                        {{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                    <div class="filter-box price">
                        <p class="filter-box__title">Khoảng giá</p>
                        <div class="filter-box__content">
                            <div class="input flex-center-between">
                                <div class="input-box flex-inline-center-left">
                                    <span class="title">Giá:</span>
                                    <span class="from" data-min="10000"> 10,000đ</span>
                                    <span class="de"></span>
                                    <span class="to" data-max="10000000">10,000,000đ</span>
                                </div>
                                <button type=text class="filter">Lọc</button>
                            </div>
                            <div class="range">
                                <div id="slider-range"></div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <p class="filter-box__title">Tình trạng sản phẩm</p>
                        <div class="filter-box__list">
                            <p onclick="loadUrl('instock', 'in-stock')" class="instock_in-stock">Còn hàng</p>
                            <p onclick="loadUrl('onsale', 'on-sale')" class="onsale_on-sale">Giảm giá</p>
                        </div>
                    </div>
                    <div class="filter-box brand">
                        <div class="filter-box__title toggle">
                            <p>Thương hiệu</p>
                        </div>
                        <div class="filter-box__list">
                            @foreach ($brands as $brand)
                                <p onclick="loadUrl('brand[]', '{{ $brand->name }}')" class="brand_{{ $brand->name }}">
                                    {{ $brand->name }} ({{ $brand->products_count }})
                                </p>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="datas">
                    <div class="datas-top" id="web_datas">
                        <div class="datas-top__wrap flex-center-between">
                            <p class="result">Hiển thị <span class="count" data-count="{{ $products->count() }}">&nbsp;
                                    {{ $products->count() }}</span> / {{ $products->count() }} Sản phẩm
                            </p>
                            <div class="sort str">
                                <p class="sort-title">Sắp xếp: <span class="sort-title__value sort">Mới nhất</span></p>
                                <ul class="sort-list">
                                    <li class="sort-list__item orderby_lasted active"
                                        onclick="loadUrl('orderby', 'lasted')">Mới nhất</li>
                                    <li class="sort-list__item orderby_olded" onclick="loadUrl('orderby', 'olded')">Cũ
                                        nhất
                                    </li>
                                    <li class="sort-list__item orderby_price_low" onclick="loadUrl('orderby', 'price_low')">
                                        Giá thấp đến cao</li>
                                    <li class="sort-list__item orderby_price_high"
                                        onclick="loadUrl('orderby', 'price_high')">Giá cao xuống thấp</li>
                                </ul>
                            </div>
                            <p class="icon grid active" title="Hiển thị dạng lưới">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width=14>
                                    <path
                                        d="M384 96V224H256V96H384zm0 192V416H256V288H384zM192 224H64V96H192V224zM64 288H192V416H64V288zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                                </svg>
                            </p>
                            <p class="icon list" title="Hiển thị dạng danh sách">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=14>
                                    <path
                                        d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                                </svg>
                            </p>
                        </div>
                    </div>

                    <div class="datas-top" id="mobile_datas">
                        <div class="datas-top__wrap flex-center-between">
                            <div class="open-filter">
                                <span class="open-filter__wrap">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                <span>Bộ lọc</span>
                            </div>
                        </div>
                    </div>

                    <input type=hidden name=current_url value="{{ Request::url() }}" aria-label="current_url"
                        class="current_url" id="current_url">
                    <div id="listdata" class="w-100">
                        <div class="product flex-left column-4">
                            @foreach ($products as $item)
                                <div class="product-item custom-hover">
                                    <div class="product-item__wrap">
                                        <div class="image">
                                            @if (!is_null($item->discount_id) && !is_null($item->discountValue))
                                                <div class="product-badges"><span
                                                        class="badge style-1 sale">{{ number_format($item->discountValue->value, 0) }}%</span>
                                                </div>
                                            @endif
                                            <div class="product-buttons">
                                                <p class="product-buttons__wishlist" data-id="{{ $item->id }}"
                                                    data-type="add"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 16 16" width=20 height=20>
                                                        <path
                                                            style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"
                                                            d="M4.996 2.004C3.98 1.95 2.961 2.29 2.211 3.04.71 4.544.867 7.068 2.473 8.676l.513.513 4.662 4.666a.5.5 0 0 0 .706 0l4.66-4.666.513-.513c1.606-1.608 1.762-4.132.26-5.635-1.501-1.503-4.02-1.343-5.625.264L8 3.467l-.162-.162C7.035 2.5 6.013 2.058 4.996 2.004zm6.049.994V3c.76-.043 1.497.21 2.037.75 1.08 1.08 1.004 2.951-.26 4.217l-.517.517L8 12.793 3.695 8.484l-.515-.517C1.916 6.7 1.84 4.83 2.92 3.75c.54-.54 1.261-.788 2.023-.748.762.04 1.554.375 2.186 1.008l.52.517a.5.5 0 0 0 .706 0l.516-.52c.632-.632 1.414-.967 2.174-1.009z"
                                                            color="#000" font-family="sans-serif" font-weight="400"
                                                            overflow="visible" fill="#000000" class="color000 svgShape">
                                                        </path>
                                                    </svg></p>

                                                <a class="product-buttons__quickview"
                                                    href="{{ route('user.details-page', $item->slug) }}"
                                                    aria-label="{{ $item->name }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"
                                                        id="eye" width=20>
                                                        <path
                                                            d="M25 39c13.036 0 23.352-12.833 23.784-13.379l.491-.621-.491-.621C48.352 23.833 38.036 11 25 11S1.648 23.833 1.216 24.379L.725 25l.491.621C1.648 26.167 11.964 39 25 39zm0-26c10.494 0 19.47 9.46 21.69 12C44.473 27.542 35.509 37 25 37 14.506 37 5.53 27.54 3.31 25 5.527 22.458 14.491 13 25 13z" />
                                                        <path
                                                            d="M25 34c4.963 0 9-4.038 9-9s-4.037-9-9-9-9 4.038-9 9 4.037 9 9 9zm0-16c3.859 0 7 3.14 7 7s-3.141 7-7 7-7-3.14-7-7 3.141-7 7-7z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <a class="image-link" href="{{ route('user.details-page', $item->slug) }}"
                                                aria-label="{{ $item->name }}">
                                                <img loading="lazy"
                                                    src="{{ showImageStorage($item->images[0]->image ?? null) }}"
                                                    alt="{{ $item->name }}" title="{{ $item->name }}" width=224px
                                                    height=224px>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="content-top">
                                                <h3 class="content-top__title">
                                                    <a href="{{ route('user.details-page', $item->slug) }}"
                                                        aria-label="{{ $item->name }}">{{ $item->name }}</a>
                                                </h3>
                                                <div class="content-top__vote flex-center-left">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width=20px height=20px fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width=20px height=20px fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width=20px height=20px fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width=20px height=20px fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width=20px height=20px fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <span class="number">1 đánh giá</span>
                                                </div>
                                                <div class="content-top__price flex-center-left">
                                                    @if (!is_null($item->discount_id) && !is_null($item->discountValue))
                                                        <p class="price-old"><del>{{ showPrice($item->price_new) }}</del>
                                                        </p>
                                                    @endif
                                                    <p class="price">
                                                        <ins>{{ caculateDiscount($item->price_new, $item->discount->value ?? null) }}</ins>
                                                    </p>
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

                                                    </ul>
                                                    <p class="btn btn-primary btn-add__cart"
                                                        data-id="{{ $item->id }}" data-variant_id="0">Thêm giỏ hàng
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content-fade"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination">
                        {{ $products->links('vendor.custom') }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('library-script')
    <script src="{{ asset('assets/client-assets/js/slider.jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/client-assets/js/product.min.js') }}"></script>
@endpush

@push('script')
    <script>
        $(document).on('click', '.open-filter', function() {

            // Kiểm tra xem .widget-popup đã tồn tại chưa
            if ($('.widget-popup').length === 0) {
                const wishlist = $('.widget').html(); // Lấy nội dung hiện tại của .widget

                const _html = /*html*/ `
    <div class="widget-popup">
        <div class="widget-popup__top flex-center-between">
            <span class="title">Lọc sản phẩm</span>
            <span class="close">
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4497 3.16142L3.81641 13.8379" stroke="#373737" stroke-width="4" stroke-linecap="square"></path>
                    <path d="M4.18307 3.16142L14.8164 13.8379" stroke="#373737" stroke-width="4" stroke-linecap="square"></path>
                </svg>
            </span>
        </div>
    </div>
    `;

                // Chèn nội dung _html vào .widget
                $('.widget').html(_html);

                // Thêm nội dung của wishlist vào sau .widget-popup__top
                $('.widget-popup').append(wishlist); // Thêm wishlist vào cuối của widget-popup

                // Kích hoạt class .active sau khi đã thêm nội dung
                $('.widget').addClass('active');
            } else {
                // Nếu đã tồn tại, chỉ cần hiển thị lại và thêm class active
                $('.widget-popup').show();
                $('.widget').addClass('active');
            }

            // Xử lý sự kiện đóng popup khi nhấn vào close
            $('.widget-popup .close').click(function() {
                // Ẩn popup thay vì xóa hoàn toàn
                $('.widget-popup').hide();
                $('.widget').removeClass('active');
            });

            // Đóng popup khi bấm ra ngoài
            $(document).on('click', function(e) {
                // Kiểm tra nếu click bên ngoài .widget-popup và .open-filter
                if (!$(e.target).closest('.widget-popup, .open-filter').length) {
                    // Ẩn popup và gỡ class .active
                    $('.widget-popup').hide();
                    $('.widget').removeClass('active');
                }
            });
        });
    </script>
@endpush
