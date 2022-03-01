<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label >Name</label>
        <input type="text" name="name" placeholder="Enter your name"><br>
        <label style="color: red">
                <?php if (isset($_GET["name"])) {
        echo "name required <br>";
    } ?> </label><br>
        <label >Email</label>

        <input type="email" name="email"><br><br>
        <label style="color: red">
                <?php if (isset($_GET["name"])) {
        echo "email required <br>";
    } ?>  </label><br>

        <label >Password</label>
        <input type="password" name="password"><br>
       <label style="color: red" > <?php if (isset($_GET["password"])) {
                    echo "Password required";
                }
                if (isset($_GET['invalidpassword'])) {
                    echo"<br> Invalid password min length is 6";
                } ?></label>

        <label >Confirm Password</label>
        <input type="password" name="confirmpassword"><br>
      <label style="color: red" > <?php if (isset($_GET["confirmpassword"])) {
                    echo "Password doesn't match";
                } ?> </label>
        <label>Room No.</label>
       <input type="text" name="room">
       <label style="color: red" > <?php if (isset($_GET["room"])) {
                    echo "choose room";
                } ?> </label><br>
                 <label>Ext</label>
       <input type="text" name="ext"><br>
        <label >Profile Picture</label>
        <input type="file" name="img"><br>
        <label style="color: red">
                <?php if (isset($_GET["file"])) {
                    echo "file doesn't match extentions<br>";
                } ?></label><br>
        <input type="submit" name="submit" >
        <input type="reset" name="reset">
    </form>
</body>
</html>
<!-- ============================================================================== -->

<?php
  $errors= array();
if(isset($_POST['submit'])){
//check emptiness of name,mail, password, room
if(empty($_POST['name'])){
    $errors['name']='name_error';
}
if(empty($_POST['email'])){
    $errors['email']='emailerror';
}
if(empty($_POST['password'])){
    $errors['password']='pass_error';
}
if(empty($_POST["confirmpassword"])) {
    $errors['confirmpassword']="confpasserror";
}
if(empty($_POST['room'])){
    $errors['room']='room_error';
}
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
    move_uploaded_file($file_tmp,"up/".$file_name);
}
else{
    $errors['img']="imgerorr";
}

//connection to database 
$str="addUser.php?";
if (count($errors)>0) {
    foreach ($errors as $k=>$val) {
        $str.=$k."=".$val."&";
    }
    header("Location: $str");
    return;
}else{ 
$userName=strtolower(trim(htmlspecialchars($_POST['name'])));
$email=strtolower(trim(filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)));
$password=trim(password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT));
$room=trim(htmlspecialchars($_POST['room']));
$ext =trim(htmlspecialchars($_POST['ext']));
    include_once("DataBase.php");
    $mydb = new DataBase();
    try {
        $mydb ->connect();
        $mydb->insert_into("users", $userName, $email, $password,$room,$ext, $image,'user');      
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    
}


// echo "<pre>";
// var_dump($userName);
// var_dump($_POST['password']);
// var_dump($_POST['email']);
// var_dump($password);
// var_dump( $room,$ext);
// var_dump(password_verify($_POST['password'],$password));
// echo "</pre>";




}
?>



