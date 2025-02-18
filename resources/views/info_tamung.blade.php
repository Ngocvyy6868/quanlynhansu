@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Chỉnh Sửa Tạm Ứng</h1>
        <div class="card" style="border: 1px solid #ddd; border-radius: 5px;">
            <div class="card-body" style="padding: 20px;">
                <!-- Form Chỉnh Sửa -->
                <form action="{{ url('cap-nhat-tam-ung') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="id"><strong>ID:</strong></label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $tamung->id }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="ten-nhan-vien"><strong>Tên Nhân Viên:</strong></label>
                        <input type="text" class="form-control" id="ten-nhan-vien" name="ten_nhan_vien" value="{{ $tamung->nhanvien->HoTenNV }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="NgayTamUng"><strong>Ngày Tạm Ứng:</strong></label>
                        <input type="date" class="form-control" id="NgayTamUng" name="NgayTamUng" value="{{ $tamung->NgayTamUng }}" required>
                    </div>

                    <div class="form-group">
                        <label for="SoTien"><strong>Số Tiền:</strong></label>
                        <input type="number" class="form-control" id="SoTien" name="SoTien" value="{{ $tamung->SoTien }}" required>
                    </div>

                    <div class="form-group">
                        <label for="LyDo"><strong>Lý Do:</strong></label>
                        <textarea class="form-control" id="LyDo" name="LyDo">{{ $tamung->LyDo }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
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
@endsection
