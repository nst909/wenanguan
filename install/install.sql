SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";</explode>
SET time_zone = "+00:00";</explode>
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;</explode>
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;</explode>
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;</explode>
/*!40101 SET NAMES utf8mb4 */;</explode>
CREATE TABLE IF NOT EXISTS `sillyli_config` (
  `id` int(10) NOT NULL,
  `k` text NOT NULL,
  `v` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;</explode>
INSERT INTO `sillyli_config` (`id`, `k`, `v`) VALUES
(1, 'admin_user', 'admin'),
(2, 'admin_pwd', '123456'),
(3, 'title', '文案馆-书写关于你的文案。'),
(4, 'keywords', '文案馆,搜文案,写文案,找文案'),
(5, 'description', '文案馆是基于PHP语言构成的一款新型网络文案书写程序，被人们广泛用于书写文案。'),
(6, 'footer', '文案馆-书写关于你的文案。'),
(7, 'ad', ''),
(8, 'qq', '925942888
  .....................
  +6.66963'),
(9, '163music', ''),
(10, 'beian', ''),
(11, 'time', 'sillylistuptimePOIJ7892BXS');</explode>
CREATE TABLE IF NOT EXISTS `sillyli_lovemsg` (
  `id` int(10) NOT NULL,
  `qq` text NOT NULL,
  `realname` text NOT NULL,
  `towho` text NOT NULL,
  `msg` text NOT NULL,
  `time` text NOT NULL,
  `zan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;</explode>
INSERT INTO `sillyli_lovemsg` (`id`, `qq`, `realname`, `towho`, `msg`, `time`, `zan`) VALUES
(1, '925942888', '花海', '网易云', '君子在下位则多谤，在上位则多誉；小人在下位则多誉，在上位则多谤', 'sillylistuptimePOIJ7892BXS', '9'),
(2, '925942888', '花海', '原创', '欢迎大家使用文案馆程序，有任何问题可以进QQ群：893196615交流讨论！', 'sillylistuptimePOIJ7892BXS', '9');</explode>
CREATE TABLE IF NOT EXISTS `sillyli_reply` (
  `id` int(10) NOT NULL,
  `gid` text NOT NULL,
  `qq` text NOT NULL,
  `nname` text NOT NULL,
  `reply` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;</explode>
ALTER TABLE `sillyli_config`
  ADD PRIMARY KEY (`id`);</explode>
ALTER TABLE `sillyli_lovemsg`
  ADD PRIMARY KEY (`id`);</explode>
ALTER TABLE `sillyli_reply`
  ADD PRIMARY KEY (`id`);</explode>
ALTER TABLE `sillyli_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;</explode>
ALTER TABLE `sillyli_lovemsg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;</explode>
ALTER TABLE `sillyli_reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;</explode>
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;</explode>
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;</explode>
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;</explode>