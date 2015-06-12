<?php
/**
 * attach表
 * @author zivss <guolee226@gmail.com>
 * @version TS3.0
 */
if($_GET['t'] == 'attach') {
	$p = isset($_GET['p']) ? intval($_GET['p']) : 1;
	$count = 1000;
	$attach_sql = 'SELECT * FROM `'.$old_db_conf['DB_PREFIX'].'attach` LIMIT '.$count * ($p - 1).','.$count.';';
	$attach_list = $old_db->query($attach_sql);
	if(empty($attach_list)) {
		// 跳转操作
		$t = 'feed';
		$p = 1;
		echo '<script>window.location.href="'.getJumpUrl($t, $p).'";</script>';
		exit;
	} else {
		$data = array();
		foreach($attach_list as $value) {
			$value = updateValue($value);
			$data[] = "(null,null,null,null,'".$value['attach_type']."','".$value['userId']."','".$value['uploadTime']."','".$value['name']."','".$value['type']."','".$value['size']."','".$value['extension']."','".$value['hash']."','".$value['private']."','".$value['isDel']."','".$value['savepath']."','".$value['savename']."','".$value['savedomain']."','0', 0, 0)";
		}
		$insert_attach = 'INSERT INTO `'.$db_conf['DB_PREFIX'].'attach` VALUES '.implode(',', $data);
		$result = $db->execute($insert_attach);

		// 跳转操作
		$t = 'attach';
		$p = $p + 1;
		echo '<script>window.location.href="'.getJumpUrl($t, $p).'";</script>';
		exit;
	}
}