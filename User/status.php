<?php
require_once("DataBase.php");


if(isset($_POST["ajax_type"])){
    $id =  $_POST['id'] ;
    $status = $_POST['status'];

    $db = new DataBase();
    try {
        $db->connect();
        $update= $db ->changestatus($id);
        return $update ;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}