<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm Chấm Công</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
          background-color: #f4f7f6; /* Light background */
          font-family: 'Arial', sans-serif;
        }
        h1 {
          color: #333;
          margin-top: 20px;
          margin-bottom: 40px;
          text-align: center;
          font-weight: bold;
        }
        .container {
          background: #ffffff;
          border-radius: 1rem;
          padding: 30px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
          vertical-align: middle;
        }
        .table th {
          background-color: #ff416c;
          color: white;
          font-weight: bold;
        }
        .table td {
          background-color: #f8f9fa;
        }
        .btn-submit {
          background: linear-gradient(to right, #ff416c, #ff4b2b);
          color: white;
          padding: 12px 24px;
          font-size: 16px;
          border: none;
          border-radius: 5px;
          transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
          display: inline-block;
          margin: 20px auto;
        }
        .btn-submit:hover {
          transform: scale(1.05);
          box-shadow: 0 4px 20px rgba(255, 65, 108, 0.5);
        }
        .form-control {
          border-radius: 5px;
        }
        .form-label {
          font-weight: bold;
        }
    </style>
</head>
@extends('dashboard')

@section('content')

<body>
    <div class="container mt-4">
        <h1>Thêm Chấm Công</h1>
        <form action="{{ url('/them-cham-cong') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="MaNV">Mã Nhân Viên</label>
                <select class="form-control" id="MaNV" name="MaNV[]" required>
                    <option value="all">Chọn Tất Cả Nhân Viên</option>
                    @foreach($nhanviens as $nhanvien)
                    <option value="{{ $nhanvien->MaNV }}">{{ $nhanvien->HoTenNV }} (Mã: {{ $nhanvien->MaNV }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Thang">Tháng</label>
                <select class="form-control" id="Thang" name="Thang" required>
                    @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="Nam">Năm</label>
                <select class="form-control" id="Nam" name="Nam" required>
                    @for ($i = date('Y') - 5; $i <= date('Y') + 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="GhiChu">Ghi Chú</label>
                <textarea class="form-control" id="GhiChu" name="GhiChu" rows="3"></textarea>
            </div>
            <button type="submit" class="btn-submit mt-3">Lưu</button>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const namSelect = document.getElementById('Nam');
        const currentYear = new Date().getFullYear();
        namSelect.value = currentYear;
        document.getElementById('MaNV').addEventListener('change', function() {
            if (this.value === 'all') {
                for (let option of this.options) {
                    option.selected = true;
                }
            }
        });
    });
    </script>
</body>

</html>
@endsection