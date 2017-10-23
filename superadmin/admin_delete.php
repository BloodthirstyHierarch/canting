<?php
session_start();
include "db.php";
header("content-type='text/html',charset=utf8");
if (!(isset($_SESSION['login']) && $_SESSION['login'] === 100)) {
	header("location:admin_query.php");
}
if (isset($_GET['email'])) {
	$email = $_GET['email'];
	$sql = "delete from admin_info where email='$email'";
	$result1 = mysql_query($sql);
	echo $result1;
	$sql = "delete from admin where email='$email'";
	$result2 = mysql_query($sql);
	echo $result2;
	if ($result1 && $result2) {
		echo "<script>alert('删除成功!');</script>";
	} else {
		echo "<script>alert('删除失败!');</script>";
	}
} else {
	echo "<script>alert('没有传入参数!');</script>";
}

echo "<script>history.go(-1);</script>";
?>