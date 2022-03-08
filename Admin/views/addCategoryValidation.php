<?php

include("errorPHPChecker.php");

$newCategory = $_POST['category'];

include_once("../../DataBase.php");
$tableNameProducts = "category";
$dp = new DataBase();
$dp->connect();
$categoryRows = $dp->select_All($tableNameProducts);

$flagExist = 0;
foreach ($categoryRows as $cat) {
    if ($newCategory == $cat[0]) {
        $flagExist = 1;
    }
}

if ($flagExist) {
    $duplicateCategory = "This Category already exists";
    header("Location:addCategory.php?errorCategory=$duplicateCategory");
} else {
    $dp->insert_Category($newCategory);
    header("Location:addProduct.php");
}
