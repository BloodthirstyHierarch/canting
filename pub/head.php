<?php 
    // session_start();
    if (($_SERVER["REQUEST_URI"] != "/PHP/canting/login.php") && ($_SERVER["REQUEST_URI"] != "/PHP/canting/register.php")) {
    	if(!(isset($_SESSION['login']))) {
    		echo "<script>alert('请先登录');</script>";
	    	// echo "<script>setTimeout(\"location.href='login.php'\", 0)</script>";
	        header("location:login.php");
	    }
    } 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<div id="top_side_head">
			<div id="top_top1">
				<div id="top_top1_left">
					<p class="top_top1_p">
						Place your order and get 20% off on each prise
					</p>
				</div>
				<div id="top_top1_center">            
					<div id="top_top1_center_lr">
						<?php 
							echo (isset($_SESSION['login'])) ? "<a href=\"logout.php\">Logout</a>" : "<a href=\"login.php\">Login</a>";
						 ?>
						&nbsp; | &nbsp;<a href="register.php">Register</a> &nbsp;&nbsp;&nbsp;
					</div>
					<a href="">
						<div id="top_top1_center_search">
							<img src="images/search.png"/>
						</div>
					</a>
				</div>
				<div id="top_top1_right">
					<div class="top_top1_right_pc">
						<p class="top_top1_p">
							$0.00 ( 0 items)
						</p>
					</div>
					<a href="cart.php">
						<div id="top_top1_center_collect">
							<img src="images/bag.png"/>
						</div>
						<div class="top_top1_right_pc">
							<p class="top_top1_p">
								Empty Cart
							</p>
						</div>
					</a>
				</div><br />
			</div>
			<div id="top_bg" style="height: 350px; overflow:hidden;">
				<div id="top_top2">
					<ul id="top_top2_ul">
						<li class="top_top2_li">
							<a href="index.php"><div class="top_top2_li_div">HOME</div></a>
						</li>
						<li class="top_top2_li">
							<a href="about.php"><div class="top_top2_li_div">ABOUT</div></a>
						</li>
						<li class="top_top2_li">
							<a href="menu.php"><div class="top_top2_li_div">OUR MENU</div></a>
						</li>
						<li class="top_top2_li">
							<a href="gallery.php"><div class="top_top2_li_div">GALLERY</div></a>
						</li>
						<li class="top_top2_li">
							<a href="orders.php"><div class="top_top2_li_div">TODAY'S SPECIAL</div></a>
						</li>
						<li class="top_top2_li">
							<a href=""><div class="top_top2_li_div">CONTACT</div></a>
						</li>
					</ul>
				</div>
					
				<div id="top_center">
					<div id="top_center_top">
						<img src="images/3.png"/>
					</div>
					<div id="top_center_center">
						<p class="top_center_center_fav">FAVORITES</p>
						<p class="top_center_center_stda">Spicy, Tasty & Delicious Always!!</p>
					</div>
					<a href="">
						<div id="top_center_foot">
							ORDER US NOW
						</div>
					</a>
				</div>
				<div id="top_foot">
					<a href=""><div class="top_foot_div" id="top_foot_left">
							<div class="top_foot_div_div">
								<img class="top_foot_div_img" src="images/k1.png"/>
							</div>
							<b>NEW DISHES</b>
						</div></a>
					<a href=""><div class="top_foot_div" id="top_foot_center">
						<div class="top_foot_div_div" id="top_foot_div_div">
							<img class="top_foot_div_img" src="images/k2.png"/>
						</div>
						<b>POPULAR</b>
					</div></a>
					<a href=""><div class="top_foot_div" id="top_foot_foot">
						<div class="top_foot_div_div">
							<img class="top_foot_div_img" src="images/k3.png"/>
						</div>
						<b>SPECIAL OFFER</b>
					</div></a>
				</div>
			</div>
		</div>
	</body>
</html>
