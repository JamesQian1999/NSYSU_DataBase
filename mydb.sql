-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-08 15:31:46
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mydb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `apply_table`
--

CREATE TABLE `apply_table` (
  `applyid` int(10) NOT NULL,
  `rentname` varchar(20) NOT NULL,
  `roomid` int(10) NOT NULL,
  `date` date NOT NULL,
  `class` text NOT NULL,
  `used` text NOT NULL,
  `devices` text NOT NULL,
  `returndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `apply_table`
--

INSERT INTO `apply_table` (`applyid`, `rentname`, `roomid`, `date`, `class`, `used`, `devices`, `returndate`) VALUES
(1, 'B053040042', 5012, '2020-05-08', '2. 9:10-10:00', '上課', '電腦 麥克風 投影機 雷射筆 ', '2020-05-08'),
(2, 'B053040042', 1006, '2020-05-12', '5. 13:10-14:00', '報告', '電腦 麥克風 投影機 雷射筆 ', '2020-05-13'),
(3, 'B065090027', 9032, '2020-05-08', '2. 9:10-10:00', '睡覺', '麥克風 雷射筆 ', '2020-05-13'),
(4, 'B053040000', 1005, '2020-05-12', '5. 13:10-14:00', 'meeting', '電腦 ', '2020-05-20');

-- --------------------------------------------------------

--
-- 資料表結構 `devices_table`
--

CREATE TABLE `devices_table` (
  `devicesid` int(11) NOT NULL,
  `devicesname` text NOT NULL,
  `isborrowed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member_table`
--

CREATE TABLE `member_table` (
  `memberid` int(10) NOT NULL,
  `id` text NOT NULL,
  `pw` text NOT NULL,
  `name` text NOT NULL,
  `lab` int(10) NOT NULL,
  `email` text NOT NULL,
  `telephone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member_table`
--

INSERT INTO `member_table` (`memberid`, `id`, `pw`, `name`, `lab`, `email`, `telephone`) VALUES
(1, 'admin', 'admin', '系統管理員', 4444, 'admin@gmail.com', 963258741),
(2, 'office', 'office', '系辦', 5002, 'office@gmail.com', 73259524),
(3, 'B053040000', '4321', 'qq', 1111, 'qqqq@gmail.com', 46564646),
(4, 'B065090027', '0612', 'pointer', 5000, 'pointer@gmail.com', 912365489),
(5, 'B053040042', '783657', 'meng', 9999, 'meng@gmail.com', 987654321);

-- --------------------------------------------------------

--
-- 資料表結構 `room_table`
--

CREATE TABLE `room_table` (
  `roomid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `apply_table`
--
ALTER TABLE `apply_table`
  ADD PRIMARY KEY (`applyid`);

--
-- 資料表索引 `devices_table`
--
ALTER TABLE `devices_table`
  ADD PRIMARY KEY (`devicesid`);

--
-- 資料表索引 `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`memberid`);

--
-- 資料表索引 `room_table`
--
ALTER TABLE `room_table`
  ADD PRIMARY KEY (`roomid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `apply_table`
--
ALTER TABLE `apply_table`
  MODIFY `applyid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `devices_table`
--
ALTER TABLE `devices_table`
  MODIFY `devicesid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_table`
--
ALTER TABLE `member_table`
  MODIFY `memberid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `room_table`
--
ALTER TABLE `room_table`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
