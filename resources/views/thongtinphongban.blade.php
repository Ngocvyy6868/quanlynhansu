<style>
    /* Áp dụng cho container */


/* Áp dụng cho tiêu đề */
h1.text-center {
    text-align: center;
    margin-bottom: 20px;
    color: #2c3e50;
    font-family: 'Arial', sans-serif;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
}

/* Áp dụng cho bảng */
.table {
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    margin-bottom: 30px;
}

.table td {
    vertical-align: middle;
}

/* Áp dụng cho các trường nhập liệu */
.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 14px;
    width: 100%;
}

/* Áp dụng cho các trường nhập liệu khi focus */
.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Áp dụng cho button */
.btn-submit, .btn-primary {
    background: linear-gradient(to right, #ff416c, #ff4b2b);
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
    display: block;
    margin: 20px auto;
}

.btn-submit:hover, .btn-primary:hover {
    transform: scale(1.05); /* Tăng kích thước khi hover */
    box-shadow: 0 4px 20px rgba(255, 65, 108, 0.5);
}

/* Áp dụng cho các lỗi hiển thị */
.text-danger {
    color: #a94442;
}

</style>
@extends('dashboard')

@section('content')
<div class="container full-width">
    <h1 class="text-center">Cập nhật phòng ban</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="/cap-nhat-phong-ban" method="post">
        @csrf
        <table class="table table-bordered">
            <tr class="table-info" >
                <td>Mã phòng ban</td>
                <td>
                    {{$phongban->MaPB }}
                    <input type="hidden" value="{{$phongban->MaPB }}" name="txt_maphongban">
                </td>
            </tr>
            <tr class="table-info" >
                <td>Tên phòng ban</td>
                <td><input type="text" class="form-control" value="{{$phongban->TenPB}}" name="txt_tenphong" required></td>
            </tr>
            <tr class="table-info">
                <td>Vị trí</td>
                <td><input type="text" class="form-control" value="{{$phongban->ViTri}}" name="txt_vitri"></td>
            </tr>
            <tr class="table-info" >
                <td>Trưởng phòng</td>
                <td><input type="text" class="form-control" value="{{$phongban->TenTruongPhong}}" name="txt_tentruongphong"></td>
            </tr>
            <tr class="table-info" >
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- External CSS Files -->
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

@endsection
