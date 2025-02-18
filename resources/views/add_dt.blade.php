<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm Chương Trình Đào Tạo</title>
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
    <h1>Thêm Chương Trình Đào Tạo</h1>
    <form action="/them-dao-tao" method="post">
      @csrf
      <table class="table table-bordered">
        <tr class="table-secondary">
          <th>Mã Nhân Viên</th>
          <td>
            <select class="form-control" name="MaNV" required>
              <option value="">-- Chọn Mã Nhân Viên --</option>
              @foreach($nhanviens as $nhanvien)
              <option value="{{ $nhanvien->MaNV }}">{{ $nhanvien->MaNV }} - {{ $nhanvien->HoTenNV }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr class="table-secondary">
          <th>Tên Chương Trình Đào Tạo</th>
          <td><input type="text" class="form-control" name="TenChuongTrinhDaoTao" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Từ Ngày</th>
          <td><input type="date" class="form-control" name="TuNgay" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Đến Ngày</th>
          <td><input type="date" class="form-control" name="DenNgay" required></td>
        </tr>
      </table>
      <div class="text-center">
        <input type="submit" class="btn-submit" value="Thêm Chương Trình">
      </div>
    </form>
  </div>
</body>
@endsection

