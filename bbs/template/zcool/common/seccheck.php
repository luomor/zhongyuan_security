<?php echo '唯美设计QQ:474902417商业模板保护！请到官网上购买正版模板 http://addon.discuz.com/?@1439.developer';exit;?>
{eval
	$_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
	$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
	$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
	$sectpldefault = $sectpl;
	$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
	$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
	$secshow = !isset($secshow) ? 1 : $secshow;
	$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;
}
<!--{block seccheckhtml}-->
<input name="sechash" type="hidden" value="$sechash" />
<!--{if $sectpl}-->
	<!--{if $secqaacheck}-->
		{$sectplqaa[0]}{lang secqaa}{$sectplqaa[1]}<input name="secanswer" id="secqaaverify_$sechash" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '$sechash')" tabindex="$sectabindex" />
		<a href="javascript:;" onclick="updatesecqaa('$sechash');doane(event);" class="xi2">{lang seccode_change}</a>
		<span id="checksecqaaverify_$sechash"><img src="{STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
		$sectplqaa[2]<span id="secqaa_$sechash"></span>
		<!--{if $secshow}--><script type="text/javascript" reload="1">updatesecqaa('$sechash');</script><!--{/if}-->
		$sectplqaa[3]
	<!--{/if}-->
	<!--{if $seccodecheck}-->
		{$sectplcode[0]}{lang seccode}{$sectplcode[1]}<input name="seccodeverify" id="seccodeverify_$sechash" type="text" autocomplete="off" style="{if $_G[setting][seccodedata][type] != 1}ime-mode:disabled;{/if}width:100px" class="txt px vm" onblur="checksec('code', '$sechash')" tabindex="$sectabindex" />
		<a href="javascript:;" onclick="updateseccode('$sechash');doane(event);" class="xi2">{lang seccode_change}</a>
		<span id="checkseccodeverify_$sechash"><img src="{STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
		{$sectplcode[2]}<span id="seccode_$sechash"></span>
		<!--{if $secshow}--><script type="text/javascript" reload="1">updateseccode('$sechash');</script><!--{/if}-->
		$sectplcode[3]
	<!--{/if}-->
<!--{/if}-->
<!--{/block}-->
<!--{eval unset($secshow);}-->
<!--{if empty($secreturn)}-->$seccheckhtml<!--{/if}-->