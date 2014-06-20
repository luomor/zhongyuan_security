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
222.126.242.105 www.zhongguohaogongsi.com
222.126.242.105 bbs.zhongguohaogongsi.com
222.126.242.105 sns.zhongguohaogongsi.com
222.126.242.105 ucenter.zhongguohaogongsi.com

127.0.0.1 www.zhongguohaogongsi.com
127.0.0.1 bbs.zhongguohaogongsi.com
127.0.0.1 sns.zhongguohaogongsi.com
127.0.0.1 ucenter.zhongguohaogongsi.com
</pre>

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
test
www.zhongguohaogongsi.com:8080/zhongyuan
admin
zhongyuan123
系统邮箱 system@zhongguohaogongsi.com
管理员邮箱 admin@zhongguohaogongsi.com
dedecms http://www.zhongguohaogongsi.com:8080/zhongyuan/
bbs http://bbs.zhongguohaogongsi.com:8080/admin.php
ucenter http://bbs.zhongguohaogongsi.com:8080/uc_server
http://sns.zhongguohaogongsi.com:8080/admincp.php
http://sns.zhongguohaogongsi.com:8080/space.php

dedecms http://www.zhongguohaogongsi.com/zhongyuan/
ucenter http://bbs.zhongguohaogongsi.com/uc_server
http://sns.zhongguohaogongsi.com/admincp.php
http://sns.zhongguohaogongsi.com/space.php
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

sudo chgrp -R zhang src
sudo chgrp -R zhang bbs
sudo chgrp -R zhang sns
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

sudo chgrp -R didiwuliu src
sudo chgrp -R didiwuliu bbs
sudo chgrp -R didiwuliu sns
</pre>

<pre>
git rm -r src/a --cached
git rm -r src/data --cached
</pre>