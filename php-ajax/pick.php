<?php
include '../db.php';
$data      = json_decode($_POST['J_data']);
$email     = $data->email;
$good_name = $data->good_name;

//首先判断购物车表中是否存在用户与该商品的联系
$sql    = "select * from shopping_bag WHERE email='$email' and good_name='$good_name' limit 1";
$result = mysql_query($sql);
$row    = mysql_fetch_assoc($result);
if ($row) {
	// 如果有，则让原来的数量加１
	$number = $row['number']+1;
	$sql    = "update shopping_bag set number='$number' WHERE email='$email' and good_name='$good_name'";
	$result = mysql_query($sql);
	echo 1;
} else {
	//如果没有，则新建联系并让数量为１
	$sql    = "insert into shopping_bag (email,good_name) values ('$email','$good_name')";
	$result = mysql_query($sql);
	echo 2;
}

?>