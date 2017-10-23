<?php
require "db.php";
session_start();
// $sql = "select * from admin_info";
// $result = $dbh->query($sql);
// $row = $result->fetch();
// var_dump($result);
// var_dump($row['AID']);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>管理员管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<?php
require "public/header.php"
?>
<div class="container clearfix">

<?php require "public/left.php"
?>
<!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员查询</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">管理员信息查询:</th>
                            <td><input class="common-text" placeholder="输入姓名或邮箱" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="admin_insert.php"><i class="icon-font"></i>新增人员</a>
    <!--                     <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a> -->
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>姓名</th>
                            <th>电子邮箱</th>
                            <th>电话</th>
                            <th>操作</th>
                        </tr>
<?php

$pagesize  = 5;
$sql       = "select * from admin";
$result    = mysql_query($sql);
$totalNum  = mysql_num_rows($result);
$totalPage = ceil($totalNum/$pagesize);
// echo $_GET['page'];
$page = isset($_GET['page'])?$_GET['page']:1;
if ($page > $totalPage) {
	$page = $totalPage;
} else if ($page < 1) {
	$page = 1;
}
// echo "Page:" . $page;
$start  = ($page-1)*$pagesize;
$sql    = "select * from admin_info limit $start,$pagesize";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
	echo "<tr>";
	echo "<th>".$row['AID']."</th>";
	echo "<th>".$row['name']."</th>";
	echo "<th>".$row['email']."</th>";
	echo "<th>".$row['mobile']."</th>";
	echo "<th> <a href=\"admin_update.php?email={$row['email']}\">修改</a> <a onclick = 'return confirm(\"Ensure delete this manager?\");' href='admin_delete.php?email={$row['email']}'>删除</a> </th>";

	echo "</tr>";
}
?>
</table>

<div class="list-page">

<?php
if ($page > 1) {
	?>
	    <a href='?page=<?php echo 1;?>'>首页</a>
	<?php
}
?>

<?php
if ($page > 5) {
	?>
	    <a href='?page=<?php echo $page-5;?>'>前五页</a>
	<?php
}
?>

<?php
if ($page > 1) {
	?>
	 <a href='?page=<?php echo $page-1;?>'>上一页</a>
	<?php
}
?>


<?php

//judge front side and end side;
$leftjudge                         = $page-1;
if ($leftjudge >= 2) {$leftjudge   = 2;}
$rightjudge                        = $totalPage-$page;
if ($rightjudge >= 2) {$rightjudge = 2;}

if ($leftjudge != 2) {
	if ($leftjudge == 1) {
		$leftside  = 1;
		$rightside = 3;
	} else if ($leftjudge == 0) {
		$leftside  = 0;
		$rightside = 4;
	}
} else if ($rightjudge != 2) {
	if ($rightjudge == 1) {
		$leftside  = 3;
		$rightside = 1;
	} else if ($rightjudge == 0) {
		$leftside  = 4;
		$rightside = 0;
	}
} else {
	$leftside  = 2;
	$rightside = 2;
}

for ($i = $page-$leftside; $i < $page; $i++) {
	if ($i > 0) {
		echo "<a href='?page=$i'>$i</a>";
	}
}

echo "<a style='background-color:#5294CC;color:#fff;'>$page</a>";

for ($i = $page+1; $i <= $page+$rightside; $i++) {
	if ($i <= $totalPage) {
		echo "<a href='?page=$i'>$i</a>";
	}
}

?>

<?php
if ($page < $totalPage) {
	?>
		<a href='?page=<?php echo $page+1;?>'>下一页</a>
	<?php
}
?>
<?php
if ($page < $totalPage-4) {
	?>
	    <a href='?page=<?php echo $page+5;?>'>后五页</a>
	<?php
}
?>
<?php
if ($page < $totalPage) {
	?>
		<a href='?page=<?php echo 1000000;?>'>尾页</a>
	<?php
}
?>

</div>

</div>
</form>
</div>
</div>
</div>
</body>
</html>