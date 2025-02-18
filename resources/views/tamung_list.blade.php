@extends('dashboard') {{-- Kế thừa layout dashboard --}}

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Danh Sách Tạm Ứng</h1>
    <a href="{{ route('them-tam-ung') }}" class="btn btn-primary mb-3">Thêm Tạm Ứng</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên Nhân Viên</th>
                <th>Ngày Tạm Ứng</th>
                <th>Số Tiền</th>
                <th>Lý Do</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->nhanvien->HoTenNV }}</td>
                <td>{{ $record->NgayTamUng }}</td>
                <td>{{ number_format($record->SoTien, 0, ',', '.') }}  VNĐ</td>
                <td>{{ $record->LyDo }}</td>
                <td>
                    <a href="{{ route('sua-tam-ung', $record->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('xoa-tam-ung', $record->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE') <!-- Ensure method spoofing -->
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Không có bản ghi nào!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
