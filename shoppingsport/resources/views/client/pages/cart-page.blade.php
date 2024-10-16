@extends('client.layouts.master')

@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="index.html" style="display: inline;">
                        <span itemprop="name">
                            Trang chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        Giỏ hàng
                    </span>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>
    <div class="cart w-100">
        <div class="container">
            @if (Cart::instance('shopping')->count() == 0)
                <div class="alert-none">
                    <p>Giỏ hàng của bạn đang trống</p>
                    <a href="{{ route('user.home-page') }}">Tiếp tục mua hàng</a>
                </div>
            @endif


            @if (Cart::instance('shopping')->count() > 0)
                <div class="cart-wrap w-100 flex-left" id="cart-web">
                    <div class="cart-wrap__list w-100">
                        <table class="product-list w-100">
                            <thead>
                                <tr>
                                    <th class="product-list__remove"></th>
                                    <th class="product-list__thumnail"></th>
                                    <th class="product-list__namel">Sản phẩm</th>
                                    <th class="product-list__price">Giá</th>
                                    <th class="product-list__quantity">Số lượng</th>
                                    <th class="product-list__subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('shopping')->content() as $item)
                                    <tr class="product-list__item ">
                                        <td class="product-list__remove">
                                            <p class="remove action-cart" data-type="remove" data-id="{{ $item->rowId }}">x
                                            </p>
                                        </td>
                                        <td class="product-list__thumnail">
                                            <a href="{{ route('user.details-page', $item->options->slug) }}}">
                                                <img loading="lazy" src="{{ showImageStorage($item->options->image) }}"
                                                    alt="ghe-massage-oreni-or-180i-4" width="70px" height="70px">
                                            </a>
                                        </td>
                                        <td class="product-list__name">
                                            <p class="flex-inline-center-left">
                                                <a href="{{ route('user.details-page', $item->options->slug) }}"
                                                    class="flex-center-left">{{ $item->name }}</a>
                                                <span class="badge flex-inline-center-left"></span>
                                            </p>
                                            <div class="product-list__description d-none">
                                                <p class="product-list__price">{{ showPrice($item->price) }}</p>
                                                <div class="product-list__quantity">
                                                    <div class="quantity">
                                                        <div class="quantity-button minus action-cart" data-type="sub"
                                                            data-id="{{ $item->rowId }}"></div>
                                                        <input type="text" id="quantity" class="input-text qty text"
                                                            value="{{ $item->qty }}" title="Qty" size="4"
                                                            min="0" max="" step="1" placeholder=""
                                                            inputmode="numeric" autocomplete="off">
                                                        <div class="quantity-button plus action-cart" data-type="add"
                                                            data-id="{{ $item->rowId }}"></div>
                                                    </div>
                                                </div>
                                                <p class="product-list__subtotal">
                                                </p>
                                                <p>{{ showPrice($item->price * $item->qty) }}</p>
                                                <p></p>
                                            </div>
                                        </td>
                                        <td class="product-list__price">{{ showPrice($item->price) }}</td>
                                        <td class="product-list__quantity">
                                            <div class="quantity">
                                                <div class="quantity-button minus action-cart" data-type="sub"
                                                    data-id="{{ $item->rowId }}"></div>
                                                <input type="text" id="quantity" class="input-text qty text"
                                                    value="{{ $item->qty }}" title="Qty" size="4"
                                                    min="0" max="" step="1" placeholder=""
                                                    inputmode="numeric" autocomplete="off">
                                                <div class="quantity-button plus action-cart" data-type="add"
                                                    data-id="{{ $item->rowId }}"></div>
                                            </div>
                                        </td>
                                        <td class="product-list__subtotal">
                                            <p>{{ showPrice($item->price * $item->qty) }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="actions">
                                        <div class="actions-wrapper">

                                            <p class="button remove-all action-cart" data-type="delete"
                                                data-confirm="Bạn có chắc chắn muốn xóa tất cả?">Xóa tất cả</p>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="cart-wrap__sidebar">
                        <div class="summary bd">
                            <div class="title flex-center-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.319" height="28.117"
                                    viewBox="0 0 23.319 28.117">
                                    <g id="bill" transform="translate(-394.57 -270)">
                                        <path id="Path_296" data-name="Path 296"
                                            d="M642.758,963.276h12.626a.578.578,0,0,0,0-1.156H642.758a.578.578,0,0,0,0,1.156Z"
                                            transform="translate(-242.841 -678.791)"></path>
                                        <path id="Path_297" data-name="Path 297"
                                            d="M642.758,580.426h6.524a.578.578,0,0,0,0-1.156h-6.524a.578.578,0,0,0,0,1.156Z"
                                            transform="translate(-242.841 -303.314)"></path>
                                        <path id="Path_298" data-name="Path 298"
                                            d="M642.758,1154.706h12.626a.578.578,0,1,0,0-1.156H642.758a.578.578,0,1,0,0,1.156Z"
                                            transform="translate(-242.841 -866.534)"></path>
                                        <path id="Path_299" data-name="Path 299"
                                            d="M642.758,771.856h6.524a.578.578,0,1,0,0-1.155h-6.524a.578.578,0,1,0,0,1.155Z"
                                            transform="translate(-242.841 -491.057)"></path>
                                        <path id="Path_300" data-name="Path 300"
                                            d="M642.758,1346.135h12.626a.578.578,0,1,0,0-1.156H642.758a.578.578,0,1,0,0,1.156Z"
                                            transform="translate(-242.841 -1054.278)"></path>
                                        <path id="Path_301" data-name="Path 301"
                                            d="M417.311,270H395.148a.578.578,0,0,0-.578.578V295.55a.578.578,0,0,0,.341.527l4.433,1.989a.577.577,0,0,0,.473,0l4.2-1.883,4.2,1.883a.577.577,0,0,0,.473,0l4.2-1.883,4.2,1.883a.578.578,0,0,0,.814-.527V270.578A.577.577,0,0,0,417.311,270Zm-.578,26.647-3.618-1.624a.577.577,0,0,0-.473,0l-4.2,1.883-4.2-1.883a.577.577,0,0,0-.473,0l-4.2,1.883-3.855-1.73V271.156h21.008Z">
                                        </path>
                                        <path id="Path_302" data-name="Path 302"
                                            d="M1160.419,406.882a.524.524,0,0,1-.524-.524.578.578,0,1,0-1.155,0,1.681,1.681,0,0,0,1.679,1.679h.264v1.077a.578.578,0,1,0,1.156,0v-1.077h.264a1.681,1.681,0,0,0,1.679-1.679v-.49a1.681,1.681,0,0,0-1.679-1.679h-.264v-1.537h.264a.524.524,0,0,1,.524.524.578.578,0,1,0,1.155,0,1.681,1.681,0,0,0-1.679-1.679h-.264v-1.05a.578.578,0,1,0-1.156,0v1.05h-.264a1.681,1.681,0,0,0-1.679,1.679v.49a1.681,1.681,0,0,0,1.679,1.679h.264v1.537Zm0-2.692a.524.524,0,0,1-.524-.524v-.49a.524.524,0,0,1,.524-.524h.264v1.537Zm1.419,1.155h.264a.524.524,0,0,1,.524.524v.49a.524.524,0,0,1-.524.524h-.264Z"
                                            transform="translate(-749.453 -127.369)"></path>
                                    </g>
                                </svg>
                                <p>Tóm tắt đơn hàng</p>
                            </div>
                            <ul class="total">
                                <li class=" flex-center-between">
                                    <p class="total-name">Tạm tính</p>
                                    <p class="total-value subTotalcart">{{ formatPriceCart(Cart::subtotal()) ?: 0 }}</p>
                                </li>
                                <li class="summary-subtotal flex-center-between">
                                    <p class="total-name">Tổng cộng</p>
                                    <p class="summary-total-price total-value">
                                        {{ formatPriceCart(Cart::subtotal()) ?: 0 }}
                                    </p>
                                </li>
                            </ul>
                            <a class="btn w-100 btn-checkout paymentAccept" href="{{ route('user.checkout') }}"
                                aria-label="Đặt hàng">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/client-assets/js/cart-payment.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            if (window.innerWidth < 768) {
                $('th.product-list__namel').text('');
            }
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/cart.min.css') }}">
@endpush
