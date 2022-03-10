<?php
//require_once ("../Admin/views/sessionValidtion.php");
require_once ("../DataBase.php");
$id = $_GET['id'];
?>
<!DOCTYpE html>
<html lang="en">
<head>
    <title>Cafeteria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="../Admin/css/animate.css">
    <link rel="stylesheet" href="../Admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Admin/css/icomoon.css">
    <link rel="stylesheet" href="../Admin/css/style.css">
    <style>
        table{
            font-size: larger;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        body{
            background: url("../Admin/images/home-img.jpeg");
        }
        }
    </style>
</head>
<body>
    <?php
    //======================================NavBar==================================
    require_once("navbar.php");
    //=======================================End NavBar=============================
    ?>
    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title" style="margin-top: 30px">
                        <h1 class="text-primary">My Orders</h1>
                        <p>Here you can view and Cancel your orders </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form id="contactForm" method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 100px">
                            <div class="form-group">
                                <h4 class="text-primary">Date From : </h4>
                                <input type="date" data-format="yyyy-MM-dd" name="dateFrom" class="form-control" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 100px">
                            <div class="form-group">
                                <h4 class="text-primary">Date To :</h4>
                                <input type="date" class="form-control" data-format="yyyy-MM-dd" name="dateTo">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 100px">
                            <div class="submit-button text-center" style="display: flex;">
                                <button class="btn btn-warning" name="submit" type="submit" style="opacity: 1;margin-top: 15px;margin-left: 30px;">Search</button>
                                <div id="msgSubmit" style="margin-left: 50px;margin-top: 10px;" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $db = new DataBase();
                                    try{
                                        $db->connect();
                                        $orders = $db->select_All("orders");
                                        foreach ($orders as $order) {
                                    ?>
                                <tr>
                                    <td class="text-primary"><?php echo $order['id']?></td>
                                    <td class="text-primary"><?php echo $order["date"]?></td>
                                    <td class="text-primary"><?php echo $order["status"]?></td>
                                    <td class="text-primary"><?php echo $order["price"]?></td>
                                    <?php if ($order["status"] == "processing"){?>
                                        <td align="center">
                                            <a class="trash btn btn btn-warning"" href="#" id=<?php echo $order["id"]; ?>>Cancel</a>
                                        </td>
                                    <?php } ?>
                                </tr>
                                        <?php
                                        }
                                } catch (PDOException $e) {
                                echo 'Connection failed: ' . $e->getMessage();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>







    <script src="../Admin/js/template/jquery.min.js"></script>
    <script src="../Admin/js/template/jquery-migrate-3.0.1.min.js"></script>
    <script src="../Admin/js/template/popper.min.js"></script>
    <script src="../Admin/js/template/bootstrap.min.js"></script>
    <script src="../Admin/js/template/jquery.easing.1.3.js"></script>
    <script src="../Admin/js/template/jquery.waypoints.min.js"></script>
    <script src="../Admin/js/template/jquery.stellar.min.js"></script>
    <script src="../Admin/js/template/owl.carousel.min.js"></script>
    <script src="../Admin/js/template/jquery.magnific-popup.min.js"></script>
    <script src="../Admin/js/template/aos.js"></script>
    <script src="../Admin/js/template/jquery.animateNumber.min.js"></script>
    <script src="../Admin/js/template/bootstrap-datepicker.js"></script>
    <script src="../Admin/js/template/jquery.timepicker.min.js"></script>
    <script src="../Admin/js/template/scrollax.min.js"></script>
    <script src="../Admin/js/template/main.js"></script>
</body>