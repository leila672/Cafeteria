<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/icomoon.css"> 
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../../User/css/home.css"> 
    <!-- CSS only -->

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">


</head>

<body>
<?php  require_once("navbar.php"); ?>

<br><br>
<section class="main-content product-section mt-150 mb-150">
    
<select id="select" class="form-select form-select-sm bg-dark text-light" style="text-align:center; margin-left:340px; width:50%" aria-label=".form-select-sm example">
<option value="users" selected="selected" hidden="hidden">USERS</option>
<?php
require_once("../../Database.php");
                  $db = new DataBase();
                  try {
                    $db->connect();
                    $users = $db->select_All("users");
                    if ($users) {
                      foreach ($users as $user) {
                  ?>
            
                  <option value="<?php echo $user["id"] ?>"><?php echo $user["name"] ?></option>
    
                  <?php
                      } 
                    }
                  } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                  }
                  ?>
</select>

<br><br>
<!-- <script>

let select = document.getElementById('select');

select.addEventListener("change",()=>{

    var userid = select.options[select.selectedIndex].value;
    console.log(userid)

})
 
 

</script> -->


<div id="prod" class="row product-lists">
      
  <!-- <div class="col-lg-4 col-md-6 text-center ">
    <div class="single-product-item">
      <div class="product-image">
        <img src="12.png" alt="">
      </div>
      <h3>Strawberry</h3>
      <p class="product-price">60<span class="a-price-symbol">EGP</span></p>
      <button href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div> -->

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
                <td>0</td>
              </tr>
            </tbody>
          </table>
          <div class="cart-buttons">
            <a id="total"  href="#" type="submit" class="boxed-btn black">Make Order</a>
          </div>
        </div>

        
      </div>

    </div>

  </div>

</div>  
    


  <script src="../js/get_product.js"></script>
  <script src="../js/admin_order.js"></script>
  <script src="../js/home.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


<script>

 setTimeout(addtocart,1000);
  
</script>


















</body>

</html>