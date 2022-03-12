<?php
require_once("../Admin/views/sessionValidtion.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"> <img style="  border:1px solid white; margin-right: 15px; border-radius: 50%; width: 80px;height:80px;" src="../Admin/images/user_image/<?= $userImage ?>" alt=""><?= $userName ?> <small></small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">MyOrders</a></li>
                    <li class="nav-item cart"><a href="user.php" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
                    <li class="nav-item"><a href="../Login/logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>