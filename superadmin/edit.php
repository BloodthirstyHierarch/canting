<?php 
include "db.php";
header("content-type:text/html;charset=utf-8"); 
if(isset($_GET['email'])){   //接收用户名显示初始内容
$email = $_GET['email'];
$sql = "select a.AID, a.email, a.password,b.first_name,b.last_name, b.mobile from admin as a left join user_info as b on a.email = b.email where a.email = '$email'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
}
if(isset($_POST['docancel'])){  //点取消回到主页
	header("location:admin.php");
}

if(isset($_POST['doupdate'])){  //修改信息
    
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$mobile = $_POST['mobile'];
    $password = $_POST['password'];	
	if(!(empty($first_name)||empty($last_name)||empty($mobile))){
        if(empty($password)){
         $sql = "select * from user_info where email= '$email' ";
         $result = mysql_query($sql);
         $row = mysql_fetch_assoc($result);

         if($row['first_name']== $first_name && $row['last_name']==$last_name && $row['mobile']==$mobile){
             echo "<script>alert('未修改值！');</script>";
         }
         else{
	     $sql = "update user_info set first_name = '$first_name' , last_name ='$last_name',mobile = '$mobile' where email = '$email'";
         $result = mysql_query($sql);
             echo "<script>alert('修改成功！');</script>";


             echo "<script>location.href='admin.php';</script>";
            }
         
	  }
      else{
        $sql = "update user_info set first_name = '$first_name' , last_name ='$last_name',mobile = '$mobile' where email = '$email'";
        $result1 = mysql_query($sql);
        var_dump($result);
        $pwd = md5($password);
        $sql = "update admin set password = '$pwd' where email = '$email'";
        $result2 = mysql_query($sql);
        var_dump($result);

        if($result1 && $result2){   
              echo "<script>alert('修改成功！');</script>";
            echo "<script>location.href='admin.php';</script>";
           

        }
        else{
              echo "<script>alert('修改失败！');</script>";
        }

      }
	
}
else{
     echo "<script>alert('字段不能为空！');</script>";
    }
}



 ?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>

</head>
<body>
 <?php 
        require "/public/head.php";
 ?>
<div class="container clearfix">
    <?php 
        require "/public/left.php";
     ?>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="admin.php">首页</a>
            <span class="crumb-step">&gt;</span><a class="crumb-name" href="admin.php">管理员管理</a><span class="crumb-step">&gt;</span><span>修改</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th width="120"><i class="require-red" >*</i>邮箱：</th>
                            
                            <td>
                             <input disabled class="common-text required" name="email"  value="<?php echo $row['email'] ?>" type="text">
                            </td>
                        </tr>



                            <tr>
                                <th><i class = "require-red">*</i>姓：</th>
                                <td>
                                    <input class="common-text required" name="first_name"  value="<?php echo $row['first_name'] ?>" type="text">
                                </td>
                            </tr>   
                            <tr>
                                <th><i class = "require-red">*</i>名：</th>
                                 <td>
                                    <input class="common-text required" name="last_name"  value="<?php echo $row['last_name'] ?>" type="text">
                                </td>   	
                               
                            </tr>

                            <tr>
                                <th><i class = "require-red">*</i>联系方式：</th>
                                <td><input  class="common-text required" type="text" name="mobile" value="<?php echo $row['mobile'] ?>"></td>
                            </tr>
                            <tr>
							<th><a id="cpwd" style="margin-right: 10px;cursor: pointer;" >修改密码</a></th>
							<td><input id='pwd' style='visibility:hidden;' class="common-text required" name="password" value="" type="text"></td>					
						</tr>
						                            <script>
                                document.getElementById('cpwd').onclick = function(){
                                var pwd = document.getElementById('pwd');
                                pwd.style.visibility= 'visible';
                            }
                            </script> 
                        <!--<tr id='pwd' style='visibility:hidden;';>
                            <th><i class = "require-red" >*</i>密码：</th>
                            <td><input class="common-text required" name="password" value="" type="text"></td>
                            
                        </tr>-->
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit" name="doupdate">
                                    <input class="btn btn-primary btn6 mr10" value="取消" type="submit" name="docancel"/>
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>