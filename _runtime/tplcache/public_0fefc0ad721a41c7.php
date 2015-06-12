<?php if (!defined('THINK_PATH')) exit();?><div class="choose-user left">
    <?php if(($userList)  !=  ""): ?><ul rel="userlist" class="user-list">
        <?php if(is_array($userList)): ?><?php $i = 0;?><?php $__LIST__ = $userList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
        <?php if(($editable)  ==  "1"): ?><a onclick="core.searchUser.removeUser(<?php echo ($vo["uid"]); ?>,this)" href="javascript:;" class="ico-close right"></a><?php endif; ?>
        <div class="content"><a href="<?php echo ($vo["space_url"]); ?>" title="<?php echo ($vo["uname"]); ?>"><?php echo ($vo["uname"]); ?></a></div>
        </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
        </ul><?php endif; ?>
    <input style="display:none" name="avoidSubmitByReturn">
    <input type="hidden" rel="uids" id="search_uids" name="<?php echo ($name); ?>" value="<?php echo (implode(',', $uids)); ?>" >
    <?php if(($editable)  ==  "1"): ?><input event-node="search_user" event-args="name=<?php echo ($name); ?>&uid=<?php echo (implode(',', $uids)); ?>&defaultValue=<?php echo ($defaultValue); ?>" value="<?php echo ($defaultValue); ?>" type="text" onfocus="this.className='s-txt-focus'" onblur="this.className='s-txt'" class="s-txt" name="" autocomplete="off" <?php if(count($userList) == $max && $max>0){ ?> style='display:none' <?php } ?> >
        <script type="text/javascript">
        M.addEventFns({
            search_user:{
                load:function(){
                    var obj = $(this);
                    if("undefined" == typeof(core.searchUser)){
                        core.plugFunc('searchUser',function(){
                            core.searchUser.init(obj,'<?php echo $follow; ?>','<?php echo $max; ?>','','<?php echo ($noself); ?>');
                            core.searchUser._stopUser();
                        });
                    }
                },
                click:function(){
                    var args = M.getEventArgs(this);
            		if(this.value == args.defaultValue){
                        this.value = ''
                    };
                    var obj = $(this);
                    core.searchUser.init(obj,'<?php echo $follow; ?>','<?php echo $max; ?>','','<?php echo ($noself); ?>');
            	},
                blur: function() {
                    var args = M.getEventArgs(this);
                    if(this.value == '' || this.value ==args.defaultValue) {
                        this.value = args.defaultValue;
                        core.searchUser.inputReset();
                    }
                },
                focus: function() {
                    var args = M.getEventArgs(this);
                    if(this.value == args.defaultValue) {
                        this.value = '';
                    }
                    core.searchUser.init($(this),'<?php echo $follow; ?>','<?php echo $max; ?>','','<?php echo ($noself); ?>');
                }
            }
        });
        </script><?php endif; ?>
</div>