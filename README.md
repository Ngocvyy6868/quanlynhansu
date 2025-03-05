<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Quản Lý Nhân Sự - HR Management System

## Feature
- **Quản lý nhân viên:** Thêm, sửa, xóa thông tin nhân viên.
- **Chấm công & tính lương:** Theo dõi giờ làm việc và tính lương tự động.
- **Báo cáo:** Tổng hợp dữ liệu theo tháng/quý/năm.

## Cách chạy
1. **Clone repo & vào thư mục:**
   ```bash
   git clone https://github.com/Ngocvyy6868/quanlynhansu
   cd quanlynhansu
2. **Cài đặt dependencies:**
    ```bash
    composer install
    npm install
3. **Cấu hình môi trường & migrate:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
4. **Chạy server:**
    ```bash
    php artisan serve
**Truy cập: http://localhost:8000**
## DEMO:
## Khi chưa đăng nhập
![Demo](images/Dashboard.png)
## View Tính Lương
![Demo](images/BangLuong.png)
## View Chấm Công
![Demo](images/ChamCong.png)
## View Danh Sách Thông Tin Nhân Viên
![Demo](images/DanhSachNhanVien.png)

