<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sửa Thông Tin Chấm Công</title>
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
        <h1>Sửa Thông Tin Chấm Công</h1>
        <form action="{{ url('/cap-nhat-thong-tin-cham-cong')}}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tbody>
                    <tr class="table-danger">
                        <td>Mã Chấm Công</td>
                        <td><input type="hidden" value="{{$chamcong[0]->MaCC}}" name="txt_MaCC">{{$chamcong[0]->MaCC}}
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td>Mã Nhân Viên - Họ Tên Nhân Viên</td>
                        <td>
                            <select class="form-control" name="txt_MaNV" required>
                                <option value="" disabled selected>Chọn Mã Nhân Viên</option>
                                @foreach($nhanviens as $nhanvien)
                                <option value="{{ $nhanvien->MaNV }}" @if($nhanvien->MaNV == $chamcong[0]->MaNV)
                                    selected @endif>
                                    {{ $nhanvien->MaNV }} - {{ $nhanvien->HoTenNV }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="table-info">
                        <td>Số Ngày Nghỉ</td>
                        <td><input type="number" class="form-control" value="{{$chamcong[0]->SoNgayNghi}}"
                                name="txt_SoNgayNghi" min="0"></td>
                    </tr>
                    <tr class="table-info">
                        <td>Số Ngày Làm Việc</td>
                        <td><input type="number" class="form-control" value="{{$chamcong[0]->SoNgayLamViec}}"
                                name="txt_SoNgayLamViec" min="0"></td>
                    </tr>
                    <tr class="table-info">
                        <td>Số Giờ Tăng Ca 1.5x</td>
                        <td><input type="number" class="form-control" value="{{$chamcong[0]->SoGioTangCa1_5}}"
                                name="txt_SoGioTangCa1_5" min="0" step="0.5"></td>
                    </tr>
                    <tr class="table-info">
                        <td>Số Giờ Tăng Ca 3.0x</td>
                        <td><input type="number" class="form-control" value="{{$chamcong[0]->SoGioTangCa3_0}}"
                                name="txt_SoGioTangCa3_0" min="0" step="0.5"></td>
                    </tr>
                    <tr class="table-info">
                        <td>Xếp Loại</td>
                        <td><input type="text" class="form-control" value="{{$chamcong[0]->XepLoai}}" name="txt_XepLoai"></td>
                    </tr>
                    <tr class="table-info">
                        <td>Ghi Chú</td>
                        <td><textarea class="form-control" name="txt_GhiChu"
                                rows="3">{{$chamcong[0]->GhiChu}}</textarea></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Cập Nhật">
        </form>
    </div>
</body>
</html>
@endsection