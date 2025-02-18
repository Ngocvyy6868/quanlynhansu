<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iPortfolio Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=ramen_dining" />
    <style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24
    }
    </style>
    <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="{{asset('assets/img/st.jpg')}}" alt="" class="img-fluid rounded-circle">
        </div>
        <a href="index.html" class="logo d-flex align-items-center justify-content-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            @if (session()->has(key: 'user_id'))
            <h1 class="sitename">{{session('taikhoan')}}</h1>
            @else
            <h1 class="sitename">not logged in yet</h1>
            @endif
        </a>

        <div class="social-links text-center">
            <a href="https://www.youtube.com/@acecookvietnam5807" class="youtube"><i class="bi bi-youtube"></i></a>
            <a href="https://www.facebook.com/AcecookVietnam.vn/?locale=vi_VN" class="facebook"><i
                    class="bi bi-facebook"></i></a>
            <a href="https://www.facebook.com/AcecookVietnam.vn/?locale=vi_VN" class="messenger"><i
                    class="bi bi-messenger"></i></a>
            <a href="https://www.instagram.com/explore/locations/329548272/acecook-viet-nam/" class="instagram"><i
                    class="bi bi-instagram"></i></a>
        </div>
        <nav id="navmenu" class="navmenu">
            <ul>
                @if (session()->has(key: 'user_id'))
                @if (session('role') === '1')
                <li><a href="{{url ('/')}}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{url ('danh-sach-nhan-vien')}}"
                        class="{{ request()->is('danh-sach-nhan-vien') ? 'active' : '' }}">Nhân Viên</a></li>
                <li><a href="{{url ('danh-sach-tai-khoan')}}"
                        class="{{ request()->is('danh-sach-tai-khoan') ? 'active' : '' }}">Tài Khoản</a></li>
                <li><a href="{{url ('danh-sach-cham-cong')}}"
                        class="{{ request()->is('danh-sach-cham-cong') ? 'active' : '' }}">Chấm Công</a></li>
                <li><a href="{{url ('danh-sach-bang-luong')}}"
                        class="{{ request()->is('danh-sach-bang-luong') ? 'active' : '' }}">Bảng Lương</a></li>
                <li class="dropdown"><a href="{{ url('/danh-sach-cong-tac')}}"
                        class="{{ request()->is('danh-sach-cong-tac') ? 'active' : '' }}"><span>Quá Trình Công
                            Tác</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{url('/danh-sach-chuc-vu')}}"
                                class="{{ request()->is('danh-sach-chuc-vu') ? 'active' : '' }}">Chức Vụ</a></li>
                        <li><a href="{{url('/danh-sach-phong-ban')}}"
                                class="{{ request()->is('danh-sach-phong-ban') ? 'active' : '' }}">Phòng Ban</a></li>
                    </ul>
                </li>
                <li><a href="{{url ('danh-sach-khen-thuong-ky-luat')}}"
                        class="{{ request()->is('danh-sach-khen-thuong-ky-luat') ? 'active' : '' }}">Khen Thưởng Kỷ
                        Luật</a></li>
                <li><a href="{{url ('danh-sach-tam-ung')}}"
                        class="{{ request()->is('danh-sach-tam-ung') ? 'active' : '' }}">Tạm Ứng</a></li>
                <li><a href="{{url ('danh-sach-dao-tao')}}"
                        class="{{ request()->is('danh-sach-dao-tao') ? 'active' : '' }}">Đào Tạo</a></li>
                <li><a href="{{url ('logout')}}">Logout</a></li>
                @elseif (session('role') === '2')
                <li><a href="{{url ('danh-sach-bang-luong')}}"
                        class="{{ request()->is('danh-sach-bang-luong') ? 'active' : '' }}">Bảng Lương</a></li>
                <li><a href="{{url ('danh-sach-khen-thuong-ky-luat')}}"
                        class="{{ request()->is('danh-sach-khen-thuong-ky-luat') ? 'active' : '' }}">Khen Thưởng Kỷ
                        Luật</a></li>
                <li><a href="{{url ('danh-sach-tam-ung')}}"
                        class="{{ request()->is('danh-sach-tam-ung') ? 'active' : '' }}">Tạm Ứng</a></li>
                <li><a href="{{url ('logout')}}">logout</a></li>
                @elseif (session('role') === '3')
                <li><a href="{{url ('danh-sach-nhan-vien')}}"
                        class="{{ request()->is('danh-sach-nhan-vien') ? 'active' : '' }}">Nhân Viên</a></li>
                <li><a href="{{url ('logout')}}">Logout</a></li>
                @elseif (session('role') === '4')
                <li><a href="{{url ('danh-sach-nhan-vien')}}"
                        class="{{ request()->is('danh-sach-nhan-vien') ? 'active' : '' }}">Nhân Viên</a></li>
                <li><a href="{{url ('danh-sach-khen-thuong-ky-luat')}}"
                        class="{{ request()->is('danh-sach-khen-thuong-ky-luat') ? 'active' : '' }}">Khen Thưởng Kỷ
                        Luật</a></li>
                <li class="dropdown"><a href="{{ url('/danh-sach-cong-tac')}}"
                        class="{{ request()->is('danh-sach-cong-tac') ? 'active' : '' }}"><span>Quá Trình Công
                            Tác</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{url('/danh-sach-chuc-vu')}}"
                                class="{{ request()->is('danh-sach-chuc-vu') ? 'active' : '' }}">Chức Vụ</a></li>
                        <li><a href="{{url('/danh-sach-phong-ban')}}"
                                class="{{ request()->is('danh-sach-phong-ban') ? 'active' : '' }}">Phòng Ban</a></li>
                    </ul>
                </li>
                <li><a href="{{url ('danh-sach-dao-tao')}}" class="{{ request()->is('danh-sach-dao-tao') ? 'active' : '' }}">Đào Tạo</a></li>
                <li><a href="{{url ('logout')}}">Logout</a></li>
                @endif
                @else
                <li><a href="{{url ('dang-nhap')}}">Login</a></li>
                @endif

                <!-- <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li> -->
        </nav>
    </header>

    <main class="main">

        @yield('content')

    </main>
    <!-- 
    <footer id="footer" class="footer position-relative light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights
                        Reserved</span></p>
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                    href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>

    </footer> -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>