<?php
 require_once("../Database.php");
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

                if($user['role'] == 'admin'){
                    header("location:../Admin/views/home.php");
                }
                else if($user['role'] == 'user'){
                    header("location:../User/home.php");
                }
                else{
                    header("location:index.html");
                }
                break;
            }
            else{
                header("location:index.html");
            }
        }}

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
