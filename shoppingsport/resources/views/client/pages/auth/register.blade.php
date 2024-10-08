@extends('client.layouts.master')

@section('content')
    <div class="container">
        <div class="member-wrap w-100">
            <div class="row" id="register_row">
                <div class="auth-box">
                    <h1 class="auth-title">Đăng ký</h1>

                    <form action="https://thanhloisport.com/ajax/register" id="form-register" data-form="ajax"
                        data-reload="true" class="auth-form" id="signup">
                        <div class="field-input">
                            <input type=text class="form-control" placeholder="Họ và tên*" value="" name=name
                                required>
                            <p class="err_show null">Họ và tên không được để trống!</p>
                        </div>
                        <div class="field-input">
                            <input type=email class="form-control" placeholder="Email*" value="" name=email
                                data-type="email" required>
                            <p class="err_show null">Email không được để trống!</p>
                        </div>
                        <div class="field-input">
                            <input type=password class="form-control" placeholder="Mật khẩu*" value="" name=password
                                required>
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <p class="err_show null">Mật khẩu không được để trống!</p>
                        </div>
                        <div class="field-input">
                            <input type=password class="form-control" placeholder="Nhập lại mật khẩu*" value=""
                                name=password_confirmation required>
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <p class="err_show null">Nhập lại mật khẩu không được để trống!</p>
                        </div>
                        <div class="field-check">
                            <label for="accept" class="policy">
                                <input type=checkbox name=accept id="accept" value="1">
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
    </script>
@endpush
