@extends('client.layouts.master')

@section('content')
    <div class="container">
        <div class="member-wrap w-100">
            <div class="row" id="change-password-row">
                <div class="auth-box">
                    <h1 class="auth-title">Đổi Mật Khẩu</h1>

                    <form action="{{ route('user.change-password', $token) }}" method="POST" class="auth-form"
                        id="change-password">
                        @csrf
                        <div class="field-input">
                            <input type="password" placeholder="Mật khẩu cũ" name="old_password">
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type="password" placeholder="Mật khẩu mới" name="new_password">
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <small></small>
                        </div>
                        <div class="field-input">
                            <input type="password" placeholder="Xác nhận mật khẩu mới" name="new_password_confirmation"
                            >
                            <span class="show-pass">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                            <small></small>
                        </div>
                        <input type="submit" class="btn" name="submit" value="Đổi Mật Khẩu">
                    </form>
                    <p class="register">Quay lại <a href="{{ route('user.home-page') }}">trang chủ</a>.</p>
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

        $('#change-password').on('submit', function(e) {
            e.preventDefault();

            const data = $(this).serializeArray();

            $.ajax({
                url: "{{ route('user.change-password', $token) }}",
                method: "POST",
                data: data,
                success: function(response) {
                    if (response.status) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
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
