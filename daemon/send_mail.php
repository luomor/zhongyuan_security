<?php
/**
 * @title send_mail
 * @description
 * send_mail
 * @author zhangchunsheng423@gmail.com
 * @version V3.0
 * @copyright  Copyright (c) 2010-2014 Luomor Inc. (http://www.luomor.com)
 */
error_reporting(~E_ALL);
/*$to = "zhangchunsheng@yongche.com";
$subject = "review code";
$txt = "review code";
$headers = "From: noreply@yongche.com" . "\r\n";

mail($to, $subject, $txt, $headers);*/

require_once("email.class.php");
$smtpserver = "smtp.exmail.qq.com";
$smtpserverport = 25;
$smtpusermail = "noreply@zhongguohaogongsi.com";
$smtpemailto = "478012339@qq.com,82342367@qq.com";
$smtpuser = "noreply@zhongguohaogongsi.com";
$smtppass = "zhongyuan123";
$mailtitle = "欢迎注册中国好公司";
$mailcontent = "欢迎注册中国好公司";
$mailtype = "TXT";
$smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
$smtp->debug = false;
$smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);