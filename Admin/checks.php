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

    <style>
        .inline {

            display: inline-block;

            /* float: right; */

            margin: 20px 0px;

        }

        input,
        button {

            height: 34px;

        }

        .pag_items {

            display: inline-block;
            margin-left: 420px;

        }

        .paginator {

            font-weight: bold;

            font-size: 18px;

            color: white;

            float: left;

            padding: 8px 16px;

            text-decoration: none;

            border: 1px solid white;

            margin: 2px;

        }

        .paginator.active {

            background-color: #e6ccb3;
            color: black;

        }

        .paginator:hover:not(.active) {

            background-color: #e6ccb3;
            color: #392613;

        }

        .selectuser.active {

            background-color: #e6ccb3;
            color: black;

        }


 .selectuser :hover{ 
    background: #000 !important;
} 
    </style>

</head>

<body>

    <?php require_once("navbar.php");
    ?>
    <!-- END nav -->


    <br> <br> <br> <br> <br> <br>
    <section class="container user-home">
        <h1> checks </h1>
        <hr />

        <?php require_once("filterswithdate.php");
        require_once("filterwithuser.php");
        ?>

        <br> <br>

        <div class="container">
            <div class="row">


                <table class="table">
                    <thead class="thead-primary" style="background-color: #9e7b5c ;">
                        <tr class="text-center">
                            <th> user orders </th>
                            <th>Name</th>
                            <th>total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        require_once("../DataBase.php");
                        $db = new DataBase();
                        try {
                            $db->connect();

                            if (isset($_POST['submit'])) {
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $users = $db->showuserswithdate($from, $to);

                                require_once('checks_templete.php');
                            } elseif (isset($_POST['submit2'])) {
                                if (!empty($_POST['userselected'])) {
                                    $selected = $_POST['userselected'];
                                    $users = $db->showuserswithname($selected);
                                    require_once('checks_templete.php');
                                }
                            } else {
                                $users = $db->showusers();
                                require_once('checks_templete.php');
                            }
                        } catch (PDOException $e) {
                            echo 'Connection failed: ' . $e->getMessage();
                        }
                        ?>

                    </tbody>

                </table>
                <?php

                if (!((isset($_POST['submit'])) || (isset($_POST['submit2'])))) {
                    require_once('paganitor.php');
                }
                ?>
                <br> <br> <br> <br> <br> <br>

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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




    <script>
        function go2Page()

        {

            var page = document.getElementById("page").value;

            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));

            window.location.href = 'checks.php?page=' + page;

        }
    </script>

    <script>
        function changeStatus(status, id) {

            $.ajax({
                type: 'POST',
                url: 'Ajax/status.php',
                data: {
                    id: id,
                    ajax_type: "status",
                    status: status

                },

                success: function(data) {
                    alert("order status has been changed ");
                }
            });

            [...document.getElementsByClassName(`${id}`)].forEach((element) => {
                element.remove()
            })
        }
    </script>


</body>

</html>