<?php
$UserInfo='';
$userId=$_REQUEST['id'] ;
$userName='';
$userEmail ='';
$UserPass='';
$userRoom='';
$userPP='';
$role='';
$ext='';
include_once("../DataBase.php");
$mydb = new DataBase();
try {
    $mydb ->connect();
    $UserInfo= $mydb->select_row("users",$userId);
    $userName=  $UserInfo[0][1];
    $userEmail=$UserInfo[0][2];
    $UserPass= $UserInfo[0][3];
    $userRoom= $UserInfo[0][4];
    $ext=$UserInfo[0][5];
    $userPP= $UserInfo[0][6];
    $role= $UserInfo[0][7];
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <label >Name</label>
        <input type="text" name="name" value="<?php echo $userName ;?>" ><br>
        <label style="color: red">
                <?php if (isset($_REQUEST["name"])) {
        echo "name required <br>";
    } ?> </label><br>

        <label >Email</label>
        <input type="email" name="email" value="<?php echo $userEmail;?>"> <br><br>
        <label style="color: red">
                <?php if (isset($_REQUEST["name"])) {
        echo "email required <br>";
    } ?>  </label><br>

        <label >New Password</label>
        <input type="password" name="password" value="<?php echo $UserPass;?>"><br>
       <label style="color: red" > <?php if (isset($_REQUEST["password"])) {
                    echo "Password required";
                }
                if (isset($_REQUEST['invalidpassword'])) {
                    echo"<br> Invalid password ";
                } ?></label>

        <label >Confirm Password</label>
        <input type="password" name="confirmpassword" value="<?php echo $UserPass;?>"><br>
      <label style="color: red" > <?php if (isset($_REQUEST["confirmpassword"])) {
                    echo "Password doesn't match";
                } ?> </label>
        <label>Room No.</label>
       <input type="text" name="room" value="<?php echo $userRoom ;?>">
       <label style="color: red" > <?php if (isset($_REQUEST["room"])) {
                    echo "choose room";
                } ?> </label><br>
                 <label>Ext</label>
       <input type="text" name="ext" value="<?php echo $ext ;?>"><br>
        <label >Profile Picture</label>
        <input type="file" name="img" value="<?php echo $userPP ;?>" ><br>
        <input type="submit" name="submit" value="Update" >
        <a href="allUsers.php">cancle</a>
       
    </form>
</body>
</html>

