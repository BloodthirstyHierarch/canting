<?php

include '../db.php';
$data      = json_decode($_POST['J_data']);
$email     = $data->email;
$good_name = $data->good_name;

$sql    = "delete from shopping_bag WHERE email='$email' and good_name='$good_name'";
$result = mysql_query($sql);
echo $result;

?>
