<div class="footer-top">
    <div class="container">
        <div class="footer-top__wrap flex-left w-100">
            <div class="footer-left">
                <a href="https://thanhloisport.com" aria-label="logo footer" class="footer_logo">
                    <img loading="lazy" src="https://thanhloisport.com/uploads/2023/07/logo-thanh-loi-sport.png.webp"
                        alt="logo footer" width="150px" height="50px" />
                </a>
                <p class="footer-left__title">
                    {{ $config->name }}
                </p>
                <div class="footer-left__description">
                    {{ $config->description }}
                </div>
                <p class="footer-left__email">
                    <a href="mailto:{{ $config->email }}" aria-label="{{ $config->email }}">
                        {{ $config->email }}
                    </a>
                </p>
            </div>
            <div class="footer-widget flex-left">
                <div class="item footer-widget__item1" id="footer-widget__item1">
                    <aside class="widget widget-text">
                        <p class="widget-title">Liên hệ</p>
                        <div class="widget-content">
                            <p class="footer-contact__phone">
                                <strong>Hotline:</strong>
                                <span style="color: #0000ff"><strong><a style="color: #0000ff"
                                            href="tel:{{ $config->constant_hotline }}">{{ $config->constant_hotline }}</a></strong></span>(24/24)
                            </p>
                            <p class="footer-contact__time">
                                <strong>Thời gian làm việc</strong>
                            </p>
                            <p class="footer-contact__time">
                                Sáng: 8:00 - 12:00<br />Chiều: 13:30 - 17:30<br />Thứ 2
                                đến thứ 7 hàng tuần
                            </p>
                            <p class="footer-contact__time">
                                Cửa hàng online trực tuyến 24/24<br /><strong>Email:</strong>
                                {{ $config->email }}<br /><strong>Hotline:</strong>
                                <span style="color: #0000ff"><strong><a style="color: #0000ff"
                                            href="tel:{{ $config->sale_phone_number }}">{{ $config->sale_phone_number }}</a></strong></span>
                                (Khách lẻ)<br /><strong>Hotline:</strong>
                                <span style="color: #0000ff"><strong><a style="color: #0000ff"
                                            href="tel:0865311196">{{ $config->sale_phone_number }}</a></strong></span>
                                (Khách đại lý)<br /><strong>Địa chỉ:</strong> {{ $config->address }}
                            </p>
                            <p class="footer-contact__email"></p>
                        </div>
                    </aside>
                </div>
                <div class="item footer-widget__item2" id="footer-widget__item2">
                    <aside class="widget widget-menu">
                        <p class="widget-title">VỀ CHÚNG TÔI</p>
                        <div class="widget-content">
                            <ul class="widget-menu__list">
                                <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="/gioi-thieu" aria-label="Giới thiệu" rel="" target="_self">
                                            Giới thiệu
                                        </a>
                                    </p>
                                </li>
                                <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="/lien-he" aria-label="Liên hệ" rel="" target="_self">
                                            Liên hệ
                                        </a>
                                    </p>
                                </li>
                                {{-- <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="/chinh-sach-van-chuyen-thanh-loi-sport" aria-label="Vận chuyển"
                                            rel="" target="_self">
                                            Vận chuyển
                                        </a>
                                    </p>
                                </li>
                                <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="/chinh-sach-doi-tra-hang-tai-thanh-loi-sport"
                                            aria-label="Chính sách đổi trả" rel="" target="_self">
                                            Chính sách đổi trả
                                        </a>
                                    </p>
                                </li> --}}
                                {{-- <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="https://shopee.vn/thanhloisport" aria-label="SHOPEE THÀNH LỢI SPORT"
                                            rel="" target="_self">
                                            SHOPEE THÀNH LỢI SPORT
                                        </a>
                                    </p>
                                </li>
                                <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="https://www.lazada.vn/shop/thanh-loi-sport"
                                            aria-label="LAZADA THÀNH LỢI SPORT" rel="" target="_self">
                                            LAZADA THÀNH LỢI SPORT
                                        </a>
                                    </p>
                                </li>
                                <li class="menu-item">
                                    <p class="menu-item__title">
                                        <a href="https://www.tiktok.com/@thanhloisport"
                                            aria-label="TIKTOK THÀNH LỢI SPORT" rel="" target="_self">
                                            TIKTOK THÀNH LỢI SPORT
                                        </a>
                                    </p>
                                </li> --}}
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="item footer-widget__item3" id="footer-widget__item3">
                    <aside class="widget widget-menu">
                        <p class="widget-title">SẢN PHẨM</p>
                        <div class="widget-content">
                            <ul class="widget-menu__list">

                                @foreach ($categories as $item)
                                    <li class="menu-item">
                                        <p class="menu-item__title">
                                            <a href="{{ route('user.list', $item->slug) }}" aria-label="{{ $item->name }}" rel=""
                                                target="_self">
                                                {{ $item->name }}
                                            </a>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
