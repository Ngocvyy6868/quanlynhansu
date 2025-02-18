<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm Nhân Viên Mới</title>
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
    <h1>Thêm Nhân Viên Mới</h1>
    <form action="/them-nhan-vien" method="post" enctype="multipart/form-data">
      @csrf
      <table class="table table-bordered">
        <tr class="table-secondary">
          <th>Họ Tên</th>
          <td><input type="text" class="form-control" name="txt_hoten" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Ngày Sinh</th>
          <td><input type="date" class="form-control" name="txt_ngaysinh" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Giới Tính</th>
          <td>
            <select class="form-control" name="txt_gioitinh" required>
              <option value="Nam">Nam</option>
              <option value="Nữ">Nữ</option>
            </select>
          </td>
        </tr>
        <tr class="table-secondary">
          <th>Quốc Tịch</th>
          <td><input type="text" class="form-control" name="txt_quoctich" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Dân Tộc</th>
          <td><input type="text" class="form-control" name="txt_dantoc" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Tôn Giáo</th>
          <td><input type="text" class="form-control" name="txt_tongiao" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Số CCCD</th>
          <td><input type="text" class="form-control" name="txt_socccd" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Địa Chỉ Thường Trú</th>
          <td><input type="text" class="form-control" name="txt_diachithuongtru" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Địa Chỉ Tạm Trú</th>
          <td><input type="text" class="form-control" name="txt_diachitamtru" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Số Điện Thoại</th>
          <td><input type="text" class="form-control" name="txt_sdt" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Email</th>
          <td><input type="email" class="form-control" name="txt_email" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Ngày Vào Làm</th>
          <td><input type="date" class="form-control" name="txt_ngayvaolam" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Ảnh</th>
          <td><input type="file" class="form-control" name="txt_img" required></td>
        </tr>
        <tr class="table-secondary">
          <th>Trình Độ Học Vấn</th>
          <td><input type="text" class="form-control" name="txt_trinhdohocvan" required></td>
        </tr>
      </table>
      <div class="text-center">
        <input type="submit" class="btn-submit" value="Thêm Nhân Viên">
      </div>
    </form>
  </div>
</body>
</html>
@endsection
