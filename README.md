zhongyuan_security
==================

zhongyuan security

h3. 修改hosts文件

h4. windows:

c:\windows\system32\drivers\etc\hosts

h4. linux:

/etc/hosts

h4. macox:

/etc/hosts

h4. 增加内容

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

h3. www.zhongguohaogongsi.com:8080/zhongyuan
h4. admin
h4. zhongyuan123
h4. 系统邮箱 system@zhongguohaogongsi.com
h4. 管理员邮箱 admin@zhongguohaogongsi.com

h3. www.zhongguohaogongsi.com:8080/zhongyuan
h4. admin
h4. zhongyuan123
h4. 系统邮箱 system@zhongguohaogongsi.com
h4. 管理员邮箱 admin@zhongguohaogongsi.com

h3. mysql
h4. 用户名 root
h4. 密码 root

h3. database
h4. zhongyuan_security
h4. zhongyuan_bbs(ucenter)
h4. zhongyuan_sns
h4. zhongyuan_ucenter

h3. ubuntu
h4. sudo chown -R www-data src
h4. sudo chown -R www-data bbs
h4. sudo chown -R www-data sns
h4. sudo chown -R www-data ucenter

h3. centos
h4. sudo chown -R apache src
h4. sudo chown -R apache bbs
h4. sudo chown -R apache sns
h4. sudo chown -R apache ucenter