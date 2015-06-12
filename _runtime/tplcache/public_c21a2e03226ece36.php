<?php if (!defined('THINK_PATH')) exit();?><feed app='public' type='post' info='原创微博'>
	<title comment="feed标题"> 
		<![CDATA[<?php echo ($actor); ?>]]>
	</title>
	<body comment="feed详细内容/引用的内容">
		<![CDATA[<?php echo (replaceurl(t($body))); ?> ]]>
	</body>
	<feedAttr comment="true" repost="true" like="false" favor="true" delete="true" />
</feed>