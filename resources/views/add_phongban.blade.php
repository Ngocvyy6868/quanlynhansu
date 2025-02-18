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
<div class="container mt-4">
    <h1 class="text-center">Thêm Phòng Ban</h1>
    <form action="/add-phong-bans" method="post">
        @csrf

        <table class="table table-bordered">
            <tr class="table-info" >
                <td>Tên Phòng Ban</td>
                <td>
                    <input 
                        type="text" 
                        name="txt_tenphong" 
                        class="form-control" 
                        placeholder="Nhập tên phòng ban" 
                        value="{{ old('txt_tenphong') }}" required>
                    @error('txt_tenphong')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr class="table-info" >
                <td>Vị trí Phòng Ban</td>
                <td>
                    <input 
                        type="text" 
                        name="txt_vitri" 
                        class="form-control" 
                        placeholder="Nhập vị trí phòng ban" 
                        value="{{ old('txt_vitri') }}" required>
                    @error('txt_vitri')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-submit mt-3">Thêm</button>
        </div>
    </form>
</div>
@endsection
