<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cart</title>
	<link rel="stylesheet" href="css/cart.css">
</head>
<body>

<div class="container">
<?php
include "pub/head.php";
$totalPrice = 0;

$email  = $_SESSION['email'];
$sql    = "select * from shopping_bag WHERE email='$email'";
$result = mysql_query($sql);

?>
<div class="content">
	<h4>MY SHOPPING BAG</h4>
	<hr>

<div id='buylist'>
<?php while ($row = mysql_fetch_assoc($result)) {
	$good_name  = $row['good_name'];
	$sql        = "select * from goods WHERE name='$good_name'";
	$result1    = mysql_query($sql);
	$row1       = mysql_fetch_assoc($result1);
	$totalPrice = $totalPrice+$row['number']*$row1['price'];
	?>
		<div>
		<img src="<?php echo $row1['img'];?>" height="170" width="274"/>
		<div style="margin-left: 100px	">
		<p> <?php echo $row1['name'];?> </p>
		<p>Pickup time :2017.10.10 12:00</p>
		<p>Min.order value: $2.00 &nbsp&nbsp&nbsp&nbsp FREE delivery</p>
		<br>
		<p>Service Charges:$<i><?php echo $row1['price']?></i></p>
		
		</div>
		<img name='<?php echo $row1['name'];?> ' onclick='dele(this)' src="images/close_1.png"  height="24" width="24">

		<span><button onclick='cal(this)'>-</button><i><?php echo $row['number']?></i><button onclick='cal(this)'>+</button>
		</span>
		<p style="margin-left: 300px">Delivered in 1-1:30 hours</p>
		
		</div>
	<?php
}
?>
</div>
<span>总价:$<b><?php echo $totalPrice;?></b></span>
</div>
</div>


<?php
include 'pub/foot.php';
?>
</div>
<script>

function dele(that){
	console.log(that.parentNode);
	var good_div = that.parentNode;
	good_div.parentNode.removeChild(good_div);

		var data = {
			good_name:that.name,
			email:'<?php echo $email;?>'
		}
		console.log(data);
		var J_data = JSON.stringify(data);
		var xml = new XMLHttpRequest();
		xml.open('POST','php-ajax/delete_good.php',true);
		xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xml.send("J_data="+J_data);
		xml.onreadystatechange = function(){
			if(xml.readyState===4&&xml.status===200){
				console.log(xml.responseText);
				if(xml.responseText==='1'){
					console.log('删除成功!');
	var prices = buylist.querySelectorAll('div>div>p:last-child>i');
	var numbers = buylist.querySelectorAll('div>div>span>i');
	//Count the total price:
	var totalPrice = 0;
	for(var i=0;i<prices.length;i++){
		totalPrice = totalPrice + prices[i].innerText * numbers[i].innerText;
	}
	document.querySelector('.content>span>b').innerText= totalPrice;
				}
			}
		}
}
function cal(that){
	var buylist = document.getElementById('buylist');
	//获得当前的数目
	var n = that.parentNode.querySelector('i'),
		pn = parseInt(n.innerText);
	//判断计算类型并进行相应操作
	var number;
	if(that.innerText==='+'){
		number = pn + 1;
	}else if(pn>1){
		number = pn - 1;
	}else{
		return false;
	}
	//Send the request to ajax
	var good_name = that.parentNode.previousElementSibling.name;
		var data = {
			good_name:good_name,
			email:'<?php echo $email;?>',
			number:number
		}
		var J_data = JSON.stringify(data);
		var xml = new XMLHttpRequest();
		xml.open('POST','php-ajax/cart-alert_number.php',true);
		xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xml.send("J_data="+J_data);
		xml.onreadystatechange = function(){
			if(xml.readyState===4&&xml.status===200){
				if(xml.responseText==='1'){
					n.innerText = number;
	var prices = buylist.querySelectorAll('div>div>p:last-child>i');
	var numbers = buylist.querySelectorAll('div>div>span>i');
	//Count the total price:
	var totalPrice = 0;
	for(var i=0;i<prices.length;i++){
		totalPrice = totalPrice + prices[i].innerText * numbers[i].innerText;
	}
	document.querySelector('.content>span>b').innerText= totalPrice;
				}
			}
		}



}
</script>


</body>
</html>