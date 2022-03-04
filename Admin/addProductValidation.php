<?php

include("errorPHPChecker.php");
ini_set('file_uploads', 1);
ini_set('file_uploads', 1);

$flagName = 0; // Name checker flag
$flagImage = 0; // image checker flag

function normalizing($input): string
{
    $input = trim($input);
    $input = stripslashes($input);
    return htmlspecialchars($input);
}

include_once("../DataBase.php");

$db = new DataBase(12345);

$arr = $db->select_All("products");



$targetDir = "user_image";
$fileName = basename($_FILES["productImag"]["name"]);
$targetFilePath = $targetDir . $fileName;
$file_tmp = $_FILES['productImag']['tmp_name'];
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["productImag"]["tmp_name"]);
    if (
        $check !== false && $imageFileType = "jpg" && $imageFileType = "png" && $imageFileType = "jpeg"
        && $imageFileType = "gif"
    ) {
    } else {
        $errorFile = "Images only are allowed to be uploaded";
        $flagImage = 1;
    }
}





// include_once("../DataBase.php");

// if (!$flagName && !$flagImage) {
//     echo "1";
//     try {
//         $db = new Database(12345); // Database password
//         $db->insert($_POST['name'], $_POST['password1'], $_POST['email'], $_POST['room'], date("Y-m-d H:i:s"));
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
//     header("Location:tablePage.php");
// }
