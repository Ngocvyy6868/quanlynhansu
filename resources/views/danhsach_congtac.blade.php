<style>
    h1 {
        text-align: center;
        /* text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8); */
    }

    .btn-primary {
        margin-right:10px;
        background-color: #007bff;
    }

    .btn-warning {
        margin-right:10px;
        background-color: #ffc107;
    }

    .btn-danger {
        margin-right:10px;
        background-color: #dc3545;
    }

    .btn:hover {
        transform: scale(1.05);
    }
    .btn-add{
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
    </style>
@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Quản lí công tác</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ url('/add-cong-tac') }}" class="btn btn-add">
            <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm Công Tác
        </a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên nhân viên</th>
                <th>Tên phòng ban</th>
                <th>Tên chức vụ</th>
                <th>Ngày hiệu lực</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($congtacs as $congtac)
            <tr>
                <td>{{ $congtac->ID }}</td>
                <td>{{ $congtac->TenNhanVien }}</td>
                <td>{{ $congtac->TenPhongBan }}</td>
                <td>{{ $congtac->TenChucVu }}</td>
                <td>{{ $congtac->NgayHieuLuc }}</td>
                <td>
                    <a href="thong-tin-cong-tac/{{ $congtac->ID }}" class="btn btn-info">
                        <img src="{{ asset('img/edit.png') }}" class="icon" alt="Edit">
                        </a>
                    <a href="delete-cong-tac/{{ $congtac->ID }}" class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                        <img src="{{ asset('img/delete.png') }}" class="icon" alt="Delete">
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
