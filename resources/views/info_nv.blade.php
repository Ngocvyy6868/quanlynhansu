<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhân Viên</title>
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
</head>
@extends('dashboard')

@section('content')

<body>
    <div class="container mt-4">
        <h1>Thông Tin Nhân Viên</h1>
        <form action="/cap-nhat-nhan-vien" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tbody>
                    <tr class="table-danger">
                        <td>Mã Nhân Viên</td>
                        <td><input type="hidden" value="{{$nhanvien[0]->MaNV}}" name="txt_MaNV">{{$nhanvien[0]->MaNV}}
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td>Ảnh</td>
                        <td>
                            @if($nhanvien[0]->Img)
                            <img src="{{ asset($nhanvien[0]->Img) }}" width="120" alt="Hình ảnh nhân viên">
                            @else
                            <p>Chưa có hình ảnh</p>
                            @endif
                            <input type="file" name="txt_img" class="form-control mt-2">
                            <input type="hidden" name="txt_img_old" value="{{$nhanvien[0]->Img}}">
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td>Họ Tên Nhân Viên</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->HoTenNV }}" name="txt_hoten"
                                required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Ngày Sinh</td>
                        <td><input type="text" class="form-control" value="{{ $nhanvien[0]->NgaySinh }}" name="txt_ngaysinh" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Giới Tính</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->GioiTinh }}"
                                name="txt_gioitinh" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Quốc Tịch</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->QuocTich }}"
                                name="txt_quoctich" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Dân Tộc</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->DanToc }}" name="txt_dantoc"
                                required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Tôn Giáo</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->TonGiao }}"
                                name="txt_tongiao" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Số CCCD</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->SoCCCD}}" name="txt_socccd"
                                required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Địa Chỉ Thường Trú</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->DiaChiThuongTru}}"
                                name="txt_diachithuongtru" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Địa Chỉ Tạm Trú</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->DiaChiTamTru}}"
                                name="txt_diachitamtru" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Số Điện Thoại</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->SoDienThoai}}" name="txt_sdt"
                                required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Email</td>
                        <td><input type="email" class="form-control" value="{{$nhanvien[0]->Email}}" name="txt_email"
                                required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Ngày Vào Làm</td>
                        <td><input type="date" class="form-control" value="{{$nhanvien[0]->NgayVaoLam}}"
                                name="txt_ngayvaolam" required></td>
                    </tr>
                    <tr class="table-danger">
                        <td>Trình Độ Học Vấn</td>
                        <td><input type="text" class="form-control" value="{{$nhanvien[0]->TrinhDoHocVan}}"
                                name="txt_trinhdohocvan" required></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" class="btn-submit" value="Cập Nhật">
        </form>
    </div>
</body>

</html>
@endsection