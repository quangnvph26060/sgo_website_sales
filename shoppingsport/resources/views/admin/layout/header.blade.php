<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="{{ route('admin.index') }}" class="logo">
                <img src="{{ asset('sgovn.png') }}" alt="navbar brand" style="width: 100px;
                height: auto" class="navbar-brand" height="20" />
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

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            {{-- <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control" />
                </div>
            </nav> --}}
            <div style="flex: 2; align-items: baseline; display: flex; margin-right: 20px">
                <marquee id="demoMarquee" scrollamount="7" style="color: red">
                    <span style="margin-right: 200px"></span>
                </marquee>
            </div>
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                {{-- <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-search"></i>
                    </a>

                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                        <li>
                            <div class="dropdown-title d-flex justify-content-between align-items-center">
                                Messages
                                <a href="#" class="small">Mark all as read</a>
                            </div>
                        </li>
                        <li>
                            <div class="message-notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="{{ asset('asset/img/jm_denis.jpg') }}" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jimmy Denis</span>
                                            <span class="block"> How are you ? </span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="{{ asset('asset/img/jm_denis.jpg') }}" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Chad</span>
                                            <span class="block"> Ok, Thanks ! </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="{{ asset('asset/img/jm_denis.jpg') }}" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jhon Doe</span>
                                            <span class="block">
                                                Ready for the meeting today...
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="{{ asset('asset/img/jm_denis.jpg') }}" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Talha</span>
                                            <span class="block"> Hi, Apa Kabar ? </span>
                                            <span class="time">17 minutes ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);">See all messages<i
                                    class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification">4</span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">
                                You have 4 new notification
                            </div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="#">
                                        <div class="notif-icon notif-primary">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block"> New user registered </span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-icon notif-success">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block">
                                                Rahmad commented on Admin
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-img">
                                            <img src="{{ asset('asset/img/profile2.jpg') }}" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="block">
                                                Reza send messages to you
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-icon notif-danger">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block"> Farrah liked Admin </span>
                                            <span class="time">17 minutes ago</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);">See all notifications<i
                                    class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                    </a>
                    <div class="dropdown-menu quick-actions animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">Quick Actions</span>
                            <span class="subtitle op-7">Shortcuts</span>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                                <div class="row m-0">
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-danger rounded-circle">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>
                                            <span class="text">Calendar</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-warning rounded-circle">
                                                <i class="fas fa-map"></i>
                                            </div>
                                            <span class="text">Maps</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-info rounded-circle">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <span class="text">Reports</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-success rounded-circle">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <span class="text">Emails</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-primary rounded-circle">
                                                <i class="fas fa-file-invoice-dollar"></i>
                                            </div>
                                            <span class="text">Invoice</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-secondary rounded-circle">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                            <span class="text">Payments</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}

                <li class="nav-item topbar-user dropdown hidden-caret" style="padding: 0px 20px !important">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('asset/img/profile.jpg') }}"
                                alt="..." class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username">
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('asset/img/profile.jpg') }}"
                                            alt="image profile" class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        <a href="#" class="btn btn-xs btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewProfileModal">View Profile</a>

                                        <!-- Modal -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </div>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <!-- End Navbar -->
</div>

<div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="viewProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProfileLabel">Thông tin tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"  action="{{ route('admin.user.update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 add_product">
                            <div>
                                <label for="nameInput" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ Auth::user()->name }}" required>
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="name_error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    required id="email">
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 add_product">
                            <div>
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                    required id="phone">
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="phone_error"></span>
                                </div>
                            </div>

                            <div>
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ Auth::user()->address }}" id="address" required>
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="address_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" >
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="password_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 add_product">
                            <div class="form-group">
                                <label for="avatar" class="form-label">Avatar</label>
                                <div class="custom-file">
                                    <input id="avatar" class="custom-file-input @error('avatar') is-invalid @enderror"
                                        type="file" name="avatar" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Chọn
                                        avatar</label>
                                </div>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img id="profileImageavatar" style="width:100px; height:100px"
                                    src="{{ isset(Auth::user()->avatar) && !empty(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('images/avatar2.jpg') }}"
                                    alt="image avatar" class="avatar">
                            </div>
                        </div>


                        <div class="modal-footer m-2" style="display: flex; justify-content: center">
                            <button type="submit" class="btn btn-primary w-md">Xác
                                nhận</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('avatar').addEventListener('change', function(event) {
                    const input = event.target;
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        document.getElementById('profileImageavatar').src = e.target.result;
                    };

                    if (input.files && input.files[0]) {
                        reader.readAsDataURL(input.files[0]);
                    }
                });
</script>

<style>
     .form-label {
        font-weight: 500;
    }



</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- @if (session('success'))
<script>
    $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                title: 'Tin tức',
                message: '{{ session('success') }}',
            }, {
                type: 'secondary',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
</script>
@endif --}}
