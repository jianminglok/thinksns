<?php if (!defined('THINK_PATH')) exit();?><div class="person-info clearfix border-b mb20">
	<dl class="person-info-t clearfix">
		<dt><a href="<?php echo ($userInfo["space_url"]); ?>"><img src="<?php echo ($userInfo["avatar_big"]); ?>" /></a><a href="<?php echo U('public/Account/avatar');?>" class="face">更换头像</a></dt>
		<dd>
			<div class="name">
				<strong><a href="<?php echo ($userInfo["space_url"]); ?>"><?php echo ($userInfo["uname"]); ?></a></strong>
				<span class="person-icon"><?php if(is_array($userGroupData)): ?><?php $i = 0;?><?php $__LIST__ = $userGroupData?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer;vertical-align:-3px;" src="<?php echo ($vo['user_group_icon_url']); ?>" title="<?php echo ($vo['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
				<a href="<?php echo U('public/Index/scoredetail');?>"><img style="width:33px;height:9px;display:inline;cursor:pointer;vertical-align:0;" src="<?php echo ($userCredit["level"]["src"]); ?>" event-node='ico_level_right' /></a></span>
				
			</div>
			
			<div class="user-grade">
			<?php if(is_array($userCredit["credit"])): ?><?php $i = 0;?><?php $__LIST__ = $userCredit["credit"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="grade f9" style="color:#666"><?php echo ($vo["alias"]); ?>：<span><?php echo intval($vo['value']);?>点</span></div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			
			<?php if($isReturn) { ?></div>
			<div class="home"><i class="ico-home"></i><a href="<?php echo U('public/Index/index');?>" class="f3">返回我的首页</a></div>
			<?php } ?>
		</dd>
	</dl>

	<ul class="person-info-b clearfix mb10">
		<li><a href="<?php echo U('public/Index/myFeed');?>" <?php if(($current)  ==  "myfeed"): ?>class="current"<?php endif; ?>><span>微博</span><strong event-node="weibo_count" event-args="uid=<?php echo ($GLOBALS['ts']['mid']); ?>"><?php echo (($userData["weibo_count"])?($userData["weibo_count"]):0); ?></strong></a></li>
		<li><a href="<?php echo U('public/Index/following');?>" <?php if(($current)  ==  "following"): ?>class="current"<?php endif; ?>><span>关注</span><strong event-node="following_count" event-args="uid=<?php echo ($GLOBALS['ts']['mid']); ?>"><?php echo (($userData["following_count"])?($userData["following_count"]):0); ?></strong></a></li>
		<li><a href="<?php echo U('public/Index/follower');?>" <?php if(($current)  ==  "follower"): ?>class="current"<?php endif; ?>><span>粉丝</span><strong event-node="follower_count" event-args="uid=<?php echo ($GLOBALS['ts']['mid']); ?>"><?php echo (($userData["follower_count"])?($userData["follower_count"]):0); ?></strong></a></li>
		<li class="no-border "><a href="<?php echo U('public/Collection/index');?>" <?php if(($current)  ==  "collection"): ?>class="current"<?php endif; ?>><span>收藏</span><strong event-node="favorite_count" event-args="uid=<?php echo ($GLOBALS['ts']['mid']); ?>"><?php echo (($userData["favorite_count"])?($userData["favorite_count"]):0); ?></strong></a></li>
	</ul>
	<?php echo W('MedalList');?>
</div>


<script type="text/javascript">
// 事件监听
M.addEventFns({
	ico_level_right: {
		load: function() {
			var offset = $(this).offset();
			var top = offset.top + 23;
			var left = offset.left -10;
			var html = '<div id="layer_level_right" class="layer-open experience" style="display:none;position:absolute;z-index:9;top:'+top+'px;left:'+left+'px;">\
						<dl>\
						<dd><?php echo L('PUBLIC_USER_LEVEL');?>：<?php echo ($userCredit["level"]["name"]); ?></dd>\
						<dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>$userCredit['credit']['experience']['value'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
						<dd class="textb"><?php echo L('PUBLI_USER_UPGRADE_TIPS',array('num'=>$userCredit['level']['nextNeed'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
						</dl>\
						</div>';
			$("body").append(html);

			this._model = document.getElementById("layer_level_right");
		},
		mouseenter: function() {
			var offset = $(this).offset();
			var width = $(window).width();
			if ($(window).width() > $(this._model).width() + offset.left) {
				$(this._model).css('left', offset.left);
			} else {
				$(this._model).css('left', offset.left - $(this._model).width() + $(this).width());
			}
			$(this._model).css('display', 'block');
		},
		mouseleave: function() {
			$(this._model).css('display', 'none');
		}
	},
	ico_wallet_right: {
		load: function() {
			var offset = $(this).offset();
			var top = offset.top + 23;
			var left = offset.left - 20;
			var html = '<div id="layer_wallet_right" class="layer-open scale" style="display:none;position:absolute;top:'+top+'px;left:'+left+'px;">\
						<dl>\
						<dt></dt>\
						<dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>intval($userCredit['credit']['score']['value']),'experience'=>$userCredit['creditType']['score']));?></dd>\
						</dl>\
						</div>';
			$("body").append(html);
			this._model = document.getElementById("layer_wallet_right");
		},
		mouseenter: function() {
			$(this._model).css('display', 'block');
		},
		mouseleave: function() {
			$(this._model).css('display', 'none');
		}
	},
	show_medal:{
		click:function (){
			var status = $(this).children().attr('class');
			if ( status == 'arrow-next-page'){
				$(this).children().attr('class','arrow-previous-page');
				$("li[status='hide']").show();
			} else {
				$(this).children().attr('class','arrow-next-page');
				$("li[status='hide']").hide();
			}
		}
	}
}); 
</script>