<?php if (!defined('THINK_PATH')) exit();?><?php if($send_type =='send_weibo'){ ?>
	<?php if(CheckPermission('core_normal','feed_post')){ ?>
		<!-- 发布微博/微博 -->
		<div class="send_weibo diy-send-weibo" model-node="send_weibo">
			<div class="title clearfix">
				<div model-node="numsLeft" class="right num"><?php echo L('PUBLIC_INPUT_CHARACTER_LIMIT',array('num'=>'<span>'.$initNums.'</span>'));?></div>
				<span>
				<?php if((Addons::requireHooks('weibo_send_box_tab')) && APP_NAME == 'public' && MODULE_NAME == 'Index' && ACTION_NAME == 'index'): ?>
					<a href="javascript:void(0)" id="change_weibo_tab" class="on">微博</a><i class="line"></i>
		     		<?php echo Addons::hook('weibo_send_box_tab');?>
				<?php else: ?>
				<a><?php echo (getshort($title,32)); ?></a>
				<?php endif; ?>
				</span>
		    </div> 
			<div class="input" model-node="weibo_post_box">
				<div class="input_before mb5" model-node="mini_editor" model-args="prompt=<?php echo ($prompt); ?>">
					<textarea id="inputor<?php echo ($time); ?>" name="at" class="input_tips" event-node="mini_editor_textarea" model-args='t=feed'><?php if(trim($topicHtml) != ''): ?><?php echo ($topicHtml); ?><?php endif; ?></textarea>
					<div model-node="post_ok" style="display:none;text-align:center;position:absolute;left:0;top:10px;width:100%"><i class="ico-ok"></i><?php echo L('PUBLIC_SHARE_SUCCESS');?></div>
				</div>
				<div class="action clearfix" model-node='send_action'>
					<div class="kind">
					
					<div class="right release"><?php echo Addons::hook('weibo_syn_middle_publish');?>
						<a class="btn-grey-white" event-node='<?php echo ($post_event); ?>' event-args='type=<?php echo ($type); ?>&app_name=<?php echo ($app_name); ?>&topicHtml=<?php echo ($initHtml); ?>' href="javascript:;"><span>发布</span></a>
					</div>

					<div class="acts">
						<?php if(($actions["face"])  ==  "true"): ?><?php if(in_array('face',$weibo_type)): ?>
					    <a event-node="insert_face" class="face-block" href="javascript:;"><i class="face"></i>表情</a>
						<?php endif; ?><?php endif; ?>

					    <?php if(($actions["at"])  ==  "true"): ?><?php if(in_array('at',$weibo_type)): ?>
					    <a event-node="insert_at" class="at-block" href="javascript:;"><i class="at"></i>好友</a>
						<?php endif; ?><?php endif; ?>

					    <?php if(($actions["image"])  ==  "true"): ?><?php if(in_array('image',$weibo_type)): ?>
					    <a event-node="insert_image" class="image-block" href="javascript:;" rel="<?php echo ($post_event); ?>"><i class="image"></i>图片</a>
					    <div class="tips-img" style="display:none"><dl><dd><i class="arrow-open"></i>jpg,png,gif,bmp,tif</dd></dl></div>
					    <?php endif; ?><?php endif; ?>

					    <?php if(($actions["video"])  ==  "true"): ?><?php if(in_array('video',$weibo_type)): ?>
					    <input type="hidden" id="postvideourl" value="" />
					    <a event-node="insert_video" rel="<?php echo ($post_event); ?>" class="video-block" href="javascript:;"><i class="video"></i>视频</a>
					    <?php endif; ?><?php endif; ?>

					    <?php if(($actions["file"])  ==  "true"): ?><?php if(in_array('file',$weibo_type)): ?>
					    <a class="file-block" href="javascript:;"><i class="file"></i>附件
					    <form style='display:inline;padding:0;margin:0;border:0' >
					    <input event-node="insert_file" type="file" name="attach" inputname='attach' onchange="core.plugInit('uploadFile',this,'','all')" urlquery='attach_type=feed_file&upload_type=file' hidefocus="true">
					    </form>
					    </a> 
					    <?php endif; ?><?php endif; ?>
					    
					    <?php if(($actions["topic"])  ==  "true"): ?><?php if(in_array('topic',$weibo_type)): ?>
					    <a event-node="insert_topic" class="topic-block" href="javascript:;"><i class="topic"></i>话题</a>
						<?php endif; ?><?php endif; ?>

						<?php if(($actions["contribute"])  ==  "true"): ?><?php if(in_array('contribute',$weibo_type) && $hasChannel): ?>
					    <a event-node="insert_contribute" class="contribute-block" href="javascript:;"><i class="contribute"></i>投稿</a>
					    <input type="hidden" autocomplete="off" value="" id="contribute" />
					    <?php endif; ?><?php endif; ?>
						<?php echo Addons::hook('home_index_middle_publish_type',array('position'=>'index'));?>
					</div>	
					<div class="clear"></div>
		            <div model-node ='faceDiv'></div>
		            </div>
		        </div>
			</div>
		</div>
	<?php }else{ ?>
 		<div class="send_weibo"><div class="box-purview"><i class="ico-error"></i><?php echo L('PUBLIC_SENTWEIBO_ISNOT');?></div></div>
	<?php } ?>
<?php }else if($send_type =='repost_weibo'){ ?>
	<!-- 分享微博/微博发布框 -->
	<div class="action clearfix mb10" ><!--<span class="faces" event-node='share_insert_face'></span>--><div class="num"  model-node="numsLeft"><?php echo L('PUBLIC_INPUT_CHARACTER_LIMIT',array('num'=>'<span>'.$initNums.'</span>'));?></div></div>
	<div model-node="weibo_post_box" class="clearfix">
		<div class="input_before" model-node="mini_editor" style='margin:0 0 5px 0' >
		<textarea id="message_inputor" class="input_tips" event-node="mini_editor_textarea" event-args='parentHeight=60'  model-args='t=repostweibo' style="height:52px;width:97%;"><?php echo ($initHtml); ?></textarea>

		</div>
		<div class="action clearfix">
		<div><a href="javascript:;" class="btn-green-big right" event-node='post_share' event-args='sid=<?php echo ($sid); ?>&type=<?php echo ($stype); ?>&app_name=<?php echo ($app_name); ?>&curid=<?php echo ($curid); ?>&curtable=<?php echo ($curtable); ?>'><span><?php echo L('PUBLIC_SHARE_STREAM');?></span></a></div>
		<div class="acts">
      		<a class="face-block" href="javascript:;" event-node="comment_insert_face"><i class="face"></i>表情</a>
      		<?php if(in_array('comment',$weibo_premission) && $cancomment==1): ?> 
	           <p><label><input type="checkbox" class="checkbox" name="comment" value='1'><?php echo L('PUBLIC_SENTWEIBO_TO',array('link'=>$space_link));?></label></p>
	       <?php endif; ?>
    	</div>
    	<div class="clear"></div>
      	<div model-node="faceDiv"></div>     	
      	</div>
	</div> 
		  	       

	</div>
	<script>
	$(function (){
		setTimeout(function (){
			core.weibo.checkNums($('#message_inputor').get(0));
		},500);
	});
	</script>
<?php } ?>

<script type="text/javascript">
var initNums = '<?php echo ($initNums); ?>';
var initHtml = '<?php echo ($initHtml); ?>';
core.loadFile(THEME_URL+'/js/plugins/core.at.js');
$(function (){
	$('#change_weibo_tab').click(function (){
		$('div[type="weibotab"]').hide();
	});
	if ( $('#inputor<?php echo ($time); ?>').get(0) != undefined ){
		setTimeout(function (){
			if ( initHtml ){
				$('#inputor<?php echo ($time); ?>').focus();
				$('#inputor<?php echo ($time); ?>').html(initHtml);
			}
		} , 300)
	}
	//$('#message_inputor').inputToEnd(initHtml);
});
setTimeout(function() {
	atWho($('#inputor<?php echo ($time); ?>'));
	atWho($('#message_inputor'));
}, 1000);
</script>