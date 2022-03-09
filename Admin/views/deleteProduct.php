<?php
require_once("../../Database.php");
$db = new DataBase();
$db->connect();
$db->delete("products", $_REQUEST['id']);
header("location:tableProducts.php");
