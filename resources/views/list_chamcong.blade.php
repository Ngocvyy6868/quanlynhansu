<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Chấm Công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    h1 {
        text-align: center;
        /* text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8); */
    }

    .btn-primary {
        margin-right:10px;
        background-color: #007bff;
    }

    .btn-warning {
        margin-right:10px;
        background-color: #ffc107;
    }

    .btn-danger {
        margin-right:10px;
        background-color: #dc3545;
    }

    .btn:hover {
        transform: scale(1.05);
    }
    .btn-add{
        color: #fff;
        background: linear-gradient(90deg, #6f42c1, #007bff);
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
    }
    .icon {
        width: 20px;
        margin-right: 5px;
    }
    </style>
</head>

@extends('dashboard')

@section('content')

<body>
    <div class="container mt-4">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <h1>Danh Sách Chấm Công</h1>
        <a href="{{ url('them-cham-cong') }}" class="btn btn-add">
            <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm Chấm Công
        </a>
        <form action="{{ url('/cap-nhat-cham-cong') }}" method="POST">
            @csrf
            <input type="hidden" name="action" id="action" value="">
            <div style="margin-top: 30px;" class="d-flex justify-content-end mb-3">
                <input style="width:310px;" type="date" class="form-control me-2" id="ngay" name="ngay" value="{{ date('Y-m-d') }}">
                <select style="width:310px;" class="form-control me-2" id="trangthai" name="trangthai">
                    <option value="Đi làm">Đi làm</option>
                    <option value="Nghỉ phép">Nghỉ phép</option>
                    <option value="Nghỉ không lương">Nghỉ không lương</option>
                </select>
                <button type="button" class="btn btn-primary" onclick="setActionAndSubmit('update')">Chấm Công</button>
                <button type="button" class="btn btn-warning" onclick="setActionAndSubmit('update_ot_1_5')">Chấm Công Tăng Ca 1.5x</button>
                <button type="button" class="btn btn-danger" onclick="setActionAndSubmit('update_ot_3_0')">Chấm Công Tăng Ca 3.0x</button>
            </div>
            <div style="margin-top: 30px;" class="d-flex justify-content-end mb-3">
                <select style="width:150px;" class="form-control me-2" id="filterMonth" name="filterMonth">
                    <option value="">Chọn Tháng</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select style="width:150px;" class="form-control me-2" id="filterYear" name="filterYear">
                    <option value="">Chọn Năm</option>
                    @for ($i = 2020; $i <= 2030; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <button type="button" class="btn btn-info" onclick="filterByMonthYear()">Lọc</button>
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Mã NV</th>
                        <th>Mã Chấm Công</th>
                        <th>Họ và Tên</th>
                        <th>Tháng</th>
                        <th>Năm</th>
                        <th>Số Ngày Nghỉ</th>
                        <th>Số Ngày Làm Việc</th>
                        <th>Số Giờ Tăng Ca 1.5x</th>
                        <th>Số Giờ Tăng Ca 3.0x</th>
                        <th>Xếp Loại</th>
                        <th>Ghi Chú</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chamcongs as $chamcong)
                    <tr>
                        <td><input type="checkbox" name="selected_ids[]" value="{{ $chamcong->MaCC }}"></td>
                        <td>{{ $chamcong->MaNV }}</td>
                        <td>{{ $chamcong->MaCC }}</td>
                        <td>{{ $chamcong->NhanVien->HoTenNV }}</td>
                        <td>{{ $chamcong->Thang }}</td>
                        <td>{{ $chamcong->Nam }}</td>
                        <td>{{ $chamcong->SoNgayNghi }}</td>
                        <td class="working-days">{{ $chamcong->SoNgayLamViec }}</td>
                        <td class="overtime-1-5">{{ $chamcong->SoGioTangCa1_5 }}</td>
                        <td class="overtime-3-0">{{ $chamcong->SoGioTangCa3_0}}</td>
                        <td>
                            @if ($chamcong->SoNgayLamViec == 22)
                                Tốt
                            @elseif ($chamcong->SoNgayLamViec == 20)
                                Đạt
                            @else
                                Chưa Đạt
                            @endif
                        </td>
                        <td>{{ $chamcong->GhiChu }}</td>
                        <td>
                            <a href="{{ url('thong-tin-cham-cong/'.$chamcong->MaCC) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('xoa-cham-cong/'.$chamcong->MaCC) }}" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a>
                        </td>
                        <td>
                            <a href="{{ url('chi-tiet-cham-cong/'.$chamcong->MaCC) }}" class="btn btn-primary">Chi Tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>Tổng số ngày công: <span id="totalWorkingDays">0</span></p>
                <p>Tổng số giờ tăng ca 1.5x: <span id="totalOvertime1_5">0</span></p>
                <p>Tổng số giờ tăng ca 3.0x: <span id="totalOvertime3_0">0</span></p>
            </div>
        </form>
    </div>
    <script>
function setActionAndSubmit(action) {
    document.getElementById('action').value = action;
    document.querySelector('form').submit();
}

function filterByMonthYear() {
    const month = document.getElementById('filterMonth').value;
    const year = document.getElementById('filterYear').value;
    if (month && year) {
        const url = new URL(window.location.href);
        url.searchParams.set('month', month);
        url.searchParams.set('year', year);
        window.location.href = url.toString();
    } else {
        alert('Vui lòng chọn tháng và năm');
    }
}

document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    updateSelectedInfo();
});

document.querySelectorAll('input[name="selected_ids[]"]').forEach(checkbox => {
    checkbox.addEventListener('change', updateSelectedInfo);
});

function updateSelectedInfo() {
    let totalWorkingDays = 0;
    let totalOvertime1_5 = 0;
    let totalOvertime3_0 = 0;

    document.querySelectorAll('input[name="selected_ids[]"]:checked').forEach(checkbox => {
        const row = checkbox.closest('tr');
        const workingDays = parseFloat(row.querySelector('.working-days').textContent);
        const overtime1_5 = parseFloat(row.querySelector('.overtime-1-5').textContent);
        const overtime3_0 = parseFloat(row.querySelector('.overtime-3-0').textContent);

        totalWorkingDays += workingDays;
        totalOvertime1_5 += overtime1_5;
        totalOvertime3_0 += overtime3_0;
    });

    document.getElementById('totalWorkingDays').textContent = totalWorkingDays;
    document.getElementById('totalOvertime1_5').textContent = totalOvertime1_5;
    document.getElementById('totalOvertime3_0').textContent = totalOvertime3_0;
}
</script>

</body>

</html>
@endsection