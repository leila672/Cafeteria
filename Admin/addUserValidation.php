<?php
  $errors= array();
  $old=array();
if(isset($_POST['submit'])){
//check emptiness of name,mail, password, room
if(empty($_POST['name'])){
    $errors['name']='name_error';
}else{
    $old["old_name"]=$_REQUEST["name"];}
if(empty($_POST['email'])){
    $errors['email']='emailerror';
}else{
    $old["old_email"]=$_REQUEST["email"];}
if(empty($_POST['password'])){
    $errors['password']='pass_error';
}
if(empty($_POST["confirmpassword"])) {
    $errors['confirmpassword']="confpasserror";
}
if(empty($_POST['room'])){
    $errors['room']='room_error';
}else{
    $old["old_room"]=$_REQUEST["room"];}
//check pattern validation 
$pass_pattern = "/^[a-z0-9_]{6,10}$/";
if (!empty($_POST['password'])&& !preg_match_all($pass_pattern, $_REQUEST["password"], $matches)) {
    $errors["invalidpassword"]="invalid";
}
if (!empty($_POST['password']) && $_REQUEST["password"] != $_REQUEST["confirmpassword"]) {
    $errors['confirmpassword']="doesn'tmatch";
}
if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["wrongformat"]="invalid";
}
// image validation
$file_name = $_FILES['img']['name'];
$file_tmp =$_FILES['img']['tmp_name'];
$ext= pathinfo($file_name,PATHINFO_EXTENSION);
$extensions= array("jpeg","jpg","png");
$image="";
if (in_array($ext, $extensions)){
    $image =addslashes($file_name);
    move_uploaded_file($file_tmp,"user_image/".$file_name);
}
else{
    $errors['img']="imgerorr";
}

//connection to database 
$str="addUser.php?";
if(count($errors)>0){
    foreach ($errors as $k=>$val){
        $str.=$k."=".$val."&";
    }
    if(count($old)>0){
        foreach ($old as $o=>$v){
            $str.=$o."=".$v."&";
        }
    }
 }
else{ 
    //database connection and validation
$userName=strtolower(trim(htmlspecialchars($_POST['name'])));
$email=strtolower(trim(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)));
$password=trim(htmlspecialchars($_POST['password']));
$room=trim(htmlspecialchars($_POST['room']));
$ext =trim(htmlspecialchars($_POST['ext']));
$image =strtolower(trim(htmlspecialchars($image)));
$exist= false;
    include_once("../DataBase.php");
    $mydb = new DataBase();
    try {
        $mydb ->connect();
        $result= $mydb->select_All("users");
      for($i=0; $i<count($result) ;$i++){
        if($result[$i]['email']==$email){
            $exist=true;
            break;
        }
      }
      if(!$exist){
        $mydb->insert_into("users", $userName, $email, $password,$room,$ext, $image,'user');   
      }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
}
header("Location:".$str);

// echo "<pre>";
// var_dump($userName);
// var_dump($_POST['password']);
// var_dump($_POST['email']);
// var_dump($password);
// var_dump( $room,$ext);
// var_dump(password_verify($_POST['password'],$password));
// echo "</pre>";




}
