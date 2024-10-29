
<div class="header-top">
    <div class="container">
        <div class="header-top__inner flex-center-between w-100">
            <div class="left">
                <nav class="left-menu">
                    <ul class="left-menu__list flex-center-left">
                        <li class="item">
                            <a href="{{ route('user.login') }}" aria-label="Tài khoản">Tài khoản</a>
                        </li>
                        <li class="item">
                            {{-- <a href="https://thanhloisport.com/wishlist-product" aria-label="Sản phẩm yêu thích">Sản
                                phẩm yêu thích</a> --}}
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="right flex-center-right">
                <div class="right-notice">
                    <p>
                        <a href="{{ route('user.warranty') }}"
                            aria-label="" style="margin-right: 5px">Kích hoạt bảo hành</a>
                        <span>Hotline:</span>
                        <a href="tel:{{ $config->sale_phone_number }}">{{ $config->sale_phone_number }}</a>
                        <span>hoặc</span>
                        <a href="mailto:{{ $config->email }}"
                            aria-label="{{ $config->email }}">{{ $config->email }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
