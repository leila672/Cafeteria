<?php
session_start();
$userName = $_SESSION['name'];
$userImage= $_SESSION['profile_Picture'];
if (! isset($_SESSION['name'])) {
    header("Location: login.php");
}

?>

 