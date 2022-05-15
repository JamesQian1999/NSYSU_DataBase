-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 05 月 14 日 18:40
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `DataBase`
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
(1, 'CHIEN CHEN', 1005, '2022-05-03', '10:10-11:00', '演習課', '電腦 麥克風 投影機 雷射筆 ', '2022-05-05'),
(2, '王大明', 1023, '2022-04-26', '11:10-12:00', '讀書', '電腦 投影機 ', '2022-05-15'),
(3, '林小琪', 5012, '2022-05-16', '15:10-16:00', '社團課', '投影機 雷射筆 ', '2022-05-18'),
(8, 'James Qian', 1005, '2022-05-17', '15:10-16:00', 'sleep', '電腦 麥克風 ', '2022-06-02');

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
(3, 'james', 'office', '王大明', 5012, 'jamesqian@gmail.com', 989819023),
(4, 'test', 'test', 'test', 1234, '1234@1234', 987654321);

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
  MODIFY `applyid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `devices_table`
--
ALTER TABLE `devices_table`
  MODIFY `devicesid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_table`
--
ALTER TABLE `member_table`
  MODIFY `memberid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `room_table`
--
ALTER TABLE `room_table`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
