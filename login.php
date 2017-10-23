<?php 
	include "db.php";

	session_start();

	header("content-type:text/html;charset=utf-8");

	// if(isset($_SESSION['login'])) {
	//     echo "你已登录";
	//     echo "<script>setTimeout(\"location.href='index.php'\", 3000)</script>";
	//     exit();
	// }
	if (isset($_SESSION['login'])) {
		echo "你已登录";
		if ($_SESSION['login'] === 100) {
			echo "<script>setTimeout(\"location.href='admin.php'\", 3000)</script>";
		} else if ($_SESSION['login'] === 10) {
			echo "<script>setTimeout(\"location.href='index.php'\", 3000)</script>";
		} else if ($_SESSION['login'] === 1) {
			echo "<script>setTimeout(\"location.href='index.php'\", 3000)</script>";
		} else {
			echo "登录状态异常";
		}
		exit();
	} else {
		if(isset($_POST['login'])) {
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			if(!(empty($email) || empty($password))) {
				$mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';  
		        if(preg_match($mode,$email)){
					if(strlen($password) >= 5 && strlen($password) <= 18) {

		            	$sql_admin = "select * from admin where email='{$email}' limit 1";
				        $result = mysql_query($sql_admin);
				        $row = mysql_fetch_assoc($result);
				        if($row) {
				            $pwd1 = md5($password);
				            $sql = "select * from admin where email='{$email}' and password = '$pwd1'";
				            $result =mysql_query($sql);
				            $row = mysql_fetch_assoc($result);
				            if($row) {
				                $_SESSION['login'] = 10;
				                $_SESSION['email'] = $row['email'];
				                header("location:index.php");
				            } else {
				            	echo "<script>alert('用户名或密码不正确')</script>";
				            }
				        }

				        $sql_user = "select * from user where email='{$email}' limit 1";
				        $result = mysql_query($sql_user);
				        $row = mysql_fetch_assoc($result);
				        if($row) {
				            $pwd1 = md5($password);
				            $sql = "select * from user where email='{$email}' and password = '$pwd1'";
				            $result =mysql_query($sql);
				            $row = mysql_fetch_assoc($result);
				            if($row) {
				                $_SESSION['login'] = 1;
				                $_SESSION['email'] = $row['email'];
				                header("location:index.php");
				            } else {
				            	echo "<script>alert('用户名或密码不正确')</script>";
				            }
				        }

				        $sql_sadmin = "select * from superadmin where email='{$email}' limit 1";
				        $result = mysql_query($sql_sadmin);
				        $row = mysql_fetch_assoc($result);
				        if($row) {
				            $pwd1 = md5($password);
				            $sql = "select * from superadmin where email='{$email}' and password = '$pwd1'";
				            $result =mysql_query($sql);
				            $row = mysql_fetch_assoc($result);
				            if($row) {
				                $_SESSION['login'] = 100;
				                $_SESSION['email'] = $row['email'];
				                header("location:superadmin/index.php");
				            } else {
				            	echo "<script>alert('用户名或密码不正确')</script>";
				            }
				        }


				        else {
				        	echo "<script>alert('用户名不存在')</script>";
				        }

		            } else {
		            	echo "<script>alert('密码必须6-18位')</script>";
		            }
				} else {
					echo "<script>alert('请输入正确的邮箱')</script>";
				}
			} else {
	            echo "<script>alert('用户名或密码不能为空')</script>";
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<style>
		.login-content{
			width: 1100px;
			height:345px;
			padding:70px 50px;
			margin: auto;
			margin-top: -200px; 	
		}
		.login-content .left{
			width:45%;
			display: inline-block;
			float: left;
		}
		.login-content .left form{
			width: 350px;
			height:300px;
		}
		.login-content .left form h5{
			margin-bottom: 5px;
			font-weight: 300;
			color:#204056;
		}
		.login-content .left form input{
			width:360px;
			height:35px;
			border:solid 1px #ccc;
			border-radius: 0px;
		}
		.login-content .left p{
			font-size: 13px;
			margin-bottom: 25px;			
		}
		.login-content .left p a{
			color:#FA5A5B;
			text-decoration:none; 
		}
		.login-content .right{
			width:45%;
			margin-right: 60px;
			display: inline-block;
			float: left;
		}
		.login-content .right p{
			line-height: 25px;
			font-size: 13px;
			margin-bottom: 25px;			
		}
	</style>
</head>
<body>

<?php 
	require "/pub/head.php";
 ?>
<!-- <div class="container"> -->

		


<div class="login-content">

<div class="left">
<h3 style='color:#F65A5B;margin-bottom: 20px;'>LOGIN</h3>
	<div style='border-top:solid 2px #000;width:30px;margin-top: -10px;'></div>	
<p>Welcome,please enter the following to continue.</p>
<p>If you have previously Login with us, <a href="">click here</a></p>
<form action="" method="post">
	<h5>USER NAME:</h5>
	<input type="email" name="email" placeholder="Enter the email" />
	<h5>PASSWORD:</h5>
	<input type="password" name="password" value="123456">
	<input type="submit" value='LOGIN' name='login' style='display: block;background-color: #204056;color:#fff; width: 110px;height: 40px;border:none; margin-top:30px;'>
<a href="" style='color:#F65A5B;font-size:13px;'>Forget Password?</a>
</form>
</div>

<div class="right">
<h3 style='color:#F65A5B;margin-bottom: 20px;'>NEW REGISTRATION</h3>
<div style='border-top:solid 2px #000;width:30px;margin-top: -10px;'></div>	
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ipsam aspernatur, error animi aut accusantium, itaque ipsum fugiat perspiciatis architecto deleniti mollitia commodi doloremque incidunt nihil perferendis enim sequi debitis.</p>
	<!-- <input type="button"  value='CREATE AN ACCOUNT' style='display: block;background-color: #204056;color:#fff; width: 190px;height: 40px;border:none; margin-top:30px;'> -->
	<a style='display: block;background-color: #204056;color:#fff; width: 190px;height: 33px;border:none; margin-top:30px; text-align: center;padding-top: 7px' href="register.php">CREATE AN ACCOUNT</a>
</div>	

<img id="backtotop" onclick="backtotop()" src="images/arr.png" style='position: relative; top:45%; ' />

<!-- </div> -->

		
		
</div>
<?php 
	require '/pub/foot.php';
?>
	<script>
		function backtotop() {
			document.documentElement.scrollTop = 0;
			// document.querySelector('body').scrollTop = 0;
		}
	</script>
</body>
</html>