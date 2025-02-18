<style>
    body {
  font-family: Arial, sans-serif;
}
h1 {
  margin-top: 20px;
  margin-bottom: 30px;
  text-align: center;
  text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
}
.container.full-width {
  border-radius: 1rem;
  padding: 30px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
  background-color: #ffffff;
}
.table {
  border-radius: 0.5rem;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}
.table td {
  vertical-align: middle;
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
.text-danger {
  color: #a94442;
}

</style>
@extends('dashboard')

@section('content')

<div class="container full-width">
    <h1 class="text-center mb-4">Thêm Chức Vụ</h1>
    <form action="{{ url('add-chuc-vus') }}" method="POST">
        @csrf

        <table class="table table-bordered">
            <tr  class="table-info">
                <td>Tên Chức Vụ</td>
                <td><input type="text" name="txt_tencv" class="form-control" placeholder="Nhập tên chức vụ" value="{{ old('txt_tencv') }}" required></td>
            </tr>
            <tr  class="table-info">
                <td>Phụ Cấp Chức Vụ</td>
                <td><input type="text" name="txt_phucapcv" class="form-control" placeholder="Nhập phụ cấp chức vụ" value="{{ old('txt_phucapcv') }}" required></td>
            </tr>
        </table>

        <div class="text-center">
            <button type="submit" class="btn-submit mt-3">Thêm Chức Vụ</button>
        </div>
    </form>
</div>

@endsection
