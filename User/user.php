<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cafateria products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">


  </head>

  <body>



  <?php include '../DataBase.php'?>


  
  <?php 
  
   session_start();

   $username = ($_SESSION["id"]);

     echo $username;


   $query = " SELECT id FROM users  WHERE name = '$username' ";
   
      


 
  
  ?>

      
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="home.php">CAFATERIA<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="orders.html" class="nav-link">My Orders</a></li>
	          <li class="nav-item cart"><a href="#" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread"></h1>
            </div>

          </div>
        </div>
      </div>
    </section>
		
	

<section class="main-content product-section mt-150 mb-150">


<div class="section-title" style="margin-top:100px"> 

     <h3><span class="orange-text">Our</span>
       Products
 
     </h3>

</div>


<div class="row product-lists">

<?php 
   $db = new DataBase();
   $db->connect();
   $products = $db->select_All('products'); 
   foreach($products as $ap) {
       $name = $ap['name'];
       $price = $ap['price'];  
?>
      
 <div class="col-lg-4 col-md-6 text-center ">
   <div class="single-product-item">
     <div class="product-image">
       <img src="12.png" alt="">
     </div>
     <h3><?php echo $name; ?></h3>
     <p class="product-price"><?php echo $price; ?><span class="a-price-symbol">EGP</span></p>
     <button href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
   </div>
 </div>

       <?php 
  } ?>



</div>


</section>



<div class="cart-section mt-150 mb-150">

  <div class="container">

    <div class="row">

      <div class="col-lg-8 col-md-12">
        <div class="cart-table-wrap">
          <table class="cart-table" >
            <thead class="cart-table-head">
              <tr class="table-head-row">
                <th class="product-remove"></th>
                <th class="product-image">Product Image</th>
                <th class="product-name">Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
              </tr>
            </thead>
            <tbody >
              <!-- tr  class="table-body-row ">
                <td class="product-remove">X<a href="#"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><img src="./0.png" alt=""></td>
                <td class="product-name">coffe</td>
                <td class="product-price">55</td>
                <td class="product-quantity"><input type="number" placeholder="0"></td>
                <td class="product-total">140</td>
              </tr> -->
             
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="total-section">
          <table class="total-table">
            <thead class="total-table-head">
              <tr class="table-total-row">
                <th>Total</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
          <!--     <tr class="total-data">
                <td><strong>Subtotal: </strong></td>
                <td>$500</td>
              </tr>
              <tr class="total-data">
                <td><strong>Shipping: </strong></td>
                <td>$45</td>
              </tr> -->
              
              <tr class="total-data">
                <td><strong>Total: </strong></td>
                <td>$545</td>
              </tr>
            </tbody>
          </table>
          <div class="cart-buttons">
            <a href="#" class="boxed-btn black">Check Out</a>
          </div>
        </div>


      </div>

    </div>

  </div>

</div>


 
 
  <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
  <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
	<div class="ftco-footer-widget mb-4">
		<h2 class="ftco-heading-2">Have a Questions?</h2>
		<div class="block-23 mb-3">
		  <ul>
			<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
			<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
			<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
		  </ul>
		</div>
	</div>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/home.js"></script>
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
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

    
  </body>

  </html>