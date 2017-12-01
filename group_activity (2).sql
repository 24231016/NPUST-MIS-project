-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-01 07:18:19
-- 伺服器版本: 10.1.28-MariaDB
-- PHP 版本： 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group_activity`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_context` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mix_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_start` datetime NOT NULL,
  `final-time` datetime DEFAULT NULL,
  `activity_category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`id`, `name`, `activity_title`, `activity_context`, `userid`, `latitude`, `longitude`, `mix_amount`, `activity_start`, `final-time`, `activity_category`, `location`) VALUES
(38, '123', '三更半夜', '唱歌唱到半夜', '1', '22.647550', '120.611595', '5', '2017-11-30 00:00:00', '2017-11-30 00:00:00', '一般活動', '好樂迪'),
(45, '簡志宇', '揪一起', '1234', '6', '', '', '4', '2017-11-29 12:34:00', '2017-11-30 14:34:00', '餐飲活動', '小野菊'),
(46, '簡志宇', '接在一起', '112', '6', '', '', '4', '2017-11-28 23:42:00', '2017-11-30 14:34:00', '其他活動', '小野菊'),
(47, '楊元', '', '', '8', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '一般活動', ''),
(48, '楊元', '456', '244', '8', '', '', '3', '2017-11-29 14:36:00', '2017-11-30 00:00:00', '一般活動', '1245'),
(49, '張又仁', '123', '456', '7', '', '', '5', '2017-11-01 00:00:00', '2017-11-29 06:43:00', '一般活動', '47586'),
(51, '張又仁', '一起唱嘻哈吧', '無意凡666666', '7', '', '', '3', '2017-12-18 00:00:00', '2017-12-22 00:00:00', '一般活動', '屏東好樂迪'),
(52, '楊元', '看雷神索爾3', '雷神', '8', '', '', '2', '2017-12-22 00:00:00', '2017-12-30 00:00:00', '一般活動', '教室');

-- --------------------------------------------------------

--
-- 資料表結構 `joinperson`
--

CREATE TABLE `joinperson` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(100) NOT NULL,
  `activity_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `joinperson`
--

INSERT INTO `joinperson` (`id`, `name`, `email`, `userid`, `activity_id`) VALUES
(252, '張又仁', 'r420bin@yahoo.com.tw', 7, 51),
(255, '羅瑞寶', 'g76158@gmail.com', 9, 51),
(259, '楊元', 'iamgod13141@yahoo.com.tw', 8, 51),
(260, '張又仁', 'r420bin@yahoo.com.tw', 7, 52);

-- --------------------------------------------------------

--
-- 資料表結構 `platform`
--

CREATE TABLE `platform` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(100) DEFAULT NULL,
  `context` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `platform`
--

INSERT INTO `platform` (`id`, `name`, `userid`, `context`, `activity_id`) VALUES
(1, '123', 1, '12312345345', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(6, '%E7%B0%A1%E5%BF%97%E5%AE%87', 'upset_cold@yahoo.com.tw'),
(7, '%E5%BC%B5%E5%8F%88%E4%BB%81', 'r420bin@yahoo.com.tw'),
(8, '%E6%A5%8A%E5%85%83', 'iamgod13141@yahoo.com.tw'),
(9, '%E7%BE%85%E7%91%9E%E5%AF%B6', 'g76158@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `visit`
--

CREATE TABLE `visit` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(100) DEFAULT NULL,
  `lat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `visit`
--

INSERT INTO `visit` (`id`, `name`, `userid`, `lat`, `lng`, `activity_id`) VALUES
(1, '123', 1, '22.6450678', '120.6103434', 5),
(2, '123', 0, '', '', 12),
(3, '123', 0, '', '', 12),
(4, '123', 0, '', '', 13),
(5, '123', 0, '', '', 13),
(6, '123', 0, '', '', 13),
(7, '123', 0, '', '', 13),
(8, '123', 0, '', '', 13),
(9, '123', 0, '', '', 20),
(10, '123', 0, '', '', 24),
(11, '123', 0, '', '', 24),
(12, '123', 0, '', '', 24),
(13, '123', 0, '', '', 24),
(14, '123', 0, '', '', 24),
(15, '123', 0, '', '', 51),
(16, '123', 0, '', '', 51),
(17, '123', 0, '', '', 51);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `joinperson`
--
ALTER TABLE `joinperson`
  ADD UNIQUE KEY `id` (`id`);

--
-- 資料表索引 `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- 資料表索引 `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表 AUTO_INCREMENT `joinperson`
--
ALTER TABLE `joinperson`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- 使用資料表 AUTO_INCREMENT `platform`
--
ALTER TABLE `platform`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
