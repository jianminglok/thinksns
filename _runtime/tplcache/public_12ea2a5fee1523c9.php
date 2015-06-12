<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?><?php else: ?><?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?></title>
<meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
<meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
<?php echo Addons::hook('public_meta');?>
<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<!-- <link href="__THEME__/css/global.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/module.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/menu.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/form.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/jquery.atwho.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" /> -->
<link href="__THEME__/css/css.php?t=css&f=global.css,module.css,menu.css,form.css,jquery.atwho.css&v=<?php echo ($site["sys_version"]); ?>.css" rel="stylesheet" type="text/css" />
<?php if(!empty($appCssList)): ?>
<?php if(is_array($appCssList)): ?><?php $i = 0;?><?php $__LIST__ = $appCssList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cl): ?><?php ++$i;?><?php $mod = ($i % 2 )?><link href="<?php echo APP_PUBLIC_URL;?>/<?php echo ($cl); ?>?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css"/><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php endif; ?>
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>'
// Js语言变量
var LANG = new Array();
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>?v=<?php echo ($site["sys_version"]); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
<!-- <script src="__THEME__/js/jquery-1.7.1.min.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.form.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jwidget_1.0.0.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.atwho.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.caret.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.draggable.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/plugins/core.digg.js?v=<?php echo ($site["sys_version"]); ?>"></script> -->
<script src="__THEME__/js/js.php?t=js&f=jquery-1.7.1.min.js,jquery.form.js,common.js,core.js,module.js,module.common.js,jwidget_1.0.0.js,jquery.atwho.js,jquery.caret.js,ui.core.js,ui.draggable.js,plugins/core.comment.js,plugins/core.digg.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/plugins/core.digg.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<?php echo Addons::hook('public_head',array('uid'=>$uid));?>
</head>
<body>

<div id="body_page" name='body_page'>
    <div id="body-bg">
    <div id="header" name="header">
    	<?php echo constant(" 未登录时 *");?>
    	<?php if( !isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="reg">
                    <a href="<?php echo U('public/Register');?>"><?php echo L('PUBLIC_REGISTER');?></a>
                    <i class="vline"> | </i>
                    <a href="<?php echo U('public/Passport/login');?>"><?php echo L('PUBLIC_LOGIN');?></a>
                </div>
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>><a href="<?php echo SITE_URL;?>"></a></div>
                <!-- logo -->
                <div class="nav">
                    <ul>
                        <?php if(is_array($site_guest_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_guest_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$st): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li <?php if(APP_NAME == $st['app_name'] || $_GET['page'] == $st['app_name']): ?> class="current" <?php endif; ?> ><a href="<?php echo ($st["url"]); ?>" target="<?php echo ($st["target"]); ?>" class="app"><?php echo ($st["navi_name"]); ?></a>
                            <?php if(isset($st['child'])): ?><div model-node="drop_menu_list" class="dropmenu" style="width:100px;display:none;">
                                <dl class="acc-list" >
                                    <?php if(is_array($st["child"])): ?><?php $i = 0;?><?php $__LIST__ = $st["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$stc): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($stc["url"]); ?>" target="<?php echo ($stc["target"]); ?>"><?php echo (getshort($stc["navi_name"],6)); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                </dl>
                            </div><?php endif; ?>
                          </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
		</div><?php endif; ?>

		<?php echo constant(" 登录后 *");?>
		<?php if(isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>>
                    <a href="<?php echo SITE_URL;?>"></a>
                </div>
                <!-- logo -->
                <?php if($user['is_init'] == 1): ?>
                <div class="nav">
                    <ul>
                        <?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$st): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li <?php if(APP_NAME == $st['app_name'] || $_GET['page'] == $st['app_name']): ?> class="current" <?php endif; ?> ><a href="<?php echo ($st["url"]); ?>" target="<?php echo ($st["target"]); ?>" class="app"><?php echo ($st["navi_name"]); ?></a>
                            <?php if(isset($st['child'])): ?><div model-node="drop_menu_list" class="dropmenu" style="width:100px;display:none;">
                                <dl class="acc-list" >
                                    <?php if(is_array($st["child"])): ?><?php $i = 0;?><?php $__LIST__ = $st["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$stc): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($stc["url"]); ?>" target="<?php echo ($stc["target"]); ?>"><?php echo (getshort($stc["navi_name"],6)); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                </dl>
                            </div><?php endif; ?>
                          </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                        <li style="*z-index:100;">
                        <a href="###" class="app">应用</a>
                        <div model-node="drop_menu_list" class="dropmenu" style="width:370px;left:-50px;display:none;z-index:100;">
                            <ul class="acc-list app-list clearfix">
                                <?php if(is_array($site_nav_apps)): ?><?php $i = 0;?><?php $__LIST__ = $site_nav_apps?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$li): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo U($li['app_name']);?>"><img src="<?php echo empty($li['icon_url_large']) ? APPS_URL.'/'.$li['app_name'].'/Appinfo/icon_app_large.png':$li['icon_url_large']; ?>" width="50" height="50" /><?php echo (getshort($li["app_alias"],4)); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                <li><a href="<?php echo U('public/App/addapp');?>"><img src="__THEME__/image/more.png" width="50" height="50" />更多应用</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
                 <?php if(($user["is_init"])  ==  "0"): ?><div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right"><a href="javascript:void(0);" class="app name" style="cursor:default">欢迎，<?php echo ($user['uname']); ?></a></li>
                        <li class="dorp-right"><a href="<?php echo U('public/Passport/logout');?>" class="app name">退出</a></li>
                    </ul>
                  </div>
                <?php else: ?>
                <div class="search">
                    <div id="mod-search" model-node="drop_search">
                    <form name="search_feed" id="search_feed" method="get" action="<?php echo U('public/Search/index');?>">
                        <input name="app" value="public" type="hidden"/>
                        <input name="mod" value="Search" type="hidden"/>
                        <input type="hidden" name="t" value="2"/>
                        <input type="hidden" name="a" value="public"/>
                        <dl>
                            <dt class="clearfix"><input id="search_input" class="s-txt left"  type="text" value="搜微博 / 昵称 / 标签" onfocus="this.value=''" onblur="setTimeout(function(){ $('#search-box').remove();} , 200);if(this.value=='') this.value='搜微博 / 昵称 / 标签';" event-node="searchKey" name='k'  autocomplete="off"><a href="javascript:void(0)" class="ico-search left" onclick="if(getLength($('#search_input').val()) && $('#search_input').val()!=='搜微博 / 昵称 / 标签'){ $('#search_feed').submit(); return false;}"></a>
                            </dt>
                        </dl>
                    </form>
                    </div>
                </div> 
                <div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right">
                            <a href="<?php echo ($user['space_url']); ?>" class="username"><?php echo (getshort($user['uname'],6)); ?></a>
                        </li>                       
                        <li model-node="notice" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_MESSAGE');?></a>
                            <div  class="dropmenu" model-node="drop_menu_list">
                            	<ul class="message_list_container message_list_new"  style="display:none">
                                    <li rel="new_folower_count" style="display:none">
                                        <span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                                    <li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>">
                                        <?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                </ul>
                                <dl class="acc-list W-message" >
                                    <dd><a  href="<?php echo U('public/Mention/index');?>">@提到我的</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'receive'));?>">收到的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'send'));?>">发出的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/index');?>">我的私信</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/notify');?>">系统消息</a></dd>
                                    <!-- 消息菜单钩子 -->
                                    <?php echo Addons::hook('header_message_dropmenu');?>
                                <?php if(CheckPermission('core_normal','send_message')){ ?>
                                <dd class="border"><a event-node="postMsg" href="javascript:void(0)" onclick="ui.sendmessage()"><?php echo L('PUBLIC_SEND_PRIVATE_MESSAGE');?>&raquo;</a></dd>
                                <?php } ?>
                                </dl>
                            </div>
                        </li>
                        <li model-node="account" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_ACCOUNT');?></a>
                            <div model-node="drop_menu_list" class="dropmenu" style="width:100px">
                                <dl class="acc-list">
                                <dd><a href="<?php echo U('public/Account/index');?>"><?php echo L('PUBLIC_SETTING');?></a></dd>
                                
                                <?php if(CheckTaskSwitch()): ?>
                                <dd><a href="<?php echo U('public/Task/index');?>">任务中心</a></dd>
                                <dd><a href="<?php echo U('public/Medal/index');?>">勋章馆</a></dd>
                                <?php endif; ?>
                                
                                <dd><a href="<?php echo U('public/Rank/weibo');?>">排行榜</a></dd>

                                <?php if(!isVerified($user['uid'])): ?>
                                <dd><a href="<?php echo U('public/Account/authenticate');?>">申请认证</a></dd>
                                <?php endif; ?>

                                <?php if(isInvite() && CheckPermission('core_normal','invite_user')): ?>
                                <dd><a href="<?php echo U('public/Invite/invite');?>"><?php echo L('PUBLIC_INVITE_COLLEAGUE');?></a></dd>
                                <?php endif; ?>
                                <!-- 个人设置菜单钩子 -->
                                <?php echo Addons::hook('header_account_dropmenu');?>
                                <?php if(CheckPermission('core_admin','admin_login')){ ?>
                                <dd><a href="<?php echo U('admin');?>"><?php echo L('PUBLIC_SYSTEM_MANAGEMENT');?></a></dd>
                                <?php } ?>

                                <dd class="border"><a href="<?php echo U('public/Passport/logout');?>"><?php echo L('PUBLIC_LOGOUT');?>&raquo;</a></dd>
                                <dd></dd>
                                </dl>
                            </div>
                        </li>
                    </ul>
                </div>        
                <?php if(MODULE_NAME !='Register'): ?>
                <div id="message_container" class="layer-massage-box" style="display:none">
                	<ul class="message_list_container" >
                        <li rel="new_folower_count" style="display:none"><span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                		<li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                        <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
 	                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_group_atme" style="display:none"><span></span>，<a href="<?php echo U('group/SomeOne/index');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_group_comment" style="display:none"><span></span>，<a href="<?php echo U('group/SomeOne/index');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li> 
                	</ul>
                <a href="javascript:void(0)" onclick="core.dropnotify.closeParentObj()" class="ico-close1"></a>
                </div>
                <?php endif; ?><?php endif; ?>
        	</div>
        </div>
        <?php if(MODULE_NAME != 'Search'): ?>
        <div id="search"  class="mod-at-wrap search_footer" model-node='search_footer' style="display:none;z-index:-1">
            <div class="search-wrap">
                <div class="input">
                     <form id="search_form" action="<?php echo U('public/Search/index');?>" method="GET">
                        <div class="search-menu" model-node='search_menu' model-args='a=<?php echo ($curApp); ?>&t=<?php echo ($curType); ?>'>
                            <a href="javascript:;" id='search_cur_menu'><?php echo (($curTypeName)?($curTypeName):"全站"); ?><i class="ico-more"></i></a>
                        </div>
                        <input name="app" value="public" type="hidden" />
                        <input name="mod" value="Search" type="hidden" />
                        <input name="a" value="<?php echo ($curApp); ?>" id='search_a' type="hidden"/>
                        <input name="t" value="<?php echo ($curType); ?>" id='search_t' type="hidden"/>
                        <input name="k" value="<?php echo (t($_GET['k'])); ?>" type="text" class="s-txt" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" autocomplete="off">
                        <a class="btn-red left" href="javascript:void(0);" onclick="$('#search_form').submit();"><span class="ico-search"></span></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="mod-at-wrap" id="search_menu" ison='no' style="display:none" model-node="search_menu_ul">
        <div class="mod-at">
            <div class="mod-at-list">
                <ul class="at-user-list">
                    <li onclick="core.search.doShowCurMenu(this)" a='public' t='' typename='<?php echo L('PUBLIC_ALL_WEBSITE');?>'><?php echo L('PUBLIC_ALL_WEBSITE');?></li>
                <?php if(is_array($menuList)): ?><?php $i = 0;?><?php $__LIST__ = $menuList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$m): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($m['app_name'] == $curApp && $m['type_id'] == $curType){
                            $curTypeName = $m['type'];
                        } ?>
                    <li onclick="core.search.doShowCurMenu(this)" a='<?php echo ($m["app_name"]); ?>' t='<?php echo ($m["type_id"]); ?>' typename='<?php echo ($m["type"]); ?>'><?php echo ($m["type"]); ?></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>   
                </ul>
            </div>
        </div>
        </div>
       <?php endif; ?> 
    <script type="text/javascript">
    $(document).ready(function(){
        $("#mod-product dd").hover(function() {
            $(this).addClass("hover");
        },function() {
            $(this).removeClass("hover");
        });
        core.plugInit('search');
    });
    core.plugFunc('dropnotify',function(){
        setTimeout(function(){
            core.dropnotify.init('message_list_container','message_container');
        },320);   
    });
    </script><?php endif; ?>
    </div>
<?php //出现注册提示的页面
$show_register_tips = array('public/Profile','public/Topic','weiba/Index');
if(!$mid && in_array(APP_NAME.'/'.MODULE_NAME,$show_register_tips)){ ?>
<?php $registerConf = model('Xdata')->get('admin_Config:register'); ?>
<!--未登录前-->
<div class="login-no-bg">
  <div class="login-no-box boxShadow clearfix">       
    <div class="login-reg right">
        <?php if($registerConf['register_type'] == 'open'){ ?>
        <a href="<?php echo U('public/Register/index');?>" class="btn-reg">立即注册</a>
        <?php } ?>
        <span>已有帐号？<a href="javascript:quickLogin()">立即登录</a></span>
    </div>
    <p class="left"><span>欢迎来到<?php echo ($site["site_name"]); ?></span>赶紧注册与朋友们分享快乐点滴吧！</p>
  </div>
</div>
<?php } ?>
    <div id="page-wrap">
        <!--<div class="search-box boxShadow mb20 extend-foot">
    <ul class="search-tab">
        <li <?php if($curType==2){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>2,'a'=>'public','k'=>$keyword));?>">微博</a></li>
        <li <?php if($curType==1){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>1,'a'=>'public','k'=>$keyword));?>">用户</a></li>
        <li <?php if($curType==3){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>3,'a'=>'public','k'=>$keyword));?>">标签</a></li>
    </ul>
    <div class="search-content clearfix">
        <div class="search-input">
        <form action="<?php echo U('public/Search/index');?>" name="Search" id="Search" method="get">
        	<input name="app" value="public" type="hidden" id="app"/>
            <input name="mod" value="Search" type="hidden" id="mod"/>
            <input type="hidden" name="t" value="<?php echo ($curType); ?>" id="t"/>
        	<input type="hidden" name="a" value="public" id="a"/>
            <input type="text" value="<?php echo ($keyword); ?>" id="keyword" name="k"><a href="javascript:void(0);" onclick="$('#Search').submit();return false;" class="btn-search"><span>搜索</span></a>
        </form>
        </div>
        <?php if($keyword){ ?>
            <span class="ml15">共搜到<?php echo ($searchResult["count"]); ?>条结果</span>
        <?php } ?>
    </div>
</div>
<script>
function doHighlight(a,b){
    highlightStartTag="<span style='color:red'>";
    highlightEndTag="</span>";
    var c="";
    var i=-1;
    var d=b.toLowerCase();
    var e=a.toLowerCase();
    while(a.length>0){
        i=e.indexOf(d,i+1);
        if(i<0){
            c+=a;
            a="";
        }else{
            if(a.lastIndexOf(">",i)>=a.lastIndexOf("<",i)){
                if(e.lastIndexOf("/script>",i)>=e.lastIndexOf("<script",i)){
                    c+=a.substring(0,i)+highlightStartTag+a.substr(i,b.length)+highlightEndTag;
                    a=a.substr(i+b.length);e=a.toLowerCase();
                    i=-1;
                }
            }
        }
    }
    return c;
};

$.fn.highlight=function(z){
    $(this).each(
        function(){
            $(this).html(doHighlight($(this).html(),z))
        });
    return this;
}

$(document).ready(function(){
var key3 = eval('('+'<?php echo ($jsonKey); ?>'+')');
var curType = '<?php echo ($curType); ?>';
   if(curType == 3){
        $('.u_tag').highlight(key3);
    }else{
        // for(one in key3){
            $('.contents').highlight(key3);
            //$('.ask_title').highlight(key3[one]);
       // }
    }
}); 
</script>-->
        <div id="main-wrap">
        	<div id="col">
				<!--<div id="col1" class="main-left">
    <dl class="left-menu">
    	<dt><a href="<?php echo U('public/Search',array('k'=>t($_GET['k'])));?>"><i class="ico-minus-gray"></i><?php echo L('PUBLIC_ALL_WEBSITE');?></a></dt>
    	<?php if(is_array($menuList)): ?><?php $i = 0;?><?php $__LIST__ = $menuList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$m): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd <?php if($curApp == $m['app_name'] && $curType==$m['type_id']){ echo 'class="current"'; } ?> >
    	<a href="<?php echo U('public/Search',array('k'=>t($_GET['k']),'a'=>$m['app_name'],'t'=>$m['type_id']));?>" ><i class="arrow-current"></i><?php echo L('PUBLIC_SEARCH');?><?php echo ($m["type"]); ?></a>
    	</dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </dl>

    <?php if(!empty($data['tablist'])): ?>
    	<dl class="child-menu">
    	<dt><?php echo L('PUBLIC_ALL');?></dt>
    	<?php if(is_array($data["tablist"])): ?><?php $i = 0;?><?php $__LIST__ = $data["tablist"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$tab): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd <?php if($tabkey == $tab['tabkey'] && $tabvalue==$tab['tabvalue']){ echo 'class="current"'; } ?> >
    		<a href="<?php echo U('public/Search',array('k'=>t($_GET['k']),'a'=>$curApp,'t'=>$curType,'tk'=>$tab['tabkey'],'tv'=>$tab['tabvalue']));?>" ><?php echo ($tab["tabtitle"]); ?> <?php if(($tab["count"])  !=  "0"): ?>(<?php echo ($tab["count"]); ?>)<?php endif; ?></a>
    	</dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </dl>
    <?php endif; ?>
</div>-->
                <div class="search-box boxShadow mb20 extend-foot">
    <ul class="search-tab">
        <li <?php if($curType==2){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>2,'a'=>'public','k'=>$keyword));?>">微博</a></li>
        <li <?php if($curType==1){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>1,'a'=>'public','k'=>$keyword));?>">用户</a></li>
        <li <?php if($curType==3){ ?>class="current"<?php } ?>><a href="<?php echo U('public/Search/index',array('t'=>3,'a'=>'public','k'=>$keyword));?>">标签</a></li>
    </ul>
    <div class="search-content clearfix">
        <div class="search-input">
        <form action="<?php echo U('public/Search/index');?>" name="Search" id="Search" method="get">
        	<input name="app" value="public" type="hidden" id="app"/>
            <input name="mod" value="Search" type="hidden" id="mod"/>
            <input type="hidden" name="t" value="<?php echo ($curType); ?>" id="t"/>
        	<input type="hidden" name="a" value="public" id="a"/>
            <input type="text" value="<?php echo ($keyword); ?>" id="keyword" name="k"><a href="javascript:void(0);" onclick="$('#Search').submit();return false;" class="btn-search"><span>搜索</span></a>
        </form>
        </div>
        <?php if($keyword){ ?>
            <span class="ml15">共搜到<?php echo ($searchResult["count"]); ?>条结果</span>
        <?php } ?>
    </div>
</div>
<script>
function doHighlight(a,b){
    highlightStartTag="<span style='color:red'>";
    highlightEndTag="</span>";
    var c="";
    var i=-1;
    var d=b.toLowerCase();
    var e=a.toLowerCase();
    while(a.length>0){
        i=e.indexOf(d,i+1);
        if(i<0){
            c+=a;
            a="";
        }else{
            if(a.lastIndexOf(">",i)>=a.lastIndexOf("<",i)){
                if(e.lastIndexOf("/script>",i)>=e.lastIndexOf("<script",i)){
                    c+=a.substring(0,i)+highlightStartTag+a.substr(i,b.length)+highlightEndTag;
                    a=a.substr(i+b.length);e=a.toLowerCase();
                    i=-1;
                }
            }
        }
    }
    return c;
};

$.fn.highlight=function(z){
    $(this).each(
        function(){
            $(this).html(doHighlight($(this).html(),z))
        });
    return this;
}

$(document).ready(function(){
var key3 = eval('('+'<?php echo ($jsonKey); ?>'+')');
var curType = '<?php echo ($curType); ?>';
   if(curType == 3){
        $('.u_tag').highlight(key3);
    }else{
        // for(one in key3){
            $('.contents').highlight(key3);
            //$('.ask_title').highlight(key3[one]);
       // }
    }
}); 
</script>
                <div id="col8" class="st-section boxShadow content-bg">
                	<div class="">
                        <!--<?php if(empty($data)){ ?>
                         <div class="note"><?php echo L('PUBLIC_NO_RELATE_DATA');?></div>
                        <?php }else{ ?>
                        <?php if(is_array($data)): ?><?php $i = 0;?><?php $__LIST__ = $data?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$appData): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $_tpl = THEME_PATH.'/'.$key.'/search.html';
                                $this->tVar['appData'] = $appData;
                                if(file_exists($_tpl)){
                                    echo fetch($_tpl, $this->tVar);
                                } ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
                        <?php } ?>-->
                        <!--右边-->
                    <div id="col3" class="st-index-right">
                        <div class="right-wrap">
                            
                             <!-- <div class="attention mb20 clearfix">
                                <h3>与你同地区的人</h3>
                                <?php if($sameLocationUser){ ?>
                                    <ul>
                                      <?php if(is_array($sameLocationUser)): ?><?php $i = 0;?><?php $__LIST__ = $sameLocationUser?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo ($vo['userInfo']['space_url']); ?>" class="face"><img src="<?php echo ($vo['userInfo']['avatar_small']); ?>" /><span><?php echo (getshort($vo['userInfo']['uname'],4)); ?></span></a><?php echo W('FollowBtn', array('fid'=>$vo['userInfo']['uid'], 'uname'=>$vo['userInfo']['uname'], 'follow_state'=>$vo['followState'], 'type'=>'normal'));?></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                    </ul>
                                    <?php }else{ ?>
                                    <p>暂时还没与你同地区的人</p>
                                    <?php } ?>
                            </div> -->
                            <?php echo W('SameUser',array('type'=>3, 'limit'=>12, 'title'=>'与你同地区的人'));?>
                            <?php echo W('SameUser',array('type'=>4, 'limit'=>12, 'title'=>'与你同标签的人'));?>
                            <!-- <div class="attention mb20 clearfix">
                                <h3>与你同职业的人</h3>
                                <?php if(￥sameCategoryUser){ ?>
                                    <ul>
                                      <?php if(is_array($sameCategoryUser)): ?><?php $i = 0;?><?php $__LIST__ = $sameCategoryUser?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo ($vo['userInfo']['space_url']); ?>" class="face"><img src="<?php echo ($vo['userInfo']['avatar_small']); ?>" /><span><?php echo (getshort($vo['userInfo']['uname'],4)); ?></span></a><?php echo W('FollowBtn', array('fid'=>$vo['userInfo']['uid'], 'uname'=>$vo['userInfo']['uname'], 'follow_state'=>$vo['followState'], 'type'=>'normal'));?></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                    </ul>
                                <?php }else{ ?>
                                    <p>暂时还没与你同职业的人</p>
                                <?php } ?>
                            </div>  -->                      
                        </div>
                    </div>
                    <div id="col5" class="st-index-main">
                    <div class="extend-foot">
                    <!--feednav-->
                    <div class="feed-nav">

                     
        
                    <div class="tab-title">
    
                    
                    </div>
                    </div>
                    <!--feed list-->
                    <?php if($searchResult.data){ ?>
                      <div class="search-main">
	<!--搜索列表-->
	<div class="sperson-feedlist">
	<?php if($keyword != ""){ ?>
	<?php if(($searchResult["data"])  !=  ""): ?><?php if(is_array($searchResult["data"])): ?><?php $i = 0;?><?php $__LIST__ = $searchResult["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl class="feed_list">
		<dt class="face"><a href="<?php echo ($vo['space_url']); ?>"><img src="<?php echo ($vo['avatar_small']); ?>" event-node='face_card' uid='<?php echo ($vo['uid']); ?>' width="50" height="50"></a></dt>
		
		<dd class="person-info">
			<p class="hd">
				<span class="right">
					<?php if($mid != $vo['uid']): ?><?php echo W('FollowBtn', array('fid'=>$vo['uid'], 'uname'=>$vo['uname'], 'follow_state'=>$vo['follow_state'], 'type'=>'normal'));?><?php endif; ?>
				</span>
				<span style="font-size:14px;width:270px;display:block">
					<a href="<?php echo ($vo['space_url']); ?>" event-node='face_card' uid='<?php echo ($vo['uid']); ?>'><span class="contents"><?php echo ($vo['uname']); ?></span></a>
					<?php if(is_array($vo["userGroupData"])): ?><?php $i = 0;?><?php $__LIST__ = $vo["userGroupData"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v1): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer;" src="<?php echo ($v1['user_group_icon_url']); ?>" title="<?php echo ($v1['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            	</span>
			</p>
			<p class="area"><?php if($vo['sex'] == 1): ?><i class="ico-male"></i><?php else: ?><i class="ico-female"></i><?php endif; ?>&nbsp;<?php echo ($vo['location']); ?></p>
			<p class="action"><?php echo L('PUBLIC_FOLLOWING');?>：<a href="<?php echo U('public/Profile/following', array('uid'=>$vo['uid']));?>"><?php echo (($vo['usercount']['following_count'])?($vo['usercount']['following_count']):0); ?></a><i class="vline">|</i><?php echo L('PUBLIC_FOLLOWERS');?>：<a href="<?php echo U('public/Profile/follower', array('uid'=>$vo['uid']));?>"><?php echo (($vo['usercount']['follower_count'])?($vo['usercount']['follower_count']):0); ?></a><i class="vline">|</i><?php echo L('PUBLIC_WEIBO');?>：<a href="<?php echo ($vo['space_url']); ?>"><?php echo (($vo['usercount']['weibo_count'])?($vo['usercount']['weibo_count']):0); ?></a></p>
			<?php if($vo['intro']){ ?>
			<p class="info">个人简介：<?php echo ($vo['intro']); ?></p>
			<?php } ?>
			<?php if($vo['userTag']){ ?>
			<p class="tags"><?php echo L('PUBLIC_TAG');?>：<?php if(is_array($vo['userTag'])): ?><?php $i = 0;?><?php $__LIST__ = $vo['userTag']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$u_t_v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a href="<?php echo U('public/Search/index',array('t'=>3,'a'=>'public','k'=>$u_t_v));?>"><span class="contents u_tag"><?php echo ($u_t_v); ?></a></span>&nbsp;&nbsp;&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?></p>
			<?php } ?>
		</dd>
	</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	<?php if(($searchResult["html"])  !=  ""): ?><div class='page'><?php echo ($searchResult["html"]); ?></div><?php endif; ?>
	<?php else: ?>
	<div class="note">暂时没有相关用户</div><?php endif; ?>
	<?php }else{ ?>
		<div class="note">抱歉，搜索关键字不能为空</div>
	<?php } ?>
	</div>
</div>
                    <?php }else{ ?>
                      <p>抱歉，未找到“中国武器”相关微博。建议更改关键字后重新搜索</p> 
                    <?php } ?>
                    </div>
                    </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>

<div class="footer">
   <div class="login-footer">
    <?php if(!empty($site_bottom_nav) && $site_bottom_child_nav){ ?>
      <div class="foot clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
            <?php if(is_array($nv["child"])): ?><?php $i = 0;?><?php $__LIST__ = $nv["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($cv["url"]); ?>" target="<?php echo ($cv["target"]); ?>"><?php echo ($cv['navi_name']); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } else if(!empty($site_bottom_nav)) { ?>
      <div class="foot foot1 clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } ?>
    <p>
      <span class="right">Powered By <a href="http://www.thinksns.com" title="开源微博系统,开源微社区" target="_blank">ThinkSNS</a></span>
      <?php echo ($GLOBALS["ts"]["site"]["site_footer"]); ?>
    </p>
  </div>
</div><!--footer end-->

</div><!--page end-->
<?php echo Addons::hook('public_footer');?>
<!-- 统计代码-->
<div id="site_analytics_code" style="display:none;">
<?php echo (base64_decode($site["site_analytics_code"])); ?>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?>
</body>
</html>
<!-- <script type="text/javascript" src="__THEME__/js/module.search.js"></script>
<script type="text/javascript" src="__THEME__/js/home/module.home.js"></script> -->
<script type="text/javascript" src="__THEME__/js/module.weibo.js"></script>