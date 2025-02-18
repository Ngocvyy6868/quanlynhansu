<style>
        body {
    }
    h1 {
      margin-top: 20px;
      margin-bottom: 30px;
      text-align: center;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }
    .container {
      border-radius: 1rem;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
    .table {
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    .btn-submit {
      background: linear-gradient(to right, #ff416c, #ff4b2b);
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
      display: block;
      margin: 20px auto;
    }
    .btn-submit:hover {
      transform: scale(1.05); /* Tăng kích thước khi hover */
      box-shadow: 0 4px 20px rgba(255, 65, 108, 0.5);
    }
    .table td {
      vertical-align: middle;
    }
</style>
@extends('dashboard')

@section('content')
<body>
  <div class="container mt-4">
    <h1 class="text-center">Thêm Công Tác</h1>
    <form action="/add-cong-tacs" method="post">
      @csrf

      <table class="table table-bordered">
        <tr  class="table-info">
          <td>Nhân Viên</td>
          <td>
            <select name="txt_manv" class="form-control" required>
              <option value="">Chọn tên nhân viên</option>
              @foreach($nhanviens as $nhanvien)
                <option value="{{ $nhanvien->MaNV }}" {{ old('txt_manv') == $nhanvien->MaNV ? 'selected' : '' }}>{{ $nhanvien->HoTenNV }}</option>
              @endforeach
            </select>
            @error('txt_manv')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </td>
        </tr>
        <tr  class="table-info">
          <td>Phòng Ban</td>
          <td>
            <select name="txt_mapb" class="form-control" required>
              <option value="">Chọn tên phòng ban</option>
              @foreach($phongbans as $phongban)
                <option value="{{ $phongban->MaPB }}" {{ old('txt_mapb') == $phongban->MaPB ? 'selected' : '' }}>{{ $phongban->TenPB }}</option>
              @endforeach
            </select>
            @error('txt_mapb')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </td>
        </tr>
        <tr class="table-info">
          <td>Chức Vụ</td>
          <td>
            <select name="txt_macv" class="form-control" required>
              <option value="">Chọn tên chức vụ</option>
              @foreach($chucvus as $chucvu)
                <option value="{{ $chucvu->MaCV }}" {{ old('txt_macv') == $chucvu->MaCV ? 'selected' : '' }}>{{ $chucvu->TenCV }}</option>
              @endforeach
            </select>
            @error('txt_macv')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </td>
        </tr>
        <tr class="table-info">
          <td>Ngày Hiệu Lực</td>
          <td><input type="date" name="txt_ngayhl" class="form-control" placeholder="Ngày hiệu lực" value="{{ old('txt_ngayhl', date('Y-m-d')) }}" required></td>
        </tr>
      </table>
      
      <div class="text-center">
        <button type="submit" class="btn btn-submit mt-3">Thêm</button>
      </div>
    </form>
  </div>
</body>
@endsection
