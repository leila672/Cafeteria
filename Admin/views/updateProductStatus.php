<?php
include("errorPHPChecker.php");

include_once("../../Database.php");
$tableNameProducts = "products";
$dp = new DataBase();
$dp->connect();

if ($_POST['ischecked']) {
    $checked = 1;
} else {
    $checked = 0;
}

$dp->update_Product_status($_POST['id'],  $_POST['checked']);
