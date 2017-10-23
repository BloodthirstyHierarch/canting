<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.php" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?php echo $_SESSION['login']?$_SESSION['email']:"Manager"?></a></li>
                <!-- <li><a href="#">修改密码</a></li> -->
                <li><a style='color:#aa3344;cursor:pointer;' onclick="return confirm('Ensure to Exit?');" href='../logout.php'>退出</a></li>
            </ul>
        </div>
    </div>
</div>
