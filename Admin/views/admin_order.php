<?php 

 include '../../DataBase.php';



$db = new DataBase();
$db->connect();
$TO = $_POST['tn'];
$ID = $_POST['id'];

$DATETIME = date('Y-m-d H:i:s');
  
  $db->insert_into('orders',$DATETIME,'Processing',$TO,$ID); 


?>