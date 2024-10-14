@extends('admin.layout.index')

@section('content')
<style>


    #vieworder .card {
        margin-bottom: 20px;
        border-radius: 8px;
    }

    #vieworder .card-header {

        border-bottom: 2px solid #593bdb;
    }

    #vieworder .card-title {
        font-size: 14px;
        color: #333;
    }

    #vieworder .welcome-text p,
    #vieworder .welcome-text h4 {
        font-size: 11px;
        margin: 0;
    }

    #vieworder .table th {
        font-size: 10px !important;
        background-color: #593bdb;
        color: white;
    }

    #vieworder .table td {
        font-size: 12px;
    }

    #vieworder .list-group-item {
        border: none;
    }

    #vieworder .list-group-item h5 {
        font-size: 12px;
    }

    #vieworder .list-group-item .mb-1 {
        font-size: 12px;
    }

    #vieworder .text-right {
        text-align: right;

    }

    #vieworder .text-left {
        text-align: left;
    }

    #vieworder span {
        color: red;

    }

    #vieworder .page-titles {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    #vieworder .welcome-text {

    }

    #vieworder .welcome-text p {
        font-size: 12px;
        color: #666;
        margin-bottom: 3px;
    }

    #vieworder  .welcome-text h4 {
        font-size: 16px;
        font-weight: bold;
        color: #593bdb;
        margin: 0;
    }

    #vieworder .col-sm-3 {
        padding: 5px;
    }


    @media (max-width: 768px) {

        #vieworder  .col-lg-8,
        #vieworder .col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.index') }}">Đơn hàng</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Danh sách đơn hàng</a>
            </li>
        </ul>
    </div>
    <div class="row" id="vieworder">
        <div class="col-12">
            <div class="card">
                <div class="row page-titles mx-0">
                    <div class="col-sm-3 p-md-0">
                        <div class="welcome-text">
                            <p class="mb-0">Mã Đơn Hàng</p>
                            <h4>{{ $order->id }}</h4>
                            <p class="mb-0">
                                {{ $order->created_at->format('d-m-Y H:i:s') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 p-md-0">
                        <div class="welcome-text">
                            <p class="mb-0">Tình Trạng Đơn Hàng</p>
                            <h4>Chưa active</h4>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hệ thống đơn hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá (VND)</th>
                                            <th scope="col">Giảm giá</th>
                                            <th scope="col">Tổng tiền (VND)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->detail as $detail)
                                            <tr>
                                                <td>{{ $detail->product_id }}</td>
                                                <td>{{ $detail->product->name }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ number_format($detail->product->price_new) }} </td>
                                                <td>{{ number_format($detail->product->discount->value) }} %</td>
                                                <td>{{ number_format($detail->product->price_new * $detail->quantity * $detail->product->discount->value-$detail->product->price_new * $detail->quantity * $detail->product->discount->value/100  ) }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-header text-right p-5">
                            <div class="row w-100">
                                <div class="col-lg-6 text-left">
                                    <h4 class="card-title mb-4">Số lượng sản phẩm: <span style="color: red;">{{ count($order->detail) }}</span>
                                    </h4>
                                    <h4 class="card-title mb-4">Tạm tính: <span style="color: red;">{{ number_format($order->amount) }} VND</span></h4>
                                    </h4>

                                    <h4 class="card-title mb-4">Tổng cộng: <span style="color: red;">{{ number_format($order->amount) }} VND</span></h4>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <h4 class="card-title mb-4">Ghi chú: </h4>
                                    <p class="mb-0">{{ $order->note }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="color: #593bdb;">Thông tin khách hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-list-group">
                                <div class="list-group">
                                    <a href="javascript:void()"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-3" style="color: #593bdb;">Thông tin giao hàng
                                            </h5>
                                        </div>
                                        <h5 class="card-title mb-4">Tên người nhận: <span class="mb-1"
                                                style="color: red;">
                                                {{ $order->name }}</span>
                                        </h5>
                                        <h5 class="card-title mb-4">Email người nhận: <span class="mb-1"
                                                style="color: red;">
                                                {{ $order->email }}</span>
                                        </h5>
                                        <h5 class="card-title mb-4">Số điện thoại người nhận: <span class="mb-1"
                                                style="color: red;">
                                                {{ $order->phone }}</span>
                                        </h5>
                                        <h5 class="card-title mb-4">Phương thức thanh toán: <span class="mb-1"
                                                style="color: red;">
                                                {{ $order->payment_method == 1 ? 'COD' : "Thanh toán chuyển khoản" }}</span>
                                        </h5>
                                        <h5 class="card-title mb-4">Địa chỉ giao hàng: <span class="mb-1"
                                                style="color: red;">{{ $order->address }}, {{ $order->ward->name }},{{ $order->district->name }},{{ $order->province->name }}</span>
                                        </h5>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
