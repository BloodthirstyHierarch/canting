<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<?php 
	require "/pub/head.php";
 ?>
		<br /><br /><br /><br /><br /><br /><br /><br />
		<div id="whx">
			<div style="color:#F65A58;font-size: 150%;text-align: center;margin-top: -300px">GALLERY</div>
			<div style="width: 90px;height: 2px;background-color: black;text-align: center;margin:auto;margin-top: 10px;margin-bottom: 10px;"></div>
			<table style="margin-left: 150px;" cellspacing="50px">
				<tr >
					<td><img class="center_img" src="images/k1.jpg"/></td>
					<td><img class="center_img" src="images/k2.jpg"/></td>
					<td><img class="center_img" src="images/k3.jpg"/></td>
				</tr>
				<tr>
					<td><img class="center_img" src="images/k4.jpg"/></td>
					<td><img class="center_img" src="images/k5.jpg"/></td>
					<td><img class="center_img" src="images/k6.jpg"/></td>
				</tr>
				<tr>
					<td><img class="center_img" src="images/k7.jpg"/></td>
					<td><img class="center_img" src="images/k8.jpg"/></td>
					<td><img class="center_img" src="images/k9.jpg"/></td>
				</tr>
			</table>
		</div>
		<?php 
	require "/pub/foot.php";
 ?>
	</body>
</html>
