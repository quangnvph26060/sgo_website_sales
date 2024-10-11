@extends('client.layouts.master')

@section('content')
    <div class="container">
        <div class="member-wrap w-100">
            <div class="row" id="register_row">
                <div class="auth-box">
                    <h1 class="auth-title">Đăng nhập</h1>

                    <form action="" class="auth-form" id="login">
                        <div class="field-input">
                            <input type=text placeholder="Email" value="{{ old('email') }}" name=email>
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type=password placeholder="Mật khẩu" value="" name=password>
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <small></small>
                        </div>
                        <a class="forgot-pass" href="#forgot">Quên mật khẩu</a>
                        <input type=submit class="btn" name=submit value="Đăng nhập">
                    </form>
                    <p class="register">Bạn chưa có tài khoản? <a href="{{ route('user.register') }}">Đăng ký</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-forgot-password">
        <div class="popup popup-form popup-forgot">
            <a title="Close" href="#" class="popup__close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#333" width=16 height=16>
                    <path
                        d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z" />
                </svg>
            </a>
            <ul class="choose-form">
                <li class="nav-forgot active"><a href="#forgot">Quên mật khẩu</a></li>
            </ul>
            <p class="mb-2">Chúng tôi sẽ gửi đường link lấy lại mật khẩu vào Email của bạn. Vui lòng nhập chính xác Email:
            </p>
            <div class="popup-content">
                <form action="{{ route('user.forgot-password') }}" data-form="ajax"
                    class="form-forgot form-content" id="forgot">
                    <div class="field-input">
                        <input type=text placeholder="Email" value="" name=email required data-type="email">
                    </div>
                    <input type=submit name=submit value="Xác nhận">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/user.css') }}">
@endpush


@push('script')
    <script>
        $(document).ready(function() {
            $('.show-pass').on('click', function() {
                const passwordInput = $(this).siblings('input');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                passwordInput.attr('type', type);
                $(this).find('i').toggleClass('fa-eye fa-eye-slash');
            });
        });

        $('.forgot-pass').on('click', function() {
            $('.popup-forgot-password').addClass('active');
            $('.popup-form.popup-forgot').addClass('active');
        })

        $('.popup__close').on('click', function() {
            $('.popup-forgot-password').removeClass('active');
            $('.popup-form.popup-forgot').removeClass('active');
        })

        $('#login').on('submit', function(e) {
            e.preventDefault();

            const data = $(this).serializeArray();

            $.ajax({
                url: "{{ route('user.login') }}",
                method: "POST",
                data: data,

                success: function(response) {
                    if (!response.status) {
                        $('.auth-box .auth-form .field-input input').css('border-bottom',
                            '2px solid #dee2e6').siblings(
                            'small').text('').removeClass('text-danger');

                        $.each(response.errors, function(key, value) {
                            $(`[name=${key}]`).css('border-bottom', '2px solid red').siblings(
                                'small').text(value).addClass(
                                'text-danger');
                        })

                        response.message && showMessage(response.type, response.message);

                        $('#login').trigger('reset');
                    } else {

                        window.location.href = response.redirect;
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
    </script>
@endpush


@push('style')
    <style>
        .auth-box .auth-form .field-input {
            margin-bottom: 20px !important;
        }

        .auth-box .auth-form .field-input input {
            margin: 0 !important;
        }
    </style>
@endpush
