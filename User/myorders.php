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
    <link rel="stylesheet" href="../Admin/css/animate.css">
    <link rel="stylesheet" href="../Admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Admin/css/icomoon.css">
    <link rel="stylesheet" href="../Admin/css/style.css">
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
            <h2><a href=""> My Orders</a> </h2>
        </div>
        <hr />
        <div class="container">
            <div class="row">
                <?
                    require_once ("../Admin/views/filterswithdate.php")
                ?>
                <table class="table">
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
                            <td class="text-primary"><?php echo $order["price"]?></td>
                            <?php if ($order["status"] == "processing"){?>
                                <td align="center">
                                    <a class="trash btn btn btn-warning"" href="#" id=<?php echo $order["id"]; ?>>Cancel</a>
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