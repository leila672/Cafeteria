<?php
session_start();
$userName = $_SESSION['name'];
$userImage= $_SESSION['profile_Picture'];
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"> <img style=" width: 80px;height:80px;" src="../Admin/user_image/<?= $userImage ?>" alt=""><?= $userName ?> <small></small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">MyOrders</a></li>
                </ul>
            </div>
        </div>
    </nav>