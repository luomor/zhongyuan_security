zhongyuan_security
==================

zhongyuan security

## 修改hosts文件

### windows:

c:\windows\system32\drivers\etc\hosts

### linux:

/etc/hosts

### macox:

/etc/hosts

### 增加内容

<pre>
222.126.242.105 www.zhongyuan-security.com
222.126.242.105 www.zhongyuan-security.tom
222.126.242.105 bbs.zhongyuan-security.tom
222.126.242.105 sns.zhongyuan-security.tom
222.126.242.105 ucenter.zhongyuan-security.tom
222.126.242.105 www.zhongguohaogongsi.com
222.126.242.105 bbs.zhongguohaogongsi.com
222.126.242.105 sns.zhongguohaogongsi.com
222.126.242.105 ucenter.zhongguohaogongsi.com
</pre>

http://www.zhongyuan-security.com:8080/

222.126.242.105

www.zhongguohaogongsi.com

参考网站

雪球网 http://xueqiu.com/

福汇 fxcm http://www.fxcm-chinese.com/

金融界

www.net.cn

账号 478012339@qq.com

密码 lituo521

###### 网站信息
<pre>
www.zhongguohaogongsi.com:8080/zhongyuan
admin
zhongyuan123
系统邮箱 system@zhongguohaogongsi.com
管理员邮箱 admin@zhongguohaogongsi.com
ucenter http://bbs.zhongguohaogongsi.com/uc_server
http://sns.zhongguohaogongsi.com/admincp.php
http://sns.zhongguohaogongsi.com/space.php

ucenter http://bbs.zhongyuan-security.tom/uc_server
http://sns.zhongyuan-security.tom/admincp.php
http://sns.zhongyuan-security.tom/space.php
</pre>

###### www.zhongguohaogongsi.com:8080/zhongyuan
<pre>
admin
zhongyuan123
系统邮箱 system@zhongguohaogongsi.com
管理员邮箱 admin@zhongguohaogongsi.com
</pre>

###### mysql
<pre>
用户名 root
密码 root
zhongyuan
zhongyuan123

create database zhongyuan_security character set utf8 collate utf8_general_ci;
GRANT ALL ON `zhongyuan_security`.* TO `zhongyuan`@localhost IDENTIFIED BY 'zhongyuan123';
FLUSH PRIVILEGES;
</pre>

###### database
<pre>
zhongyuan_security
zhongyuan_bbs(ucenter)
zhongyuan_sns
zhongyuan_ucenter
</pre>

###### ubuntu
<pre>
sudo chown -R www-data src
sudo chown -R www-data bbs
sudo chown -R www-data sns
sudo chown -R www-data ucenter

sudo chmod -R 775 src
sudo chmod -R 775 bbs
sudo chmod -R 775 sns
</pre>

###### centos
<pre>
sudo chown -R apache src
sudo chown -R apache bbs
sudo chown -R apache sns
sudo chown -R apache ucenter

sudo chmod -R 775 src
sudo chmod -R 775 bbs
sudo chmod -R 775 sns
</pre>
