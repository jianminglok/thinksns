<?php if (!defined('THINK_PATH')) exit();?><div id="container" class="mb10 channel-list clearfix"></div>

<script type="text/javascript" src="__APP__/jquery.masonry.min.js"></script>
<script type="text/javascript" src="__APP__/channel.js"></script>
<script type="text/javascript">
var option = {
	container: 'container',
	loadcount: '<?php echo ($loadCount); ?>',
	loadmax: '<?php echo ($loadMax); ?>',
	loadId: '<?php echo ($loadId); ?>',
	loadlimit: '<?php echo ($loadLimit); ?>',
	cid: '<?php echo ($cid); ?>',
	categoryJson: '<?php echo ($categoryJson); ?>'
};
channel.init(option);
</script>

<!-- 
<div class="box app-tab-menu boxShadow">
<dl>
<dt>
<?php if(is_array($channelCategory)): ?><?php $i = 0;?><?php $__LIST__ = $channelCategory?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a class="btn-cancel" href="<?php echo U('channel/Index/index', array('cid'=>$vo['channel_category_id']));?>" ><span><?php echo ($vo["title"]); ?></span></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
</dt>
</dl>
</div> -->