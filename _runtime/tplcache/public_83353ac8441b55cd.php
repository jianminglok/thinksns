<?php if (!defined('THINK_PATH')) exit();?><?php if($topic_list){ ?>
<div class="hot-topic mb20 border-b">
    <h3><?php echo ($title); ?></h3>
        <ul>
        	<?php if(is_array($topic_list)): ?><?php $i = 0;?><?php $__LIST__ = $topic_list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
        			<p><a href="<?php echo U('public/Topic/index',array('k'=>urlencode($vo['topic_name'])));?>"><?php echo ($vo['topic_name']); ?></a>（<?php echo ($vo['count']); ?>）</p>
        			<?php if($vo['note']){ ?>
		                <div class="topic-tips">
		                    <i class="arrow-y"></i>
		                    <div class="hot-topic-info"><?php echo ($vo['note']); ?></div>
		                </div>
		            <?php } ?>
        		</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
        </ul>
</div>
<?php } ?>