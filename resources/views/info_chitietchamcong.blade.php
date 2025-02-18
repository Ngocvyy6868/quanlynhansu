<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Chi Tiết Chấm Công</title>
</head>
@extends('dashboard')

@section('content')
<body>
    <div class="container">
        <h1>Thông Tin Chi Tiết Chấm Công</h1>
        <form action="{{ url('/cap-nhat-chi-tiet-cham-cong') }}" method="POST">
            @csrf
            <input type="hidden" name="maCC" value="{{ $chitiet->MaCC }}">
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Ngày Chấm Công</th>
                    <td><input type="date" name="ngayCC" value="{{ $chitiet->NgayCC }}" class="form-control"></td>
                </tr>
                <tr>
                    <th>Mã Chấm Công</th>
                    <td>{{ $chitiet->MaCC }}</td>
                </tr>
                <tr>
                    <th>Làm Việc</th>
                    <td><input type="text" name="lamViec" value="{{ $chitiet->LamViec }}" class="form-control"></td>
                </tr>
                <tr>
                    <th>Nghỉ Có Phép</th>
                    <td>
                        <input type="checkbox" name="nghiCoPhep" value="1" {{ $chitiet->NghiCoPhep ? 'checked' : '' }}>
                    </td>
                </tr>
                <tr>
                    <th>Lý Do Nghỉ</th>
                    <td>
                        <input type="text" name="lyDoNghi" value="{{ $chitiet->LyDoNghi }}" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th>Nghỉ Không Phép</th>
                    <td>
                        <input type="checkbox" name="nghiKhongPhep" value="1" {{ $chitiet->NghiKhongPhep ? 'checked' : '' }}>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
        <a href="{{ url('/danh-sach-chi-tiet-cham-cong') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>
</body>
</html>
@endsection
