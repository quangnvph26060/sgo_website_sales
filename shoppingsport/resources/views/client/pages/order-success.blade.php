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
                    <a itemprop="item" href="https://thanhloisport.com/order-success/G9JE8133" style="display: inline;">
                        <span itemprop="name">
                            Đặt hàng thành công
                        </span>
                        <meta itemprop="position" content="2">
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="payment-success">
        <div class="container">
            <div class="payment-success__wrap">
                <p class="title">Đặt hàng thành công</p>
                <div class="box box-cart-success pd-20">
                    <b>Chào {{$order->name}}</b>
                    <p class="mb-20">Chúc mừng bạn đã đặt hàng thành công sản phẩm của shop</p>
                    <table class="mb-20 cart-table bb-1 mt-0">
                        <tbody>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>
                                    <b>{{$order->code}}</b>
                                </td>
                            </tr>

                            <tr>
                                <td>Phương thức thanh toán</td>
                                <td>
                                    <b>Thanh toán khi nhận hàng (COD)</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Thành tiền</td>
                                <td>
                                    <b class="blue">{{showPrice($order->amount)}}</b>
                                </td>
                            </tr>

                            <tr>
                                <td>Trạng thái thanh toán</td>
                                <td>
                                    <b class="red">Đang chờ xử lý</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tcol mb-20">
                        <p>Chúng tôi sẽ sớm liên hệ lại tới bạn để xác nhận đơn hàng!</p>
                        <p class="mb-10">Trân trọng!</p>
                    </div>

                    <div class="w100 flex-center">
                        <a href="{{ route('user.home-page') }}" class="btn">Tiếp tục mua hàng</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/client-assets/js/cart-payment.min.js') }}"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/cart.min.css') }}">
@endpush
