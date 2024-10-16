@extends('admin.layout.index')

@section('content')
<style>
     .cke_notifications_area{
        display: none;
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
                <a href="#"> Sửa đơn hàng</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center" >

                        <h4 class="card-title">Duyệt/Hủy đơn hàng</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" action="{{ route('admin.order.active', ['id' => $order->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên khách hàng:</label><br>
                                            <input type="text" class="form-control" id="name"  value="{{ $order->name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Email:</label><br>
                                            <input type="text" class="form-control" id="email"  value="{{ $order->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Số điện thoại:</label><br>
                                            <input type="text" class="form-control" id="phone"  value="{{ $order->phone }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Chú ý:</label><br>
                                            <textarea  class="form-control" id="" cols="30" rows="10" readonly>{{ $order->note }}</textarea>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="">
                                                <div>
                                                    <p style="font-size: 15px; font-weight: 500">Danh sách sản phẩm </p>
                                                </div>
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
                                                                    <td>{{ number_format($detail->product->price_new * $detail->quantity * $detail->product->discount->value - $detail->product->price_new * $detail->quantity * $detail->product->discount->value/100  ) }} </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="active" class="form-label">Chọn trạng thái đơn hàng:</label>
                                        <select name="active" id="active" class="form-control" name="is_active" required>
                                            <option value="">Đang chờ xử lý</option>
                                            <option {{ $order->is_active == 1 ? 'selected' : '' }} value="1">Duyệt</option>
                                            <option {{ $order->is_active == 2 ? 'selected' : '' }} value="2">Không duyệt</option>

                                            <!-- Thêm các tùy chọn khác nếu cần -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="content">Lý do:</label><br>
                                        <textarea name="reason" class="form-control" id="" cols="30" rows="10" ></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
