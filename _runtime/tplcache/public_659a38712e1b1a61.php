<?php if (!defined('THINK_PATH')) exit();?><div id="feed-lists" class="feed_lists clearfix">
    <!-- <a class="notes" href="javascript:void(0)">有1条新微博</a> -->
    <?php echo ($list); ?>
    <?php if(($type)  ==  "channel"): ?><?php if(($channel)  ==  "0"): ?><p class="mt10 center">抱歉，您还没有关注任何一个频道，立刻去<a href="<?php echo U('channel/Index/index');?>">频道</a>看看>></p><?php endif; ?><?php endif; ?>
	
	<?php if(($loadmore)  !=  "1"): ?><div id="page" class="page">
		<?php echo ($html); ?>
	</div><?php endif; ?>
</div>
	
<script type="text/javascript">
var firstId = '<?php echo ($firstId); ?>';
var loadId = '<?php echo ($lastId); ?>';
var maxId = '<?php echo ($firstId); ?>';
var feedType = '<?php echo ($type); ?>';
var loadmore = '<?php echo ($loadmore); ?>';
var loadnew = '<?php echo ($loadnew); ?>';
var feed_type = '<?php echo ($feed_type); ?>';
var feed_key = '<?php echo ($feed_key); ?>';
var fgid = '<?php echo ($fgid); ?>';
var topic_id = '<?php echo ($topic_id); ?>';
</script>