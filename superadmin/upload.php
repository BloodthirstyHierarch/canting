<?php

if ($_POST['dosubmit']) {
	if ($_FILES['file']['error'] !== 0) {
		exit("文件上传错误");
	}
	// echo $_FILES['file']['error'];
	$filename = $_FILES['file']['name'];
	// //explode 把字符串分隔为数组 implode() 数组分隔为字符串
	$arr = explode(".", $filename);
	// //将数组的内部指针指向最后一个单元
	$extName = end($arr);
	// echo $extName;
	$arr = ['png', 'jpg', 'gif'];

	// //in_array() 判断一个变量是否在数组中
	if (!in_array($extName, $arr)) {
		exit("上传文件不合法!");
	}

	$maxsize = 1024 * 1024;
	if ($_FILES['file']['size'] > $maxsize) {
		exit('上传文件不能超过1M!');
	}

	// //判断文件是否是通过 HTTP POST　上传的
	if (is_uploaded_file($_FILES['file']['tmp_name'])) {
		$src = "./upload/" . time() . rand(1000, 9999) . $extName;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $src)) {
			echo "上传成功!";
		} else {
			echo "上传失败!";
		}
	}
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name='file'>
	<input type="submit" name="dosubmit">


</form>

</body>
</html>