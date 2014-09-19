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

<pre>
222.126.242.105

www.zhongguohaogongsi.com

参考网站
雪球网 http://xueqiu.com/
福汇 fxcm http://www.fxcm-chinese.com/
金融界
和讯

www.net.cn
账号 478012339@qq.com
密码 lituo521
</pre>

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
html5
123456
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

###### php
<pre>
short_open_tag = On
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

sudo chgrp -R groupname src
sudo chgrp -R groupname bbs
sudo chgrp -R groupname sns
</pre>

<pre>
git rm -r src/a --cached
git rm -r src/data --cached
</pre>

###### cookie
<pre>
dedecms
cookie.helper.php
PutCookie
setcookie($key, $value, time()+$kptime, $pa,$cfg_domain_cookie);
cookie加密码: Sk6SeSxPGRPyEDRQgOO7QipGqPA4cl3
跨域共享cookie的域名: .zhongguohaogongsi.com

bbs
config/config_global.php
$_config['cookie']['cookiedomain'] = '.zhongguohaogongsi.com';

sns
config.php
$_SC['cookiedomain'] 	= '.zhongguohaogongsi.com';

ucenter
config.inc.php
define('UC_COOKIEDOMAIN', '.zhongguohaogongsi.com');
</pre>

###### qqmail
<pre>
zhongguohaogongsi
zhongyuan123

zhongguohaogongsi@163.com
zhongyuan123

MX记录 mxbiz1.qq.com. 5
MX记录 mxbiz2.qq.com. 10

http://mail.zhongguohaogongsi.com/
http://exmail.qq.com/

用户名:admin@zhongguohaogongsi.com
密码:zhongyuan123

用户名:system@zhongguohaogongsi.com
密码:zhongyuan123

用户名:noreply@zhongguohaogongsi.com
密码:zhongyuan123

1、MX记录：
邮件服务器名：mxbiz1.qq.com.   优先级：5
邮件服务器名：mxbiz2.qq.com.   优先级：10

2、使用mai.l登陆地址的别名记录：
别名/CNAME：mail (请注意，这里只能用mail，不可以用其他内容)
服务器名：exmail.qq.com

3、为了避免邮件被对方误拦，建议添加SPF记录（用TXT记录）
TXT记录值为：v=spf1 include:spf.mail.qq.com ~all
</pre>

###### 申请企业qq
<pre>
    http://qq.pindie.cn/
</pre>