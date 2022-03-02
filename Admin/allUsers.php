<?php
include_once("../DataBase.php");
$mydb = new DataBase();
try {
    $mydb ->connect();
    echo "success";
    $mydb->users_table('users',"name" ,"roomNum","Image","Actions");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>