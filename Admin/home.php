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

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Welcome</span>
            <h1 class="mb-4">The Best Coffee Testing Experience</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
              necessary regelialia.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Welcome</span>
            <h1 class="mb-4">Amazing Taste &amp; Beautiful place</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
              necessary regelialia.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <span class="subheading">Welcome</span>
            <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
              necessary regelialia.</p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>



  <section class="container user-home">
    <h1> Orders </h1>
    <hr />

    <div class="container">
      <div class="row">


        <table class="table">
          <thead class="thead-primary">
            <tr class="text-center">
              <th>Order Details</th>
              <th>Order Date</th>
              <th>Name</th>
              <th>Room</th>
              <th>Ext</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include_once("../DataBase.php");
            $db = new DataBase();
            try {
              $db->connect();
              $orders = $db->showOrders();
              if ($orders) {
                foreach ($orders as $order) {
            ?>
                  <tr class="<?= $order['id'] ?>" data-bs-toggle="collapse" data-bs-target="<?php echo "#demo" . $order['id']?>"    >
                    <td>
                      <button class="btn btn-default btn-xs">
                        <span>+</span>
                      </button>
                    </td>
                    <td><?php echo $order["date"] ?></td>
                    <td><?php echo $order["name"] ?></td>
                    <td><?php echo $order["roomNum"] ?></td>
                    <td><?php echo $order["ext"] ?></td>
                    <td><?php echo $order["status"] ?></td>

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
                          <p> Total : <?php echo $order["totalPrice"] ?>
                          <div>
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


</body>

</html>