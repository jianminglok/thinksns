<?php if (!defined('THINK_PATH')) exit();?><?php if(is_array($data)): ?><?php $i = 0;?><?php $__LIST__ = $data?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="box boxShadow" id="feed_<?php echo ($vo["feed_id"]); ?>">

	<?php if($vo['type'] == 'postimage'): ?>
	<div class="pic">
		<a href="<?php echo U('public/Profile/feed', array('feed_id'=>$vo['feed_id'],'uid'=>$vo['user_info']['uid']));?>" target="_blank"><i class="ico-detail"></i></a>
		<ul><li><a onclick="core.weibo.showBigImage(<?php echo ($vo['feed_id']); ?>, 1);" href="javascript:;"><img width="<?php echo ($vo["width"]); ?>" height="<?php echo ($vo["height"]); ?>" src="<?php echo ($vo["attachInfo"]); ?>" alt="<?php echo (t($vo["body"])); ?>" /></a></li></ul>
		<?php if(count($vo['attach_id']) > 1): ?>
		<div class="pic-more"><a href="<?php echo U('public/Profile/feed', array('feed_id'=>$vo['feed_id'],'uid'=>$vo['user_info']['uid']));?>" target="_blank">点击查看全部图片</a></div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if($vo['type'] == 'postvideo'): ?>
	<div class="pic">
		<a href="<?php echo U('public/Profile/feed', array('feed_id'=>$vo['feed_id'],'uid'=>$vo['user_info']['uid']));?>" target="_blank"><i class="ico-detail"></i></a>
		<ul><li><a href="<?php echo U('public/Profile/feed', array('feed_id'=>$vo['feed_id'],'uid'=>$vo['user_info']['uid']));?>"><img width="225" height="160" src="<?php echo ($vo["flashimg"]); ?>" alt="<?php echo (t($vo["body"])); ?>" /></a></li></ul>
	</div>
	<?php endif; ?>

	<div class="channel-list-l">
		<div class="channel-user-conntent mb10 feed_list">                      
			<p><?php echo getUserSpace($vo["user_info"]["uid"],'','','{uname}') ?>：<?php echo (format($vo["body"],true)); ?></p>

			<?php if($vo['type'] == 'postfile'): ?>
			<ul>
				<?php if(is_array($vo["attachInfo"])): ?><?php $i = 0;?><?php $__LIST__ = $vo["attachInfo"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
					<i class="ico-<?php echo ($v["extension"]); ?>-small"></i>
					<a href="<?php echo U('widget/Upload/down',array('attach_id'=>$v['attach_id']));?>" title="<?php echo ($v["name"]); ?>"><?php echo (getshort($v["name"], 10, '...')); ?></a>
				</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			</ul>
			<?php endif; ?>
		</div>

		<div class="channel-user-share">
			<span class="right f9" style="display:none;" event-node="show_admin" event-args="feed_id=<?php echo ($vo["feed_id"]); ?>&uid=<?php echo ($vo["user_info"]["uid"]); ?>&channel_recommend=<?php echo CheckPermission('channel_admin','channel_recommend');?>">管理</span>
			<span>
				<?php if(in_array('repost',$weibo_premission) && CheckPermission('core_normal','feed_share')): ?>
				<a event-node="share" event-args="sid=<?php echo ($vo["feed_id"]); ?>&stable=feed&curtable=feed&curid=<?php echo ($vo["feed_id"]); ?>&initHTML=&appname=public&cancomment=1" href="javascript:;"><i class="ico-forward"></i>(<?php echo ($vo["repost_count"]); ?>)</a>
				<?php endif; ?>
				<?php echo W('Collection',array('sid'=>$vo['feed_id'],'stable'=>'feed','sapp'=>$vo['app'],'ico'=>'ico-favorites','tpl'=>'ico'));?>
				<?php if(in_array('comment',$weibo_premission)): ?>
				<a href="<?php echo U('public/Profile/feed', array('feed_id'=>$vo['feed_id'],'uid'=>$vo['user_info']['uid']));?>"><i class="ico-comment"></i>(<?php echo ($vo["comment_count"]); ?>)</a>
				<?php endif; ?>
			</span>
		</div>
	</div>

</div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>