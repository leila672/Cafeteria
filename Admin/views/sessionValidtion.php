<?php
session_start();
$userName = $_SESSION['name'];
$userImage= $_SESSION['profile_Picture'];
$userID= $_SESSION['id'];
if (! isset($_SESSION['name'])) {
   //header("Location: ../../Login/index.html");
    include ("../../Login/index.html");
}

?>

 