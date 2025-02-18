<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tài khoản nhân viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <style>
    .btn {
        color: #fff;
        background: linear-gradient(90deg, #6f42c1, #007bff);
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .icon {
        width: 20px;
        margin-right: 5px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #6f42c1;
        color: white;
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .container {
        margin-top: 50px;
    }

    .table-container {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

@extends('dashboard')

@section('content')

<body>
    <div class="container">
        <h1 class="mb-4 text-center text-primary">DANH SÁCH NHÂN VIÊN</h1>
        <a href="{{ url('them-tai-khoan') }}" class="btn btn-custom mb-4">
            <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm Nhân Viên
        </a>

        <div class="table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã nhân viên</th>
                        <th>Tài khoản</th>
                        <th>Password</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->HoTenNV }}</td>
                        <td>{{ $user->taikhoan }}</td>
                        <td>{{ $user->matkhau }}</td>
                        <td>
                            <a href="{{ url('thong-tin-tai-khoan/'.$user->user_id) }}" class="btn">
                                <img src="{{ asset('img/edit.png') }}" class="icon" alt="Edit">
                            </a>
                            <a href="{{ url('xoa-nguoi-tai-khoan/'.$user->user_id) }}" class="btn"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <img src="{{ asset('img/delete.png') }}" class="icon" alt="Delete">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection