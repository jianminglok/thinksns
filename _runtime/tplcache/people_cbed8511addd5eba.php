<?php if (!defined('THINK_PATH')) exit();?><div class="mod-user clearfix">
    <?php if(empty($userList['data'])): ?>
    <p>暂时没有相关用户</p>
    <?php else: ?>
    <?php if(is_array($userList["data"])): ?><?php $i = 0;?><?php $__LIST__ = $userList["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl <?php if(is_integer(($key + 1) / 3)): ?>class="no-margin"<?php endif; ?>>
        <dt><a href="<?php echo ($vo["space_url"]); ?>"><img event-node="face_card" uid="<?php echo ($vo["uid"]); ?>" src="<?php echo ($vo["avatar_middle"]); ?>" width="80" height="80" /></a>
        </dt>
        <dd>
            <p class="name"><a href="<?php echo ($vo["space_url"]); ?>" event-node="face_card" uid="<?php echo ($vo["uid"]); ?>" class="mb15"><?php echo ($vo["uname"]); ?></a>
            <?php if(is_array($vo["user_group"])): ?><?php $i = 0;?><?php $__LIST__ = $vo["user_group"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer;" src="<?php echo ($v['user_group_icon_url']); ?>" title="<?php echo ($v['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?></p>
            <p class="f9">粉丝&nbsp;<strong event-node="follower_count" event-args="uid=<?php echo ($vo["uid"]); ?>"><?php echo (($vo["user_data"]["follower_count"])?($vo["user_data"]["follower_count"]):0); ?></strong></p>
            <?php if($GLOBALS['ts']['mid'] != $vo['uid']): ?>
            <?php echo W('FollowBtn', array('fid'=>$vo['uid'], 'uname'=>$vo['uname'], 'follow_state'=>$vo['follow_state']));?>
            <?php endif; ?>
        </dd>
    </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    <?php endif; ?>
</div>
<div class="page"><?php echo ($userList["html"]); ?></div>