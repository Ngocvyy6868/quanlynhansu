@extends('dashboard') {{-- Nếu layout chính là dashboard --}}

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Danh Sách Khen Thưởng Kỷ Luật</h1>
    <a href="{{ route('them-khen-thuong-ky-luat') }}" class="btn btn-primary mb-3">Thêm Mới</a>
    <div class="row">
        <div class="col-md-12" id="listSection">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã NV</th>
                        <th>Tên Nhân Viên</th>
                        <th>Hình Thức</th>
                        <th>Mục Khen Thưởng Kỷ Luật</th>
                        <th>Số Tiền</th>
                        <th>Ghi Chú</th>
                        <th>Ngày</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                    <tr>
                        <td>{{ $record->MaNV }}</td>
                        <td>{{ $record->nhanvien->HoTenNV }}</td>
                        <td>{{ $record->HinhThuc }}</td>
                        <td>{{ $record->mucktkl }}</td>
                        <td>{{ number_format($record->sotien, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $record->GhiChu }}</td>
                        <td>{{ $record->NgayQD }}</td>
                        <td>
                            <form action="/xoa-khen-thuong-ky-luat/{{$record->ID}}" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Không có bản ghi nào!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('addNewBtn').addEventListener('click', function() {
    document.getElementById('listSection').classList.toggle('col-md-6');
    document.getElementById('listSection').classList.toggle('col-md-12');
    document.getElementById('formSection').style.display = 'block';
});

function closeForm() {
    document.getElementById('formSection').style.display = 'none';
    document.getElementById('listSection').classList.add('col-md-12');
    document.getElementById('listSection').classList.remove('col-md-6');
}
</script>
@endsection
