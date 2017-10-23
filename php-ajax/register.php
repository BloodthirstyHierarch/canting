<?php
session_start();
include "../db.php";
header("content-type:text/html;charset=utf8");
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password1 = trim($_POST['password1']);
$mobile = trim($_POST['mobile']);
if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($password1) || empty($mobile)) {
	echo "empty_error";
} else if (!preg_match('/\w+@\w+\.\w+/', $email)) {
	echo 'email_error';
	//判断邮箱是否合法
} else {
	$isexist = false;
	//判断邮箱是否已被注册
	//查询超级管理员
	$result = mysql_query("select * from superadmin where email=\"{$email}\" limit 1");
	$row = mysql_fetch_assoc($result);
	if ($row) {
		//超级管理员
		$isexist = true;
	} else {
		//查询普通管理员
		$sql = "select * from admin where email=\"{$email}\" limit 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		if ($row) {
			//普通管理员
			$isexist = true;
		} else {
			//查询普通用户
			$sql = "select * from user where email=\"{$email}\" limit 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			//普通用户
			if ($row) {
				$isexist = true;
			}
		}
	}

	if ($isexist) {
		echo "email_same";
	} else {
		if (strlen($first_name) > 20) {
			echo "first_name_error";
		} else if (strlen($last_name) > 20) {
			echo "last_name_error";
		} else if (strlen($password) > 16 || strlen($password) < 6) {
			echo "password_error";
		} else if (strcmp($password, $password1) !== 0) {
			echo "password1_error";
		} else if (strlen($mobile) < 10) {
			echo "mobile_error";
			// echo "success";
		} else {
			$password = md5($password);
			$insert_user_sql = "insert into user (email,password) values (\"{$email}\",\"{$password}\")";
			mysql_query($insert_user_sql);
			$insert_user_info_sql = "insert into user_info (first_name,last_name,email,mobile) values (\"{$first_name}\",\"{$last_name}\",\"{$email}\",\"{$mobile}\")";
			mysql_query($insert_user_info_sql);
			echo "success";
		}
	}
}

// echo 666;
?>
