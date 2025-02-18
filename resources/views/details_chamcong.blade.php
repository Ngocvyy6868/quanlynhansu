<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Chấm Công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

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

</head>

@extends('dashboard')

@section('content')

<body>
<div class="container">
    <h1 style="text-align:center;">Chi Tiết Chấm Công</h1>
    <div>
    <p>Mã Nhân Viên: {{ $chamcong->MaNV ?? 'N/A' }}</p> <!-- Add this line -->
    <p>Tên Nhân Viên: {{ $chamcong->NhanVien->HoTenNV ?? 'N/A' }}</p> <!-- Add this line -->
    <p>Chi tiết chấm công (Tháng: {{ $chamcong->Thang ?? 'N/A' }} Năm: {{ $chamcong->Nam ?? 'N/A' }})</p>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Giờ vào</th>
                <th>Giờ ra</th>
                <th>Số giờ làm</th>
                <th>Giờ tăng ca 1.5</th>
                <th>Giờ tăng ca 3.0</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th>Hành động</th> <!-- Add this line -->
            </tr>
        </thead>
        <tbody>
            @isset($chitietchamcongs)
                @foreach ($chitietchamcongs as $chitiet)
                <tr>
                    <td>{{ $chitiet->Ngay }}</td>
                    <td>{{ $chitiet->GioVao }}</td>
                    <td>{{ $chitiet->GioRa }}</td>
                    <td>{{ $chitiet->SoGioLam }}</td>
                    <td>{{ $chitiet->GioTangCa1_5 }}</td>
                    <td>{{ $chitiet->GioTangCa3_0 }}</td>
                    <td>{{ $chitiet->TrangThai }}</td>
                    <td>{{ $chitiet->GhiChu ?? 'Không có ghi chú' }}</td>
                    <td>
                        <form action="{{ route('xoa-chi-tiet-cham-cong', $chitiet->MaCTCC) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9">Không có dữ liệu chi tiết chấm công.</td>
                </tr>
            @endisset
        </tbody>
    </table>

    <!-- Thêm các nút hành động (Tạo mới, Chỉnh sửa, Xóa) -->
    <!-- <a href="{{ route('chitietchamcong.create') }}" class="btn btn-primary">Thêm mới</a> -->
</div></body>

@endsection
</html>
