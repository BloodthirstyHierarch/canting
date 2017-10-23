<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/carousel.css"/>

	<style>
		.zfc-index-content{
			margin: auto;
			background-color: #fff;
			width:1200px;
			height:auto;
		}
		.zfc-index-content .intro{
			margin :160px auto 80px auto;
			padding-left:125px;

		}
		.zfc-index-content .intro p{
			display: inline-block;
			line-height: 25px;
			font-size: 13px;
			margin-right: 95px;
			width:250px;
			height:100%;
		}
		#zfc-index-mune{
			padding-left:40px; 
		}
		#zfc-index-mune li{
			color:#FFFFFF;
			background-color: #204056;
			margin:13px;
			width: 350px;
			height: 262px;
			list-style: none;
			float: left;
		}
		#zfc-index-mune li h5{
			margin:30px 0 0 75px;
		}
		#zfc-index-mune li p{
			margin:0;
			line-height: 200%;
			padding:10px 28px;
			font-size: 13px;
		}
		.find_deserts{
			margin-top: 70px;
			padding-top: 70px;
			height:500px;
			background-color: #6A737B;
		}
		.find_deserts .left{
			float: left;
			margin-left: 100px;
			overflow: hidden;
			background: url(images/pic12.jpg);
			width: 443px;
			height:290px;
		}
		.find_deserts .right{
			margin-left: 30px;
			width: 480px;
			float: left;
		}
		.find_deserts .right p{
			margin-bottom: 20px;
			color:#fff;
			line-height: 200%;
			font-size: 12px;
		}
		.all_tastes{
			height:600px;
			background: #fff;
			margin:100px 0 20px 0;
		}
		.all_tastes ul{
			padding:0;
			padding-left:30px;
			width: 1200px;
			margin:60px 0 0 0;

		}
		.all_tastes ul li{
			border:solid 1px #aaa;
			list-style: none;
			padding:15px;
			width: 253px;
			height:365px;
			display: inline-block;
			float: left;
		}
		.all_tastes ul li h4{
			line-height: 30px;
			margin:0;
			padding:8px 0;
			background-color:#204056;
			color:#fff;
			text-align: center;
		}
		.all_tastes ul li p{
			height:100px;
			margin-bottom: 0;
			overflow: hidden;
			font-size: 12px;
			line-height: 24px;
		}
		.all_tastes ul li a{
			font-size: 17px;
			color:#F65A80;
			text-decoration: none;
		}
	</style>
</head>
<body>
<?php 
	require '/pub/head_index.php';
 ?>
<div class="container">
		

	<div class="zfc-index-content">

		<div class="intro">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit totam, eius, fuga harum, deserunt sequi culpa dolore sunt laborum, dolorum et consequatur. Nam id accusamus suscipit, delectus, voluptate inventore est!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit totam, eius, fuga harum, deserunt sequi culpa dolore sunt laborum, dolorum et consequatur. Nam id accusamus suscipit, delectus, voluptate inventore est!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit totam, eius, fuga harum, deserunt sequi culpa dolore sunt laborum, dolorum et consequatur. Nam id accusamus suscipit, delectus, voluptate inventore est!</p>
		</div>

		<h3 style='border-bottom:solid 2px #000; color:#F65A5B;width:155px;margin:0 auto;text-align: center; padding:0 0 10px 0;'>WELCOME</h3>
						<ul id='carousel'>
	<div onclick='carousel.turn("left")'><</div>
	<li><img src="images/1.jpeg"></li>
	<li><img src="images/2.jpg"></li>
	<li><img src="images/3.jpg"></li>
	<li><img src="images/4.jpg"></li>
	<li><img src="images/5.jpg"></li>
	<div onclick='carousel.turn("right")'>></div>
</ul>
		<p style='margin:40px 0;padding:0 100px;font-size: 13px;line-height: 25px; text-align: center;'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore aperiam omnis culpa eaque modi accusantium tenetur fuga officia iusto iure quia necessitatibus sunt quas perferendis, doloribus sint amet, quo ipsam. ipsum dolor sit amet, consectetur adipisicing elit. Doloribus aperiam facilis, alias accusamus earum voluptatibus nobis qui?</p>
		<ul id='zfc-index-mune' style='height:600px;'>
			<li><img src="images/pic10.jpg"/></li>
			<li><h5>TEMPORIBUS AUTEM</h5><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum amet dignissimos, eligendi esse architecto vitae consequuntur, cupiditate, nulla sit dolor nemo pariatur repudiandae minus deleniti delectus impedit excepturi beatae ab!</p></li>
			<li><img src="images/pic11.jpg"/></li>
			<li><h5>TEMPORIBUS AUTEM</h5><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit eos nesciunt cum, dolorum eaque, nihil tenetur placeat, rerum distinctio accusamus quidem ea impedit. Laborum nam esse nostrum saepe facilis quis.</p></li>
			<li><img src="images/pic2.jpg"/></li>
			<li><h5>TEMPORIBUS AUTEM</h5><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam et eligendi aut cupiditate unde dolores nemo quis possimus magni est blanditiis assumenda, necessitatibus harum! Dolorum fugit dolores, ratione amet veniam!</p></li>
		</ul>

		<div class="find_deserts">
			<h2 style='margin-top:10px; text-align: center;font-size: 30px;color:#F65A5B;'>FIND DESERTS</h2>
			<div style='border-top:solid 2px #111;width:200px;margin:15px auto 50px auto'></div>
			<div class="left">
				<div style='margin-top:152px;padding:40px 0 0 40px;background: url(images/16.png);height: 140px;'>
					<h3 style='position:relative; top:;color:#fff;z-index: 100;' >DESERT</h3>
				</div>
			</div>
			<div class="right">
				<h5 style='color:#204056; margin:0;padding: 0;line-height: 80%'>GOOD FOOD KEEPS YOU HEALTHY</h5>
				<div style='width:30px;border-bottom:solid 2px #000;margin-top: 15px;'></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo fugiat, iusto facilis ad earum totam esse, suscipit magni praesentium quos minima tempora mollitia saepe sapiente sed dolorem. Necessitatibus, temporibus, cumque.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia enim, porro possimus eos ea in distinctio minus nulla tenetur quasi quas beatae velit architecto incidunt molestias, cumque, ipsa esse nemo. </p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus consectetur aut laudantium suscipit dolore ipsam beatae amet, explicabo, non, nihil dignissimos? Veritatis corporis dicta ducimus libero iste tempore, ipsa sunt.</p>
			</div>
		</div>

		<div class="all_tastes">
			<h2 style='margin-top:10px; text-align: center;font-size: 26px;color:#F65A5B;'>DELICIOUS FOOD FOR ALL TASTES</h2>
			<div style='border-top:solid 2px #111;width:200px;margin:15px auto 50px auto'></div>
			<ul>
				<li>
					<h4>PASTA SPECIAL</h4>
					<img src="images/g3.jpg" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia soluta cumque ab repellat quis error molestiae, odio optio nostrum, possimus tempora quidem, assumenda eos voluptate expedita iure perspiciatis magnam exercitationem.</p>
					<a href="">MORE</a>
				</li>
				<li>
					<h4>FRIED CHICKEN</h4>
					<img src="images/g6.jpg" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A natus sit fugiat eum nisi labore at harum ex nobis alias ratione earum, autem quos dolore. Fuga ea, cum nemo. Cum.</p>
					<a href="">MORE</a>
				</li>
				<li>
					<h4>SAUSAGES</h4>
					<img src="images/g5.jpg" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est et commodi eos iste voluptatibus omnis labore sapiente minima molestiae mollitia aperiam saepe, magnam ab, repellat quibusdam iusto deleniti. Molestiae, voluptatem?</p>
					<a href="">MORE</a>
				</li>
				<li>
					<h4>BREAD SLICE</h4>
					<img src="images/g1.jpg" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam minima nulla, dolor tempora veritatis inventore delectus exercitationem aliquid molestiae a? Earum facere natus possimus iste, ab facilis dolore voluptates voluptatum?</p>
					<a href="">MORE</a>
				</li>
			</ul>
		</div>
	</div>

		
</div>
<?php 
	require '/pub/foot.php';
 ?>
<script src='js/carousel.js'></script>
</body>
</html>