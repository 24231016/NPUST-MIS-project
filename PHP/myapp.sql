-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-11-04 11:06:06
-- 伺服器版本: 10.1.9-MariaDB
-- PHP 版本： 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myapp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `myguests`
--

CREATE TABLE `myguests` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `active_context` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `userid` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `record` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `settime` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `active_title`, `active_context`, `x`, `y`, `userid`, `record`, `settime`) VALUES
(1, 'gra', 'ag', 'agaerg', '12', '12', '1', '', NULL),
(2, 'fsg', 'sdfg', 'dgsfdfg', '12', '12', '1', '123', NULL),
(3, 'sg', 'sdfg', 'sdfgs', '12', '12', '1', '', NULL),
(4, 'asdf', 'asdf', 'asdf', '12', '12', '1', '', NULL),
(5, 'fssafsd', 'asdffasd', 'asdffas', '12', '12', '1', '', NULL),
(6, 'adsf', 'asdf', 'asdfsda', '12', '12', '1', '2017-11-04 17:20:48', NULL),
(7, 'xcgcg', 'gdfgdfgdf', 'gdfgdf', '12', '12', '1', '2017-11-04 17:30:35', NULL),
(8, 'sdf', '1', 'dsaf', '12', '12', '1', '2017-11-04 17:31:58', '2017/11/4/18:20'),
(9, 'afsd', 'asdf', 'asdf', '12', '12', '1', '2017-11-04 17:31:58', '2017/11/4/18:20'),
(10, 'asdf', 'asdf', 'sdafsda', '12', '12', '1', '2017-11-04 17:34:55', '2017-11-07T01:02'),
(11, 'sdfzs', 'sdfzf', 'æ´»å‹•å…§å®¹....', '12', '12', '1', '2017-11-04 17:40:30', '2017-10-30'),
(12, 'adsf', 'asdfads', 'æ´»å‹•å…§å®¹....', '12', '12', '1', '2017-11-04 17:41:46', '2017-11-14'),
(13, 'çŽ‹', 'çŽ‹', 'ä¸­æ–‡', '12', '12', '1', '2017-11-04 17:43:03', '2017-11-07'),
(14, 'é¾', 'é¾', 'é¾', '12', '12', '1', '2017-11-04 17:44:07', '2017-11-14'),
(15, 'é¾', 'é¾', 'é¾', '12', '12', '1', '2017-11-04 17:44:58', '2017-11-15'),
(16, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:47:05', '2017-11-21'),
(17, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:46:13', '2017-11-06'),
(18, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:28:51', '2017/11/4/18:20'),
(19, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:51:33', '2017-11-06'),
(20, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:52:19', '2017-11-21'),
(21, '中', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:52:19', '2017-11-21'),
(22, 'ä¸­', 'ä¸­', 'ä¸­', '12', '12', '1', '2017-11-04 17:56:02', '2017-11-07');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `myguests`
--
ALTER TABLE `myguests`
  ADD UNIQUE KEY `id` (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
