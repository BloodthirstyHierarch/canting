<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
} elseif($_SESSION['login'] != 100) {
    echo "<script>alert('你没有足够的权限');</script>";
    echo "<script>setTimeout(\"location.href='index.php'\", 0)</script>";
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
<div class="container clearfix" style="margin:0px,auto">
       <?php 
        require "/public/left.php";
     ?>
    <!--/sidebar-->
    <div class="main-wrap">

         <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="admin.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form  method="post">
                   
                </form>
            </div>
        </div> 
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="admin_insert.php"><i class="icon-font"></i>新增管理员</a>
                    <!--<a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a> -->
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                          

                            <th>ID</th>
                            <th>邮箱</th>
                            <th>密码</th>
                            <th>姓</th>
                            <th>名</th>
                            <th>联系方式</th>
                            <th>操作</th>
                      
                        </tr>
                        <?php
                            include "db.php";

                            //$sql = "select a.id, a.username, b.name, b.email, b.addtime, b.updatetime, b.age from admin as a left join information as b on a.id = b.u_id";
                            //$sql = "select * from admin as a left join information as b on a.id = b.u_id";
                            $sql = "select * from admin ";
                            $result = mysql_query($sql);
                            $total_page = mysql_num_rows($result);      //总行数
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;  
                            $page_size = 5;                             //每页容量
                            $page_num = ceil($total_page/$page_size);   //页数
                            $start = $page_size * ($page - 1);          //起始页码

                            $sql = "select a.AID, a.email, a.password,b.first_name,b.last_name, b.mobile from admin as a left join user_info as b on a.email = b.email limit $start, $page_size";
                      //      $sql = "select * from admin as a left join information as b on a.id = b.UID limit $page_size ";
                     //       $sql = "select * from admin limit $start,$page_size";
                            $result = mysql_query($sql);

                            while ($row = mysql_fetch_assoc($result)) { 
                                // echo "<pre>";
                                // var_dump($row) ;
                                // echo "</pre>";
                        ?>
                        <tr>
                            <td><?php echo $row['AID'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            
                            
                            
                            
                            <td>
                                <a class="link-update" href="edit.php?email=<?php echo $row['email'];?>">修改</a>
                                <a class="link-del" onclick="return confirm('是否删除?');" href="delete.php?email=<?php echo $row['email'] ?>">删除</a>
                            </td>
                        </tr>    
                        <?php
                            }
                         ?>
                         <!-- <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>59</td>
                            <td title=""><a target="_blank" href="#" title=""></a> …
                            </td>
                            <td>0</td>
                            <td>2</td>
                            <td>admin</td>
                            <td>2014-03-15 21:11:01</td>
                            <td></td>
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>  -->
                    </table>
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
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>