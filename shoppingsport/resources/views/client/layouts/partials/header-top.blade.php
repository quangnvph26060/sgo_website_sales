
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
                        <span>Hotline:</span>
                        <a href="tel:{{ $config->sale_phone_number }}">{{ $config->sale_phone_number }}</a>
                        <span>hoặc</span>
                        <a href="mailto:{{ $config->email }}"
                            aria-label="{{ $config->email }}">{{ $config->email }}</a>
                    </p>
                </div>
                {{-- <div class="right-switcher h-100">
                    <nav class="right-switcher__nav h-100">
                        <ul class="switcher h-100">
                            <li class="switcher-language h-100">
                                <a class="h-100 fw-600 flex-center" href="https://thanhloisport.com"
                                    aria-label="Tiếng việt">Tiếng việt</a>
                                <ul class="switcher-language__list">
                                    <li class="item flex-center-left">
                                        <a href="https://thanhloisport.com" aria-label="Tiếng việt">Tiếng việt</a>
                                    </li>
                                    <li class="item flex-center-left">
                                        <a href="https://thanhloisport.com/en" aria-label="Tiếng anh">Tiếng anh</a>
                                    </li>
                                    <li class="item flex-center-left">
                                        <a href="https://thanhloisport.com/fr" aria-label="Tiếng pháp">Tiếng pháp</a>
                                    </li>
                                    <li class="item flex-center-left">
                                        <a href="https://thanhloisport.com/de" aria-label="Tiếng đức">Tiếng đức</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
</div>
