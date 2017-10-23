<?php 
	session_start();
 ?>
<!-- about.html -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>about</title>
	<style>
	* {
	margin: 0;
	padding: 0;
	}
	body{
		/* border:1px solid black;   */
		margin: auto;
		width: 1200px;
		height: 1600px;
	}
	.head{
		 /* border:1px solid red;  */
		 height: 100px;
		margin-top: -100px;
	}

	#p1,#p9{
		text-align: center;
		margin-top: 20px;
		font-size: 30px;
		color: #f00;
	}
	#d1{
		border:1px solid black;
		width: 110px;
		height: 1px;
		margin: auto;
		background: #000;
		margin-top:18px;
	}
	.top{
		/* border:1px solid blue; */
		width: 1100px;
		height: 400px;
		margin:  0 auto;
	}
	#p2{
		 color:#00f;
		 font-size:25px;
		 margin-top: 10px;
	}
	#p3{
		font-color:#000;
		font-size: 14px; 
		/* width: 530px; */
		line-height: 30px;

	}
   .top #p4{
		margin-left: 630px;
		margin-top: -300px;

	}

	 .mid{
		border:1px solid #fff;
		width: 1200px;
		height: 514px;
		background: url(images/drink.jpg);
		margin: auto;
	}
	#p5{
		color: #f00;
		margin: auto;
		text-align: center;
		font-size: 35px;
		margin-top:70px;
	}
	#p6{
		color: #fff;
		text-align: center;
		width: 880px;
		margin: auto;
		margin-top: 30px;

	}
	#p7{
		text-align: center;
		margin-top: 10px;
		
	}
	#p8{
		text-align: center;
		color: #fff;
		margin: auto;
	} 
	.bottom{
		/* border:1px solid yellow; */
		width: 1200px;
		height: 570px;

	}
	#l1 {
		list-style: none;
		margin: auto;
		margin-top: 50px;
		margin-left: 80px;
	}
	.bottom li{
		margin-left: 20px;
		float: left;
	}
	.mid{
		border:1px solid #fff;
		width: 1200px;
		height: 514px;
		background: url(images/drink.jpg);
		margin: auto;
	}
	#p5{
		color: #f00;
		margin: auto;
		text-align: center;
		font-size: 35px;
		margin-top:70px;
	}
	#p6{
		color: #fff;
		text-align: center;
		width: 880px;
		margin: auto;
		margin-top: 30px;

	}
	#p7{
		text-align: center;
		margin-top: 10px;
		
	}
	#p8{
		text-align: center;
		color: #fff;
		margin: auto;
	} 

	</style>
</head>
<body>
<?php 
	require "/pub/head.php";
 ?>
	<div class="all">
		<div class="head">
			<p id="p1">ABOUT</p>
			<div id="d1"></div>
		</div>
		<div class="top">
			<p id ="p2"><b>A FEW WORDS ABOUT US</b></p>
			<span id="p3"><br>&nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> Voluptatum maxime recusandae quaerat expedita numquam <br>ex cumque distinctio architecto tenetur ratione, debitis tempora, <br>aliquid corporis officia, quos eaque.<br> <br>&nbsp;&nbsp;Ipsa, est, eius. 	&nbsp; Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit. Officiis nam sunt ea animi dolores praesentium<br> assumenda rem sint labore, at quaerat iste et cum<br> molestias. Quod tempore perferendis saepe, adipisci.<br>
			</span>
			<p id="p4"><img src="images/g4.jpg"  ></p>
		</div>
		<div class="mid">
			<p id="p5">TESTIMONIAL</p>
			<p id="p6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius itaque magni quidem aliquam nesciunt, quas consectetur, incidunt aperiam alias ipsam asperiores expedita praesentium est repellendus possimus mollitia aspernatur voluptatem repellat!</p>
			<p id="p7"><img src="images/7.png" height="48" width="48">
				<p id="p8">WILSON<br>Client</p>
		
			</p>
		</div>
		<div class="bottom">
			<p id="p9">MEET OUT TEAM</p>
			<div id="d1"></div>
			<ol id="l1">
			<li><img src="images/team-3.jpg" height="201" width="241" >
			<span><br><br>CAROL ADAMS<br>Fusceet nibh cursus<br>consectetur</span></li>
			<li><img src="images/team-2.jpg" height="201" width="241"><span><br><br>MARK SIMMY<br>Fusceet nibh cursus<br>consectetur</span></li>
			<li><img src="images/team-4.jpg" height="201" width="241" ><span><br><br>MARK SIMMY<br>Fusceet nibh cursus<br>consectetur</span></li>
			<li><img src="images/team-1.jpg" height="201" width="241"><span><br><br>ALAN SMITH<br>Fusceet nibh cursus<br>consectetur</span></li>
			</ol>
		</div>
	</div>
	<?php 
	require "/pub/foot.php";
 ?>
</body>
</html>