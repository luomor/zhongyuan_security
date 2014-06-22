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
select * from zhongyuan_security.zhongyuan_member;
select * from zhongyuan_bbs.zhongyuan_common_member;
select * from zhongyuan_bbs.zhongyuan_ucenter_members;
select * from zhongyuan_sns.zhongyuan_member;

delete from zhongyuan_security.zhongyuan_member where mid=2;

show create table zhongyuan_security.zhongyuan_member;
alter table zhongyuan_security.zhongyuan_member AUTO_INCREMENT=2;