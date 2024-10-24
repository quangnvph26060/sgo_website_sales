<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="icon" href="" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assetlogin/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assetlogin/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetlogin/css/bootstrap.min.css') }}">

    <!-- Style -->

    <link rel="stylesheet" href="{{ asset('assetlogin/css/style.css') }}">
    <script src="{{ asset('validator/validator.js') }}"></script>


    <title>Login</title>
    <style>
        .form-block {
            display: none;
        }

        .form-block.active {
            display: block;
        }

        .error {
            color: red;
            padding: 5px 0px 0px 10px;
            font-size: 13px;

        }

        .custom-toast {
            width: auto !important;
            /* Cho phép chiều rộng tự động */
            max-width: 500px;
            /* Bạn có thể điều chỉnh giá trị này theo nhu cầu */
            white-space: nowrap;
            /* Ngăn việc xuống dòng */
        }
    </style>
</head>

<body>

    <div class="d-md-flex half">
        <div class="bg" style="background-image: url('{{ asset('assetlogin/images/bg_1.jpg') }}');"></div>
        <div class="contents">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <!-- Login Form -->
                        <div id="loginForm" class="form-block mx-auto active">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">Đăng nhập <strong> Admin</strong></h3>
                            </div>
                            <form method="post" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group first">
                                    <label for="loginEmail">Email</label>
                                    <input type="text" class="form-control" value="{{ old('email') }}" placeholder="your-email@gmail.com"
                                        name="email" id="loginEmail">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="loginPassword">Password</label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                        id="loginPassword">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0">
                                        <span class="caption">Ghi nhớ mật khẩu</span>
                                        <input type="checkbox" name="remember" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    {{-- <span class="ml-auto"><a href="#" onclick="showForgotPasswordForm(event);" class="forgot-pass">Forgot Password</a></span> --}}
                                </div>

                                <input type="submit" value="Xác nhận" class="btn btn-block py-2 btn-primary">

                                {{-- <span class="text-center my-3 d-block">or</span>

                                <div class="">
                                    <a href="{{ route('auth.google') }}" class="btn btn-block py-2 btn-facebook">
                                        <span class="icon-facebook mr-3"></span> Login with Facebook
                                    </a>
                                    <a href="{{ route('auth.google') }}" class="btn btn-block py-2 btn-google">
                                        <span class="icon-google mr-3"></span> Login with Google
                                    </a>
                                </div> --}}
                            </form>
                            {{-- <div style="text-align: center; margin-top: 20px;">
                                <span>Bạn chưa có tài khoản? <a href="#" onclick="showRegisterForm(event);" style="color: rgb(68, 110, 226); font-weight: 600">Đăng ký ngay</a></span>
                            </div> --}}
                        </div>

                        <!-- Register Form -->
                        <div id="registerForm" class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">Register to <strong>Colorlib</strong></h3>
                            </div>
                            <form method="post" action="{{ route('admin.register') }}" id="registersubmit">
                                @csrf
                                <div class="form-group first">
                                    <label for="name">Họ Tên</label>
                                    <input type="text" class="form-control" placeholder="Họ và tên" name="name"
                                        id="nameregister" required>
                                    <p class="error" id="nameregister_error"></p>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="registerEmail">Email</label>
                                    <input type="email" class="form-control" placeholder="your-email@gmail.com"
                                        name="email" id="emailregister" required>
                                    <p class="error" id="emailregister_error"></p>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="tel" class="form-control" placeholder="Số điện thoại"
                                        name="phone" id="phoneregister" required>
                                    <p class="error" id="phoneregister_error"></p>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="registerPassword">Mật Khẩu</label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                        id="passwordregister" required>
                                    <p class="error" id="passwordregister_error"></p>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="confirm_password">Xác Nhận Mật Khẩu</label>
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu"
                                        name="password_confirmation" id="confirm_passwordregister" required>
                                    <p class="error" id="confirm_passwordregister_error"></p>
                                </div>

                                <input type="button" value="Đăng Ký" onclick="submitaddProduct(event)"
                                    class="btn btn-block py-2 btn-primary">

                            </form>
                            <div style="text-align: center; margin-top: 20px;">
                                <span>Đã có tài khoản? <a href="#" onclick="showLoginForm(event);"
                                        style="color: rgb(68, 110, 226); font-weight: 600">Đăng nhập ngay</a></span>
                            </div>
                        </div>

                        <!-- Forgot Password Form -->
                        <div id="forgotPasswordForm" class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">Forgot Password</h3>
                            </div>
                            <form method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="forgotEmail">Email</label>
                                    <input type="email" class="form-control" placeholder="your-email@gmail.com"
                                        name="email" id="forgotEmail" required>
                                </div>

                                <input type="submit" value="Send Password Reset Link"
                                    class="btn btn-block py-2 btn-primary">

                            </form>
                            <div style="text-align: center; margin-top: 20px;">
                                <span>Quay lại <a href="#" onclick="showLoginForm(event);"
                                        style="color: rgb(68, 110, 226); font-weight: 600">Đăng nhập</a></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


  
    


    <script src="{{ asset('assetlogin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetlogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetlogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetlogin/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success') || session()->has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    container: "custom-toast", // Áp dụng lớp CSS tùy chỉnh
                },
            });
            Toast.fire({
                icon: "{{ session('success') ? 'success' : 'error' }}",
                title: "{{ session('success') ? session('success') : session('error') }}"
            });
        </script>
    @endif
    <script>
        function showLoginForm(event) {
            event.preventDefault();
            document.getElementById('loginForm').classList.add('active');
            document.getElementById('registerForm').classList.remove('active');
            document.getElementById('forgotPasswordForm').classList.remove('active');
        }

        function showForgotPasswordForm(event) {
            event.preventDefault();
            document.getElementById('loginForm').classList.remove('active');
            document.getElementById('registerForm').classList.remove('active');
            document.getElementById('forgotPasswordForm').classList.add('active');
        }
    </script>
</body>

</html>
