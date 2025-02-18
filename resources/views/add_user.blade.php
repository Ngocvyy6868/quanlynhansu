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
@extends('dashboard')

@section('content')
<div class="container mt-4">
    <form action="/luu-tai-khoan" method="post">
        @csrf
      
        <h1 class="text-center">Cấp tài khoản nhân viên</h1>

        <div class="mb-3">
            <select name="txt_manv" class="form-control">
                <option value="">Chọn tên nhân viên</option>
                @foreach($nhanviens as $nhanvien)
                <option value="{{ $nhanvien->MaNV  }}" >
                    {{ $nhanvien->HoTenNV }}</option>
                @endforeach
            </select>
            @error('txt_manv')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            @if(session('error'))
            <div class="text-danger">{{ session('error') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tài khoản</label>
            <input type="text" name="txt_taikhoan" class="form-control" value="{{ old('txt_taikhoan') }}">
            @error('txt_taikhoan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Role</label>
            <select name="txt_role" class="form-control">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            @error('txt_role')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mật khẩu</label>
            <input type="password" name="txt_matkhau" class="form-control" value="{{ old('txt_matkhau') }}">
            @error('txt_matkhau')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nhập lại mật khẩu</label>
            <input type="password" name="txt_matkhau" class="form-control" value="{{ old('txt_matkhaua') }}">
            @error('txt_matkhaau')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn-submit">Thêm</button>
        </div>
    </form>
</div>
@endsection