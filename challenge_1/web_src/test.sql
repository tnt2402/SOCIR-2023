-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2020 lúc 07:01 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jp_score`
--

CREATE TABLE `jp_score` (
  `id` int(11) NOT NULL,
  `ma_sinhvien` varchar(10) NOT NULL,
  `ngaythi` varchar(100) NOT NULL,
  `hinhthuc` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `score` varchar(3) NOT NULL,
  `pass` int(2) NOT NULL,
  `kithi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `jp_score`
--

INSERT INTO `jp_score` (`id`, `ma_sinhvien`, `ngaythi`, `hinhthuc`, `level`, `score`, `pass`, `kithi`) VALUES
(21, '1', '1595336868', '', '', '', 0, 'I'),
(22, '1', '1595336868', '', '', '', 0, 'II'),
(23, '1', '1595336868', '', '', '', 0, 'III'),
(24, '2', '1595336868', '', '', '', 0, 'I'),
(25, '2', '1595336868', '', '', '', 0, 'II'),
(26, '2', '1595336868', '', '', '', 0, 'III'),
(27, '3', '1595336868', '', '', '', 0, 'I'),
(28, '3', '1595336868', '', '', '', 0, 'II'),
(29, '3', '1595336868', '', '', '', 0, 'III');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jp_students`
--

CREATE TABLE `jp_students` (
  `id` int(11) NOT NULL,
  `id_student` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `valuer` varchar(25) NOT NULL,
  `point_Reaction` int(3) NOT NULL,
  `point_Memorization` int(3) NOT NULL,
  `point_Pragmatic` int(3) NOT NULL,
  `point_communication` int(3) NOT NULL,
  `point_Concentration` int(3) NOT NULL,
  `point_Attitude` int(3) NOT NULL,
  `point_Planability` int(3) NOT NULL,
  `point_Health` int(3) NOT NULL,
  `point_Total` int(3) NOT NULL,
  `cmt_1` text NOT NULL,
  `cmt_2` text NOT NULL,
  `isTeacher` varchar(25) NOT NULL,
  `dateJoin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `jp_students`
--

INSERT INTO `jp_students` (`id`, `id_student`, `fullName`, `photo`, `valuer`, `point_Reaction`, `point_Memorization`, `point_Pragmatic`, `point_communication`, `point_Concentration`, `point_Attitude`, `point_Planability`, `point_Health`, `point_Total`, `cmt_1`, `cmt_2`, `isTeacher`, `dateJoin`) VALUES
(1, '20205000', 'Do Thi Phuong Thao', 'jp_imgs_students/1/1.png', 'Evaluation', 0, 0, 0, 0, 0, 0, 0, 0, 83, '', '', '', ''),
(2, '20201433', 'Pham Thi Hang', 'jp_imgs_students/1/2.png', 'Evaluation', 0, 0, 0, 0, 0, 0, 0, 0, 94, '', '', '', ''),
(3, '20193431', 'Vuong Thi Chien', 'jp_imgs_students/1/3.png', 'Evaluation', 0, 0, 0, 0, 0, 0, 0, 0, 81, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tai_khoan` int(11) NOT NULL,
  `ten_tai_khoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_tai_khoan` tinyint(2) NOT NULL,
  `ten_sinh_vien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `anh_dai_dien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `mk2` varchar(2555) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `email`, `nhom_tai_khoan`, `ten_sinh_vien`, `sdt`, `anh_dai_dien`, `ngay_tao`, `mk2`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 3, 'Nguyen Tuan Thanh', '0936935346', 'avatardf.png', '2016-09-17 06:16:17', 'e2fc714c4727ee9395f324cd2e7f331f'),
-- (109, '1123123123123', 'cfe028664a35e15b051902f3ec866f280fd60b53', '1123123123@example.com', 1, 'Trân Đức', '12312313123', 'avatardf.png', '2016-10-27 18:43:56', ''),
-- (113, '21231231323', '9015867f2d6205412a2d8f154bb7ce4e8bfa30e6', '21231231323@example.com', 1, 'meo meo', '43141414', 'avatardf.png', '2016-10-29 23:11:23', ''),
-- (122, 'meomeo', '03d3d10d04646711a4a31af99ff49ea331975720', 'meomeo@example.com', 1, 'ahihi', '123123', 'avatardf.png', '2016-11-05 00:11:09', ''),
-- (123, '101', '21232f297a57a5a743894a0e4a801fc3', '101@example.com', 1, 'Trần Tuấn', '0982584480', 'avatardf.png', '2020-07-19 14:48:24', '');
(1, 'dothiphuongthao', '098f6bcd4621d373cade4e832627b4f6', 'dothiphuongthao@example.com', 1, 'Do Thi Phuong Thao', '0936935346', 'jp_imgs_students/1/1.png', NOW(), 'e2fc714c4727ee9395f324cd2e7f331f'),
(2, 'phamthihang', '098f6bcd4621d373cade4e832627b4f6', 'phamthihang@example.com', 1, 'Pham Thi Hang', '0987654321', 'jp_imgs_students/1/2.png', NOW(), 'e2fc714c4727ee9395f324cd2e7f331f'),
(3, 'vuongthichien', '098f6bcd4621d373cade4e832627b4f6', 'vuongthichien@example.com', 1, 'Vuong Thi Chien', '0123456789', 'jp_imgs_students/1/3.png', NOW(), 'e2fc714c4727ee9395f324cd2e7f331f');


CREATE TABLE jp_homeworks (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  start_time DATETIME,
  end_time DATETIME,
  teacher VARCHAR(255),
  status VARCHAR(255),
  file_path VARCHAR(255),
  description TEXT,
  category VARCHAR(255)
);

INSERT INTO jp_homeworks (name, start_time, end_time, teacher, status, file_path, description, category)
VALUES
  ('Homework 1', '2022-01-01 09:00:00', '2022-01-10 18:00:00', 'John Doe', 'Open', './homeworks_vault/hw1.pdf', 'This is the description for Homework 1.', 'Math'),
  ('Homework 2', '2022-02-01 09:00:00', '2022-02-10 18:00:00', 'Jane Smith', 'Closed', 'www.google.vn', 'This is the description for Homework 2.', 'Science'),
  ('Homework 3', '2022-03-01 09:00:00', '2022-03-10 18:00:00', 'Bob Johnson', 'Open', './homeworks_vault/hw1.pdf', 'This is the description for Homework 3.', 'History');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `jp_score`
--
ALTER TABLE `jp_score`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jp_students`
--
ALTER TABLE `jp_students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `jp_score`
--
ALTER TABLE `jp_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `jp_students`
--
ALTER TABLE `jp_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3224;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
