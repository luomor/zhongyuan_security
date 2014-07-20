<?php
/**
 * @title send_mail
 * @description
 * send_mail
 * @author zhangchunsheng423@gmail.com
 * @version V3.0
 * @copyright  Copyright (c) 2010-2014 Luomor Inc. (http://www.luomor.com)
 */
require_once(dirname(__FILE__)."/config.php");
AjaxHead();
if($myurl == '')
    exit('');

$uid  = $cfg_ml->M_LoginID;

!$cfg_ml->fields['face'] && $face = ($cfg_ml->fields['sex'] == '女')? 'dfgirl' : 'dfboy';
$facepic = empty($face)? $cfg_ml->fields['face'] : $GLOBALS['cfg_memberurl'].'/templets/images/'.$face.'.png';
?>
<!--您好，<a href="<?php echo $cfg_memberurl; ?>/index.php" target="_blank"><strong><?php echo $cfg_ml->M_UserName; ?></strong></a>
<div class="userface">
    <a href="<?php echo $cfg_memberurl; ?>/index.php"><img src="<?php echo $facepic;?>" width="20" height="20" /></a>
</div>
<a href="<?php echo $cfg_memberurl; ?>/index_do.php?fmdo=login&dopost=exit#">[退出]</a>-->

您好，<a href="<?php echo $cfg_memberurl; ?>/index.php" target="_blank"><?php echo $cfg_ml->M_UserName; ?></a>
<div class="userface">
    <a href="<?php echo $cfg_memberurl; ?>/index.php"><img src="<?php echo $facepic;?>" width="20" height="20" /></a>
</div>
<span class="s">|</span>
<a href="<?php echo $cfg_memberurl; ?>/index_do.php?fmdo=login&dopost=exit#">[退出]</a>
<span class="s">|</span>