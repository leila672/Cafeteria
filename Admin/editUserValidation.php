
<?php
$userId = $_REQUEST['id'];
$image=$_REQUEST['userPP'];
if (isset($_REQUEST['submit'])) {
    $errors = array();
    $old = array();
    if (empty($_REQUEST['name'])) {
        $errors['emptyname'] = 'name_error';
    }
    if (empty($_REQUEST['password'])) {
        $errors['emptypassword'] = 'pass_error';
    }
    if (empty($_REQUEST['confirmpassword'])) {
        $errors['emptyconf'] = 'conf_error';
    } 
    if (empty($_REQUEST['email'])) {
        $errors['emptyemail'] = 'email_error';
    }
    if (empty($_REQUEST['ext'])) {
        $errors['emptyext'] = 'ext_error';
    }
    if (empty($_REQUEST['room'])) {
        $errors['emptyroom'] = 'room_error';
    }
//check pattern validation 
$pass_pattern = "/^[a-z0-9_]{6,10}$/";
if (!empty($_POST['password'])&& !preg_match_all($pass_pattern, $_REQUEST["password"], $matches)) {
    $errors["invalidpassword"]="invalid";
}
if (!empty($_POST['password']) && $_REQUEST["password"] != $_REQUEST["confirmpassword"]) {
    $errors['confirmpassword']="doesn'tmatch";
}
// image validation
if(isset($_FILES['img'])){
    $file_name = $_FILES['img']['name'];
    $file_tmp =$_FILES['img']['tmp_name'];
    $extenstion= pathinfo($file_name,PATHINFO_EXTENSION);
    $extensions= array("jpeg","jpg","png");
    
    if (in_array($extenstion, $extensions)){
        $image =addslashes($file_name);
        move_uploaded_file($file_tmp,"user_image/".$file_name);
    }
    else{
        $errors['img']="imgerorr";
    }
}


    
    if (count($errors) > 0) {
        $str = "editUser.php?id=" . $userId . "&";
        foreach ($errors as $k => $val) {
            $str .= $k . "=" . $val . "&";
        }
      header("Location:" . $str);
    } else {
        $userName = strtolower(trim(htmlspecialchars($_REQUEST['name'])));
        $email = strtolower(trim(filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)));
        $password = trim(htmlspecialchars($_REQUEST['password']));
        $image = strtolower(trim(htmlspecialchars($image)));
         require_once("../DataBase.php");
        $mydb = new DataBase();
        try {
            $mydb->connect();
            $mydb->update("users", $userId, "name", $userName, "email", $email, "password", $password, "roomNum", $_REQUEST['room'], "ext", $_REQUEST['ext'],"profile_Picture",$image);
           header("Location:allUsers.php");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
   }

// echo "<pre>";
// var_dump($_REQUEST['name']);
// var_dump($_REQUEST['password']);
// var_dump($_REQUEST['email']);
// var_dump($image);
// var_dump($_REQUEST['ext'],$_REQUEST['room']);
// echo "</pre>";
       
?>