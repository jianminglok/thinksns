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

<div id="login-bg">
    <div class="login-b" style="opacity:1;">
        <img id="login_bg" src="<?php echo ($login_bg); ?>" style="display:block;width:100%;height:auto;margin-left:0;opacity:1;visibility:visible;" />
     </div>
     <div id="login-content">
	      <div id="wrap-hd" style="opacity: 1; visibility: visible;">
          <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>></div>
          <div class="login-guide"><p><?php echo ($site["site_slogan"]); ?></p></div>
          <div class="s-login">
                <form id="ajax_login_form" method="POST" action="<?php echo U('public/Passport/doLogin');?>">
                <div class="login-bd">
                    <ul class="clearfix" model-node="login_input">
                        <li class="s-row" style="z-index:100">
                          <div class="input">
                             <label class="l-login"><?php echo L('PUBLIC_ACCOUNT');?></label>
                             <div>
                                 <input id="account_input" name="login_email" type="text" class="s-txt1" autocomplete="off" />
                                 <div class="txt-list on-changes" style="z-index:999">
                                   <p>请选择或继续输入...</p>
                                   <ul>
                                      <li email="" rel="show"></li>
                                      <?php if(is_array($emailSuffix)): ?><?php $i = 0;?><?php $__LIST__ = $emailSuffix?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li email="<?php echo ($vo); ?>" rel="show"></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                    </ul>
                                  </div>
                              </div>
                           </div>
                        </li>
                        <li class="s-row">
                          <div class="input">
                            <label class="l-login"><?php echo L('PUBLIC_PASSWORD');?></label>
                            <?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false): ?>
                            <input id="pwd_input" name="login_password" type="password" class="s-txt1" autocomplete="off" />
                            <?php else: ?>
                            <input id="pwd_input" name="login_password" type="text" class="s-txt1" autocomplete="off" />
                            <?php endif; ?>
                          </div>
                        </li>
                        <li class="actionBtn"><a href="javascript:;" onclick="$('#ajax_login_form').submit();" class="btn-login">登录</a></li>
                        <li class="s-row1">
                          <?php if($register_type == 'open'): ?>
                          <a onclick="javascript:window.open('<?php echo U('public/Register');?>','_self')">注册帐号</a>
                          <?php endif; ?>
                        </li>
                        <li class="s-row1">
                            <a class="s-f-psd" href="<?php echo U('public/Passport/findPassword');?>"><?php echo L('FORGET_PASSWORD');?>?</a>
                            <a class="auto left" event-node="login_remember" href="javascript:;"><span class="check-ok"><input type="hidden" name="login_remember" value="1" /></span><?php echo L('PUBLIC_LOGIN_AUTOMATICALLY');?></a>
                        </li>
                    </ul>
                </div>
                </form>
                <div id="js_login_input" style="display:none" class="error-box"></div>
                <?php if(Addons::requireHooks('login_input_footer') && Addons::hook('login_input_footer')): ?>
                <div class="login-ft" style="">
                    <span>其它帐号登录：</span><?php echo Addons::hook('login_input_footer');?>
                </div>
                <?php endif; ?>
          </div>         
        </div>
      </div>
      <div id="footer" style="opacity:1;visibility:visible;margin:0;bottom:0;position:absolute;width:100%;height:50px;">
            <div class="footer-wrap" style="left:50%;margin-left:-300px;position:absolute;top:0;width:560px;border:none">
              <p><?php echo ($site["site_footer"]); ?></p>
              <?php if(is_array($site_guest_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_guest_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$st): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a href="<?php echo ($st["url"]); ?>" target="<?php echo ($st["target"]); ?>" style="color:#999"><?php echo ($st["navi_name"]); ?></a>&nbsp;&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            </div>
      </div>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?>
<script src="__APP__/login.js" type="text/javascript"></script>
</body>
</html>