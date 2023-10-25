-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cua_hang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ten_dang_nhap`, `mat_khau`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', '2023-10-02 18:25:00', '2023-10-02 18:25:00'),
(2, 'user', '123', '2023-10-25 17:04:41', '2023-10-25 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don_nhap`
--

CREATE TABLE `chi_tiet_hoa_don_nhap` (
  `id` int(11) NOT NULL,
  `hoa_don_nhap_id` int(50) NOT NULL,
  `san_pham_id` int(50) NOT NULL,
  `so_luong` int(50) NOT NULL,
  `gia_nhap` decimal(10,0) NOT NULL,
  `gia_ban` decimal(10,0) NOT NULL,
  `thanh_tien` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_hoa_don_nhap`
--

INSERT INTO `chi_tiet_hoa_don_nhap` (`id`, `hoa_don_nhap_id`, `san_pham_id`, `so_luong`, `gia_nhap`, `gia_ban`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, 3000, 5000, 300000, '2023-10-11 22:52:43', '2023-10-11 22:52:43'),
(2, 1, 2, 100, 4000, 5000, 400000, '2023-10-11 22:52:43', '2023-10-11 22:52:43'),
(3, 2, 1, 100, 1, 5, 100, '2023-10-24 01:00:50', '2023-10-24 01:00:50'),
(4, 3, 1, 100, 10000, 12000, 1000000, '2023-10-24 23:12:01', '2023-10-24 23:12:01'),
(5, 4, 1, 100, 1, 3, 100, '2023-10-24 23:15:52', '2023-10-24 23:15:52'),
(6, 5, 1, 115, 11, 22, 1265, '2023-10-24 23:17:34', '2023-10-24 23:17:34'),
(7, 6, 1, 115, 12000, 15000, 1380000, '2023-10-24 23:18:35', '2023-10-24 23:18:35'),
(8, 7, 1, 15, 1, 2, 15, '2023-10-24 23:57:48', '2023-10-24 23:57:48'),
(9, 8, 1, 100, 1, 2, 100, '2023-10-25 00:19:14', '2023-10-25 00:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don_xuat`
--

CREATE TABLE `chi_tiet_hoa_don_xuat` (
  `id` int(11) NOT NULL,
  `hoa_don_xuat_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_hoa_don_xuat`
--

INSERT INTO `chi_tiet_hoa_don_xuat` (`id`, `hoa_don_xuat_id`, `san_pham_id`, `so_luong`, `gia_ban`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, 1, 100, '2023-10-25 00:28:07', '2023-10-25 00:28:07'),
(2, 2, 1, 1, 2, 2, '2023-10-25 01:07:35', '2023-10-25 01:07:35'),
(3, 2, 2, 1, 3, 3, '2023-10-25 01:07:35', '2023-10-25 01:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinh_anh`
--

INSERT INTO `hinh_anh` (`id`, `san_pham_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/IPDakgPxjkWFot2hmNZqHVRIwHAzwHghHHp36Yyt.jpg', '2023-10-11 13:29:03', '2023-10-11 13:29:03'),
(2, 2, 'uploads/YcSDyoFbV2bYgFxfsUfKuAQxJib9od2ffEWQiJMF.jpg', '2023-10-11 13:29:27', '2023-10-11 13:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_nhap`
--

CREATE TABLE `hoa_don_nhap` (
  `id` int(11) NOT NULL,
  `ncc_id` int(50) NOT NULL,
  `nhan_vien_id` int(11) DEFAULT NULL,
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tong_tien` decimal(10,0) DEFAULT 0,
  `trang_thai` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don_nhap`
--

INSERT INTO `hoa_don_nhap` (`id`, `ncc_id`, `nhan_vien_id`, `ngay_nhap`, `tong_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2023-10-12 05:52:43', 700000, 1, '2023-10-11 22:52:43', '2023-10-11 22:52:43'),
(2, 1, 0, '2023-10-24 08:00:50', 100, 1, '2023-10-24 01:00:50', '2023-10-24 01:00:50'),
(3, 1, 1, '2023-10-25 06:12:01', 1000000, 1, '2023-10-24 23:12:01', '2023-10-24 23:12:01'),
(4, 1, 1, '2023-10-25 06:15:52', 100, 1, '2023-10-24 23:15:52', '2023-10-24 23:15:52'),
(5, 1, 1, '2023-10-25 06:17:34', 1265, 1, '2023-10-24 23:17:34', '2023-10-24 23:17:34'),
(6, 3, 2, '2023-10-25 06:18:35', 1380000, 1, '2023-10-24 23:18:35', '2023-10-24 23:18:35'),
(7, 2, 1, '2023-10-25 06:57:48', 15, 1, '2023-10-24 23:57:48', '2023-10-24 23:57:48'),
(8, 2, 1, '2023-10-25 07:19:14', 100, 1, '2023-10-25 00:19:14', '2023-10-25 00:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_xuat`
--

CREATE TABLE `hoa_don_xuat` (
  `id` int(11) NOT NULL,
  `ngay_tao_hd` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nhan_vien_id` int(11) NOT NULL,
  `khach_hang_id` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL DEFAULT 0,
  `trang_thai` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don_xuat`
--

INSERT INTO `hoa_don_xuat` (`id`, `ngay_tao_hd`, `nhan_vien_id`, `khach_hang_id`, `tong_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, '2023-10-25 07:28:07', 2, 3, 100, 1, '2023-10-25 00:28:07', '2023-10-25 00:28:07'),
(2, '2023-10-25 08:07:35', 1, 3, 5, 1, '2023-10-25 01:07:35', '2023-10-25 01:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(25) NOT NULL,
  `ten_kh` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dien_thoai` varchar(10) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_dang_nhap`, `mat_khau`, `ten_kh`, `email`, `dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'aloun', '123', 'aloun', 'aloun@gmail.com', '0986111111', 'HN', '2023-10-13 02:10:17', '2023-10-13 02:33:34'),
(3, 'aloo', '123', 'aloo', 'aloo@gmail.com', '0986xxxxxx', 'TP HCM', '2023-10-13 03:03:38', '2023-10-13 03:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten_loai`, `created_at`, `updated_at`) VALUES
(1, 'Truyện tranh', '2023-10-11 13:27:18', '2023-10-11 13:27:18'),
(2, 'Tiểu thuyết', '2023-10-11 13:27:30', '2023-10-11 13:27:30'),
(3, 'Khoa học công nghệ', '2023-10-11 13:27:39', '2023-10-11 13:27:39'),
(4, 'Tâm lý', '2023-10-11 13:27:55', '2023-10-12 00:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dien_thoai` int(10) NOT NULL,
  `dia_chi` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ho_ten`, `email`, `dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'Alex', 'alex@gmail.com', 987656742, 'TP HCM', '2023-10-25 05:59:19', '2023-10-25 05:59:19'),
(2, 'Peter', 'peter@gmail.com', 987656345, 'Hà Nội', '2023-10-25 05:59:46', '2023-10-25 05:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten_ncc` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten_ncc`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'Nhà sách Fahasa', 'TP HCM', '2023-10-11 13:28:09', '2023-10-11 13:28:09'),
(2, 'Nhà sách Phương Nam', 'Hà Nội', '2023-10-11 13:28:24', '2023-10-11 13:28:24'),
(3, 'Nhà sách Kim Đồng', 'TP HCM', '2023-10-11 13:28:31', '2023-10-11 13:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `trang_thai` int(1) NOT NULL DEFAULT 1,
  `loai_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `so_luong`, `mo_ta`, `trang_thai`, `loai_id`, `created_at`, `updated_at`) VALUES
(1, 'Pokemon vol 1', 2, 230, 'abcs', 1, 1, '2023-10-11 13:29:03', '2023-10-25 00:28:07'),
(2, 'Pokemon vol 2', 30000, 99, 'abc', 1, 1, '2023-10-11 13:29:27', '2023-10-25 01:07:35'),
(3, 'Bas', 1000, 100, 'aaa', 1, 3, '2023-10-11 23:24:29', '2023-10-11 23:32:37'),
(4, 'Basr', 5000, 100, 'bbb', 1, 4, '2023-10-11 23:29:26', '2023-10-11 23:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_hoa_don_nhap`
--
ALTER TABLE `chi_tiet_hoa_don_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_hoa_don_xuat`
--
ALTER TABLE `chi_tiet_hoa_don_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_don_nhap`
--
ALTER TABLE `chi_tiet_hoa_don_nhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_don_xuat`
--
ALTER TABLE `chi_tiet_hoa_don_xuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoa_don_nhap`
--
ALTER TABLE `hoa_don_nhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hoa_don_xuat`
--
ALTER TABLE `hoa_don_xuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
