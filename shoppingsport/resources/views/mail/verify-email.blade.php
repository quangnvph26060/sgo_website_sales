<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kích Hoạt Tài Khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://yourwebsite.com/logo.png" alt="Logo Website">
            <h2>Kích Hoạt Tài Khoản</h2>
        </div>
        <div class="content">
            <h1>Chào mừng bạn đến với [Tên Website]</h1>
            <p>Cảm ơn bạn đã đăng ký tài khoản! Để kích hoạt tài khoản của bạn, vui lòng nhấn vào nút bên dưới:</p>
            <a href="{{ route('user.activate', $token) }}" class="btn">Kích Hoạt Tài Khoản</a>
            <p>Nếu bạn không thể nhấn vào nút, vui lòng sao chép và dán đường dẫn sau vào trình duyệt của bạn:</p>
            <p><a
                    href="https://yourwebsite.com/activate?token=your_activation_token">https://yourwebsite.com/activate?token=your_activation_token</a>
            </p>
        </div>
        <div class="footer">
            <p>&copy; 2024 [Tên Website]. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</body>

</html>
