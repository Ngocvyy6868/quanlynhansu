@extends('dashboard')

@section('content')
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
<div class="container mt-5">
    <h1 class="text-center">Thêm Tạm Ứng</h1>
    <form action="{{ url('luu-tam-ung') }}" method="POST"> <!-- Đảm bảo action URL đúng -->
        @csrf
        <div class="form-group">
            <label for="MaNV">Nhân Viên</label>
            <select name="MaNV" class="form-control" required>
                <option value="">Chọn Nhân Viên</option>
                @foreach($nhanviens as $nv)
                <option value="{{ $nv->MaNV }}">{{ $nv->HoTenNV }}</option> <!-- Update column name -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="NgayTamUng">Ngày Tạm Ứng</label>
            <input type="date" name="NgayTamUng" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="SoTien">Số Tiền</label>
            <input type="number" name="SoTien" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="LyDo">Lý Do</label>
            <textarea name="LyDo" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn-submit">Lưu</button>
    </form>
</div>
@endsection
