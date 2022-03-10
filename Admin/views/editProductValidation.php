<?php

include("errorPHPChecker.php");
ini_set('file_uploads', 1);
ini_set('file_uploads', 1);

$productName = $_POST["product"];

$id = $_REQUEST['id'];
$newCategory = $_POST['category'];

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
$targetDir = "../images/product_image";
$fileName = $_FILES['productImage']['name'];
$targetFilePath = $targetDir . $fileName;
$file_tmp = $_FILES['productImage']['tmp_name'];
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

if (
    $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpg"
    || $imageFileType == "gif"
) {
    move_uploaded_file($file_tmp, "../images/product_image/" . $fileName);
} else {
    echo "55";
    $flagImage1 = 1;
    $errorFile1 = "Images only are allowed to be uploaded";
}


// Database validator
include_once("../../Database.php");

$tableNameProducts = "products";

$dp = new DataBase();

$dp->connect();

$imageNameNoExt = explode(".", $fileName);

$arrAllRows = $dp->select_All($tableNameProducts);

for ($i = 0; $i < count($arrAllRows); $i++) {
    if (strtolower($arrAllRows[$i][1]) == strtolower($productName)) {
        echo "1";
        $flagName = 1;
        $errorName = "Change to new product name to edit successfully";
    }
    if (strtolower($arrAllRows[$i][4]) == strtolower($imageNameNoExt[0])) {
        $errorfile2 = "Image already exists pick another one";
        $flagImage2 = 1;
    }
}

foreach ($arrAllRows as $key => $value) {
    if ($value[0] == $id) {
        $oldCategory = $arrAllRows[$key];
    }
}


if (!$flagName && !$flagImage1 && !$flagImage2) {
    echo "1";
    try {
        $dp->update_Table($id, $_POST['product'], $_POST['price'], $_POST['category'], $imageNameNoExt[0]);
        if ($newCategory != $oldCategory) {
            $dp->update_Category($newCategory, $oldCategory[3]);
        }
    } catch (PDOException $err) {
        echo "error";
        die($err->getMessage());
    }
    header("Location:tableProducts.php");
} else {
    header("Location:editProduct.php?id=$id&errorName=$errorName&errorFile1=$errorFile1&errorFile2=$errorfile2");
}
