<?php
include("errorPHPChecker.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>

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

    <section class="container" style="margin: 10rem auto;">
        <div class="container border">
            <div class="row">
                <table class="table">
                    <thead class="thead-primary">
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Picture</th>
                            <th>Status</th>
                            <th>Edit - Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once("../../database.php");
                        $tableNameProducts = "products";
                        $dp = new DataBase();
                        $dp->connect();
                        $productsRows = $dp->select_All($tableNameProducts);
                        foreach ($productsRows as $product) {
                        ?>
                            <tr style="font-weight:1000;">
                                <td><?php echo $product["id"] ?></td>
                                <td><?php echo $product["name"] ?></td>
                                <td><?php echo $product["price"] ?></td>
                                <td><?php echo $product["category"] ?></td>
                                <td> <img src="<?php echo "../images/product_image/" . $product["picture"] ?>" class="col-xs-3" width="150px" height="150px"></td>
                                <td><?php echo $product["status"] ?></td>
                                <td>
                                    <h5><a href='editProduct.php?id=<?= $product['id'] ?>'>Edit </a> - <a href='deleteProduct.php?id=<?= $product['id'] ?>'>Delete</a></h5>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
</body>


</body>

</html>