<?php
require "db.php";
session_start();

if (isset($_POST['dosubmit'])) {
	$name      = $_POST['name'];
	$price     = $_POST['price'];
	$introduce = $_POST['introduce'];
	if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['introduce'])) {
		echo "<script>alert('任何字段不能为空！');</script>";
	} else {
		$sql    = "select * from goods where name = '$name' limit 1";
		$result = mysql_query($sql);
		if (mysql_fetch_assoc($result)) {
			echo "<script>alert('This food is existing!');</script>";
		} else if ($_FILES['img']['error'] === 0) {
			$imgName = $_FILES['img']['name'];
			$arr     = explode(".", $imgName);
			$extName = end($arr);
			$arr_end = array("png", "jpg", "gif");
			if (!in_array($extName, $arr_end)) {
				exit("上传头像不合法!");
			}
			$maxsize = 1024*1024;
			if ($_FILES['img']['size'] > $maxsize) {
				exit('上传文件不能超过1M!');
			}
			if (is_uploaded_file($_FILES['img']['tmp_name'])) {
				$src = './upload/'.time().rand(1000, 9999).'.'.$extName;
				if (move_uploaded_file($_FILES['img']['tmp_name'], $src)) {
					// echo "头像上传成功!";

					$sql    = "insert into goods (name,price,img,introduce) values ('$name','$price','$src','$introduce')";
					$result = mysql_query($sql);
					if ($result) {
						echo "<script>alert('上传成功!')</script>";
					} else {
						echo "<script>alert('上传失败!')</script>";
					}
				} else {
					echo "头像上传失败!";
				}
			}

		}
	}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mune</title>
		<link rel="stylesheet" type="text/css" href="/canting/css/base.css"/>
		<style>
			#add_good{
				width:300px;
				border-radius: 3px;
				margin:0 auto 100px auto;
				padding:10px;
			}
			td>input{
				border:solid 2px #999;
				border-radius: 5px;
			}
		</style>		
	</head>
<body>
<div class="container">
<?php
include "pub/head.php";
?>
<form id='add_good' method="post" enctype="multipart/form-data" >
<h3>请添加食品：</h3>
<table cellspacing="10">
	<tr>
		<td>名字:</td>
		<td><input type="text" name='name'></td>
	</tr>
	<tr>
		<td>价格:</td>
		<td><input type="text" name='price'></td>
	</tr>
	<tr>
		<td>图片:</td>
		<td>
<input type='file' onchange='showImg(this)' name='img' />
<img src=''/>
<script>
function showImg(that){
 var img = that.nextElementSibling;
 var r = new FileReader();
 r.readAsDataURL(that.files[0]);
 r.onload = function(e){
 	img.src=this.result;
 }
 }
 </script>

 </td>
	</tr>
	<tr>
		<td>介绍</td>
		<td><textarea name='introduce'> </textarea></td>
	</tr>
	<tr>
	<td></td>
	<td>
	<input style='width: 80px;height: 30px;' name='dosubmit' type='submit' value='提交'>
	</td>
	</tr>
</table>
</form>




<?php
include "pub/foot.php";
?>
</div>

</body>
</html>