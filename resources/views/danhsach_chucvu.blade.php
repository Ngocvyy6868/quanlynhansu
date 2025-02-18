<style>
    h1 {
        text-align: center;
        /* text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8); */
    }

    .btn-primary {
        margin-right: 10px;
        background-color: #007bff;
    }

    .btn-warning {
        margin-right: 10px;
        background-color: #ffc107;
    }

    .btn-danger {
        margin-right: 10px;
        background-color: #dc3545;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-add {
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

    /* Style for delete button */
    form button {
        background: transparent;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    form button img {
        width: 20px;
        margin-right: 0;
    }
</style>

@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Danh sách chức vụ</h1>
    <div class="mb-3">
        <a href="{{ url('/add-chuc-vu') }}" class="btn btn-add">
            <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm chức vụ
        </a>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mã chức vụ</th>
                <th>Tên chức vụ</th>
                <th>Phụ cấp chức vụ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chucvus as $chucvu)
            <tr>
                <td>{{ $chucvu->MaCV }}</td>
                <td>{{ $chucvu->TenCV }}</td>
                <td>{{ number_format($chucvu->PhuCapCV, 0, ',', '.') }} VNĐ</td>
                <td>
                    <a href="thong-tin-chuc-vu/{{ $chucvu->MaCV }}" class="btn btn-info">
                        <img src="{{ asset('img/edit.png') }}" class="icon" alt="Edit">
                    </a>
                    <form action="delete-chuc-vu/{{ $chucvu->MaCV }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <img src="{{ asset('img/delete.png') }}" class="icon" alt="Delete">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
