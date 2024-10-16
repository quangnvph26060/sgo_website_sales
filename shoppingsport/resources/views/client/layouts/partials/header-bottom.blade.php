{{-- @dd($categories) --}}
<div class="header-bottom">
    <div class="container">
        <div class="header-bottom__content flex-inline-center-left w-100">
            <div class="category">
                <p class="category-title flex-inline-center-left">Ngành hàng</p>
                <div class="category-list">
                    <ul class="category-list__items">
                        @foreach ($categories->take(10) as $category)
                            @if ($category->children->isNotEmpty())
                                <li class="item has-child">
                                    <a href="{{ $category->slug }}"
                                        aria-label="Dụng cụ bóng chuyền">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-title">
                                            <a href="{{ $category->slug }}"
                                                aria-label="Dụng cụ bóng chuyền">{{ $category->name }}</a>
                                        </li>

                                        @foreach ($category->children as $child)
                                            <li class="sub-menu__item fw-600 bold">
                                                <a href="{{ $child->slug }}"
                                                    aria-label="Giày bóng chuyền">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="item">
                                    <a href="https://thanhloisport.com/ghe-massage" aria-label="Ghế MASSAGE">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach


                    </ul>
                </div>
            </div>
            <div class="menu">
                <nav class="menu-nav">
                    <ul class="menu-nav__content flex">
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/" target="_self">TRANG CHỦ
                            </a>
                        </li>
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/gioi-thieu" target="_self">GIỚI THIỆU
                            </a>
                        </li>
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/chinh-sach-van-chuyen-thanh-loi-sport" target="_self">VẬN CHUYỂN
                            </a>
                        </li>
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/chinh-sach-thanh-toan-thanh-loi-sport" target="_self">THANH TOÁN
                            </a>
                        </li>
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/tin-tuc" target="_self">TIN TỨC
                            </a>
                        </li>
                        <li class="menu_level1">
                            <a class="menu_item fs-16 lh-22 color_header flex-inline-center h-100" rel=""
                                href="/lien-he" target="_self">LIÊN HỆ
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
