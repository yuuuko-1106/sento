-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- ホスト: mysql143.phy.lolipop.lan
-- 生成日時: 2020 年 7 月 09 日 10:45
-- サーバのバージョン: 5.6.23-log
-- PHP のバージョン: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `LAA1141172-m27ep6`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `image_master`
--

CREATE TABLE IF NOT EXISTS `image_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `sento_id` int(11) NOT NULL COMMENT '銭湯ID',
  `image_name` varchar(50) NOT NULL COMMENT 'イメージ写真',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- テーブルのデータのダンプ `image_master`
--

INSERT INTO `image_master` (`id`, `sento_id`, `image_name`) VALUES
(1, 1, 'image1-1'),
(2, 1, 'image1-2'),
(3, 2, 'image2-1'),
(4, 3, 'image3-1'),
(5, 3, 'image3-2'),
(6, 4, 'image4-1'),
(7, 4, 'image4-2'),
(8, 4, 'image4-3'),
(10, 4, 'image4-4'),
(11, 5, 'image5-1'),
(12, 5, 'image5-2'),
(13, 5, 'image5-3'),
(14, 5, 'image5-4'),
(15, 5, 'image5-5'),
(16, 5, 'image5-6'),
(17, 5, 'image5-7'),
(18, 5, 'image5-8'),
(19, 5, 'image5-8'),
(20, 5, 'image5-9'),
(21, 5, 'image5-10'),
(22, 5, 'image5-11'),
(23, 7, 'image7-1'),
(24, 7, 'image7-2'),
(25, 7, 'image7-3'),
(26, 7, 'image7-4'),
(27, 7, 'image7-5'),
(28, 8, 'image8-1'),
(29, 8, 'image8-2'),
(30, 8, 'image8-3'),
(31, 8, 'image8-4'),
(32, 9, 'image9-1'),
(33, 9, 'image9-2'),
(34, 9, 'image9-3'),
(35, 10, 'image10-1'),
(36, 10, 'image10-2'),
(37, 10, 'image10-3'),
(38, 10, 'image10-4'),
(39, 11, 'image11-1'),
(40, 11, 'image11-2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
