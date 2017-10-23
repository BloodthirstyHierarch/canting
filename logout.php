<?php 
    session_start();
    if(!(isset($_SESSION['login']) && $_SESSION['login'] === 1)) {
        header("location:login.php");
    }
 ?>
<?php 
	session_start();
$_SESSION = array();
setcookie(session_name(), "", time() - 134254, "/");
session_destroy();
if(!(isset($_SESSION['login']) && $_SESSION['login'] === 1)) {
        header("location:login.php");
    }
 ?>