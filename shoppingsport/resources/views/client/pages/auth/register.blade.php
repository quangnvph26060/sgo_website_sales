@extends('client.layouts.master')

@section('content')
    <div class="container">
        <div class="member-wrap w-100">
            <div class="row" id="register_row">
                <div class="auth-box">
                    <h1 class="auth-title">Đăng ký</h1>

                    <form action="{{ route('user.register') }}" class="auth-form" id="signup">
                        <div class="field-input">
                            <input type=text class="form-control" placeholder="Họ và tên*" name=name>
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type=email class="form-control" placeholder="Email*" name=email data-type="email">
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type=password class="form-control" placeholder="Mật khẩu*" name=password>
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type=password class="form-control" placeholder="Nhập lại mật khẩu*" name=re_password>
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <small></small>
                        </div>
                        <div class="field-check">
                            <label for="accept" class="policy">
                                <input type=checkbox name="accept" id="accept" value="1">
                                Tôi đồng ý với các điều khoản &amp; quy định.
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <input type=submit class="btn" name=submit value="Đăng ký">
                    </form>
                    <p class="register">Bạn chưa có tài khoản? <a href="{{ route('user.login') }}">Đăng nhập</a> </p>
                </div>
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

        $('#signup').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    if (response.status) {
                        showMessage('success', response.message)
                    } else {
                        $('.auth-box .auth-form .field-input input').css('border-bottom',
                            '2px solid #dee2e6').siblings(
                            'small').text('').removeClass('text-danger');

                        $.each(response.errors, function(key, value) {
                            $(`[name=${key}]`).css('border-bottom', '2px solid red').siblings(
                                'small').text(value).addClass('text-danger');
                        })
                        response.message && showMessage('error', response.message);
                    }
                },
            })
        });
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
