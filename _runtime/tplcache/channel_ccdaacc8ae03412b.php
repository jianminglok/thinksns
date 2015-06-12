<?php if (!defined('THINK_PATH')) exit();?><div id="channel_nav" class="channel-type clearfix">
  <div class="right">
    <?php if(!empty($cid)): ?>
    <?php if($followStatus): ?>
    <a href="javascript:;" onclick="channel.upFollowStatus('<?php echo ($GLOBALS['ts']['mid']); ?>', '<?php echo ($cid); ?>', 'del', this)" class="btn-big mr5"><span><i class="ico-already"></i>已关注</span></a>
    <?php else: ?>
    <a href="javascript:;" onclick="channel.upFollowStatus('<?php echo ($GLOBALS['ts']['mid']); ?>', '<?php echo ($cid); ?>', 'add', this)" class="btn-big mr5"><span><i class="ico-add-black"></i>关注</span></a>
    <?php endif; ?>
	<a href="javascript:;" onclick="channel.contributeBox('<?php echo ($cid); ?>')" class="btn-big"><span><i class="contribute"></i>我要投稿</span></a>
    <?php endif; ?>
  </div>
  <div class="left">

    <div id="channel_selector" class="channel-selector">
      <h4 id="channel_category_btn" class="channel-category-btn"><span><?php echo (getshort($title,4)); ?></span><i class="arrow-nav-b ml5"></i></h4>
      <div class="box channel-tab-menu clearfix channel-dropbox">
        <dl>
          <dt>
            <?php if(is_array($channelCategory)): ?><?php $i = 0;?><?php $__LIST__ = $channelCategory?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a class="btn-cancel <?php if(($cid)  ==  $vo["channel_category_id"]): ?>current<?php endif; ?>" href="<?php echo U('channel/Index/index', array('cid'=>$vo['channel_category_id']));?>" ><span><?php echo ($vo["title"]); ?></span></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
          </dt>
        </dl>
      </div>
    </div>

    <div class="ml"><span class="mr5">关注：<em id="channel_follow_nums"><?php echo (($followingCount)?($followingCount):0); ?></em></span><span>记录：<em><?php echo (($channelCount)?($channelCount):0); ?></em></span></div>
  </div>
</div>