SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `list`;
CREATE TABLE `list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fromname` varchar(255) NOT NULL DEFAULT '',
  `toname` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `lastdate` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

insert into `list`(`Id`,`fromname`,`toname`,`content`,`lastdate`,`ip`,`qq`,`phone`) values
('1','XX','XXXX','XXXX','2017-10-01 08:00','127.0.0.1','10001','10001');
DROP TABLE IF EXISTS  `system`;

CREATE TABLE `system` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `titlesm` varchar(255) NOT NULL DEFAULT '',
  `school` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

insert into `system`(`Id`,`title`,`titlesm`,`school`) values
('1','校园表白墙','喜欢就表白吧！','XX学校');
SET FOREIGN_KEY_CHECKS = 1;