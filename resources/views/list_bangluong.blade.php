<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Lương</title>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
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
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
        margin-top: 10px;
    }

    .btn-primary {
        background: #3498db;
        border: none;
    }

    .btn-primary:hover {
        background: #2980b9;
    }

    .btn-secondary {
        background: #7f8c8d;
        border: none;
    }

    .btn-secondary:hover {
        background: #95a5a6;
    }

    .alert {
        border-radius: 5px;
        padding: 10px;
        margin-top: 20px;
        font-size: 14px;
    }

    .alert-success {
        background: #dff0d8;
        color: #3c763d;
    }

    .alert-danger {
        background: #f2dede;
        color: #a94442;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-row .mb-3 {
        flex: 1;
        min-width: 200px;
    }

    .icon {
        width: 20px;
        margin-right: 5px;
    }

    .filter-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }

    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 20px;
    }

    .filter-container {
        display: flex;
        justify-content: space-between;
        /* Tách các nhóm */
        align-items: center;
        gap: 20px;
        /* Tạo khoảng cách giữa các nhóm */
        margin-top: 20px;
    }
    @media print {
        body * {
            visibility: hidden; /* Ẩn toàn bộ nội dung khác */
        }
        .container, .container * {
            visibility: visible; /* Hiển thị nội dung của bảng lương */
        }
        .container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .btn, .filter-container, .alert, .icon, form, .center-content, th:last-child, td:last-child {
            display: none; /* Ẩn các nút, thông báo và chức năng không cần thiết */
        }
    }
    .filter-container .filter-group {
        display: flex;
        gap: 10px;
        /* Khoảng cách giữa các mục con */
    }

    .filter-container .filter-group button {
        align-self: flex-start;
        /* Đẩy nút lên trên cùng */
    }
    </style>
</head>
@extends('dashboard')

@section('content')

<body>
    <h2 style="text-align:center;">Bảng Lương</h2>
    <div class="container">
        <form action="{{ url('/tinh-tat-ca-luong') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <div class="form-row align-items-end">
                <div class="mb-3 col-md-6">
                    <select name="Thang" id="Thang" class="form-control">
                        <option value="">Chọn tháng</option>
                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <select name="Nam" id="Nam" class="form-control">
                        <option value="">Chọn Năm</option>
                        @for ($i = 2020; $i <= 2025; $i++) <option value="{{ $i }}">Năm {{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Tính Lương Nhân Viên</button>
                </div>
            </div>
        </form>
        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
        @endif

        @if (isset($results))
        <div class="center-content">
            <h2>Kết Quả Tính Lương</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Mã NV</th>
                        <th>Họ Tên NV</th>
                        <th>Số Ngày Làm Việc</th>
                        <th>Số Giờ Tăng Ca 1.5x</th>
                        <th>Số Giờ Tăng Ca 3.0x</th>
                        <th>Lương Tăng Ca</th>
                        <th>Tổng Lương</th>
                        <th>Thực Lãnh</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($results as $result)
                    <tr>
                        <td>{{ $result['MaNV'] }}</td>
                        <td>{{ $result['HoTenNV'] }}</td>
                        <td>{{ $result['SoNgayLamViec'] }}</td>
                        <td>{{ $result['SoGioTangCa1_5'] }}</td>
                        <td>{{ $result['SoGioTangCa3_0'] }}</td>
                        <td>{{ number_format($result['LuongTangCa'], 0) }}</td>
                        <td>{{ number_format($result['TongLuong'], 0) }}</td>
                        <td>{{ number_format($result['ThucLanh'], 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if (isset($results))
            <div class="center-content">
                <a href="{{ url('/danh-sach-bang-luong') }}">
                    <button type="submit" class="btn btn-primary">Bảng Lương</button>
                </a>
            </div>
            @endif
            <div>
                @if (isset($bangluongs))
                @if (isset($bangluongs))

                @endif
                <div class="filter-container">
                    <!-- Lọc theo tháng và năm -->
                    <h5>Tìm kiếm theo:</h5>
                    <div class="filter-group">
                        <form action="{{ url('/loc-bang-luong') }}" method="GET">
                            <div class="form-row align-items-end">
                                <div class="mb-3 col-md-4">
                                    <select name="Thang" id="Thang" class="form-control">
                                        <option value="">Chọn tháng</option>
                                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <select name="Nam" id="Nam" class="form-control">
                                        <option value="">Chọn Năm</option>
                                        @for ($i = 2010; $i <= 2025; $i++) <option value="{{ $i }}">Năm {{ $i }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Lọc theo nhân viên và chức vụ -->
                    <div class="filter-group">
                        <div>
                            <select name="MaNV" id="MaNV" class="form-control" onchange="filterByEmployee(this.value)">
                                <option value="all" {{ request('MaNV') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                @foreach ($nhanviens as $nhanvien)
                                <option value="{{ $nhanvien->MaNV }}"
                                    {{ request('MaNV') == $nhanvien->MaNV ? 'selected' : '' }}>
                                    {{ $nhanvien->HoTenNV }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <form action="{{ url('/loc-bang-luong-chuc-vu') }}" method="GET">
                            <div class="mb-3">
                                <select name="MaChucVu" id="MaChucVu" class="form-control"
                                    onchange="filterByPosition(this.value)">
                                    <option value="all" {{ request('MaChucVu') == 'all' ? 'selected' : '' }}>Chức vụ
                                    </option>
                                    @foreach ($chucvus as $chucvu)
                                    <option value="{{ $chucvu->MaCV }}"
                                        {{ request('MaChucVu') == $chucvu->MaCV ? 'selected' : '' }}>
                                        {{ $chucvu->TenCV }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="float:right" class="center-content">
                        <button onclick="printPayroll()" class="btn btn-primary">In Bảng Lương</button>
                </div>
                <table class="table table-bordered">
                    <p style="font-style: italic;">Tháng {{ request('Thang') ? request('Thang') : 'Tất cả' }} Năm
                        {{ request('Nam') }}</p> <!-- Display selected month and year -->
                    <thead class="table-dark">
                        <tr>
                            <th>Mã</th>
                            <th>Họ Tên</th>
                            <th>Chức Vụ</th> <!-- New column for ChucVu -->
                            <!-- <th>Tháng</th>
                    <th>Năm</th> -->
                            <th>Ngày Công</th>
                            <th>Lương CB</th>
                            <th>Số Giờ TC 1.5x</th>
                            <th>Số Giờ TC 3.0x</th>
                            <th>Lương TC</th>
                            <th>Thưởng</th>
                            <th>Phụ Cấp</th>
                            <!-- <th>Phụ Cấp Xếp Loại</th> -->
                            <th>Tổng Lương</th>
                            <!-- <th>Khấu Trừ BH</th>
                    <th>Khấu Trừ Công Đoàn</th> -->
                            <th>Tạm Ứng</th>
                            <th>Thực Lãnh</th>
                            <!-- <th>Ghi Chú</th> -->
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bangluongs as $bangluong)
                        <tr>
                            <td>{{ $bangluong->MaNV }}</td>
                            <td>{{ $bangluong->HoTenNV }}</td>
                            <td>{{ $bangluong->TenCV }}</td> <!-- Display ChucVu -->
                            <!-- <td>{{ $bangluong->Thang }}</td>
                    <td>{{ $bangluong->Nam }}</td> -->
                            <td>{{ $bangluong->NgayCong }}</td>
                            <td>{{ number_format($bangluong->LuongCoBan, 0) }}</td>
                            <td>{{ $bangluong->SoGioTangCa1_5 }}</td>
                            <td>{{ $bangluong->SoGioTangCa3_0 }}</td>
                            <td>{{ number_format($bangluong->LuongTangCa, 0) }}</td>
                            <td>{{ number_format($bangluong->ThuongPhat, 0) }}</td>
                            <td>{{ number_format($bangluong->PhuCapCV, 0) }}</td>
                            <!-- <td>{{ number_format($bangluong->PhuCapXepLoai,0) }}</td> -->
                            <td>{{ number_format($bangluong->TongLuong, 0) }}</td>
                            <!-- <td>{{ $bangluong->KhauTruBH }}</td>
                    <td>{{ $bangluong->KhauTruCongDoan }}</td> -->
                            <td>{{ number_format($bangluong->LuongTamUng , 0)}}</td>
                            <td>{{ number_format($bangluong->ThucLanh, 0) }}</td>
                            <!-- <td>{{ $bangluong->GhiChu }}</td> -->
                            <td>
                                <a href="{{ url('xoa-bang-luong/'.$bangluong->ID) }}" class="btn"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <img src="{{ asset('img/delete.png') }}" class="icon" alt="Delete">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <script>
        function updateChamCong() {
            const maNV = document.getElementById('MaNV').value;
            const thang = document.getElementById('Thang').value;
            const nam = document.getElementById('Nam').value;

            // Kiểm tra các trường nhập liệu có hợp lệ không
            if (!maNV || !thang || !nam) {
                alert("Vui lòng điền đầy đủ thông tin nhân viên, tháng và năm.");
                return;
            }

            // Gửi request tới API để lấy dữ liệu chấm công
            fetch(`/get-cham-cong/${maNV}/${thang}/${nam}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật các giá trị từ dữ liệu trả về
                        document.getElementById('SoNgayLamViec').value = data.soNgayLamViec || 0;
                        document.getElementById('SoGioTangCa1_5').value = data.soGioTangCa1_5 || 0;
                        document.getElementById('SoGioTangCa3_0').value = data.soGioTangCa3_0 || 0;
                    } else {
                        // Nếu không có dữ liệu chấm công, hiển thị thông báo
                        document.getElementById('SoNgayLamViec').value = 0;
                        document.getElementById('SoGioTangCa1_5').value = 0;
                        document.getElementById('SoGioTangCa3_0').value = 0;
                        alert("Không tìm thấy dữ liệu chấm công cho tháng/năm này.");
                    }
                })
                .catch(error => {
                    console.error("Lỗi khi cập nhật dữ liệu chấm công: ", error);
                    alert("Có lỗi xảy ra khi kết nối tới server. Vui lòng thử lại.");
                });
        }

        function filterByEmployee(MaNV) {
            if (MaNV === 'all') {
                window.location.href = `/danh-sach-bang-luong`;
            } else {
                window.location.href = `/loc-bang-luong-nhan-vien?MaNV=${MaNV}`;
            }
        }

        function filterByPosition(MaChucVu) {
            if (MaChucVu === 'all') {
                window.location.href = `/danh-sach-bang-luong`;
            } else {
                window.location.href = `/loc-bang-luong-chuc-vu?MaChucVu=${MaChucVu}`;
            }
        }
        function printPayroll() {
        // Tạo hiệu ứng trước khi in (nếu cần)
        alert("Chuẩn bị in bảng lương...");
        window.print();
        }
        </script>
</body>

</html>
@endsection