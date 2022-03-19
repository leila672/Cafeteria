<?php 

 include '../DataBase.php';

 session_start();
$ID = $_SESSION['id'];

$db = new DataBase();
$db->connect();
$TO = $_POST['tn'];
$DATETIME = date('Y-m-d H:i:s');
  
  $db->insert_into('orders',$DATETIME,'Processing',$TO,$ID); 


?>