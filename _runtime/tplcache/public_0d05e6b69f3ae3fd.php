<?php if (!defined('THINK_PATH')) exit();?><dt class="face">
	<a title="<?php echo ($user_info["uname"]); ?>" href="<?php echo ($user_info["space_url"]); ?>"><img src="<?php echo ($user_info["avatar_small"]); ?>" /></a>
</dt>
<dd class="content">
	<span event-node="show_admin" event-args="feed_id=<?php echo ($feed_id); ?>&uid=<?php echo ($uid); ?>&feed_del=<?php echo CheckPermission('core_admin','feed_del');?>&channel_recommend=<?php echo CheckPermission('channel_admin','channel_recommend');?>" href="javascript:;" class="right f12 hover f9" style="display:none;cursor:pointer">管理</span>

	<p class="hd"><?php echo ($title); ?>
		<?php if(is_array($GroupData[$user_info['uid']])): ?><?php $i = 0;?><?php $__LIST__ = $GroupData[$user_info['uid']]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v2): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer" src="<?php echo ($v2['user_group_icon_url']); ?>" title="<?php echo ($v2['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	</p>
	
	<span class="contents"><?php if(($body)  !=  ""): ?><?php echo (format($body,true)); ?><?php endif; ?></span>
	<p class="info">
		<span class="right">
		<?php echo W('Digg', array('feed_id'=>$feed_id, 'digg_count'=>0, 'diggArr'=>array()));?>
		<i class="vline">|</i>
			
			<?php if(in_array('repost',$weibo_premission)): ?>
			<?php if(($actions["repost"])  ==  "true"): ?><?php if(CheckPermission('core_normal','feed_share')){ ?>
			<?php $sid = !empty($app_row_id)? $app_row_id : $feed_id; ?>
			<?php echo W('Share',array('sid'=>$sid,'stable'=>$app_row_table,'initHTML'=>'','current_table'=>'feed','current_id'=>$feed_id,'nums'=>$repost_count,'appname'=>$app,'is_repost'=>$is_repost));?>
			<i class="vline">|</i>
			<?php } ?><?php endif; ?>
			<?php endif; ?>

			<?php if(($actions["favor"])  ==  "true"): ?><?php echo W('Collection',array('sid'=>$feed_id,'stable'=>'feed','sapp'=>$app));?><?php endif; ?>

			<?php if(in_array('comment',$weibo_premission)): ?>
			<?php if(($actions["comment"])  ==  "true"): ?><?php $cancomment_old = empty($app_row_id) ? 0 : 1; ?>
			<?php $cancomment = intval(CheckPermission('core_normal','feed_comment')); ?>
			<i class="vline">|</i>
			<a event-node="comment" href="javascript:void(0)" event-args='row_id=<?php echo ($feed_id); ?>&app_uid=<?php echo ($uid); ?>&to_comment_id=0&to_uid=0&app_name=<?php echo ($app); ?>&table=feed&app_row_id=<?php echo ($app_row_id); ?>&app_row_table=<?php echo ($app_row_table); ?>&cancomment=<?php echo ($cancomment); ?>&cancomment_old=<?php echo ($cancomment_old); ?>'><?php echo L('PUBLIC_STREAM_COMMENT');?></a><?php endif; ?>
			<?php endif; ?>
		</span>
		<span>
			<a class="date" date="<?php echo time();?>" href="<?php echo U('public/Profile/feed', array('feed_id'=>$feed_id, 'uid'=>$uid));?>">刚刚</a>
			<span><?php echo ($from); ?></span>
			<?php if(CheckPermission('core_normal','feed_del')){ ?>
			<em class="hover">
				<?php if(($actions["delete"])  ==  "true"): ?><a href="javascript:void(0)" event-node ='delFeed' event-args='feed_id=<?php echo ($feed_id); ?>&uid=<?php echo ($uid); ?>'><?php echo L('PUBLIC_STREAM_DELETE');?></a><?php endif; ?>
			</em>
			<?php } ?>
		</span>
	</p>
	<div model-node="comment_detail" class="repeat clearfix" style="display:none;"></div>
</dd>