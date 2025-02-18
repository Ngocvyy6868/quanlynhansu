<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Chương Trình Đào Tạo</title>
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
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

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
    <div class="container mt-4">
        <h1>Cập Nhật Chương Trình Đào Tạo</h1>
        <form action="{{ url('/cap-nhat-dao-tao') }}" method="POST">
            @csrf
            <input type="hidden" name="MaChuongTrinhDaoTao" value="{{ $daotao->MaChuongTrinhDaoTao }}">
            
            <div class="mb-3">
                <label for="TenChuongTrinhDaoTao" class="form-label">Tên Chương Trình Đào Tạo</label>
                <input type="text" class="form-control" id="TenChuongTrinhDaoTao" name="TenChuongTrinhDaoTao" 
                    value="{{ old('TenChuongTrinhDaoTao', $daotao->TenChuongTrinhDaoTao) }}" required>
            </div>

            <div class="mb-3">
                <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="MaNV" name="MaNV" 
                    value="{{ old('MaNV', $daotao->MaNV) }}" required>
            </div>

            <div class="mb-3">
                <label for="TuNgay" class="form-label">Từ Ngày</label>
                <input type="date" class="form-control" id="TuNgay" name="TuNgay" 
                    value="{{ old('TuNgay', $daotao->TuNgay) }}" required>
            </div>

            <div class="mb-3">
                <label for="DenNgay" class="form-label">Đến Ngày</label>
                <input type="date" class="form-control" id="DenNgay" name="DenNgay" 
                    value="{{ old('DenNgay', $daotao->DenNgay) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</body>
</html>
@endsection
