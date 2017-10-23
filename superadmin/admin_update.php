<?php
require "db.php";
header("content-type:text/html;charset=utf-8");
session_start();
//If had been submit.
// echo "Come to update page!";
if (isset($_POST['docancel'])) {
	//返回主查询页面
	header('location:admin_query.php');
} else if (isset($_POST['dosubmit'])) {
	$AID = $_POST['AID'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];

	echo $AID . '<br>';
	echo $name . '<br>';
	echo $email . '<br>';
	echo $mobile . '<br>';
	echo $password . '<br>';

	if (empty($AID) || empty($name) || empty($email) || empty($mobile)) {
		echo "<script>alert('任何字段不能为空！');</script>";
	} else {
		echo "start to alter...";
		if (empty($password)) {
			$sql = "select * from admin_info where email= '$email' ";
			// $result = mysql_query($sql);
			// $row = mysql_fetch_assoc($result);
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);

			if ($row['name'] == $name && $row['mobile'] == $mobile) {
				echo "<script>alert('未修改值！');</script>";
			} else {
				$sql = "update admin_info set name = '$name' , mobile = '$mobile' where email = '$email'";
				$result = mysql_query($sql);
				echo "<script>alert('修改成功！');</script>";
				echo "<script>location.href='admin_query.php';</script>";
			}
		} else {
			$sql = "update admin_info set name = '$name',mobile = '$mobile' where email = '$email'";
			// $result1 = mysql_query($sql);
			$result1 = mysql_query($sql);
			$pwd = md5($password);
			$sql = "update admin set password = '$pwd' where email = '$email'";
			// $result2 = mysql_query($sql);
			$result2 = mysql_query($sql);
			if ($result1 && $result2) {
				echo "<script>alert('修改成功！');</script>";
				echo "<script>location.href='admin_query.php';</script>";
			} else {
				echo "<script>alert('修改失败！');</script>";
			}
		}
	}

} else {
	// echo "Not do submit!" . "<br>";
	if (isset($_GET['email'])) {
		// echo "Get email" . "<br>";
		//接收用户名显示初始内容
		$email = $_GET['email'];
		// echo "email:" . $email . "<br>";
		$sql = "select a.AID,a.email,a.password,b.name,b.mobile from admin as a left join admin_info as b on a.email = b.email where a.email = \"{$email}\"";
		// $sql = "select * from admin_info where email='$email'";
		// $result = mysql_query($sql);
		// echo "1 ok!" . "<br>";
		$result = mysql_query($sql);
		// $row = mysql_fetch_assoc($result);
		// var_dump($result);
		// echo "2 ok!" . "<br>";
		$row = mysql_fetch_assoc($result);
		// echo "3 ok!" . "<br>";
		$AID = $row['AID'];
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="admin_query.php">管理</a><span class="crumb-step">&gt;</span><span>修改管理员信息</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>ID：</th>
                                <td>
                                    <input name='AID' readonly value=<?php echo $AID; ?> >
                                </td>
                            </tr>
                            <tr>
                                <th>邮箱：</th>
                                <td>
                                    <input name='email' readonly value=<?php echo $email; ?> >
                                </td>
                            </tr>
                            <tr>
                                <th>姓名：</th>
                                <td>
                                    <input name="name" value=<?php echo $name; ?> />
                                </td>
                            </tr>
                            <tr>
                                <th>电话: </th>
                                <td>
                                    <input name='mobile' value=<?php echo $mobile; ?> >
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <a id="cpwd" style="margin-right: 10px;cursor: pointer;" >修改密码</a>
                                </th>
                                <td>
                                    <input id='pwd' style='visibility:hidden;' name="password" value="" type="password">
                                </td>
                                <script>
                                    document.getElementById('cpwd').onclick = function(){
                                        var pwd = document.getElementById('pwd');
                                        var cpwd = document.getElementById('cpwd');
                                        if(pwd.style.visibility==='visible'){
                                            pwd.style.visibility='hidden';
                                            pwd.value='';
                                            cpwd.innerText = '修改密码';

                                        }else{
                                            pwd.style.visibility= 'visible';
                                            cpwd.innerText = '不想改了';
                                        }
                                    }
                                </script>
                            </tr>

                            <tr>
                                <th></th>
                                <td>
                <input name='dosubmit' value='提交' type='submit'/>
                <input name='docancel' value='取消' type='submit'/>
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