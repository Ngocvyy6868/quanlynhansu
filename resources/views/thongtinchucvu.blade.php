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
    <h1 class="text-center">Cập nhật Chức vụ</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="/cap-nhat-chuc-vu" method="post">
        @csrf
        <table class="table table-bordered">
            <tr class="table-info" >
                <td>Mã Chức vụ</td>
                <td>
                    {{$chucvu->MaCV }}
                    <input type="hidden" value="{{$chucvu->MaCV }}" name="txt_machucvu">
                </td>
            </tr>
            <tr class="table-info" >
                <td>Tên chức vụ</td>
                <td><input type="text" class="form-control" value="{{$chucvu->TenCV}}" name="txt_tencv" required></td>
            </tr>
            <tr class="table-info" >
                <td>Phụ cấp chức vụ</td>
                <td><input type="text" class="form-control" value="{{$chucvu->PhuCapCV}}" name="txt_phucapcv"></td>
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

<!-- External CSS Files -->
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

@endsection
