<?php
//require_once("../Admin/views/sessionValidtion.php");
?>
<header class="top-navbar" style="z-index: 1000000;">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../Admin/views/home.php">
                <img src="../Admin/images/logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a class="nav-link text-primary" href="../Admin/views/home.php">Home</a></li>
                    <li class="nav-item "><a class="nav-link text-primary" href="myorders.php">Orders</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdown-a"
                           data-toggle="dropdown"><?php echo $_SESSION['name'] ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item text-primary" href="../Admin/views/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                &nbsp
                <img src="../../Admin/images/user_image/<?php echo $_SESSION['profile_Picture'] ?>" style="border-radius:50%;" width="8%" alt="User">
            </div>
        </div>
    </nav>
</header>