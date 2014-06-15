-- 2014-05-31
create database zhongyuan_security character set utf8 collate utf8_general_ci;
GRANT ALL ON `zhongyuan_security`.* TO `zhongyuan`@localhost IDENTIFIED BY 'zhongyuan123';
FLUSH PRIVILEGES;

drop database zhongyuan_security;

select * from zhongyuan_sysconfig;
select * from zhongyuan_sysconfig where value like '%dede%';

select * from zhongyuan_sysconfig;