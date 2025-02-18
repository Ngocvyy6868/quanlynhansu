<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh Sách Chương Trình Đào Tạo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .btn {
        color: #fff;
        background: linear-gradient(90deg, #6f42c1, #007bff);
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .icon {
        width: 20px;
        margin-right: 5px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }
    .table-bordered {
      border: 1px solid #ddd;
    }
    .table th {
      background-color: #6f42c1;
      color: white;
      text-align: center;
    }
    .table td {
      text-align: center;
    }
    .container {
      margin-top: 50px;
    }
    .table-container {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

@extends('dashboard')

@section('content')
<body>
  <div class="container">
    <h1 class="mb-4 text-center text-primary">DANH SÁCH CHƯƠNG TRÌNH ĐÀO TẠO</h1>
    <a href="{{ url('them-dao-tao') }}" class="btn btn-custom mb-4">
      <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm Chương Trình Đào Tạo
    </a>

    <div class="table-container">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Mã Chương Trình</th>
            <th>Mã Nhân Viên</th>
            <th>Họ Tên Nhân Viên</th>
            <th>Tên Chương Trình</th>
            <th>Từ Ngày</th>
            <th>Đến Ngày</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($daotaos as $daotao)
          <tr>
            <td>{{ $daotao->MaChuongTrinhDaoTao }}</td>
            <td>{{ $daotao->MaNV }}</td>
            <td>{{ $daotao->HoTenNV }}</td>
            <td>{{ $daotao->TenChuongTrinhDaoTao }}</td>
            <td>{{ $daotao->TuNgay }}</td>
            <td>{{ $daotao->DenNgay }}</td>
            <td>
              <a href="{{ url('thong-tin-dao-tao/'.$daotao->MaChuongTrinhDaoTao) }}" class="btn">
                <img src="{{ asset('img/edit.png') }}" class="icon" alt="Edit">
              </a>
            </td>
            <td>
              <a href="{{ url('xoa-dao-tao/'.$daotao->MaChuongTrinhDaoTao) }}" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                <img src="{{ asset('img/delete.png') }}" class="icon" alt="Delete">
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
@endsection
