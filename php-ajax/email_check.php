<?php

session_start();
include "../db.php";
header("content-type:text/html;charset=utf8");
$email = trim($_POST['email']);

//判断邮箱是否已被注册
//查询超级管理员
if (empty($email)) {
	//判断邮箱是否为空
	echo "empty";
} else if (!preg_match('/\w+@\w+\.\w+/', $email)) {
	echo 'error';
	//判断邮箱是否合法
} else {
	$result = mysql_query("select * from superadmin where email=\"{$email}\" limit 1");
	$row = mysql_fetch_assoc($result);
	if ($row) {
		//超级管理员
		echo 'exist';
	} else {
		//查询普通管理员
		$sql = "select * from admin where email=\"{$email}\" limit 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		if ($row) {
			//普通管理员
			echo 'exist';
		} else {
			//查询普通用户
			$sql = "select * from user where email=\"{$email}\" limit 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			//普通用户
			if ($row) {
				echo 'exist';
			} else {
				echo 'ok';
			}
		}
	}
}
?>