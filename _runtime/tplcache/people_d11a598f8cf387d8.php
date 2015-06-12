<?php if (!defined('THINK_PATH')) exit();?><div class="select-title"><p><?php echo ($path); ?></p></div>
<!-- 
<div class="select-type">
  <dl>
    <?php if($type == 'area'): ?>
    <dt>行业</dt>
    <dd>
      <a <?php if(($cid)  ==  "0"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>0,'sex'=>$sex,'area'=>$area,'verify'=>$verify,'type'=>$type));?>">全部</a>
      <?php if(is_array($industry)): ?><?php $i = 0;?><?php $__LIST__ = $industry?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a <?php if(($cid)  ==  $vo["id"]): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$vo['id'],'sex'=>$sex,'area'=>$area,'verify'=>$verify,'type'=>$type));?>"><?php echo ($vo["title"]); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </dd>
    <?php elseif($type == 'industry'): ?>
    <dt>地区</dt>
    <dd>
      <a <?php if(($area)  ==  "0"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>$sex,'area'=>0,'verify'=>$verify,'type'=>$type));?>">全部</a>
      <?php if(is_array($areaList)): ?><?php $i = 0;?><?php $__LIST__ = $areaList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a <?php if(($area)  ==  $v["id"]): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>$sex,'area'=>$v['id'],'verify'=>$verify,'type'=>$type));?>"><?php echo ($v["title"]); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </dd>
    <?php endif; ?>
  </dl>
  <dl>
    <dt>性别</dt>
    <dd>
      <a <?php if(($sex)  ==  "0"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>0,'area'=>$area,'verify'=>$verify,'type'=>$type));?>">全部</a>
      <a <?php if(($sex)  ==  "1"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>1,'area'=>$area,'verify'=>$verify,'type'=>$type));?>">男</a>
      <a <?php if(($sex)  ==  "2"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>2,'area'=>$area,'verify'=>$verify,'type'=>$type));?>">女</a>
    </dd>
  </dl>
  <dl>
    <dt>认证</dt>
    <dd>
      <a <?php if(($verify)  ==  "0"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>$sex,'area'=>$area,'verify'=>0,'type'=>$type));?>">全部</a>
      <a <?php if(($verify)  ==  "1"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>$sex,'area'=>$area,'verify'=>1,'type'=>$type));?>">认证用户</a>
      <a <?php if(($verify)  ==  "2"): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$cid,'sex'=>$sex,'area'=>$area,'verify'=>2,'type'=>$type));?>">普通用户</a>
    </dd>
  </dl>
</div> 
-->