<?php
require_once("sessionValidtion.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"> <img style=" margin-right: 15px; border-radius: 50%; width: 80px;height:80px;" src="../../Admin/images/user_image/<?= $userImage ?>" alt=""> <?= $userName ?> <small></small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">products</a></li>
                    <li class="nav-item"><a href="allUsers.php" class="nav-link">Users</a></li>
                    <li class="nav-item"><a href="manual_orders.php" class="nav-link">Manual order</a></li>
                    <li class="nav-item"><a href="checks.php" class="nav-link">checks</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>