<!DOCTYpE html>
<html lang="en">

<head>
    <title>Cafeteria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Icon -->
    <link rel="shortcut icon" href="../images/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php  require_once("navbar.php");
    ?>
    <!-- END nav -->



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div><br><br><br><br>



    <section class="container user-home">
        <div class="d-flex justify-content-between align-items-center pt-3">
            <h2><a href="#">Add User </a></h2>
        </div>
        <hr />

        <div class="container">
            <div class="row">
                <form class="row g-3 " method="post" enctype="multipart/form-data" action="addUserValidation.php">
                    <div class="col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php if (isset($_REQUEST['old_name'])) {
                                                                                        echo $_REQUEST['old_name'];
                                                                                    } else echo ""; ?>">
                        <label style="color: red">
                            <?php if (isset($_GET["name"])) {
                                echo "name is requir  <br>";
                            } ?> </label>
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" aria-describedby="inputGroupPrepend" value="<?php if (isset($_REQUEST['old_email'])) {
                                                                                                                                echo $_REQUEST['old_email'];
                                                                                                                            } else echo ""; ?>">
                        <label style="color: red"><?php if (isset($_GET["email"])) {
                                                        echo "email is require <br>";
                                                    }
                                                    if (isset($_GET['wrongformat'])) {
                                                        echo "<br> Invalid email";
                                                    } ?> </label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="">
                        <label style="color: red"> <?php if (isset($_GET["password"])) {
                                                        echo "Password is require ";
                                                    }
                                                    if (isset($_GET['invalidpassword'])) {
                                                        echo "<br> Invalid password min length is 6";
                                                    } ?></label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" value="">
                        <label style="color: red"> <?php if (isset($_GET["confirmpassword"])) {
                                                        echo "Password doent match";
                                                    }
                                                    if (isset($_GET['invalidpassword'])) {
                                                        echo "<br> Invalid password min length is 6";
                                                    } ?></label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Room</label>
                        <input type="number" step="1" min="1" max="12" name="room" class="form-control" value="<?php if (isset($_REQUEST['old_room'])) {
                                                                                                                    echo $_REQUEST['old_room'];
                                                                                                                } else echo ""; ?>">
                        <label style="color: red"> <?php if (isset($_GET["room"])) {
                                                        echo "choose room";
                                                    } ?> </label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">EXT</label>
                        <input type="number" step="1" min="1" max="700" name="ext" class="form-control" value="<?php if (isset($_REQUEST['old_ext'])) {
                                                                                                                    echo $_REQUEST['old_ext'];
                                                                                                                } else echo ""; ?>">
                        <label style="color: red">
                            <?php if (isset($_GET["ext"])) {
                                echo "ext is require <br>";
                            } ?></label>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Image</label>
                        <input type="file" name="img" class=" form-label  " id="validationCustom03">
                        <div class="invalid-feedback">
                            <label style="color: red">
                                <?php if (isset($_GET["img"])) {
                                    echo "file doesn't match extentions<br>";
                                } ?></label>
                        </div>
                    </div>

                    <div class="col-12 pt-5">
                        <input style=" border-radius: 10px;" type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
                </form>


            </div>
        </div>

    </section>







    <script src="js/template/jquery.min.js"></script>
    <script src="js/template/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/template/popper.min.js"></script>
    <script src="js/template/bootstrap.min.js"></script>
    <script src="js/template/jquery.easing.1.3.js"></script>
    <script src="js/template/jquery.waypoints.min.js"></script>
    <script src="js/template/jquery.stellar.min.js"></script>
    <script src="js/template/owl.carousel.min.js"></script>
    <script src="js/template/jquery.magnific-popup.min.js"></script>
    <script src="js/template/aos.js"></script>
    <script src="js/template/jquery.animateNumber.min.js"></script>
    <script src="js/template/bootstrap-datepicker.js"></script>
    <script src="js/template/jquery.timepicker.min.js"></script>
    <script src="js/template/scrollax.min.js"></script>
    <script src="js/template/main.js"></script>

</body>

</html>