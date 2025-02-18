@extends('dashboard')

@section('content')
<div class="container full-width">
    <h1 class="text-center">Thêm Khen Thưởng Kỷ Luật</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('luu-khen-thuong-ky-luat') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="MaNV" class="form-label">Nhân Viên</label>
            <select class="form-control" id="MaNV" name="MaNV" required onchange="enableHinhThuc()">
                <option value="">-chọn-</option>
                @foreach($nhanviens as $nhanvien)
                    <option value="{{ $nhanvien->MaNV }}">{{ $nhanvien->HoTenNV }}</option>
                @endforeach
            </select>
            @error('MaNV')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="HinhThuc" class="form-label">Hình Thức</label>
            <select class="form-control" id="HinhThuc" name="HinhThuc" required disabled onchange="updateMucktklOptions(); resetSotien()">
                <option value="">-chọn-</option>
                <option value="Khen Thưởng">Khen Thưởng</option>
                <option value="Kỷ Luật">Kỷ Luật</option>
            </select>
            @error('HinhThuc')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mucktkl" class="form-label">Mục khen thưởng và kỉ luật</label>
            <select class="form-control" id="mucktkl" name="mucktkl" disabled onchange="updateSotien()">
                <option value="">-chọn-</option>
            </select>
            @error('mucktkl')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sotien" class="form-label">Số Tiền</label>
            <input type="number" class="form-control" id="sotien" name="sotien" required readonly>
            @error('sotien')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="NgayQD" class="form-label">Ngày Quyết Định</label>
            <input type="date" class="form-control" id="NgayQD" name="NgayQD" required>
            @error('NgayQD')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="GhiChu" class="form-label">Ghi Chú</label>
            <textarea class="form-control" id="GhiChu" name="GhiChu"></textarea>
            @error('GhiChu')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="NguoiKy" class="form-label">Người Ký</label>
            <input type="text" class="form-control" id="NguoiKy" name="NguoiKy">
            @error('NguoiKy')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-primary w-100">Thêm</button>
        </div>
    </form>
</div>

<script>
function enableHinhThuc() {
    const maNV = document.getElementById('MaNV').value;
    const hinhThuc = document.getElementById('HinhThuc');
    if (maNV) {
        hinhThuc.disabled = false;
    } else {
        hinhThuc.disabled = true;
        document.getElementById('mucktkl').disabled = true;
        document.getElementById('sotien').value = '';
    }
}

function updateMucktklOptions() {
    const hinhThuc = document.getElementById('HinhThuc').value;
    const mucktkl = document.getElementById('mucktkl');
    mucktkl.innerHTML = '';

    if (hinhThuc === 'Khen Thưởng') {
        const options = ['-chọn-', 'Làm việc chuyên cần', 'Hoàn thành nhiệm vụ', 'Đi làm đầy đủ'];
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            mucktkl.appendChild(opt);
        });
        mucktkl.disabled = false;
    } else if (hinhThuc === 'Kỷ Luật') {
        const options = ['-chọn-', 'Đi làm trễ', 'Làm việc riêng', 'Không hoàn thành nhiệm vụ'];
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            mucktkl.appendChild(opt);
        });
        mucktkl.disabled = false;
    } else {
        const opt = document.createElement('option');
        opt.value = '';
        opt.innerHTML = '-chọn-';
        mucktkl.appendChild(opt);
        mucktkl.disabled = true;
    }
}

function updateSotien() {
    const mucktkl = document.getElementById('mucktkl').value;
    const sotien = document.getElementById('sotien');

    if (mucktkl === 'Làm việc chuyên cần') {
        sotien.value = 200000;
    } else if (mucktkl === 'Hoàn thành nhiệm vụ') {
        sotien.value = 100000;
    } else if (mucktkl === 'Đi làm đầy đủ') {
        sotien.value = 50000;
    } else if (mucktkl === 'Đi làm trễ') {
        sotien.value = -50000;
    } else if (mucktkl === 'Làm việc riêng') {
        sotien.value = -100000;
    } else if (mucktkl === 'Không hoàn thành nhiệm vụ') {
        sotien.value = -200000;
    } else {
        sotien.value = '';
    }
}

function resetSotien() {
    document.getElementById('sotien').value = '';
}
</script>
@endsection
