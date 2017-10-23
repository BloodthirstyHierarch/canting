

<?php
// include "db.php";
// session_start();
// header("content-type:text/html;charset=utf8");
// if (isset($_POST[dosubmit])) {
// 	$first_name = trim($_POST[first_name]);
// 	$last_name = trim($_POST[last_name]);
// 	$email = trim($_POST[email]);
// 	$password = trim($_POST[password]);
// 	$password1 = trim($_POST[password1]);
// 	$mobile = trim($_POST[mobile]);

// 	if (empty($email) || !preg_match('/\w+@\w+\.\w+/', $email)) {
// 		//判断邮箱是否合法
// 		echo "<script>alert('Email is illegal!');</script>";
// 	} else {
// 		$isexist = false;
// 		//判断邮箱是否已被注册
// 		//查询超级管理员
// 		$result = $dbh->query("select * from superadmin where email=\"{$email}\" limit 1");
// 		$row = $result->fetch();
// 		if ($row) {
// 			//超级管理员
// 			$isexist = true;
// 		} else {
// 			//查询普通管理员
// 			$sql = "select * from admin where email=\"{$email}\" limit 1";
// 			$result = $dbh->query($sql);
// 			$row = $result->fetch();
// 			if ($row) {
// 				//普通管理员
// 				$isexist = true;
// 			} else {
// 				//查询普通用户
// 				$sql = "select * from user where email=\"{$email}\" limit 1";
// 				$result = $dbh->query($sql);
// 				$row = $result->fetch();
// 				//普通用户
// 				if ($row) {
// 					$isexist = true;
// 				}
// 			}
// 		}

// 		if ($isexist) {
// 			echo "<script>alert('The email had been existed');</script>";
// 		} else {
// 			if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($password1) || empty($mobile)) {
// 				echo "<script>alert('Any input could not be empty!');</script>";
// 			} else if (strlen($first_name) > 20 || strlen($last_name) > 20) {
// 				echo "<script>alert('Name is illegal!');</script>";
// 			} else if (strlen($password) > 16) {
// 				echo "<script>alert('Password is too long!');</script>";
// 			} else if (strcmp($password, $password1) !== 0) {
// 				echo "<script>alert('Two password is not same!');</script>";
// 			} else if (strlen($mobile) > 15 || strlen($mobile) < 8) {
// 				echo "<script>alert('Mobile number is illegal!');</script>";
// 			} else {
// 				$password = md5($password);
// 				$insert_user_sql = "insert into user (email,password) values (\"{$email}\",\"{$password}\")";
// 				$dbh->exec($insert_user_sql);
// 				$insert_user_info_sql = "insert into user_info (first_name,last_name,email,mobile) values (\"{$first_name}\",\"{$last_name}\",\"{$email}\",\"{$mobile}\")";
// 				$dbh->exec($insert_user_info_sql);
// 				echo "<script>alert('注册成功！');location.href='login.php';</script>";
// 			}
// 		}
// 	}
// }

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
		.container {
			margin: auto;
		}
		.register-content{
			margin:-50px auto;
			width: 1200px;
			height:600px;
		}
		.register-content .left{
			width:550px;
			display: inline-block;
		}
		.register-content .left form {
			margin-top: 50px;
		}
		.register-content .left form h6{
			margin-top:20px;
			height:30px;
			color:#204056;
		}
		.register-content .left form input{
			float: right;
			margin-top: -10px;
			width:300px;
			height:35px;
			border:solid 1px #ccc;
			border-radius: 0px;
		}
		.register-content .left p{
			font-size: 13px;
			margin-bottom: -5px;
		}
		.register-content .left p a{
			color:#FA5A5B;
			text-decoration:none;
		}
		.register-content .right{
			padding-top: 55px;
			float: right;
			width:500px;
			display: inline-block;
		}
		.register-content .right p{
			font-size: 13px;
			margin-bottom: -5px;
		}

	</style>
</head>
<body>

<div class="container">
<?php 
	require 'pub/head.php';
 ?>
<div class="register-content">
	<div class="left">
	<h3 style='color:#F65A5B;margin-bottom: 20px;'>REGISTRATION</h3>
	<div style='border-top:solid 2px #000;width:55px;margin: -10px 0 20px 0;'></div>
	<p>Welcome,please enter the following details to continue.</p>
	<p>If you have previously Login with us, <a href="">click here</a></p>

	<form id='register_form'>
	<!-- <form action="" method='post' id='register_form'> -->
	<!-- <form action="php-ajax/register.php" method='post' id='register_form'> -->
		<h6>FIRST NAME: <input type="text" placeholder="长度必须低于２０" name='first_name'></h6>
		<h6 style='height:auto; padding-left:45%; height:auto; padding-left:45%; margin-top:0px;'  id='first_name_tip'></h6>
		<h6>LAST NAME: <input type="text" placeholder="长度必须低于２０" name='last_name'></h6>
		<h6 style='height:auto; padding-left:45%; margin-top:0px;' id='last_name_tip'></h6>
		<h6>EMAIL: <input type="email" placeholder="请输入正确的邮箱" name='email'></h6>
		<h6 style='height:auto; padding-left:45%; margin-top:0px;' id='email_tip'></h6>
		<h6>PASSWORD: <input type="password" placeholder="密码长度在6-16之间" name='password'></h6>
		<h6 style='height:auto; padding-left:45%; margin-top:0px;' id='password_tip'></h6>
		<h6>RE-ENTER PASSWORD: <input type="password" placeholder="确认密码" name='password1'></h6>
		<h6 style='height:auto; padding-left:45%; margin-top:0px;' id='password1_tip'></h6>
		<h6>MOBILE NUMBER: <input type="text" placeholder="请输入正确的电话号码" name='mobile'></h6>
		<h6 style='height:auto; padding-left:45%; margin-top:0px;' id='mobile_tip'></h6>
		<!-- <input type='submit' name='dosubmit' value='REGISTER NOW' style='cursor:pointer;display: block;background-color: #204056;color:#fff; width: 180px;height: 40px;border:none;float: left; margin-top:15px;'> -->
		<input type='button' onclick='formsubmit()' value='REGISTER NOW' style='cursor:pointer;display: block;background-color: #204056;color:#fff; width: 180px;height: 40px;border:none;float: left; margin-top:15px;'>
				<!-- <input type='submit' name='dosubmit' value='REGISTER NOW' style='cursor:pointer;display: block;background-color: #204056;color:#fff; width: 180px;height: 40px;border:none;float: left; margin-top:15px;'> -->
	</form>

	<p style='float:left;margin-top:30px;'>By clicking this button, you are agree to my
	<a href="" style='color:#F65A5B;font-size:13px;'>
		Policy Terms and Conditions.
	</a>
	</p>
	</div>

	<img id="backtotop" src="images/arr.png" style='position: relative; top:45%;float: right;' />

	<div class="right">
<h3 style='color:#F65A5B;margin-bottom: 20px;'>COMPLETELY FREE ACCOUNT</h3>
<div style='border-top:solid 2px #000;width:30px;margin-top: -10px;margin-bottom: 20px;'></div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo non harum aperiam nemo atque sequi, quas voluptate saepe, nulla distinctio voluptates optio molestiae perspiciatis, dolorum dolores voluptatem nihil maxime! Fugit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero veritatis culpa pariatur aspernatur maxime modi asperiores architecto praesentium aperiam qui, optio explicabo molestias hic, obcaecati dolore earum quasi, ipsa omnis? </p>
<h3 style='color:#F65A5B;margin-bottom: 20px;'>LOREM IPSUM DOLOR</h3>
<div style='border-top:solid 2px #000;width:30px;margin-top: -10px;margin-bottom: 20px;'></div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo non harum aperiam nemo atque sequi, quas voluptate saepe, nulla distinctio voluptates optio molestiae perspiciatis, dolorum dolores voluptatem nihil maxime! Fugit!</p>

	</div>
</div>

<?php 
	require 'pub/foot.php';
 ?>

</div>
<script src="https://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
<script src="js/register.js"></script>


</body>
</html>