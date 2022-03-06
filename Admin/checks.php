<!DOCTYpE html>
<html lang="en">

<head>
    <title>Cafeteria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php require_once("navbar.php");
    ?>
    <!-- END nav -->


    <br> <br> <br> <br> <br> <br>
    <section class="container user-home">
        <h1> checks </h1>
        <hr />

        <div class="container">
            <div class="row">


                <table class="table">
                    <thead class="thead-primary" style="background-color: #9e7b5c ;">
                        <tr class="text-center">
                            <th> user orders </th>
                            <th>Name</th>
                            <th>total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        require_once("../DataBase.php");
                        $db = new DataBase();
                        try {
                            $db->connect();
                            $users = $db->showusers();
                            if ($users) {
                                foreach ($users as $user) {

                        ?>
                                    <tr class="<?= $user['id'] ?>">
                                        <td>
                                            <button class="btn btn-default btn-xs" data-bs-toggle="collapse" data-bs-target="<?php echo "#demouser" . $user['id'] ?>">
                                                <span>+</span>
                                            </button>
                                        </td>
                                        <td><?php echo $user["name"] ?></td>
                                        <td><?php echo $user["totalPrice"] ?></td> 

                                    </tr>

                                    

                                    <!-- /------------------------end of users--------------------------/ -->

                                    <tr class="<?= $user['id'] ?>">
                                        <td colspan="5" class="hiddenRow">
                                            <div class="collapse" id="<?php echo "demouser" . $user['id'] ?>">
                                                <div class="container">
                                                    <div class="row">
                                                        <table class="table" style="width: 300px; margin-left:50px ; border : 2px solid white">
                                                            <thead class="thead-primary" style="background-color: #9e7b5c ">
                                                                <tr class="text-center">
                                                                    <th> order details </th>
                                                                    <th> date</th>
                                                                    <th> price </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="background-color: #f7e2d0;">
                                                                <?php
                                                                $orders = $db->userorders($user['id']);

                                                                foreach ($orders as $order) {

                                                                  
                                                                ?>
                                                                    <tr class="text-center" class="<?= $order['id'] ?>">
                                                                        <td>
                                                                            <button class="btn btn-default btn-xs" data-bs-toggle="collapse" data-bs-target="<?php echo "#demoorder" . $order['id'] ?>" style="background-color:#9e7b5c;">
                                                                                <span style="color: white;">+</span>
                                                                            </button>
                                                                        </td>
                                                                        <td><?php echo $order["date"] ?></td>
                                                                        <td><?php echo $order["totalPrice"] ?></td>
                                                                    </tr>
                                                                     <!-- /------------------------end of orders--------------------------/ -->

                                                                    <tr class="text-center" >
                                                                        <td colspan="5" class="hiddenRow" style="background-color: #e6cfbc ; width:20px; padding: 0px;">
                                                                            <div  class="collapse" id="<?php echo "demoorder" . $order['id'] ?>">
                                                                                <div class="container">
                                                                                    <div class="row">

                                                                                        <?php
                                                                                        $products = $db->getProductsInOrders($order['id']);

                                                                                        foreach ($products as $product) {
                                                                                        ?>
                                                                                            <div class="col-xs-3 " style="margin: 10px;">
                                                                                                <div class="thumbnail">
                                                                                                    <img src="<?php echo "images/" . $product['picture'] ?>" class="col-xs-3" width="75px" class="img-rounded">
                                                                                                    <div class="caption">
                                                                                                        <p>EGP <?php echo $product['price'] ?></p>
                                                                                                        <p>Quantity <?php echo $product['quantity'] ?></p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        <?php
                                                                                        }
                                                                                        ?>

                                                                                    </div>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- /------------------------end of products--------------------------/ -->
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                        <?php
                                }
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
    <script src="js/template/bootstrap.bundle.js"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        function changeStatus(status, id) {

            $.ajax({
                type: 'POST',
                url: 'Ajax/status.php',
                data: {
                    id: id,
                    ajax_type: "status",
                    status: status

                },

                success: function(data) {
                    alert("order status has been changed ");
                }
            });

            [...document.getElementsByClassName(`${id}`)].forEach((element) => {
                element.remove()
            })
        }
    </script>


</body>

</html>