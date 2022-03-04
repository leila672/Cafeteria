<?php

include("errorPHPChecker.php");
ini_set('file_uploads', 1);
ini_set('file_uploads', 1);

$productName = $_POST["product"];

$errorName = $errorFile1 = $errorFile2 = "";

$flagName = 0; // Name checker flag
$flagImage1 = 0; // image checker ext. flag
$flagImage2 = 0; // image checker already exist flag

function normalizing($input): string
{
    $input = trim($input);
    $input = stripslashes($input);
    return htmlspecialchars($input);
}

// Image validator
$targetDir = "product_image";
$fileName = $_FILES['productImage']['name'];
$targetFilePath = $targetDir . $fileName;
$file_tmp = $_FILES['productImage']['tmp_name'];
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

if (
    $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpg"
    || $imageFileType == "gif"
) {
    move_uploaded_file($file_tmp, "product_image/" . $fileName);
} else {
    echo "55";
    $flagImage1 = 1;
    $errorFile1 = "Images only are allowed to be uploaded";
}


// Database validator
include_once("../DataBase.php");

$tableNameProducts = "products";

$db = new DataBase();

$imageNameNoExt = explode(".", $fileName);

$arrAllRows = $db->select_All($tableNameProducts);

for ($i = 0; $i < count($arrAllRows); $i++) {
    if (strtolower($arrAllRows[$i][1]) == strtolower($productName)) {
        echo "1";
        $flagName = 1;
        $errorName = "Product already exists add another one";
    }
    if (strtolower($arrAllRows[$i][4]) == strtolower($imageNameNoExt[0])) {
        $errorfile2 = "Image already exists pick another one";
        $flagImage2 = 1;
    }
}


if (!$flagName && !$flagImage1 && !$flagImage2) {
    echo "1";
    try {
        $db = new DataBase();
        $db->insert_into($tableNameProducts, $_POST['product'], $_POST['price'], $_POST['category'], $imageNameNoExt[0]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    // header("Location:tablePage.php");
} else {
    header("Location:addProduct.php?errorName=$errorName&errorFile1=$errorFile1&errorFile2=$errorfile2");
}
