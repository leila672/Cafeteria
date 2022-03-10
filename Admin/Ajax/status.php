<?php

require_once("../../Database.php");


if(isset($_POST["ajax_type"])){
$id =  $_POST['id'] ;
$status = $_POST['status'];


$db = new DataBase();
try {
    $db->connect();
    $orderss = $db ->changeOrderStatus($id, $status);
    return $orderss ;

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}