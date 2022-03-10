<?php
 require_once("../../Database.php");
$mydb = new DataBase();
try {
    $mydb->connect();
    $users= $mydb->select_All("users");
    // var_dump($users);
    // exit;
    if ($users) {
        foreach ($users as $user) {
            
            if($user['email']== $_REQUEST['email']&& $user['password']== $_REQUEST['password']){
                session_start();
                $_SESSION['name']=$user['name'];
                $_SESSION['profile_Picture']=$user['profile_Picture'];
                header("location:home.php");
                break;
            }
            else{
                header("location:login.php");
            }
        }}

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
