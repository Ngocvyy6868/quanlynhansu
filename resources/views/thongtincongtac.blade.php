<style>
        body {
    }
    h1 {
      margin-top: 20px;
      margin-bottom: 30px;
      text-align: center;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }
    .container {
      border-radius: 1rem;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    .btn-submit {
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
    .btn-submit:hover {
      transform: scale(1.05); /* Tăng kích thước khi hover */
      box-shadow: 0 4px 20px rgba(255, 65, 108, 0.5);
    }
    .table td {
      vertical-align: middle;
    }
</style>
@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Cập nhật công tác</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="/cap-nhat-cong-tac" method="post">
        @csrf
        <table class="table table-bordered">
            <tr class="table-info" >
                <td>Tên Nhân Viên</td>
                <td>
                    <input type="text" class="form-control" value="{{ $congtac->TenNhanVien }}" name="txt_tennhanvien" required>
                    @error('txt_tennhanvien')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr class="table-info" >
                <td>Phòng Ban</td>
                <td>
                    <select name="txt_mapb" class="form-control" required>
                        <option value="">Chọn tên phòng ban</option>
                        @foreach($phongbans as $phongban)
                        <option value="{{ $phongban->MaPB }}" {{ $congtac->MaPB == $phongban->MaPB ? 'selected' : '' }}>{{ $phongban->TenPB }}</option>
                        @endforeach
                    </select>
                    @error('txt_mapb')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr class="table-info" >
                <td>Chức Vụ</td>
                <td>
                    <select name="txt_macv" class="form-control" required>
                        <option value="">Chọn tên chức vụ</option>
                        @foreach($chucvus as $chucvu)
                        <option value="{{ $chucvu->MaCV }}" {{ $congtac->MaCV == $chucvu->MaCV ? 'selected' : '' }}>{{ $chucvu->TenCV }}</option>
                        @endforeach
                    </select>
                    @error('txt_macv')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr class="table-info" >
                <td>Ngày Hiệu Lực</td>
                <td>
                    <input type="date" name="txt_ngayhl" class="form-control" placeholder="Ngày hiệu lực" value="{{ $congtac->NgayHieuLuc }}" required>
                    @error('txt_ngayhl')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-submit mt-3">Cập nhật</button>
        </div>
    </form>
</div>
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
@endsection
