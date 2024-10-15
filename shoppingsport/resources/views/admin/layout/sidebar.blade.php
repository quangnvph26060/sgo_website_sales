<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="{{ route('admin.index') }}" class="logo">
                <img src="{{ asset('sgovn.png') }}" alt="navbar brand" class="navbar-brand" style="width: 100px;
                height: auto" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('admin.index') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Tổng quan</p>

                    </a>

                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Thành phần</h4>
                </li>
                <li class="nav-item">
                    <a  href="{{ route('admin.config.index') }}">
                        <i class="fas fa-building"></i>
                        <p>Thông tin công ty</p>

                    </a>

                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#order">
                        <i class="fas fa-box"></i>
                        <p>Đơn hàng</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="order">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.order.index') }}">
                                    <span class="sub-item">Danh sách đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#category">
                        <i class="fas fa-th-large"></i>
                        <p>Danh mục chính</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.category.index', ['type' => 'parent']) }}">
                                    <span class="sub-item">Danh sách danh mục chính</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.add', ['type' => 'parent']) }}">
                                    <span class="sub-item">Thêm danh mục chính</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.add.brand', ['type' => 'parent']) }}">
                                    <span class="sub-item">Thêm thương hiệu cho danh mục chính</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#categorychild">
                        <i class="fas fa-th-large"></i>
                        <p>Danh mục phụ</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="categorychild">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.category.index', ['type' => 'child']) }}">
                                    <span class="sub-item">Danh sách danh mục phụ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.add', ['type' => 'child']) }}">
                                    <span class="sub-item">Thêm danh mục con</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.add.brand', ['type' => 'child']) }}">
                                    <span class="sub-item">Thêm thương hiệu cho danh mục con</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#brand">
                        <i class="fas fa-layer-group"></i>
                        <p>Thương hiệu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="brand">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.brand.index') }}">
                                    <span class="sub-item">Danh sách thương hiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.brand.add') }}">
                                    <span class="sub-item">Thêm thương hiệu </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-cube"></i>
                        <p>Sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.product.index') }}">
                                    <span class="sub-item">Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.product.add') }}">
                                    <span class="sub-item">Thêm sản phẩm </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#image">
                        <i class="fas fa-image"></i>
                        <p>Hình ảnh</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="image">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.images.index') }}">
                                    <span class="sub-item">Danh sách ảnh sản phẩm</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#partner">
                        <i class="fas fa-handshake"></i>
                        <p>Đối tác</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="partner">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.partner.index') }}">
                                    <span class="sub-item">Danh sách đối tác</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.partner.add') }}">
                                    <span class="sub-item">Thêm đối tác </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#reviews">
                        <i class="fas fa-comments"></i>
                        <p>Đánh giá</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="reviews">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.reviews.index') }}">
                                    <span class="sub-item">Danh sách đánh giá</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.reviews.add') }}">
                                    <span class="sub-item">Thêm đánh giá </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#news">
                        <i class="fas fa-newspaper"></i>
                        <p>Tin tức</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="news">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.new.index') }}">
                                    <span class="sub-item">Danh sách tin tức</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.new.add') }}">
                                    <span class="sub-item">Thêm tin tức </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.introduction.index') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Giới thiệu công ty</p>

                    </a>

                </li>


            </ul>
        </div>
    </div>
</div>
