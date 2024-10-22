<div class="mobile-bottom-menu hide-desktop d-none">
    <nav class="mobile-menu">
        <ul>
            @unless (request()->routeIs('user.home-page'))
                <li class="menu-item">
                    <a href="/" aria-label="Trang chủ" class="store">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 576 512">
                            <path
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z">
                            </path>
                        </svg>
                        <span>Trang chủ</span>
                    </a>
                </li>
            @endunless
            <li class="menu-item">
                <p class="search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="19">
                        <path
                            d="M448 449L301.2 300.2c20-27.9 31.9-62.2 31.9-99.2 0-93.1-74.7-168.9-166.5-168.9C74.7 32 0 107.8 0 200.9s74.7 168.9 166.5 168.9c39.8 0 76.3-14.2 105-37.9l146 148.1 30.5-31zM166.5 330.8c-70.6 0-128.1-58.3-128.1-129.9S95.9 71 166.5 71s128.1 58.3 128.1 129.9-57.4 129.9-128.1 129.9z">
                        </path>
                    </svg>
                    <span>Tìm kiếm</span>
                </p>
            </li>
            <li class="menu-item">
                <a href="{{ route('user.wishlist') }}" aria-label="Yêu thích" class="wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="18">
                        <path
                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z">
                        </path>
                    </svg>
                    <span>Yêu thích</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('user.login') }}" aria-label="Tài khoản" class="user">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="18">
                        <path
                            d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z">
                        </path>
                    </svg>
                    <span>Tài khoản</span>
                </a>
            </li>
            <li class="menu-item">
                <p class="category">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="18">
                        <path
                            d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z">
                        </path>
                    </svg>
                    <span>Ngành hàng</span>
                </p>
            </li>
        </ul>
    </nav><!-- mobile-menu -->
</div>

<div class="search-box">
    <div class="container">
        <div class="search-box__wrap">
            <div class="close">
                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.4497 3.16142L3.81641 13.8379" stroke="#373737" stroke-width="4"
                        stroke-linecap="square"></path>
                    <path d="M4.18307 3.16142L14.8164 13.8379" stroke="#373737" stroke-width="4"
                        stroke-linecap="square"></path>
                </svg>
            </div>
            <div class="box">
                <div class="search form-search w-100">
                    <p>Bạn muốn tìm kiếm gì?</p>
                    <form method="GET" class="search-form w-100" action="{{ route('user.search') }}">
                        <input type="text" class="form-control w-100" aria-label="search" name="search"
                            autocomplete="off" placeholder="Tìm kiếm sản phẩm..." required="" value="{{ request()->search ?? '' }}">
                        <button class="btn btn-search" type="submit" aria-label="btn search" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="19">
                                <path
                                    d="M448 449L301.2 300.2c20-27.9 31.9-62.2 31.9-99.2 0-93.1-74.7-168.9-166.5-168.9C74.7 32 0 107.8 0 200.9s74.7 168.9 166.5 168.9c39.8 0 76.3-14.2 105-37.9l146 148.1 30.5-31zM166.5 330.8c-70.6 0-128.1-58.3-128.1-129.9S95.9 71 166.5 71s128.1 58.3 128.1 129.9-57.4 129.9-128.1 129.9z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
