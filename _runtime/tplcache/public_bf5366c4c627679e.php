<?php if (!defined('THINK_PATH')) exit();?><?php $cancomment = intval(CheckPermission('core_normal','feed_comment')); 
$canfeedshare = CheckPermission('core_normal','feed_share');
$canfeeddel = CheckPermission('core_normal','feed_del');
$adminfeeddel = CheckPermission('core_admin','feed_del');
$canfeedreport = CheckPermission('core_normal','feed_report');
$adminchannelrecom = CheckPermission('channel_admin','channel_recommend');
$admintaskrecom = CheckPermission('vtask_admin','vtask_recommend'); ?>
<?php if(is_array($data)): ?><?php $i = 0;?><?php $__LIST__ = $data?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vl): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $cancomment_old = empty($vl['app_row_id'])  ? 0 : 1; ?>
	<dl class="feed_list"  id ='feed<?php echo ($vl["feed_id"]); ?>' model-node='feed_list'>
	<dt class="face">
	<a href="<?php echo ($vl['user_info']['space_url']); ?>"><img src="<?php echo ($vl['user_info']['avatar_small']); ?>"  event-node="face_card" uid='<?php echo ($vl['user_info']['uid']); ?>'></a></dt>
	<dd class="content">
    <span event-node="show_admin" event-args="feed_id=<?php echo ($vl['feed_id']); ?>&uid=<?php echo ($vl['user_info']['uid']); ?>&feed_del=<?php echo ($adminfeeddel); ?>&channel_recommend=<?php echo ($adminchannelrecom); ?>&vtask_recommend=<?php echo ($admintaskrecom); ?>" href="javascript:;" class="right f12 f9 hover" style="display:none;cursor:pointer">管理</span>
	<?php if(($vl["is_del"])  ==  "0"): ?><p class="hd"><?php echo ($vl["title"]); ?>
	<?php if(is_array($vl['GroupData'][$vl['uid']])): ?><?php $i = 0;?><?php $__LIST__ = $vl['GroupData'][$vl['uid']]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v2): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer;" src="<?php echo ($v2['user_group_icon_url']); ?>" title="<?php echo ($v2['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	<?php if(in_array($vl['user_info']['uid'],$followUids)){ ?>
	<?php echo W('Remark',array('uid'=>$vl['user_info']['uid'],'remark'=>$remarkHash[$vl['user_info']['uid']],'showonly'=>1));?>
	<?php } ?>
	<?php if(!empty($vl['body'])){ ?><?php } ?>
	</p>
	<span class="contents"><?php echo (format($vl["body"],true)); ?></span>
	
	<p class="info">
	<span class="right">
  <?php echo W('Digg', array('feed_id'=>$vl['feed_id'], 'digg_count'=>$vl['digg_count'], 'diggArr'=>$diggArr));?>
	<i class="vline">|</i>
	<?php if(in_array('repost',$weibo_premission)): ?>
	<?php if(($vl["actions"]["repost"])  ==  "true"): ?><?php if($canfeedshare){ ?>
	<?php $sid = !empty($vl['app_row_id'])? $vl['app_row_id'] : $vl['feed_id'];
		$cancomment_old = in_array($vl['type'],$cancomment_old_type) ? 1 : 0; ?>
	<?php echo W('Share',array('sid'=>$sid,'stable'=>$vl['app_row_table'],'initHTML'=>'','current_table'=>'feed','current_id'=>$vl['feed_id'],'nums'=>$vl['repost_count'],'appname'=>$vl['app'],'cancomment'=>$cancomment_old,'feed_type'=>$vl['type'],'is_repost'=>$vl['is_repost']));?>
	<i class="vline">|</i>
	<?php } ?><?php endif; ?>
	<?php endif; ?>
	
	<?php if(($vl["actions"]["favor"])  ==  "true"): ?><?php echo W('Collection',array('type'=>$type,'sid'=>$vl['feed_id'],'stable'=>'feed','sapp'=>$vl['app']));?><?php endif; ?>

	<?php if(in_array('comment',$weibo_premission)): ?>
	<?php if(($vl["actions"]["comment"])  ==  "true"): ?><i class="vline">|</i>
		<a event-node="comment" href="javascript:void(0)" event-args='row_id=<?php echo ($vl["feed_id"]); ?>&app_uid=<?php echo ($vl["uid"]); ?>&app_row_id=<?php echo ($vl["app_row_id"]); ?>&app_row_table=<?php echo ($vl["app_row_table"]); ?>&to_comment_id=0&to_uid=0&app_name=<?php echo ($vl["app"]); ?>&table=feed&cancomment=<?php echo ($cancomment); ?>&cancomment_old=<?php echo ($cancomment_old); ?>'><?php echo L('PUBLIC_STREAM_COMMENT');?><?php if(($vl["comment_count"])  !=  "0"): ?>(<?php echo ($vl["comment_count"]); ?>)<?php endif; ?></a><?php endif; ?>
	<?php endif; ?>

	</span>
     <span>
	<a class="date" date="<?php echo ($vl["publish_time"]); ?>" href="<?php echo U('public/Profile/feed',array('feed_id'=>$vl['feed_id'],'uid'=>$vl['uid']));?>"><?php echo (friendlydate($vl["publish_time"])); ?></a>
	<span><?php echo ($vl['from']); ?></span>
	
	<em class="hover">
	<?php if(($vl["actions"]["delete"])  ==  "true"): ?><!-- 做普通删除权限 和 管理删除权限 判断 & 只有微博可以被删除  -->
	<?php if(($vl['user_info']['uid'] == $GLOBALS['ts']['mid'] && $canfeeddel) || $adminfeeddel){ ?>
		<a href="javascript:void(0)" event-node ='delFeed' event-args='feed_id=<?php echo ($vl["feed_id"]); ?>&uid=<?php echo ($vl["user_info"]["uid"]); ?>&type=<?php echo ($vl["type"]); ?>'><?php echo L('PUBLIC_STREAM_DELETE');?></a>
	<?php } ?><?php endif; ?>
	<?php if($vl['user_info']['uid'] != $GLOBALS['ts']['mid']){ ?>
	<?php if($canfeedreport){ ?>
	<a href="javascript:void(0)" event-node='denounce' event-args='aid=<?php echo ($vl["feed_id"]); ?>&type=feed&uid=<?php echo ($vl["user_info"]["uid"]); ?>'><?php echo L('PUBLIC_STREAM_REPORT');?></a>
	<?php } ?>
	<?php } ?>
	</em>
    </span>
  </p>
	   <div model-node="comment_detail" class="repeat clearfix" style="display:none;"></div>
	   	<div class="praise-list clearfix" style="display:none;">
	   		<i class="arrow arrow-t"></i>
	   	  <ul>
	   	  	  <li><a href=""><img src="<?php echo ($vl['user_info']['avatar_small']); ?>" width="30" height="30"/></a><a href="" class="ico-close1"></a></li>
	   	  	  <li><a href=""><img src="<?php echo ($vl['user_info']['avatar_small']); ?>" width="30" height="30"/></a></li>
	   	  	  <li><a href=""><img src="<?php echo ($vl['user_info']['avatar_small']); ?>" width="30" height="30"/></a></li>
	   	  	  <li><a href=""><img src="<?php echo ($vl['user_info']['avatar_small']); ?>" width="30" height="30"/></a></li>
	   	  	  <li><a href=""><i class="arrow-next-page"></i></a></li>
	   	  </ul>
        </div>
 	
 	<?php else: ?>
	
	<p><?php echo L('PUBLIC_INFO_ALREADY_DELETE_TIPS');?></p>
	<p class="info">
		<?php if(($vl["actions"]["favor"])  ==  "true"): ?><?php echo W('Collection',array('type'=>$type,'sid'=>$vl['feed_id'],'stable'=>'feed','sapp'=>$vl['app']));?><?php endif; ?>
	</p><?php endif; ?> 
	   
	</dd>
	</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>

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
  if(!'<?php echo ($topic_id); ?>' && '<?php echo ($feed_key); ?>'){
  	var key3 = '<?php echo ($feed_key); ?>';
    $('.contents').highlight(key3);
    M($('#feed-lists')[0]);
  }
});
/**
 * 时间更新效果
 * return void
 */
$(document).ready(function() {
	var wTime = parseInt("<?php echo time();?>");
	var updateTime = function()
	{
		$('.date').each(function(i, n) {
			var date = $(this).attr('date');
			if(typeof date !== 'undefined') {
				$(this).html(core.weibo.friendlyDate(date, wTime));
			}
		});	
	};
	//updateTime();
	setInterval(function() {
		wTime += 10;
		updateTime();
	}, 10000);
});

//旋转图片
function revolving (type, id) {
  var img = $("#image_index_"+id);
  img.rotate(type);
}


$.fn.rotate = function(p){

  var img = $(this)[0],
    n = img.getAttribute('step');
  // 保存图片大小数据
  if (!this.data('width') && !$(this).data('height')) {
    this.data('width', img.width);
    this.data('height', img.height);
  };
  this.data('maxWidth',img.getAttribute('maxWidth'))

  if(n == null) n = 0;
  if(p == 'left'){
    (n == 0)? n = 3 : n--;
  }else if(p == 'right'){
    (n == 3) ? n = 0 : n++;
  };
  img.setAttribute('step', n);

  // IE浏览器使用滤镜旋转
  if(document.all) {
    if(this.data('height')>this.data('maxWidth') && (n==1 || n==3) ){
      if(!this.data('zoomheight')){
        this.data('zoomwidth',this.data('maxWidth'));
        this.data('zoomheight',(this.data('maxWidth')/this.data('height'))*this.data('width'));
      }
      img.height = this.data('zoomwidth');
      img.width  = this.data('zoomheight');
      
    }else{
      img.height = this.data('height');
      img.width  = this.data('width');
    }
    
    img.style.filter = 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ n +')';
    // IE8高度设置
    if ($.browser.version == 8) {
      switch(n){
        case 0:
          this.parent().height('');
          //this.height(this.data('height'));
          break;
        case 1:
          this.parent().height(this.data('width') + 10);
          //this.height(this.data('width'));
          break;
        case 2:
          this.parent().height('');
          //this.height(this.data('height'));
          break;
        case 3:
          this.parent().height(this.data('width') + 10);
          //this.height(this.data('width'));
          break;
      };
    };
  // 对现代浏览器写入HTML5的元素进行旋转： canvas
  }else{
    var c = this.next('canvas')[0];
    if(this.next('canvas').length == 0){
      this.css({'visibility': 'hidden', 'position': 'absolute'});
      c = document.createElement('canvas');
      c.setAttribute('class', 'maxImg canvas');
      img.parentNode.appendChild(c);
    }
    var canvasContext = c.getContext('2d');
    switch(n) {
      default :
      case 0 :
        img.setAttribute('height',this.data('height'));
        img.setAttribute('width',this.data('width'));
        c.setAttribute('width', img.width);
        c.setAttribute('height', img.height);
        canvasContext.rotate(0 * Math.PI / 180);
        canvasContext.drawImage(img, 0, 0);
        break;
      case 1 :
        if(img.height>this.data('maxWidth') ){
          h = this.data('maxWidth');
          w = (this.data('maxWidth')/img.height)*img.width;
        }else{
          h = this.data('height');
          w = this.data('width');
        }
        c.setAttribute('width', h);
        c.setAttribute('height', w);
        canvasContext.rotate(90 * Math.PI / 180);
        canvasContext.drawImage(img, 0, -h, w ,h );
        break;
      case 2 :
        img.setAttribute('height',this.data('height'));
        img.setAttribute('width',this.data('width'));
        c.setAttribute('width', img.width);
        c.setAttribute('height', img.height);
        canvasContext.rotate(180 * Math.PI / 180);
        canvasContext.drawImage(img, -img.width, -img.height);
        break;
      case 3 :
        if(img.height>this.data('maxWidth') ){
          h = this.data('maxWidth');
          w = (this.data('maxWidth')/img.height)*img.width;
        }else{
          h = this.data('height');
          w = this.data('width');
        }
        c.setAttribute('width', h);
        c.setAttribute('height', w);
        canvasContext.rotate(270 * Math.PI / 180);
        canvasContext.drawImage(img, -w, 0,w,h);
        break;
    };
  };
};
</script>