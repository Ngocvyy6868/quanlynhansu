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
    form button {
    background: transparent;
    border: none;
    padding: 0;
    cursor: pointer;
    }

    </style>
@extends('dashboard')

@section('content')
<style>
    .content {
        margin-left: 250px;
    }
</style>
<div class="container mt-4">
    <h1 class="text-center">Danh sách phòng ban</h1>
    <div class="mb-3">
        <a href="{{ url('/add-phong-ban') }}" class="btn btn-add">
            <img src="{{ asset('img/add.png') }}" class="icon" alt=""> Thêm Danh mục
        </a>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mã phòng ban</th>
                <th>Tên phòng ban</th>
                <th>Vị trí</th>
                <th>Trưởng phòng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($phongbans as $phongban)
            <tr>
                <td>{{ $phongban->MaPB }}</td>
                <td>{{ $phongban->TenPB }}</td>
                <td>{{ $phongban->ViTri }}</td>
                <td>{{ $phongban->TenTruongPhong }}</td>
                <td>
                    <a href="thong-tin-phong-ban/{{ $phongban->MaPB }}" class="btn btn-info">
                        <img src="{{ asset('img/edit.png') }}" class="icon" alt="Edit">
                        </a>
                    <form action="delete-phong-ban/{{ $phongban->MaPB }}" method="POST" class="d-inline-block">
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
