@extends('client.layouts.master')


@section('content')
    <div class="search">
        <div class="search-banner" style="background-image: url(); background-repeat: no-repeat;">
            <div class="container">
                <h1 class="fs-30 text-center w-100 white">Tìm kiếm</h1>
                <span class="text-center w-100 white">Có {{ count($products) }} kết quả tìm kiếm cho từ khóa</span>
            </div>
            <div class="form-search">
                <form method="GET" action="{{ route('user.search') }}" class="input-wrapper flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                            fill="#fff"></path>
                    </svg>
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm..."
                        value="{{ request()->search ?? '' }}">
                    <button class="btn btn-search" type="submit">
                        Tìm kiếm
                    </button>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="search-lists w-100">
                <input type="hidden" name="current_url" value="https://thanhloisport.com/tim-kiem" class="current_url">
                <div class="content w-100">
                    <div id="listdata" class="w-100">
                        <div class="product flex-left column-5">
                            @foreach ($products as $item)
                                <div class="product-item custom-hover">
                                    <div class="product-item__wrap">
                                        <div class="image">
                                            @if (!is_null($item->discount_id) && !is_null($item->discountValue))
                                                <div class="product-badges"><span
                                                        class="badge style-1 sale">{{ number_format($item->discountValue->value) }}%</span>
                                                </div>
                                            @endif
                                            <div class="product-buttons">
                                                <p class="product-buttons__wishlist" data-id="{{ $item->id }}"
                                                    data-type="add"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 16 16" width="20" height="20">
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
                                                        id="eye" width="20">
                                                        <path
                                                            d="M25 39c13.036 0 23.352-12.833 23.784-13.379l.491-.621-.491-.621C48.352 23.833 38.036 11 25 11S1.648 23.833 1.216 24.379L.725 25l.491.621C1.648 26.167 11.964 39 25 39zm0-26c10.494 0 19.47 9.46 21.69 12C44.473 27.542 35.509 37 25 37 14.506 37 5.53 27.54 3.31 25 5.527 22.458 14.491 13 25 13z">
                                                        </path>
                                                        <path
                                                            d="M25 34c4.963 0 9-4.038 9-9s-4.037-9-9-9-9 4.038-9 9 4.037 9 9 9zm0-16c3.859 0 7 3.14 7 7s-3.141 7-7 7-7-3.14-7-7 3.141-7 7-7z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <a class="image-link" href="{{ route('user.details-page', $item->slug) }}"
                                                aria-label="Lưới bóng chuyền hơi không cáp Anh Việt (HKC)">
                                                <img loading="lazy"
                                                    src="{{ showImageStorage($item->images[0]->image ?? null) }}"
                                                    alt="{{ $item->name }}" title="{{ $item->name }}" width="224px"
                                                    height="224px">
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
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve"
                                                        width="20px" height="20px" fill="#F7B500"
                                                        style="margin-left: 1px; width: 15px;">
                                                        <polygon
                                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">
                                                        </polygon>
                                                    </svg>
                                                    <span class="number">1 đánh giá</span>
                                                </div>
                                                <div class="content-top__price flex-center-left">
                                                    @if (!is_null($item->discount_id) && !is_null($item->discountValue))
                                                        <p class="price-old">
                                                            <del>{{ showPrice($item->price_new) }}</del>
                                                        </p>
                                                    @endif

                                                    <p class="price">
                                                        <ins>{{ caculateDiscount($item->price_new, $item->discountValue->value ?? null) }}</ins>
                                                    </p>
                                                </div>
                                                <div class="content-top__stock in-stock">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        height="12">
                                                        <path
                                                            d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z">
                                                        </path>
                                                    </svg>
                                                    <span>Còn hàng</span>
                                                </div>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="content-bottom__wrap">
                                                    <ul class="desciption">
                                                        {!! $item->description_short !!}
                                                    </ul>
                                                    <p class="btn btn-primary btn-add__cart" data-id="{{ $item->id }}"
                                                        data-variant_id="2021">Thêm giỏ hàng</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content-fade"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                  {{$products->links('vendor/custom')}}


                </div>
            </div>
        </div>
    </div>
@endsection
