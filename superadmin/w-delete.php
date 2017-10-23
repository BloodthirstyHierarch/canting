<?php
include "db.php";
header("content-type:text/html;charset=utf8");
$email = $_GET['email'];
$sql = "delete from admin where email = '$email'";
$result1 = mysql_query($sql);

$sql = "delete from user_info where email = '$email'";
$result2 = mysql_query($sql);

if ($result1 && $result2) {
	echo "<script>alert('删除成功!');</script>";
	echo "<script>location.href='admin.php';</script>";
} else {
	echo "<script>alert('删除失败!');</script>";
}
?>