<?php 
include 'db.php';
session_start();
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/wangxingxing.css"/>
		<link rel="stylesheet" type="text/css" href="css/mune.css"/>

	</head>
	<body>
		<?php 
	include "/pub/head.php";
 ?>
		<!-- <div> -->
	<div class="all">
		<div class="top">
			<b><p id="p1"> CHECK OUT OUR MENU HERE</p></b>
			<div id="d1"></div>
			<?php
				if ($_SESSION['login'] === 10) {
			?>
					<div align='center'><a  href='admin-add_good.php'>添加商品</a></div>
			<?php
				}
			?>
		</div>
		<div class="mid">
			<?php 
                $sql = "select * from goods ";
				$result = mysql_query($sql);
                $total_page = mysql_num_rows($result);
                // echo "总行数".$total_page;      //总行数
                $page = isset($_GET['page']) ? $_GET['page'] : 1;  
                $page_size = 5;                             //每页容量
                $page_num = ceil($total_page/$page_size);   //页数
                $start = $page_size * ($page - 1);          //起始页码

				$sql = "select * from goods limit $start, $page_size";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_assoc($result)) {
			?>
					<div class="goods">
						<p id="p2"><img src="<?php echo $row['img']; ?>" height="170" width="274"></p>
						<p id="p3">$<?php echo $row['price'] ?></p>
						<p id="p4"><?php echo $row['name'] ?>
							<?php
								if ($_SESSION['login'] == 10) {
							?>
									<input style='float:right;width:80px;height:30px;margin-left:10px;'/>
									<a onclick='alter_price(this)' name=' <?php echo $row['GID']?>'>修改价格</a>
							<?php
								} else {
							?>
									<a onclick='pick(this)' name='<?php echo $row['name']?>'>添加到购物车</a>
							<?php
								}
							?>
						</p>
						<p id="p5">Nam libero tempore,cum soluta nobis est eligendl optio cumque nihil <br>impedit</p>	
					</div>
			<?php
				}
		 	?>	
		</div>
			
	</div>
	<!-- </div> -->
	<div class="list-page">
        <a href="?page=1">首页</a>
        <a href="?page=<?php echo $page - 1 ?>">上一页</a>
        <?php 
            for($i = $page - 4; $i < $page; $i++ ) {
                if($i < 1) {
                    continue;
                }
        ?> 
            <a href="?page=<?php echo $i ?>";"><?php echo $i ?></a>
        <?php 
            }
        ?>
        <a class="current" href="?page=<?php echo $page ?>";"><?php echo $page ?></a>
        <?php       
            for($i = $page + 1; $i <= $page + 4; $i++ ) {
                if($total_page%$page_size != 0) {
                    if($i > $total_page/$page_size + 1) {
                        break;
                    }
                } else {
                    if($i > $total_page/$page_size) {
                        continue;
                    }
                }
        ?>
            <a href="?page=<?php echo $i ?>";"><?php echo $i ?></a>  
        <?php 
            }
            $next_five = 5;
        ?>      
        <a href="?page=<?php echo $page + 1 ?>">下一页</a>
        <a href="?page=<?php echo $page_num ?>">尾页</a>
    </div>
	<?php 
		require "/pub/foot.php";
 	?>


 <script>


function pick(that){
	var data = {
		email:'<?php echo $_SESSION['email'];?>',
		good_name:that.name
	}
	var J_data = JSON.stringify(data);
	var xml = new XMLHttpRequest();
	xml.open('POST','php-ajax/pick.php',true);
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send("J_data="+J_data);
	xml.onreadystatechange = function(){
		if(xml.readyState===4&&xml.status===200){
			console.log(xml.responseText);
			if(xml.responseText=='1'){
				alert('增加成功！');
			}else{
				alert('添加成功！');
			}
		}
	}
}


function alter_price(that){
	var price = that.previousElementSibling.value;
	if(price) {
		var data = {
			id:that.name,
			price:price
		}
		var J_data = JSON.stringify(data);
		var xml = new XMLHttpRequest();
		xml.open('POST','php-ajax/alter_price.php',true);
		xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xml.send("J_data="+J_data);
		xml.onreadystatechange = function(){
			if(xml.readyState===4&&xml.status===200){
				if(xml.responseText){
					that.parentNode.previousElementSibling.innerText = '$'+price;
					alert('成功修改价格！');
				}else{
					alert('请输入正确的价格!');
				}

			}
		}
	}
}
 </script>
	</body>
</html>

