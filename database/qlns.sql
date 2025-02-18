-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2025 lúc 09:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangluong`
--

CREATE TABLE `bangluong` (
  `ID` int(11) NOT NULL,
  `Thang` int(11) NOT NULL,
  `Nam` int(11) NOT NULL,
  `NgayCong` int(11) NOT NULL,
  `LuongCoBan` decimal(15,2) NOT NULL,
  `LuongTangCa` decimal(15,2) NOT NULL,
  `ThuongPhat` decimal(15,2) NOT NULL,
  `PhuCapXepLoai` decimal(15,2) NOT NULL,
  `PhuCapCV` decimal(15,2) NOT NULL,
  `TongLuong` decimal(15,2) NOT NULL,
  `LuongTamUng` decimal(15,2) NOT NULL,
  `KhauTruBH` decimal(15,2) NOT NULL,
  `KhauTruCongDoan` decimal(15,2) NOT NULL,
  `ThucLanh` decimal(15,2) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `MaNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bangluong`
--

INSERT INTO `bangluong` (`ID`, `Thang`, `Nam`, `NgayCong`, `LuongCoBan`, `LuongTangCa`, `ThuongPhat`, `PhuCapXepLoai`, `PhuCapCV`, `TongLuong`, `LuongTamUng`, `KhauTruBH`, `KhauTruCongDoan`, `ThucLanh`, `GhiChu`, `MaNV`) VALUES
(1, 12, 2024, 22, 20000000.00, 850000.00, 200000.00, 0.00, 300000.00, 21350000.00, 500000.00, 2100000.00, 100000.00, 18650000.00, 'Tự động tính lương', 1),
(2, 12, 2024, 22, 15000000.00, 850000.00, 0.00, 0.00, 200000.00, 16050000.00, 0.00, 1575000.00, 100000.00, 14375000.00, 'Tự động tính lương', 2),
(3, 12, 2024, 0, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 0.00, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 3),
(4, 12, 2024, 0, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 0.00, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 5),
(5, 12, 2024, 0, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 0.00, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 6),
(7, 1, 2025, 2, 20000000.00, 0.00, 200000.00, 0.00, 300000.00, 1863636.36, 0.00, 2100000.00, 100000.00, 0.00, 'Tự động tính lương', 1),
(8, 1, 2025, 1, 15000000.00, 0.00, 0.00, 0.00, 200000.00, 690909.09, 0.00, 1575000.00, 100000.00, 0.00, 'Tự động tính lương', 2),
(9, 1, 2025, 1, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 459090.91, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 3),
(10, 1, 2025, 1, 10000000.00, 0.00, 0.00, 0.00, 0.00, 454545.45, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 5),
(11, 1, 2025, 1, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 459090.91, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 6),
(12, 1, 2025, 1, 10000000.00, 0.00, 0.00, 0.00, 0.00, 454545.45, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 8),
(13, 12, 2024, 0, 10000000.00, 0.00, 0.00, 0.00, 100000.00, 0.00, 0.00, 1050000.00, 100000.00, 0.00, 'Tự động tính lương', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `MaCC` int(11) NOT NULL,
  `Thang` int(11) NOT NULL,
  `Nam` int(11) NOT NULL,
  `SoNgayLamViec` varchar(255) DEFAULT NULL,
  `SoGioTangCa1_5` int(11) DEFAULT NULL,
  `SoGioTangCa3_0` int(11) DEFAULT NULL,
  `XepLoai` varchar(50) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL,
  `MaNV` int(11) NOT NULL,
  `SoNgayNghi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`MaCC`, `Thang`, `Nam`, `SoNgayLamViec`, `SoGioTangCa1_5`, `SoGioTangCa3_0`, `XepLoai`, `GhiChu`, `MaNV`, `SoNgayNghi`) VALUES
(1, 12, 2024, '22', 10, 0, NULL, NULL, 1, '0'),
(2, 12, 2024, '22', 10, 0, NULL, NULL, 2, '0'),
(3, 12, 2024, '0', 0, 0, NULL, NULL, 3, '1'),
(4, 12, 2024, '0', 0, 0, '', NULL, 5, '0'),
(5, 12, 2024, '0', 0, 0, '', NULL, 6, '0'),
(6, 12, 2024, '0', 0, 0, '', NULL, 8, '0'),
(41, 1, 2025, '2', 0, 0, '', NULL, 1, '1'),
(42, 1, 2025, '1', 0, 0, '', NULL, 2, '0'),
(43, 1, 2025, '1', 0, 0, '', NULL, 3, '0'),
(44, 1, 2025, '1', 0, 0, '', NULL, 5, '0'),
(45, 1, 2025, '1', 0, 0, '', NULL, 6, '0'),
(46, 1, 2025, '1', 0, 0, '', NULL, 8, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietchamcong`
--

CREATE TABLE `chitietchamcong` (
  `MaCTCC` int(11) NOT NULL,
  `MaCC` int(11) DEFAULT NULL,
  `Ngay` date DEFAULT NULL,
  `GioVao` time DEFAULT NULL,
  `GioRa` time DEFAULT NULL,
  `SoGioLam` decimal(5,2) DEFAULT NULL,
  `GioTangCa1_5` decimal(5,2) DEFAULT 0.00,
  `GioTangCa3_0` decimal(5,2) DEFAULT 0.00,
  `TrangThai` enum('Đi làm','Nghỉ phép','Nghỉ không lương','Làm thêm') DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietchamcong`
--

INSERT INTO `chitietchamcong` (`MaCTCC`, `MaCC`, `Ngay`, `GioVao`, `GioRa`, `SoGioLam`, `GioTangCa1_5`, `GioTangCa3_0`, `TrangThai`, `GhiChu`) VALUES
(98, 1, '2024-12-02', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(99, 1, '2024-12-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(100, 1, '2024-12-04', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(101, 1, '2024-12-05', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(102, 1, '2024-12-06', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(105, 1, '2024-12-09', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(106, 1, '2024-12-10', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(107, 1, '2024-12-11', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(108, 1, '2024-12-12', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(109, 1, '2024-12-13', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(112, 1, '2024-12-16', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(113, 1, '2024-12-17', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(114, 1, '2024-12-18', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(115, 1, '2024-12-19', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(116, 1, '2024-12-20', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(119, 1, '2024-12-23', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(120, 1, '2024-12-24', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(121, 1, '2024-12-25', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(122, 1, '2024-12-26', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(123, 1, '2024-12-27', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(126, 1, '2024-12-30', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(127, 1, '2024-12-31', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(130, 2, '2024-12-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(131, 2, '2024-12-04', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(132, 2, '2024-12-05', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(133, 2, '2024-12-06', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(136, 2, '2024-12-09', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(137, 2, '2024-12-10', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(138, 2, '2024-12-11', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(139, 2, '2024-12-12', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(140, 2, '2024-12-13', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(143, 2, '2024-12-16', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(144, 2, '2024-12-17', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(145, 2, '2024-12-18', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(146, 2, '2024-12-19', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(147, 2, '2024-12-20', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(150, 2, '2024-12-23', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(151, 2, '2024-12-24', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(152, 2, '2024-12-25', '08:00:00', '17:00:00', 8.00, 1.50, 0.00, 'Đi làm', ''),
(153, 2, '2024-12-26', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(154, 2, '2024-12-27', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(157, 2, '2024-12-30', '08:00:00', '17:00:00', 8.00, 1.00, 0.00, 'Đi làm', ''),
(158, 2, '2024-12-31', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', ''),
(162, 2, '2024-12-02', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(163, 41, '2025-01-03', NULL, NULL, 0.00, 0.00, 0.00, 'Nghỉ không lương', 'Cập nhật tự động'),
(164, 42, '2025-01-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(165, 43, '2025-01-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(166, 44, '2025-01-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(167, 45, '2025-01-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(168, 46, '2025-01-03', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Đi làm', 'Cập nhật tự động'),
(169, 41, '2025-01-02', '08:00:00', '17:00:00', 8.00, 0.00, 0.00, 'Nghỉ phép', 'Cập nhật tự động'),
(171, 3, '2025-01-03', NULL, NULL, 0.00, 0.00, 0.00, 'Nghỉ không lương', 'Cập nhật tự động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` int(11) NOT NULL,
  `TenCV` varchar(100) NOT NULL,
  `PhuCapCV` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `PhuCapCV`) VALUES
(1, 'Nhân Viên', 100000),
(2, 'Trưởng Phòng\r\n', 200000),
(3, 'Giám Đốc', 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotao`
--

CREATE TABLE `daotao` (
  `MaChuongTrinhDaoTao` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `TenChuongTrinhDaoTao` varchar(255) NOT NULL,
  `TuNgay` date NOT NULL,
  `DenNgay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daotao`
--

INSERT INTO `daotao` (`MaChuongTrinhDaoTao`, `MaNV`, `TenChuongTrinhDaoTao`, `TuNgay`, `DenNgay`) VALUES
(1, 1, 'Đào tạo nhân viên mới', '2024-01-01', '2025-02-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khenthuongvakyluat`
--

CREATE TABLE `khenthuongvakyluat` (
  `ID` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `NgayQD` datetime NOT NULL,
  `HinhThuc` varchar(100) DEFAULT NULL,
  `mucktkl` varchar(200) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `sotien` double NOT NULL,
  `NguoiKy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khenthuongvakyluat`
--

INSERT INTO `khenthuongvakyluat` (`ID`, `MaNV`, `NgayQD`, `HinhThuc`, `mucktkl`, `GhiChu`, `sotien`, `NguoiKy`) VALUES
(16, 1, '2025-01-01 00:00:00', 'Khen Thưởng', 'Làm việc chuyên cần', NULL, 200000, 'Giám Đốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `QuocTich` varchar(50) DEFAULT NULL,
  `DanToc` varchar(50) DEFAULT NULL,
  `TonGiao` varchar(50) DEFAULT NULL,
  `SoCCCD` varchar(20) DEFAULT NULL,
  `DiaChiThuongTru` varchar(255) NOT NULL,
  `DiaChiTamTru` varchar(255) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `TrinhDoHocVan` varchar(100) DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTenNV`, `NgaySinh`, `GioiTinh`, `QuocTich`, `DanToc`, `TonGiao`, `SoCCCD`, `DiaChiThuongTru`, `DiaChiTamTru`, `SoDienThoai`, `Email`, `NgayVaoLam`, `TrinhDoHocVan`, `Img`) VALUES
(1, 'Nguyễn Thị Ngọc Vy', '2004-07-28', 'Nữ', 'Việt Nam', 'Kinh', 'Không', '0808080800808080', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '0999999999', 'ngocvyy6868@gmail.com', '2024-01-01', '12/12', 'images/1735814103_channels4_profile.jpg'),
(2, 'Nguyễn Phú Thắng', '2004-01-01', 'Nam', 'Việt Nam', 'Kinh', 'k', '090909090909909', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '070807070707', '123@gmail.com', '2024-01-01', '12/12', 'images/1735814120_1733889850656.jpg'),
(3, 'Lê Thị Thu Diễm', '2001-01-01', 'Nữ', 'Việt Nam', 'Kinh', 'Không', '123', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '123', 'thudiemdepgai@gmail.com', '2024-01-01', '12/12', 'images/1735814425_4019b3c4d1f6f2b35b0febd5eebd457f.jpg'),
(5, 'Hồng Minh', '2004-11-11', 'Nữ', 'Việt Nam', 'Kinh', 'Không', '123', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '0999999999', 'hmin@gmail.com', '2024-01-01', '12/12', 'images/1735814502_base64-16257180894091835417839-1625725451497-16257254517001976231390.png'),
(6, 'Nguyễn Minh Đại', '2004-01-01', 'Nam', 'Việt Nam', 'Kinh', 'Không', '0808080800808080', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '0999999999', 'daiii8@gmail.com', '2024-01-01', '12/12', 'images/1735814569_saostar-zemx7kpv9n1wnysy.jpg'),
(8, 'Hiếu', '2004-01-01', 'Nam', 'Việt Nam', 'Kinh', 'Không', '0808080800808080', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh', '33 Vĩnh Viễn, Phường 02, Quận 10, Thành phố Hồ Chí Minh.', '0999999999', 'hieu@gmail.com', '2024-01-01', '12/12', 'images/Son_Tung_M-TP_1_(2017).png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` int(11) NOT NULL,
  `TenPB` varchar(100) NOT NULL,
  `ViTri` varchar(100) DEFAULT NULL,
  `TenTruongPhong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `ViTri`, `TenTruongPhong`) VALUES
(1, 'Kế Toán', 'P1.L3', 'Ngọc Vy'),
(2, 'Kỹ Thuật', 'P4.L1', 'Phú Thắng'),
(3, 'Hành Chính - Nhân Sự', 'P1.TT', 'Lý Sung Che');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quatrinhcongtac`
--

CREATE TABLE `quatrinhcongtac` (
  `ID` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaPhongBan` int(11) NOT NULL,
  `MaChucVu` int(11) NOT NULL,
  `NgayHieuLuc` datetime NOT NULL DEFAULT current_timestamp(),
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quatrinhcongtac`
--

INSERT INTO `quatrinhcongtac` (`ID`, `MaNV`, `MaPhongBan`, `MaChucVu`, `NgayHieuLuc`, `GhiChu`) VALUES
(1, 1, 3, 3, '2024-01-01 00:00:00', NULL),
(2, 2, 2, 2, '2024-01-01 00:00:00', NULL),
(13, 3, 1, 1, '2024-01-01 00:00:00', NULL),
(14, 6, 3, 1, '2024-01-01 00:00:00', NULL),
(15, 5, 1, 1, '2024-01-01 00:00:00', NULL),
(16, 8, 2, 1, '2024-01-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tam_ung`
--

CREATE TABLE `tam_ung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaNV` bigint(20) UNSIGNED NOT NULL,
  `NgayTamUng` date NOT NULL,
  `SoTien` decimal(15,2) NOT NULL,
  `LyDo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tam_ung`
--

INSERT INTO `tam_ung` (`id`, `MaNV`, `NgayTamUng`, `SoTien`, `LyDo`) VALUES
(1, 1, '2024-12-01', 500000.00, 'Đi du lịch'),
(6, 3, '2024-11-01', 100000.00, 'Đi đám giỗ bên cồn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `MaNV`, `taikhoan`, `matkhau`, `role`) VALUES
(1, 1, 'giamdoc', '123', '3'),
(3, 2, 'truongphong', '123', '4'),
(4, 3, 'nhanvienhanhchinh1', '123', '1'),
(5, 4, 'nhanvienketoan1', '123', '2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`MaCC`);

--
-- Chỉ mục cho bảng `chitietchamcong`
--
ALTER TABLE `chitietchamcong`
  ADD PRIMARY KEY (`MaCTCC`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`MaChuongTrinhDaoTao`);

--
-- Chỉ mục cho bảng `khenthuongvakyluat`
--
ALTER TABLE `khenthuongvakyluat`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- Chỉ mục cho bảng `quatrinhcongtac`
--
ALTER TABLE `quatrinhcongtac`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tam_ung`
--
ALTER TABLE `tam_ung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `MaCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `chitietchamcong`
--
ALTER TABLE `chitietchamcong`
  MODIFY `MaCTCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `daotao`
--
ALTER TABLE `daotao`
  MODIFY `MaChuongTrinhDaoTao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khenthuongvakyluat`
--
ALTER TABLE `khenthuongvakyluat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `MaPB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `quatrinhcongtac`
--
ALTER TABLE `quatrinhcongtac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tam_ung`
--
ALTER TABLE `tam_ung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
