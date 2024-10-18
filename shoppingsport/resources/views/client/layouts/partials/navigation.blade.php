<div class="navigation">
    <div class="navigation-wrap">
        <div class="navigation-top flex-center-between">
            <a href="https://thanhloisport.com" class="navigation-top__logo" aria-label="logo">
                <img loading="lazy" src="https://thanhloisport.com/uploads/2023/09/logo-thanh-loi-sport-800x800.png.webp"
                    alt="logo" width="160px" height="40px" />
            </a>
            <span class="navigation-top__close">
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4497 3.16142L3.81641 13.8379" stroke="#373737" stroke-width="4"
                        stroke-linecap="square"></path>
                    <path d="M4.18307 3.16142L14.8164 13.8379" stroke="#373737" stroke-width="4"
                        stroke-linecap="square"></path>
                </svg>
            </span>
        </div>
        <div class="search form-search flex-inline-center w-100" id="search_mobile">
            <form method="GET" class="search-form w-100" action="https://thanhloisport.com/tim-kiem">
                <input type="text" class="form-control w-100" aria-label="search" name="search" autocomplete="off"
                    placeholder="Tìm kiếm sản phẩm..." required="" value="">
                <button class="btn btn-search" type="submit" aria-label="btn search" name="btn_search">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
        <p class="navigation-title flex-center-left">Menu</p>
        <nav class="navigation-nav">
            <ul class="navigation-nav__content">
                <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel="" href="/"
                        target="_self">
                        TRANG CHỦ
                    </a>
                </li>
                <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                        href="/gioi-thieu" target="_self">
                        GIỚI THIỆU
                    </a>
                </li>
                {{-- <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                        href="/chinh-sach-van-chuyen-thanh-loi-sport" target="_self">
                        VẬN CHUYỂN
                    </a>
                </li>
                <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                        href="/chinh-sach-thanh-toan-thanh-loi-sport" target="_self">
                        THANH TOÁN
                    </a>
                </li> --}}
                <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                        href="/tin-tuc" target="_self">
                        TIN TỨC
                    </a>
                </li>
                {{-- <li class="menu_level1 flex-center-between">
                    <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                        href="/lien-he" target="_self">
                        LIÊN HỆ
                    </a>
                </li> --}}
            </ul>
        </nav>
        <p class="navigation-title flex-center-left">Ngành hàng</p>
        <nav class="navigation-nav">
            <ul class="navigation-nav__content">



                @foreach ($categories as $category)
                    @if ($category->children->isNotEmpty())
                        <li class="menu_level1 flex-center-between menu_parent">
                            <a href="https://thanhloisport.com/dung-cu-bong-chuyen" aria-label="Dụng cụ bóng chuyền">
                                {{ $category->name }}
                            </a>
                            <span class="icon-down"></span>
                            <ul class="submenu">

                                @foreach ($category->children as $item)
                                    <li class="submenu-item flex-center-between">
                                        <a href="https://thanhloisport.com/giay-bong-chuyen"
                                            aria-label="Giày bóng chuyền">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="menu_level1 flex-center-between">
                            <a href="https://thanhloisport.com/ghe-massage" aria-label="Ghế MASSAGE">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
        <p class="navigation-title flex-center-left">Hotline</p>
        <p class="navigation-text">
            <a href="tel:0862.52.52.96">0862.52.52.96</a>
        </p>
        <p class="navigation-title flex-center-left">Email</p>
        <p class="navigation-text">
            <a href="mailto:thethaothanhloi@gmail.com"
                aria-label="thethaothanhloi@gmail.com">thethaothanhloi@gmail.com</a>
        </p>
        <p class="navigation-copyright">Copyright 2023 © THÀNH LỢI SPORT</p>
    </div>
</div>
