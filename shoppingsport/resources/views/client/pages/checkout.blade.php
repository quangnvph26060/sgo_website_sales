@extends('client.layouts.master')

@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="https://thanhloisport.com" style="display: inline;">
                        <span itemprop="name">
                            Trang chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        Thanh toán
                    </span>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>

    <div class="cart w-100">
        <div class="container">
            <form id="payment-check" class="pyament-check w-100" action="{{ route('user.checkout') }}" method="POST"
                data-gtm-form-interact-id="0">
                @csrf
                <div class="cart-wrap w-100 flex-left">
                    <div class="cart-wrap__list w-100">
                        <div class="box form-infor">
                            <div class="row">
                                <div class="col-md-12 col">
                                    <label for="input-name">Tên người nhận *</label>
                                    <input type="text" class="input_field form-control" id="input-name"
                                        placeholder="Tên người nhận" name="name" value="{{ old('name') }}"
                                        data-gtm-form-interact-field-id="5" style="border: 1px solid rgb(206, 212, 218);">
                                    <p class="null err_show">Vui lòng điền họ tên!</p>
                                    @error('name')
                                        <p class="null err_show">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col">
                                    <label for="input-email">Email người nhận * </label>
                                    <input type="text" class="input_field  form-control " id="input-email"
                                        value="{{ old('email') }}" placeholder="Email người nhận" name="email"
                                        data-gtm-form-interact-field-id="6" style="border: 1px solid rgb(206, 212, 218);">
                                    <p class="null err_show">Vui lòng điền email!</p>
                                    <p class="email err_show">Email không đúng định dạng!</p>
                                    @error('email')
                                        <p class="null err_show">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 col">
                                    <label for="input-phone">Số điện thoại người nhận * </label>
                                    <input type="text" class="input_field  form-control " id="input-phone"
                                        placeholder="Số điện thoại người nhận" name="phone" value="{{ old('phone') }}"
                                        data-gtm-form-interact-field-id="7" style="border: 1px solid rgb(206, 212, 218);">
                                    <p class="null err_show">Vui lòng điền số điện thoại!</p>
                                    <p class="phone err_show">Số điện thoại không đúng định dạng!</p>
                                    @error('phone')
                                        <p class="null err_show">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col">
                                    <div class="form-row">
                                        <label for="customer_province">Tỉnh/ Thành *</label>
                                        <p class="input_field search_address" id="customer_province_id" data-type="province"
                                            type="text" name="customer_province" placeholder="Tỉnh/ Thành"
                                            autocomplete="off">
                                            Tỉnh/ Thành
                                        </p>
                                        <input type="text"
                                            style="opacity: 0; visibility: hidden; height: 0; display: block"
                                            class="form-control" name="province_id" value="" />
                                        <span class="err_show err null">Tỉnh thành là bắt buộc</span>
                                        @error('province_id')
                                            <span class="err_show err null">{{ $message }}</span>
                                        @enderror
                                        <ul class="suggest address-suggest">
                                            <li class="filter">
                                                <input class="name" type="text"
                                                    placeholder="Tìm theo tên tỉnh thành" />
                                            </li>
                                            <ul class="address-suggest__group" id="search_address_province">
                                                @foreach ($cities as $item)
                                                    <li class="address-suggest-item" data-id="{{ $item->id }}"
                                                        data-type="provinces" data-name="{{ $item->name }}">
                                                        {{ $item->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-row">
                                        <label for="customer_district_id">Quận/ Huyện *</label>
                                        <p class="input_field search_address" id="customer_district_id" type=text
                                            name=customer_district id="customer_district_id" placeholder="Quận/ Huyện"
                                            data-type="district" autocomplete="off"></p>
                                        <input type=text
                                            style="opacity: 0;
                                        visibility: hidden; height: 0; display: block;"
                                            class="form-control" name=district_id value="">
                                        <span class="err_show err null">Quận/ Huyện là bắt buộc</span>
                                        @error('district_id')
                                            <span class="err_show err null">{{ $message }}</span>
                                        @enderror
                                        <ul class="suggest address-suggest">
                                            <li class="filter">
                                                <input class="name" type=text placeholder="Tìm theo tên Quận/ Huyện">
                                            </li>
                                            <ul class="address-suggest__group" id="search_address_district">
                                                <li>Vui lòng chọn Tỉnh/ Thành phố</li>
                                            </ul>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col">
                                    <div class="form-row">
                                        <label for="customer_ward_id">Phường/ Xã</label>
                                        <p class="input_field search_address" id="customer_ward_id" type=text
                                            name=customer_ward id="customer_ward_id" placeholder="Phường/ Xã"
                                            data-type="ward" autocomplete="off"></p>
                                        <input type=text
                                            style="opacity: 0;
                                        visibility: hidden; height: 0; display: block;"
                                            name=ward_id value="">
                                        <span class="err_show err null">Phường/ Xã là bắt buộc</span>
                                        <ul class="suggest address-suggest">
                                            <li class="filter">
                                                <input class="name" type=text placeholder="Tìm theo tên Phường/ Xã">
                                            </li>
                                            <ul class="address-suggest__group" id="search_address_ward">
                                                <li>Vui lòng chọn Quận/ Huyện</li>
                                            </ul>
                                        </ul>
                                        @error('ward_id')
                                            <p class="null err_show">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <label for="input-address">Địa chỉ *</label>
                                    <input type="text" class="input_field form-control" placeholder="Địa chỉ"
                                        id="input-address" name="address" value="{{ old('address') }}"
                                        style="border: 1px solid rgb(206, 212, 218);" data-gtm-form-interact-field-id="4">
                                    <p class="null err_show">Vui lòng điền địa chỉ!</p>
                                    @error('address')
                                        <p class="null err_show">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col">
                                    <label for="input-note">Ghi chú nếu có</label>
                                    <textarea placeholder="Ghi chú nếu có" id="input-note" name="note" value="{{ old('note') }}"></textarea>
                                </div>
                            </div>
                            <div class="box-title pt-20">
                                <span>Phương thức thanh toán</span>
                            </div>
                            <div class="list-payment">
                                <div class="radio-field">
                                    <label class="flex-center-left" for="payment_cod">
                                        <input type="radio" id="payment_cod" name="payment_method"
                                            class="custom-control-input" value="cod" @checked(old('payment_method', 'cod') == 'cod')
                                            data-gtm-form-interact-field-id="8">
                                        Thanh toán khi nhận hàng (COD)
                                    </label>
                                    <div class="radio-field__description" style="display: block;">

                                    </div>
                                </div>
                                <div class="radio-field">
                                    <label class="flex-center-left" for="payment_bank_transfer">
                                        <input type="radio" id="payment_bank_transfer" name="payment_method"
                                            class="custom-control-input" value="bank_transfer"
                                            data-gtm-form-interact-field-id="3" @checked(old('payment_method') == 'bank_transfer')>
                                        Chuyển khoản ngân hàng
                                    </label>
                                    <div class="radio-field__description" style="display: none;">
                                        <ol>
                                            <li>Ngân hàng MB BANK</li>
                                        </ol>
                                        <p>&nbsp; &nbsp; &nbsp; &nbsp;Số tài khoản: 9999696999</p>
                                        <p>&nbsp; &nbsp; &nbsp; &nbsp;Chủ tài khoản: Nguyễn Văn Lợi</p>
                                        <p>&nbsp; &nbsp;2. Ngân hàng Techcombank</p>
                                        <p>&nbsp; &nbsp; &nbsp; &nbsp;Số tài khoản: 6999959999</p>
                                        <p>&nbsp; &nbsp; &nbsp; &nbsp;Chủ tài khoản: Nguyễn Văn Lợi</p>
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                                <li class="flex-center-between">
                                    <p class="total-name">Sản phẩm</p>
                                    <p class="total-title">Thành tiền</p>
                                </li>
                                @foreach (Cart::instance('shopping')->content() as $item)
                                    <li class=" flex-center-between">
                                        <p class="total-name opacity">{{ $item->name }} <span> x
                                                {{ $item->qty }}</span></p>
                                        <p class="total-value opacity">{{ showPrice($item->price * $item->qty) }}</p>
                                    </li>
                                @endforeach
                                <li class=" flex-center-between">
                                    <p class="total-name">Tạm tính</p>
                                    <p class="total-value subTotalcart">{{ formatPriceCart(Cart::subtotal()) ?: 0 }}</p>
                                </li>
                                <li class="shipping-row flex-center-between">
                                    <p class="total-name">Phí vận chuyển</p>
                                    <p class="total-value shipping-amount">Tính sau</p>
                                </li>
                                <li class="summary-subtotal flex-center-between">
                                    <p class="total-name">Tổng cộng</p>
                                    <p class="summary-total-price total-value" data-value="39500000">
                                        {{ formatPriceCart(Cart::subtotal()) ?: 0 }}</p>
                                </li>
                            </ul>
                            <button class="btn w-100 btn-checkout paymentAccept" type="submit"
                                aria-label="Hoàn tất">Hoàn tất</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/client-assets/js/cart-payment.min.js') }}"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/cart.min.css') }}">
    <style>
        @media (max-width: 768px) {
            .row {
                display: block !important;
            }
        }
    </style>
@endpush
