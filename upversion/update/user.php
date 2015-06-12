<?php
/**
 * 用户相关数据
 * @example
 * 1.用户地区数据未实现
 * 2.用户最后发布微博信息未实现
 * @author zivss <guolee226@gmail.com>
 * @version TS3.0
 */
if($_GET['t'] == 'user') {
	require_once('./extends/PinYin.php');
	$Py = new PinYin();
	$p = !empty($_GET['p']) ? intval($_GET['p']) : 1;
	$count = 1000;
	$user_sql = 'SELECT * FROM `'.$old_db_conf['DB_PREFIX'].'user` LIMIT '.$count * ($p - 1).','.$count.';';
	$user_list = $old_db->query($user_sql);
	if(empty($user_list)) {
		// 跳转操作
		$t = 'user_other';
		$p = 1;
		echo '<script>window.location.href="'.getJumpUrl($t, $p).'";</script>';
		exit;
	} else {
		$data = array();
		foreach($user_list as &$value) {
			if(empty($value['email'])) {
				$value['email'] = 'ts_'.$value['uid'].'@thinksns.com';
			}
			$salt = rand(11111, 99999);
			$salt = mysql_escape_string($salt);
			$password = md5($value['password'].$salt);
			$password = mysql_escape_string($password);
			$sex = ($value['sex'] == 1) ? 1 : 2;
			$sex = mysql_escape_string($sex);
			$first_letter = getFirstLetter($value['uname']);
			$first_letter = mysql_escape_string($first_letter);
			$search_key = $value['uname'].' '.$Py->Pinyin($value['uname']);
			$search_key = mysql_escape_string($search_key);
			$value = updateValue($value);
			$data[] = "('".$value['uid']."','".$value['email']."','".$password."','".$salt."','".$value['uname']."','".$value['email']."','".$sex."','".$value['location']."','1','".$value['is_active']."','".$value['is_init']."','".$value['ctime']."','1',null,'".$value['domain']."','".$value['province']."','".$value['city']."','0', '127.0.0.1', 'zh-cn', 'PRC', '0', '".$first_letter."', '', null, null, '0', '".$search_key."', null, 0, 0)";
			// 添加用户组信息 - todo
			$user_group_link_sql = 'SELECT * FROM `'.$old_db_conf['DB_PREFIX'].'user_group_link` WHERE `uid` = '.$value['uid'].' LIMIT 1';
			$user_group_info = $old_db->query($user_group_link_sql);
			// 获取管理用户组
			$admin_group_sql = 'SELECT p.* FROM `'.$old_db_conf['DB_PREFIX'].'user_group_popedom` AS p LEFT JOIN `'.$old_db_conf['DB_PREFIX'].'node` AS n ON p.`node_id` = n.`node_id` WHERE n.`app_name` = \'admin\' AND n.`mod_name` = \'*\' AND n.`act_name` = \'*\'';
			$admin_group_info = $old_db->query($admin_group_sql);
			if(empty($user_group_info) || $user_group_info[0]['user_group_id'] != $admin_group_info[0]['user_group_id']) {
				$user_group_data[] = "(null, '".$value['uid']."', '3')";
			} else if($user_group_info[0]['user_group_id'] == $admin_group_info[0]['user_group_id']) {
				$user_group_data[] = "('".$user_group_info[0]['id']."', '".$user_group_info[0]['uid']."', '1')";
			}
		}
		$insert_user = 'INSERT INTO `'.$db_conf['DB_PREFIX'].'user` VALUES '.implode(',', $data);
		$result = $db->execute($insert_user);
		if($result === false) {
			foreach($data as $single_value) {
				$result = $single_insert_user = 'INSERT INTO `'.$db_conf['DB_PREFIX'].'user` VALUES '.$single_value;
				$db->execute($single_insert_user);
				if($result === false) {
					writeErrorLog($single_insert_user);
				}
			}
		}
		$insert_group_link = 'INSERT INTO `'.$db_conf['DB_PREFIX'].'user_group_link` VALUES '.implode(',', $user_group_data);
		$db->execute($insert_group_link);

		// 跳转操作
		$t = 'user';
		$p = $p + 1;
		echo '<script>window.location.href="'.getJumpUrl($t, $p).'";</script>';
		exit;
	}
}