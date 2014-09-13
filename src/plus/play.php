<?php
//系统设置为维护状态可访问
require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once(DEDEINC.'/arc.archives.class.php');
$t1 = ExecTime();
if(empty($okview)) $okview = '';
if(isset($arcID)) $aid = $arcID;
if(!isset($dopost)) $dopost = '';
$arcID = $aid = (isset($aid) && is_numeric($aid)) ? $aid : 0;
$play = $play = (isset($play) && is_numeric($play)) ? $play : 1;
$width =  650;
$height =  480;

if($aid==0) die(" Request Error! ");
$arc = new Archives($aid);
if($arc->IsError) ParamError();
$players = $arc->addTableRow['players'];

function play($players,$url)
{
	global $width,$height;
	if($players=='flash'){
		$play ="<embed src=\"{$url}\"  type=\"application/x-shockwave-flash\" width=\"{$width}\" height=\"{$height}\"></embed>";
		return $play;
		exit();
	}else if($players=='media'){
		$play = "<object id=\"player\" height=\"{$height}\" width=\"{$width}\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\"> 
			<param name=\"AutoStart\" VALUE=\"-1\"> 
			<param name=\"url\" value=\"{$url}\"> 
			<param name=\"PlayCount\" VALUE=\"1\"> 
			<param name=\"volume\" value=\"50\"> 
			<param name=\"mute\" value=\"0\"> 
			<param name=\"uiMode\" value=\"full\"> 
			<param name=\"windowlessVideo\" value=\"0\"> 
			<param name=\"fullScreen\" value=\"0\"> 
			<param name=\"enableErrorDialogs\" value=\"-1\"> 
			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"ImageWindow,controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 
			</object>";
		return $play;
		exit();
	}else if($players=='real'){
		$play = "
		<OBJECT ID=video1 CLASSID=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" HEIGHT={$height} WIDTH={$width}> 
			<param name=\"_ExtentX\" value=\"9313\"> 
			<param name=\"_ExtentY\" value=\"7620\"> 
			<param name=\"AUTOSTART\" value=\"1\"> 
			<param name=\"SHUFFLE\" value=\"0\"> 
			<param name=\"PREFETCH\" value=\"0\"> 
			<param name=\"NOLABELS\" value=\"0\"> 
			<param name=\"SRC\" value=\"{$url}\"> 
			<param name=\"CONTROLS\" value=\"ImageWindow,controlpanel\"> 
			<param name=\"CONSOLE\" value=\"Clip1\"> 
			<param name=\"LOOP\" value=\"0\"> 
			<param name=\"NUMLOOP\" value=\"0\"> 
			<param name=\"CENTER\" value=\"0\"> 
			<param name=\"MAINTAINASPECT\" value=\"0\"> 
			<param name=\"BACKGROUNDCOLOR\" value=\"#000000\">
			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"ImageWindow,controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 
			</OBJECT> ";
		return $play;
		exit();
	}else if($players=='flv'){
		$play = "<embed src=\"flvplayer.swf?file={$url}\"  type=\"application/x-shockwave-flash\" width=\"{$width}\" height=\"{$height}\"></embed>";
		return $play;
		exit();
	}else if($players=='qvod'){
		$play = "<object classid='clsid:F3D0D36F-23F8-4682-A195-74C92B03D4AF' HEIGHT={$height} WIDTH={$width} id='QvodPlayer' name='QvodPlayer' onError=if(window.confirm('请您先安装QvodPlayer软件,然后刷新本页才可以正常播放.')){window.open('http://www.qvod.com/download.htm')}else{self.location='http://www.qvod.com/'}>
			<PARAM NAME='URL' VALUE='{$url}'>
			<PARAM NAME='Autoplay' VALUE='1'>
			</object>";
		return $play;
		exit();
	}else if($playres=='mp3'){
		$play = "<object id=\"player\" height=\"{$height}\" width=\"{$width}\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\"> 
			<param name=\"AutoStart\" VALUE=\"-1\"> 
			<param name=\"url\" value=\"{$url}\"> 
			<param name=\"PlayCount\" VALUE=\"1\"> 
			<param name=\"volume\" value=\"50\"> 
			<param name=\"mute\" value=\"0\"> 
			<param name=\"uiMode\" value=\"full\"> 
			<param name=\"windowlessVideo\" value=\"0\"> 
			<param name=\"fullScreen\" value=\"0\"> 
			<param name=\"enableErrorDialogs\" value=\"-1\"> 
			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 
			</object>";
		return $play;
		exit();
}else if($players=='gvod'){
		$play = "<object classid='clsid:7040AE7C-D539-4ABB-BEA1-B5E58A3D2654' HEIGHT={$height} WIDTH={$width} id='GvodPlayer' name='GvodPlayer' onError=if(window.confirm('请您先安装迅播GVOD 播放器,然后刷新本页才可以正常播放.')){window.open('http://gvod.down.xunlei.com/gvod/gvod.exe')}else{self.location='http://gvod.xunlei.com/'}>
			<PARAM NAME='URL' VALUE='{$url}'>
			<PARAM NAME='Autoplay' VALUE='1'>
			</object>";
		return $play;
		exit();
}else if($players=='youku'){
		$play = "<embed type=\"application/x-shockwave-flash\" src=\"{$url}\" id=\"movie_player\" name=\"movie_player\" bgcolor=\"#FFFFFF\" quality=\"high\" allowfullscreen=\"true\" flashvars=\"isShowRelatedVideo=false&showAd=0&show_pre=1&show_next=1&isAutoPlay=true&isDebug=false&UserID=&winType=interior&playMovie=true&MMControl=false&MMout=false&RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" width=\"{$width}\" height=\"{$height}\">";
		return $play;
		exit();
}else if($players=='tudou'){
		$play = "<object><param name=\"movie\" value=\"{$url}\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><param name=\"wmode\" value=\"opaque\"></param><embed src=\"{$url}\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" wmode=\"opaque\" width=\"{$width}\" height=\"{$height}\"></embed></object>";
		return $play;
		exit();
		}
	
	}

$videolist = $arc->addTableRow['videolist'];
	if(empty($videolist)) {
		ShowMsg('播放列表为空!!!','');	
		exit();
	}
	$play= $play-1;
	$palylist = explode('{li}',$videolist);
	$video = explode('{span}',$palylist[$play]);

	$vurl = $video[1];//当前视频URL
	$vname = $arc->Fields['title'].'-'.$video[0];//当前视频名称
include_once(DEDETEMPLATE.'/plus/play.htm'); 



?>