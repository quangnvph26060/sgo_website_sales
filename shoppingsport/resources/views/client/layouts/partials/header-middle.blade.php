<div class="header-middle">
    <div class="container">
        <div class="header-middle__wrap flex-center-between w-100">
            <div class="left flex-inline-center-left">
                <div class="left-menu">
                    <span class="left-menu__item"></span>
                    <span class="left-menu__item"></span>
                    <span class="left-menu__item"></span>
                </div>
                <div class="left-logo">
                    <a href="{{ route('user.home-page') }}" aria-label="logo">
                        <img loading="lazy"
                            src="https://thanhloisport.com/uploads/2023/09/logo-thanh-loi-sport-800x800.png.webp"
                            alt="logo" width="160px" height="40px" />
                    </a>
                </div>
            </div>
            <div class="search form-search flex-inline-center" id="search-header">
                <form method="GET" class="search-form w-100 input-wrapper flex" action="{{ route('user.search') }}">
                    <input type="text" class="form-control w-100"  name="search"
                        placeholder="Tìm kiếm"  />
                    <button class="btn btn-search" type="submit" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="right flex-inline-center-right">
                <div class="right-button login-button">
                    <div class="right-button-inner">
                        @if (Auth::check())
                            <img class="avatar" src="{{ showImageStorage(Auth::user()->avatar) }}" alt="">
                        @else
                            <div class="quick-text">
                                <p class="primary-text">Tài khoản</p>
                                <span class="sub-text">Đăng nhập</span>
                            </div>
                        @endif
                        <div class="arrow"></div>
                    </div>
                    <div class="login-dropdown">
                        <div class="login-dropdown-wrapper">
                            @if (Auth::check())
                                <p style="margin-bottom: 10px"> <strong>{{ Auth::user()->name }}</strong></p>
                                <a class="btn secondary wide" href="{{ route('user.logout') }}">Đăng xuất</a>
                            @else
                                <p class="login-text">
                                    Đăng nhập để nhận ưu đãi khi mua hàng!
                                </p>
                                <a class="btn secondary wide" href="{{ route('user.login') }}">Đăng nhập</a>
                                <div class="new-customer">
                                    Bạn chưa có tài khoản?
                                    <a href="{{ route('user.register') }}">Đăng ký</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="right-button wishlist-button">
                    <a class="right-button-inner" href="{{ route('user.wishlist') }}">
                        <div class="quick-icon">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA3QAAAN0BcFOiBwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJoSURBVFiFxZc9SBxBFMd/sycLildYiDYakIBlAnJXxE6wvi5gZWVlIWJaDSm1sTONla2xVUhlFVAxJJUcBEwVsIvkgkI4X4p7675b5za7e3e5gYGbef8vZmdn9pyIMMgWDNQdGOpUcM6VgFngBdAEvgDfROQhTdA5FwDPgZdACfgK1EWk6SWISFtX0xPgDpBEbwAfgGkPb1prDQ/vTjVnn/CMQAi8Be4T5B/AjSfIG13BIf2dNL5Rrp27V4/QF+DQAK+AGjBu6pPAa+Da4D5qj8bXipk0vHHVujK4w7YAwLIpvrMJPUs9Aux6lnkXGEnhhaod4ZejN/AZcKuT+50EPIKrwIP21Ry8ffW6VW82dOI7MJpVSMXmgLmcnFH1EmAjACq02rGINMjRRORSRC5zchrAsQ4rAVDVwUUeoS5b5FUNgLIOfv3HAJFXOTBpKh3A/WiR10UAnOtgwTnn+u2sHgs6PIfWHmjS2pVreXZ0kQ6sqVcTqEaT28RndqWP5hXiO2bbnoQh8FkLP4H5PpjPq7aoV/gYQAEzxAfEb2Cxh+aLqhkdeDOPtQRwCqgT31y1HpjXiG/YOjDVVvcQJmh9RAjwB1jqwnxJNUQ1J55gOhDHgDOzW1cKmK+Yt+sMGPPiUgTKwCnx9bmew3zd8E6BckfsP4SGaX1KRWJbGcy3DP4EGE7FZxAMgSMjupOC3TG4I1I+bDIHUOEScGDE3wPO1J3ORfUDoJRJO8dzdcBe0sQTbs+G61mAlGXO9Hh6FkBDbBrTqG8W0ipC0hD2Vcv8iia7U7FCzTn3CkBEPhXW6CZAL9rA/x3/BRgixnh/DACcAAAAAElFTkSuQmCC"
                                alt="Icon heart" width="24" height="24" />
                        </div>
                    </a>
                    <div class="count">
                        <a href="{{ route('user.wishlist') }}" id="wishlist" aria-label="" class="count_link">
                            <span
                                class="wishlist_products_counter_number">{{ Cart::instance('wishlist') ? Cart::instance('wishlist')->count() : 0 }}</span>
                        </a>
                    </div>
                </div>
                <div class="right-button cart-button">
                    <a class="quick-button-inner" href="{{ route('user.cart') }}">
                        <div class="quick-icon">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA3QAAAN0BcFOiBwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJlSURBVFiFxZc/aBRBFMZ/X05EJcR/aCeCoOYCKVQw/iWkUAQ7FQlIsLIQbC1sRHuxT0ijpSBYiZ2XCxFDwHiKFkK0MFcIoqgRjRifxc66c8ne7MntXh4MM/t2vnnfvvfmzazMjNUUAaeBC0CXp38D3DSzpU6QqAOW0obNjKJbF3AdeAxUXPvmiA114utXMALuOA+87pQHlsuk63slbS3aAWsCBASMSHpakO0lYFZp21DSB2B7QYZ9qaSFABIvFC170kIAUAXOuvEg8DVnw/eA3cBUMwK+B9abWTUvy5J6gF3ucaJZCGokX308L+NOjgGlIAEz+wNMeYA8ZdD1H4FXzTwASRgGJK0tgEDVzCxEII77OuBAHpYldXtrTQCplTCWGeCnG+eVB0dIil8lSMDMfgHTOROI3f8JeBkk4CTOg6OSlCOBSXMluFkdWE5gM3BD0uc2CRx0feWfJnRUAt3Ab9IvLO20fbGNoAfMbEHSLeASSfFoRwx4CDyPFamnYSclKwcAkLQF2E9UnmtmttgirgSUgR3ACzOrr5iUkQMCrgGLJPGrAyezrlpALzBLY+zHgA0N8zIWuUx6Ev0AygFcD/CuCXb0fwjMO9AzYAA474wbMB7AXfEMXgX6gQeeblsmAaK9HwNGPP19p5sOYEfdnDlP1++tNxS6FcfyheQf4YSkkqRNwCGnex/Axu92Siq78amU95khGPdYzwPfvedzAVwf0UFmRIVszsPN4LZ/KzmwEXjCykS63cIuuOiRiNtbYK8/L7MQub08DBwmqgOPWr0jSuoDzhDVgRpw18wWGuasdiX8C9qvvAr/I/1bAAAAAElFTkSuQmCC"
                                alt="Icon cart" width="24" height="24" />
                            <span
                                class="cart-count count">{{ Cart::instance('shopping') ? Cart::instance('shopping')->count() : 0 }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
