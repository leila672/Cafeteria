<?php
include("errorPHPChecker.php");

$errorName = !empty($_GET['errorName']) ? $_GET['errorName'] : "";
$errorFile1 = !empty($_GET['errorFile1']) ? $_GET['errorFile1'] : "";
$errorFile2 = !empty($_GET['errorFile2']) ? $_GET['errorFile2'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria</title>

    <!-- Title Icon -->
    <link rel="shortcut icon" href="/Admin/images/favicon.png" />


    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php   require_once("navbar.php"); ?>

    <section class="container">
        <div class="d-flex justify-content-between align-items-center pt-3" style="margin-top: 7rem;">
            <h2>Add Product</h2>
        </div>
        <form class="row border rounded" action="addProductValidation.php" method="post" enctype="multipart/form-data">
            <fieldset class="m-3">
                <div class="col-md-3 mt-1">
                    <label class="form-label">Product</label>
                    <input type="text" name="product" class="form-control" value="" placeholder="Add Product name" style="width: 20rem;" required>
                    <span class="text-danger row" style="width: 20rem; margin-left:0.4rem;"><?php if (!empty($errorName)) echo "$errorName"; ?></span>
                </div>


                <hr>
                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="custom-number" name="price" placeholder="Pounds" min="1" style="width: 20rem;" step="1" value="" required>
                </div>

                <hr>
                <div class="row-md-3">
                    <label class="form-label" style="margin-right: 2rem; margin-left:1rem;">Category</label>

                    <select name="category" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="Hot Drinks">Hot Drinks</option>
                        <option value="Beverages">Beverages</option>
                        <option value="Alcohol">Alcohol</option>
                    </select>

                    <span>
                        <a href="" style="text-decoration: underline; margin-left: 2rem">Add Category</a>
                    </span>
                </div>

                <hr>
                <div class="row-md-6">
                    <div class="col ">
                        <label class="form-label">Product Image</label>
                    </div>
                    <div class="col">
                        <input class="form-control" name="productImage" type="file" id="formFile" required>
                    </div><span class="text-danger" style="margin-left:1.5rem;"><?php if (!empty($errorFile1)) echo "$errorFile1"; ?></span>
                    <span class="text-danger" style="margin-left:0.3rem;"><?php if (!empty($errorFile2)) echo "$errorFile2"; ?></span>
                </div>

                <hr>
                <div class="row m-3">
                    <div class="col-6">
                        <button class="btn btn-primary" type="submit" style="font-family: Tahoma;font-weight:bold;">Save</button>
                    </div>

                    <div class="col-6" style="font-family: Tahoma;">
                        <button class="btn btn-primary btn-danger" type="reset" style="font-family: Tahoma;font-weight:bold;">Reset</button>
                    </div>
                </div>
            </fieldset>

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
</body>


</body>

</html>