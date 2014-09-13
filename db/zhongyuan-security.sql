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

-- 2014-07-08
create database fixedasset character set utf8;
show create database zhongyuan_bbs;
/**
* CREATE DATABASE `zhongyuan_bbs` /*!40100 DEFAULT CHARACTER SET utf8 */

drop table fixedAsset.user;
drop table fixedAsset.hostcomputer;
drop table fixedAsset.mobile;
drop table fixedAsset.notebook;
create table fixedAsset.user(
	userId varchar(20) comment '用户ID',
	userName varchar(30) comment '用户姓名',
	department varchar(100) comment '部门',
	phone varchar(40) comment '电话',
	mail varchar(40) comment '电子邮箱'
) comment '用户表';

create table fixedAsset.hostcomputer(
	newId varchar(20) comment '新ID',
	oldId varchar(30) comment '旧ID(弃用)',
	brand varchar(40) comment '品牌',
	cpu varchar(20) comment 'CPU',
	cpuFrequency varchar(10) comment 'CPU频率',
	ram varchar(10) comment '内存',
	hd varchar(10) comment '硬盘',
	mac varchar(20) comment 'Mac地址',
	price Decimal(10,2) comment '价格',
	purpose varchar(50) comment '用途',
	position varchar(100) comment '位置',
	remark varchar(100) comment '备注'
) comment '主机表';

create table fixedAsset.mobile(
	newId varchar(20) comment 'ID',
	deviceName varchar(100) comment '设备名称',
	type varchar(50) comment '类型',
	configure varchar(250) comment '配置',
	price decimal(10,2) comment '价格',
	purpose varchar(50) comment '用途',
	remark varchar(100) comment '备注'
) comment '移动设备';

create table fixedAsset.monitor(
	newId varchar(20) comment 'ID',
	oldId varchar(20) comment '旧id',
	brand varchar(20) comment '品牌',
	size varchar(10) comment '大小',
	screenType varchar(10) comment '屏幕类型',
	purpose varchar(50) comment '用途',
	position varchar(100) comment '位置',
	remark varchar(100) comment '备注'
) comment '显示器';

create table fixedAsset.notebook(
	newId varchar(20) comment '新ID',
	oldId varchar(20) comment '旧ID(弃用)',
	type varchar(50) comment '类型',
	cpu varchar(20) comment 'CPU',
	ram varchar(10) comment '内存',
	hd varchar(10) comment '硬盘',
	price Decimal(10,2) comment '价格',
	purpose varchar(50) comment '用途',
	serviceCode varchar(100) comment '快读服务代码',
	remark varchar(100) comment '备注',
	Mac1 varchar(20) comment 'Mac地址1',
	Mac2 varchar(20) comment 'Mac地址2'
) comment '笔记本';

create table fixedAsset.officeequipment(
	newId varchar(20) comment 'ID',
	equipmentName varchar(100) comment '设备名称',
	price decimal(10,2) comment '价格',
	purpose varchar(50) comment '用途',
	positon varchar(100) comment '位置',
	supplier varchar(100) comment '供应商',
	remark varchar(100) comment '备注'
) comment '办公设备';

create table fixedAsset.officefurniture(
	newId varchar(20) comment 'ID',
	furnitureName varchar(100) comment '家具名',
	amount int(11) comment '数量',
	price decimal(10,2) comment '价格',
	positon varchar(100) comment '位置',
	supplier varchar(100) comment '供应商',
	remark varchar(100) comment '备注'
) comment '办公家具';

create table fixedAsset.otherequipment(
	newId varchar(20) comment 'ID',
	equipmentName varchar(100) comment '设备名',
	supplier varchar(100) comment '供应商',
	price decimal(10,2) comment '价格',
	remark varchar(100) comment '备注'
) comment '其他设备';

create table fixedAsset.server(
	newId varchar(20) comment '新ID',
	purpose varchar(50) comment '用途',
	brand varchar(40) comment '品牌',
	cpu varchar(20) comment 'CPU',
	cpuFrequency varchar(10) comment 'CPU频率',
	ram varchar(10) comment '内存',
	ramSize varchar(10) comment '内存大小',
	ramFrequency varchar(10) comment '内存频率',
	hd varchar(10) comment '硬盘',
	price Decimal(10,2) comment '价格',
	position varchar(100) comment '位置',
	mac varchar(20) comment 'Mac地址',
	ipRange varchar(250) comment 'IP范围',
	remark varchar(100) comment '备注'
) comment '服务器';

create table fixedAsset.virtualequipment(
	newId varchar(20) comment 'ID',
	equipmentName varchar(100) comment '设备名',
	supplier varchar(100) comment '供应商',
	price decimal(10,2) comment '价格',
	remark varchar(100) comment '备注'
) comment '虚拟设备表';

create table fixedAsset.equipment(
	equipmentId varchar(20) comment 'ID',
	equipmentName varchar(20) comment '设备名称',
	equipmentSqlName varchar(30) comment '设备表名',
	lastUserId varchar(20) comment '最后领用人',
	purchaseDate datetime comment '购买日期',
	possessDate datetime comment '领用日期',
	reject int(11) comment '报废',
	rejectDate datetime comment '报废日期'
) comment '设备汇总表';

select * from fixedAsset.user;

drop table fixedAsset.authuser;
create table fixedAsset.authuser(
	uid varchar(20) comment 'uid',
	pwd varchar(600) comment 'pwd',
	token varchar(100) comment 'token',
	lastLoginTime datetime comment 'lastLoginTime',
	uName varchar(40) comment 'uName'
) comment '用户表';
select * from fixedAsset.authuser;
select * from fixedasset.authuser;
show Variables like '%table_names';

insert into fixedAsset.authuser(uid,pwd,token,lastLoginTime,uName) values('admin','29cb0befa96eed5820ae43b4708b8a9d4518d17f5312881b1b4c73d1025f23eaee5f734c4f0c8c4499605c5c91478e0318e81e78a262779f6520ab9e1e3ca47c','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','2014-07-09 12:40:00','admin');

select * from zhongyuan_bbs.zhongyuan_common_style;
select * from zhongyuan_bbs.zhongyuan_common_stylevar;
select * from zhongyuan_bbs.zhongyuan_common_stylevar where substitute like '%iscwo_design_2013%';

select * from zhongyuan_bbs.zhongyuan_forum_forum;

-- 2014-09-14
select * from zhongyuan_security.zhongyuan_arctype;
show create table zhongyuan_security.zhongyuan_arctype;
CREATE TABLE `zhongyuan_arctype` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `reid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `topid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sortrank` smallint(5) unsigned NOT NULL DEFAULT '50',
  `typename` char(30) NOT NULL DEFAULT '',
  `typedir` char(60) NOT NULL DEFAULT '',
  `isdefault` smallint(6) NOT NULL DEFAULT '0',
  `defaultname` char(15) NOT NULL DEFAULT 'index.html',
  `issend` smallint(6) NOT NULL DEFAULT '0',
  `channeltype` smallint(6) DEFAULT '1',
  `maxpage` smallint(6) NOT NULL DEFAULT '-1',
  `ispart` smallint(6) NOT NULL DEFAULT '0',
  `corank` smallint(6) NOT NULL DEFAULT '0',
  `tempindex` char(50) NOT NULL DEFAULT '',
  `templist` char(50) NOT NULL DEFAULT '',
  `temparticle` char(50) NOT NULL DEFAULT '',
  `namerule` char(50) NOT NULL DEFAULT '',
  `namerule2` char(50) NOT NULL DEFAULT '',
  `modname` char(20) NOT NULL DEFAULT '',
  `description` char(150) NOT NULL DEFAULT '',
  `keywords` varchar(60) NOT NULL DEFAULT '',
  `seotitle` varchar(80) NOT NULL DEFAULT '',
  `moresite` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sitepath` char(60) NOT NULL DEFAULT '',
  `siteurl` char(50) NOT NULL DEFAULT '',
  `ishidden` smallint(6) NOT NULL DEFAULT '0',
  `cross` tinyint(1) NOT NULL DEFAULT '0',
  `crossid` text,
  `content` text,
  `smalltypes` text,
  PRIMARY KEY (`id`),
  KEY `reid` (`reid`,`isdefault`,`channeltype`,`ispart`,`corank`,`topid`,`ishidden`),
  KEY `sortrank` (`sortrank`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

alter table zhongyuan_security.zhongyuan_arctype change column `typedir` `typedir` char(255) NOT NULL DEFAULT '';

select * from zhongyuan_bbs.zhongyuan_common_setting where skey like 'image%';
select * from zhongyuan_bbs.zhongyuan_common_setting where skey like 'js%';