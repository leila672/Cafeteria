<?php
include("errorPHPChecker.php");

$errorCategory = !empty($_GET['errorCategory']) ? $_GET['errorCategory'] : "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Title Icon -->
    <link rel="shortcut icon" href="/Admin/images/favicon.png" />


    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <?php require_once("navbar.php"); ?>

    <section class="container">

        <form class="row" action="addCategoryValidation.php" method="post" enctype="multipart/form-data">
            <div style="margin: 10rem auto;">
                <fieldset class="m-3">
                    <div style="margin-top: 7rem;">
                        <label class="form-label" style="margin-right: 2rem; margin-left:1rem; font-weight: bold;">Category</label>
                        <input type="text" name="category" style="width:20rem" class="form-select" required>
                        <span class="text-danger row" style="width: 20rem; margin-left:11rem;"><?php if (!empty($errorCategory)) echo "$errorCategory"; ?></span>
                    </div>
                    <div class="row m-3">
                        <div class="col-6 m-5">
                            <button class="btn btn-primary" style="height: 2rem; width:4rem; margin-left: 10rem;" type="submit" style="font-family: Tahoma;font-weight:bold;">Add</button>
                        </div>
                </fieldset>
            </div>
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
</body>


</body>

</html>