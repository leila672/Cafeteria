<?php
require_once("../DataBase.php");
$db = new DataBase();
$db->connect();
$db->delete("products", $_REQUEST['id']);
header("location:tableProducts.php");
