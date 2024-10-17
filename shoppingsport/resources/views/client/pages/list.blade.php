@extends('client.layouts.master')


@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="san-pham.html" style="display: inline;">
                        <span itemprop="name">
                            SẢN PHẨM
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="dung-cu-bong-chuyen.html" style="display: inline;">
                        <span itemprop="name">
                            <h1 style="font-weight: normal; font-size: inherit;display: inherit;">Dụng cụ bóng chuyền</h1>
                        </span>
                        <meta itemprop="position" content="2">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="product-categories">
        <div class="container">
            <div class="product-categories__data w-100 flex-left">
                <div class="widget">
                    <nav class="filter-box filter-category">
                        <div class="filter-box__title toggle">
                            <p>Ngành hàng</p>
                        </div>
                        <ul class="filter-box__list">
                            <li class="item flex-center-between ">
                                <a href="giay-bong-chuyen.html" aria-label="Giày bóng chuyền">
                                    Giày bóng chuyền
                                </a>
                            </li>
                            <li class="item flex-center-between ">
                                <a href="luoi-bong-chuyen.html" aria-label="Lưới bóng chuyền">
                                    Lưới bóng chuyền
                                </a>
                            </li>
                            <li class="item flex-center-between ">
                                <a href="phu-kien-bong-chuyen.html" aria-label="Phụ kiện bóng chuyền">
                                    Phụ kiện bóng chuyền
                                </a>
                            </li>
                            <li class="item flex-center-between ">
                                <a href="qua-bong-chuyen.html" aria-label="Quả bóng chuyền da">
                                    Quả bóng chuyền da
                                </a>
                            </li>
                            <li class="item flex-center-between ">
                                <a href="qua-bong-chuyen-hoi.html" aria-label="Quả bóng chuyền hơi">
                                    Quả bóng chuyền hơi
                                </a>
                            </li>
                            <li class="item flex-center-between ">
                                <a href="quan-ao-bong-chuyen.html" aria-label="Quần áo bóng chuyền">
                                    Quần áo bóng chuyền
                                </a>
                            </li>
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
                            <div class="sort paginate">
                                <ul class="sort-list">
                                    <li class="sort-list__item perpage_16 active" onclick="loadUrl('perpage', 16)">16 Sản
                                        phẩm</li>
                                    <li class="sort-list__item perpage_32" onclick="loadUrl('perpage', 32)">32 Sản phẩm
                                    </li>
                                    <li class="sort-list__item perpage_48" onclick="loadUrl('perpage', 48)">48 Sản phẩm
                                    </li>
                                    <li class="sort-list__item perpage_64" onclick="loadUrl('perpage', 64)">64 Sản phẩm
                                    </li>
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
                            {{-- <div class="sort str">
                                <p class="sort-title">Sắp xếp: <span class="sort-title__value sort">Mới nhất</span></p>
                                <ul class="sort-list">
                                    <li class="sort-list__item orderby_lasted active"
                                        onclick="loadUrl('orderby', 'lasted')">Mới nhất</li>
                                    <li class="sort-list__item orderby_olded" onclick="loadUrl('orderby', 'olded')">Cũ
                                        nhất</li>
                                    <li class="sort-list__item orderby_price_low"
                                        onclick="loadUrl('orderby', 'price_low')">Giá thấp đến cao</li>
                                    <li class="sort-list__item orderby_price_high"
                                        onclick="loadUrl('orderby', 'price_high')">Giá cao xuống thấp</li>
                                </ul>
                            </div> --}}
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
                                            <a class="image-link"
                                                href="{{ route('user.details-page', $item->slug) }}"
                                                aria-label="{{ $item->name }}">
                                                <img loading="lazy" src="{{ showImageStorage($item->image) }}"
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
                                                        <li>◈ Thương hiệu: Dragon Master</li>
                                                        <li>◈ Tiêu chuẩn: Tập luyện và Thi đấu</li>
                                                        <li>◈ Màu sắc: Vàng - Xanh - Trắng</li>
                                                        <li>◈ Quà tặng: Kim bơm + Lưới đựng bóng</li>
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
                    <div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr">
                        <div class="ck-content">
                            <p>Bán dụng cụ bóng chuyền dùng cho tập luyện & thi đấu gồm quả bóng, trụ lưới và phụ kiện bảo
                                hộ. Mua dụng cụ bóng chuyền giá rẻ ở THÀNH LỢI SPORT !</p>
                            <h3>Tìm hiểu dụng cụ bóng chuyền.</h3>
                            <p>Bóng chuyền là môn thể thao đồng đội có phong trào phát triển mạnh ở Việt Nam nói riêng, trên
                                thế giới nói chung và hiện đã đưa vào chương trình dạy học. Để chơi được bộ môn này, chúng
                                ta cần phải trang bị cho mình những dụng cụ bóng chuyền chuyên dụng như quả bóng chuyền,
                                lưới bóng chuyền, quần áo bóng chuyền, giày bóng chuyền hay trụ cột,... Trên thị trường Việt
                                Nam hiện nay, dụng cụ bóng chuyền được bán ra với rất nhiều mẫu mã, sản phẩm, đến từ nhiều
                                thương hiệu và có xuất xứ khác nhau. Với môn bóng chuyền, những dụng cụ quan trọng nhất đó
                                là:</p>
                            <p><strong>1. Quả bóng chuyền.</strong></p>
                            <p>Quả bóng chuyền là dụng cụ quan trọng và cần phải có khi chúng ta tham gia tập luyện hay thi
                                đấu bộ môn bóng chuyền. Quả bóng chuyền được chia làm 3 loại cơ bản, phù hợp sử dụng cho
                                từng bộ môn bóng chuyền cụ thể đó là quả bóng chuyền da, quả bóng chuyền hơi và quả bóng
                                chuyền bãi biển. Để tìm hiểu chi tiết hơn về dụng cụ bóng chuyền này thì bạn có thể tham
                                khảo chi tiết tại quả bóng chuyền.</p>
                            <figure class="image image" style="max-width:100%;"><img class="wp-image-662 aligncenter"
                                    src="wp-content/uploads/2022/01/bong-chuyen-da-thang-long-pu7700-4.jpg.webp"
                                    alt="bong-chuyen-da-thang-long-pu7700-4" width=600 height=600 loading="lazy">
                            </figure>
                            <p><strong>2. Lưới bóng chuyền.</strong></p>
                            <p>Lưới bóng chuyền là dụng cụ cần thiết trong bộ môn bóng chuyền và nó được căng ngang phía
                                trên đường giữa sân. Lưới bóng chuyền được làm bằng chất liệu dù, có các ô lưới đều và đẹp
                                mắt. Màu sắc của thân lưới thường là màu đen và viền lưới là màu trắng. Phần viền lưới bóng
                                chuyền có thiết kế dây đi bên trong giúp dễ dàng hơn trong việc lắp đặt. Cũng như quả bóng
                                chuyền, kích thước và chiều cao của lưới bóng chuyền sẽ phụ thuộc vào từng bộ môn bóng
                                chuyền cụ thể.</p>
                            <figure class="image image" style="max-width:100%;"><img class="wp-image-959 aligncenter"
                                    src="wp-content/uploads/2022/01/bo-quan-ao-bong-chuyen-arrow-mau-xanh-than.jpg.webp"
                                    alt="bo-quan-ao-bong-chuyen-arrow-mau-xanh-than" width=600 height=600 loading="lazy">
                            </figure>
                            <p><strong>3. Quần áo bóng chuyền</strong></p>
                            <p>Quần áo bóng chuyền là trang phục cần thiết trong bộ môn bóng chuyền giúp cho các cầu thủ và
                                người chơi vận động thoải mái khi chơi bóng chuyền. Quần áo bóng chuyền hiện nay được sản
                                xuất bằng rất nhiều loại chất liệu như: thun lạnh, vải đay, cotton,.... và đa dạng mẫu mã để
                                người chơi có thể thoải mái lựa chọn.</p>
                            <figure class="image image_resized image" style="width:87.05%;max-width:100%;"><img
                                    class="size-full wp-image-881 aligncenter"
                                    src="wp-content/uploads/2022/01/qua-bong-chuyen-da-paledas-12.jpeg.webp"
                                    alt="qua-bong-chuyen-da-paledas-12" width=800 height=800 loading="lazy"></figure>
                            <p><strong>4. Giày bóng chuyền</strong></p>
                            <p>Giày đánh bóng chuyền không chỉ có tác dụng giúp người chơi di chuyển tốt trên sân mà còn là
                                công cụ bảo vệ họ khỏi những chấn thương, những áp lực tạo ra từ những lần di chuyển nhanh,
                                liên tục thay đổi.</p>
                            <p><strong>5. Cột trụ bóng chuyền</strong></p>
                            <p>Cột trụ bóng chuyền thường được làm bằng chất liệu kim loại như sắt, thép giúp tạo sự chắc
                                chắn và nó dùng để căng lưới bóng chuyền. Theo quy định thi đấu, cột trụ bóng chuyền sẽ được
                                đặt ở ngoài sân cách đường biên dọc khoảng 0,5-1m và chiều cao của nó phải đạt 2,55m. Hiện
                                nay, có rất nhiều mẫu trụ bóng chuyền được thiết kế có chức năng thay đổi chiều cao, giúp
                                phù hợp cho nhiều đối tượng sử dụng khác nhau.</p>
                            <p><strong>4. Ghế trọng tài bóng chuyền</strong></p>
                            <p>Ghế trọng tài là dụng cụ bóng chuyền dành cho trọng tài, đây là vị trí ngồi quan sát của
                                trọng tài điều khiển trận đấu bóng chuyền giúp họ bao quát tốt hơn và đưa ra quyết định
                                chuẩn xác hơn. Một chiếc ghế trọng tại đạt tiêu chuẩn cần phải có tầm nhìn tối đa 150m và
                                chiều cao ván đứng đạt 1,3m. Hai thương hiệu sản xuất ghế bóng chuyền nổi tiếng tại Việt Nam
                                đó là Vifa Sport và Sodex Sport.</p>
                            <p><strong>5. Thảm sàn sân bóng chuyền</strong></p>
                            <p>Thảm sàn sân bóng chuyền là phụ kiện dùng để thi công sân thi đấu bóng chuyền chuyên nghiệp.
                                Thông thường thảm sàn thể thao được sản xuất từ chất liệu PVC cao cấp, có bề mặt dạng vân
                                gỗ. Sản phẩm được thiết kế đặc biệt, có khả năng chống trơn trượt rất hiệu quả. Hiện nay,
                                các loại thảm sân bóng chuyền được bán ra tại Việt Nam chủ yếu được nhập khẩu từ Trung Quốc.
                            </p>
                            <p><strong>6. Các phụ kiện bóng chuyền khác.</strong></p>
                            <p>Ngoài các dụng cụ bóng chuyền cơ bản được giới thiệu ở trên, bộ môn bóng chuyền còn có rất
                                nhiều dụng cụ hay phụ kiện khác như:</p>
                            <p>- Quần áo bóng chuyền.</p>
                            <p>- Băng bảo vệ đầu gối, khuỷu tay,...</p>
                            <p>- Bảng điểm thi đấu bóng chuyền.</p>
                            <p>- Bảng thay người bóng chuyền.</p>
                            <p>- Chuông đèn báo bóng chuyền.</p>
                            <p>- Dụng cụ tập đập, phát bóng chuyền.</p>
                            <p>- Cọc giới hạn thi đấu,...</p>
                            <h2>Mua dụng cụ bóng chuyền ở đâu?</h2>
                            <p><strong>THÀNH LỢI SPORT</strong> là địa chỉ bán dụng cụ bóng chuyền chuyên nghiệp, đầy đủ các
                                dụng cụ và giá rẻ nhất tại Việt Nam. Chúng tôi có bán tất cả các <strong>dụng cụ bóng
                                    chuyền</strong> gồm quả bóng chuyền, trụ bóng chuyền, lưới bóng chuyền và phụ kiện bóng
                                chuyền... với dịch vụ giao hàng tại nhà trên toàn quốc. Các bạn có nhu cầu tham khảo các mẫu
                                dụng cụ môn bóng chuyền có thể tới công ty chúng tôi để xem trực tiếp theo địa chỉ:</p>
                            <figure class="image image_resized image" style="width:81.57%;max-width:100%;"><img
                                    src="uploads/2024/06/cua-hang-thanh-loi-sport.jpg.webp" alt="cua-hang-thanh-loi-sport"
                                    width=1926 height=2568 loading="lazy"></figure>
                            <p
                                style="-webkit-text-stroke-width:0px;border-color:revert;box-sizing:border-box;color:rgb(0, 0, 0);font-family:Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:1.6em;list-style:revert;margin:revert;orphans:2;outline:revert;overflow-wrap:break-word;padding:revert;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;vertical-align:revert;white-space:normal;widows:2;word-spacing:0px;">
                                ==========================================================</p>

                            <p><span>❖THÔNG
                                    TIN THÀNH LỢI SPORT</span></p>

                            <p><span>
                                    🏠
                                    Địa chỉ: 16/38 Đỗ Xuân Hợp, phường Mỹ Đình 1, Quận Nam Từ Liêm, Hà Nội
                                </span></p>
                            <p><span>
                                    ✆
                                    Hotline:
                                </span> <a href="">0862.525.296.</a></p>
                            </p>
                            <p><span>
                                    💫Website: </span><a href="">thanhloisport.com</a></p>
                            <p><span>
                                    ℱ
                                    Fanpage:
                                </span><a href="">https://www.facebook.com/thethaothanhloi</a></p>
                            <p><span>
                                    𝓢
                                    Shopee:
                                </span><a href="">https://shopee.vn/thanhloisport</a></p>
                            <p><span>

                                    Lazada:&nbsp;</span><a href="">https://www.lazada.vn/shop/thanh-loi-sport</a>
                            </p>

                            <p><span>
                                    Tiktok:&nbsp;</span><a href=""></a>https://www.tiktok.com/@thanhloisport</p>
                            <p><span>
                                    Liên hệ:&nbsp;</span><a href="">https://thanhloisport.com/lien-he</a></p>
                        </div>
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
