<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="addUserValidation.php" method="post" enctype="multipart/form-data">
        <label >Name</label>
        <input type="text" name="name" placeholder="Enter your name"
          value="<?php if(isset($_REQUEST['old_name'])){
            echo $_REQUEST['old_name'];} else echo""; ?>"><br>
        <label style="color: red">
                <?php if (isset($_GET["name"])) { echo "name required <br>";} ?> </label><br>
        <label >Email</label>

        <input type="email" name="email"  value="<?php if(isset($_REQUEST['old_email'])){
            echo $_REQUEST['old_email'];} else echo""; ?>"><br><br>
        <label style="color: red">
                <?php if (isset($_GET["mail"])) {
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
       <input type="text" name="room"   value="<?php if(isset($_REQUEST['old_room'])){
            echo $_REQUEST['old_room'];} else echo""; ?>">
       <label style="color: red" > <?php if (isset($_GET["room"])) {
                    echo "choose room";
                } ?> </label><br>
                 <label>Ext</label>
       <input type="text" name="ext"><br>
        <label >Profile Picture</label>
        <input type="file" name="img"><br>
        <label style="color: red">
                <?php if (isset($_GET["img"])) {
                    echo "file doesn't match extentions<br>";
                } ?></label><br>
        <input type="submit" name="submit" >
        <input type="reset" name="reset">
    </form>
</body>
</html>






