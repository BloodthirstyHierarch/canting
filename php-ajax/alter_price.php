<?php
include '../db.php';
$data  = json_decode($_POST['J_data']);
$price = $data->price;
$id    = $data->id;

$sql    = "update goods set price=$price where GID=$id";
$result = mysql_query($sql);

echo $result;
?>