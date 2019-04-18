SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `list` (
  `Id` int(11) NOT NULL,
  `fromname` varchar(255) NOT NULL DEFAULT '',
  `toname` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `lastdate` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `list` (`Id`, `fromname`, `toname`, `content`, `lastdate`, `ip`, `qq`, `phone`) VALUES
(1, 'test', 'test', 'test-content', '2019-0418 00:00', '', '', ''),
;

CREATE TABLE `sms` (
  `Id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL DEFAULT '',
  `money` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sms` (`Id`, `key`, `money`) VALUES
(1, 'happytest', 29);

CREATE TABLE `system` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `titlesm` varchar(255) NOT NULL DEFAULT '',
  `school` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `system` (`Id`, `title`, `titlesm`, `school`) VALUES
(1, '校园表白墙', '喜欢就表白吧！', '第一中学');

ALTER TABLE `list`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `sms`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `system`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `list`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `sms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `system`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
