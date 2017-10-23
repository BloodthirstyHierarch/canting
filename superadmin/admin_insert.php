<?php
require "db.php";
session_start();

if (isset($_POST['dosubmit'])) {

	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$pwd = trim($_POST['password']);
	$pwd1 = trim($_POST['password1']);
	$mobile = trim($_POST['mobile']);

	if (empty($name) || empty($pwd) || empty($pwd1) || empty($email) || empty($mobile)) {
		echo "<script>alert('所有字段不能为空！');</script>";
	} else if (!preg_match('/^\w+@\w+\.\w+$/', $email)) {
		echo "<script>alert('邮箱不合法!');</script>";
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
			"<script>alert('邮箱已被占用!')</script>";
		} else {
			if (!strlen($pwd) >= 5 && !strlen($pwd) <= 18) {
				echo "<script>alert('密码长度为５－１８位!');</script>";
			} else if (strcmp($pwd, $pwd1) !== 0) {
				echo "<script>alert('两次密码不一样!');</script>";
			} else if (strlen($name) > 20) {
				echo "<script>alert('姓名太长！');</script>";
			} else if (!preg_match('/\w+@\w+\.\w+/', $email)) {
				echo "<script>alert('邮箱不合法!');</script>";
			} else {
				$password = md5($pwd);
				$result1 = mysql_query("insert into admin_info(name,email,mobile) values ('$name','$email','$mobile')");
				if ($result1) {
					$result2 = mysql_query("insert into admin(email,password) values ('$email','$password')");
					if ($result2) {
						echo "<script>alert('新增管理员成功!');</script>";
					} else {
						//回滚
					}
				}
			}
		}
	}
}

?>











<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<?php
require "public/header.php";
?>

<div class="container clearfix">
<?php require "public/left.php"
?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="admin_query.php">管理</a><span class="crumb-step">&gt;</span><span>新增人员</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>姓名：</th>
                                <td>
                                    <input name="name" lass="common-text required"  size="40" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>电子邮箱：</th>
                                <td>
                                    <input name="email" lass="common-text required"  size="40" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>密码：</th>
                                <td><input name="password" class="common-text"  size="40" type="password"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>确认密码：</th>
                                <td><input name="password1" class="common-text"  size="40" type="password"></td>
                            </tr>

                            <tr>
                                <th>电话：</th>
                                <td><input name="mobile" class="common-text"  size="40" ></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input name='dosubmit' class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                </td>
                            </tr>
                        </tbody>
                        </table>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>