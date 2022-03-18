<?php
require_once ("../DataBase.php");

?>
<!DOCTYpE html>
<html lang="en">
<head>
    <title>Cafeteria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <style>
        table{
            font-size: larger;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
    <?php
    //======================================NavBar==================================
    require_once("navbar.php");
    //=======================================End NavBar=============================
    ?>

    <section class="container user-home">
        <div class="d-flex justify-content-between align-items-center pt-3" >
            <h2><a href="myorders.php"> My Orders</a> </h2>
        </div>
        <hr />
        <div class="container">
            <div class="row">
                <?
                    //require_once ("../Admin/views/filterswithdate.php")
                ?>
                <!-- Filter With Date -->
                <form class="mt-3"  method="post" action="">
                    <!-- date -->
                    <table class="col-8 d-flex" style="left: 20%;">
                        <tr>
                            <td>
                                <h4 class="mt-2" style="display: inline-block;">From:</h4>
                            </td>
                            <td>
                                <input class="m-4" type="date" name="from">
                            </td>
                            <td>
                                <h4 class="mt-2" style="display: inline-block;">To:</h4>
                            </td>
                            <td>
                                <input class="m-4" type="date" name="to">
                            </td>
                            <td>
                                <input class="btn btn-warning" type="submit" name="submit" value="search">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                $db = new DataBase();
                try {
                    $db->connect();
                    if (isset($_POST['submit'])) {
                        $from = $_POST['from'];
                        $to = $_POST['to'];
                        $users = $db->showuorderswithdate($from, $to);
                    }
                }catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }

                ?>
                <!-- End Filter With Data -->
                <table class="table mt-3">
                    <thead class="thead-primary">
                        <tr class="text-center">
                            <th>Order Details</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once ("../Admin/views/sessionValidtion.php");
                        $userID= 2;
                            $db = new DataBase();
                            try{
                                $db->connect();
                                $orders = $db->userorders($userID);
                                foreach ($orders as $order) {
                            ?>
                        <tr class="<?= $order['id'] ?>">
                            <td>
                                <button class="btn btn-default btn-xs" data-bs-toggle="collapse" data-bs-target="<?php echo "#demo" . $order['id'] ?>">
                                    <span>+</span>
                                </button>
                            <td class="text-primary"><?php echo $order['id']?></td>
                            <td class="text-primary"><?php echo $order["date"]?></td>
                            <td class="text-primary"><?php echo $order["status"]?></td>
                            <td class="text-primary"><?php echo $order["totalPrice"]?></td>
                            <?php

                            //================================Debugger===================================
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            //===========================================================================
                            if ($order["status"] == "processing"){?>
                                <td align="center">
                                    <button class="trash btn btn btn-warning" name="status" data-value="<?=$order['id']?>"  id=<?php echo $order["id"]; ?>>Cancel</button>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr class="<?= $order['id'] ?>">
                            <td colspan="5" class="hiddenRow">
                                <div class="collapse" id="<?php echo "demo" . $order['id'] ?>">
                                    <div class="container">
                                        <div class="row">

                                            <?php
                                            $products = $db->getProductsInOrders($order['id']);

                                            foreach ($products as $product) {
                                                ?>
                                                <div class="col-xs-3 " style="margin: 10px;">
                                                    <div class="thumbnail">
                                                        <img src="<?php echo "../images/product_image/" . $product['picture'] ?>" class="col-xs-3" width="75px" class="img-rounded">
                                                        <div class="caption">
                                                            <p>EGP <?php echo $product['price'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <p> Total : <?php echo $order["totalPrice"] ?>
                                        <div>
                                        </div>

                            </td>
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
        </div>
    </section>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/range.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        let thebtn = document.getElementsByClassName('trash')[0]
        let theid = thebtn.dataset.value
        thebtn.addEventListener("click", function (){
            let linkk= `./status.php?id=${theid}`;
            location.assign(linkk)
        })
    </script>
</body>