-- 2014-05-31
create database zhongyuan_security character set utf8 collate utf8_general_ci;
GRANT ALL ON `zhongyuan_security`.* TO `zhongyuan`@localhost IDENTIFIED BY 'zhongyuan123';
FLUSH PRIVILEGES;

drop database zhongyuan_security;

select * from zhongyuan_sysconfig;
select * from zhongyuan_sysconfig where value like '%dede%';

select * from zhongyuan_sysconfig;

-- 2014-06-16
create database zhongyuan_bbs character set utf8 collate utf8_general_ci;
GRANT ALL ON `zhongyuan_bbs`.* TO `zhongyuan`@'%' IDENTIFIED BY 'zhongyuan123';
FLUSH PRIVILEGES;

create database zhongyuan_sns character set utf8 collate utf8_general_ci;
GRANT ALL ON `zhongyuan_sns`.* TO `zhongyuan`@'%' IDENTIFIED BY 'zhongyuan123';
FLUSH PRIVILEGES;

drop database zhongyuan_bbs;
drop database zhongyuan_sns;

select * from zhongyuan_security.zhongyuan_sys_module;

-- 2014-06-22
-- ucenter 包含所有用户，各自应用有各自用户
select * from zhongyuan_security.zhongyuan_member;
select * from zhongyuan_bbs.zhongyuan_common_member;
select * from zhongyuan_bbs.zhongyuan_ucenter_members;
select * from zhongyuan_sns.zhongyuan_member;

select * from zhongyuan_sns.zhongyuan_space;
show create table zhongyuan_sns.zhongyuan_space;

show create table zhongyuan_bbs.zhongyuan_common_member;

select * from zhongyuan_sns.zhongyuan_userapp;

delete from zhongyuan_security.zhongyuan_member where mid=2;

show create table zhongyuan_security.zhongyuan_member;
alter table zhongyuan_security.zhongyuan_member AUTO_INCREMENT=2;

CREATE TABLE `zhongyuan_common_member` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` char(40) NOT NULL DEFAULT '',
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `emailstatus` tinyint(1) NOT NULL DEFAULT '0',
  `avatarstatus` tinyint(1) NOT NULL DEFAULT '0',
  `videophotostatus` tinyint(1) NOT NULL DEFAULT '0',
  `adminid` tinyint(1) NOT NULL DEFAULT '0',
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `groupexpiry` int(10) unsigned NOT NULL DEFAULT '0',
  `extgroupids` char(20) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `credits` int(10) NOT NULL DEFAULT '0',
  `notifysound` tinyint(1) NOT NULL DEFAULT '0',
  `timeoffset` char(4) NOT NULL DEFAULT '',
  `newpm` smallint(6) unsigned NOT NULL DEFAULT '0',
  `newprompt` smallint(6) unsigned NOT NULL DEFAULT '0',
  `accessmasks` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmincp` tinyint(1) NOT NULL DEFAULT '0',
  `onlyacceptfriendpm` tinyint(1) NOT NULL DEFAULT '0',
  `conisbind` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `freeze` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `groupid` (`groupid`),
  KEY `conisbind` (`conisbind`),
  KEY `regdate` (`regdate`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 2014-06-23
select * from zhongyuan_security.zhongyuan_member;
select * from zhongyuan_bbs.zhongyuan_common_member;
select * from zhongyuan_bbs.zhongyuan_ucenter_members;
select * from `zhongyuan_bbs`.zhongyuan_ucenter_memberfields;
select * from zhongyuan_sns.zhongyuan_member;
select * from zhongyuan_sns.zhongyuan_space;

delete from zhongyuan_security.zhongyuan_member where userid='test1';
alter table zhongyuan_security.zhongyuan_member AUTO_INCREMENT=4;

delete from zhongyuan_bbs.zhongyuan_ucenter_members where username='test1';
alter table zhongyuan_bbs.zhongyuan_ucenter_members AUTO_INCREMENT=4;

delete from `zhongyuan_bbs`.zhongyuan_ucenter_memberfields where uid=4;
alter table `zhongyuan_bbs`.zhongyuan_ucenter_memberfields AUTO_INCREMENT=4;

show create table zhongyuan_bbs.zhongyuan_common_member;

INSERT INTO `zhongyuan_security`.zhongyuan_member (`mtype` ,`userid` ,`pwd` ,`uname` ,`sex` ,`rank` ,`money` ,`email` ,`scores` , `matt`, `spacesta` ,`face`,`safequestion`,`safeanswer` ,`jointime` ,`joinip` ,`logintime` ,`loginip` ) VALUES ('个人','test1','e10adc3949ba59abbe56e057f20f883e','test1','','10','0','test1@zhongguohaogongsi.com','0', '0','-10','','0','','1403520536','127.0.0.1','1403520536','127.0.0.1');

-- 2014-06-29
select * from zhongyuan_bbs.zhongyuan_ucenter_members;