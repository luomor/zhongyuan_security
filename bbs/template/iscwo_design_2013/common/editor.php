<?php echo '唯美设计QQ:474902417商业模板保护！请到官网上购买正版模板 http://addon.discuz.com/?@1439.developer';exit;?>
<link rel="stylesheet" type="text/css" href="data/cache/style_{STYLEID}_editor.css?{VERHASH}" />
<script type="text/javascript" src="{$_G['setting']['jspath']}editor.js?{VERHASH}"></script>
<script type="text/javascript" src="{$_G['setting']['jspath']}bbcode.js?{VERHASH}"></script>
<script type="text/javascript" src="data/cache/common_postimg.js?{VERHASH}"></script>
<script type="text/javascript">
	var editorid = '$editorid';
	var textobj = $(editorid + '_textarea');
	var wysiwyg = (BROWSER.ie || BROWSER.firefox || (BROWSER.opera >= 9)) && parseInt('$editor[editormode]') == 1 ? 1 : 0;
	var allowswitcheditor = parseInt('$editor[allowswitcheditor]');
	var allowhtml = parseInt('$editor[allowhtml]');
	var allowsmilies = parseInt('$editor[allowsmilies]');
	var allowbbcode = parseInt('$editor[allowbbcode]');
	var allowimgcode = parseInt('$editor[allowimgcode]');
	var simplodemode = parseInt('<!--{if $editor[simplemode] > 0}-->1<!--{else}-->0<!--{/if}-->');
	var fontoptions = new Array({lang e_fontoptions});
	var smcols = $_G['setting']['smcols'];
	var custombbcodes = new Array();
	<!--{if $_G['cache']['bbcodes_display'][$_G['groupid']]}-->
		<!--{loop $_G['cache']['bbcodes_display'][$_G['groupid']] $tag $bbcode}-->
			custombbcodes["$tag"] = {'prompt' : '$bbcode[prompt]'};
		<!--{/loop}-->
	<!--{/if}-->
</script>

<div id="{$editorid}_bbar" class="bbar">
	<em id="{$editorid}_tip"></em>
	<span id="{$editorid}_svdsecond"></span>
	<a href="javascript:;" onclick="discuzcode('svd');return false;" id="{$editorid}_svd">{lang post_savedata}</a> |
	<a href="javascript:;" onclick="discuzcode('rst');return false;" id="{$editorid}_rst">{lang post_autosave_restore}</a> &nbsp;&nbsp;
	<!--{if $editor[allowchecklength]}-->
		<a href="javascript:;" onclick="discuzcode('chck');return false;" id="{$editorid}_chck">{lang post_check_length}</a> |
	<!--{/if}-->
	<!--{if $editor[allowtopicreset]}-->
		<a href="javascript:;" onclick="discuzcode('tpr');return false;" id="{$editorid}_tpr">{lang post_topicreset}</a> &nbsp;&nbsp;
	<!--{/if}-->
	<!--{if $editor[allowresize]}-->
		<span id="{$editorid}_resize"><a href="javascript:;" onclick="editorsize('+');return false;">{lang editor_increase}</a> | <a href="javascript:;" onclick="editorsize('-');return false;">{lang editor_narrow}</a><img src="{STATICURL}image/editor/resize.gif" onmousedown="editorresize(event)" /></span>
	<!--{/if}-->
</div>