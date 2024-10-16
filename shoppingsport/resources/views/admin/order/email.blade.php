<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Activated Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .summary {
            margin: 20px 0;
            padding: 15px;
            background-color: #f4f4f4;
            border-left: 5px solid #4CAF50;
        }

        .summaryreason {
            margin: 20px 0;
            padding: 15px;
            background-color: #f4f4f4;
            border-left: 5px solid #e20303;
        }

        .summary p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thông báo kích hoạt đơn hàng</h1>

        <div class="summary">
            <p><strong>Mã đơn hàng:</strong> {{ $order->code }}</p>
            <p><strong>Trạng thái :</strong> {{ $active == 1 ? 'Đã kích hoạt đơn hàng' : 'Đơn Hàng đã bị hủy' }}</p>
            <p><strong>Total Amount:</strong> {{ number_format($order->amount) }}đ</p>
        </div>

        @if($active != 1)
        <div class="summaryreason">
            <p><strong>Lý do :</strong> {{ $reason }} </p>
        </div>
        @endif

        <h2>Mặt hàng đã đặt</h2>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Giảm giá</th>
                    <th>Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                <!-- Duyệt qua danh sách các mặt hàng -->
                @foreach($order->detail as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->price_new) }}</td>
                    <td>{{ number_format($item->product->discount->value)}}%</td>
                    <td>{{ number_format($item->product->price_new * $item->quantity *
                        $item->product->discount->value/100 ) }} đ </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</body>

</html>
