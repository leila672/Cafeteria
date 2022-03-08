            <?php    if ($users) {
                                foreach ($users as $user) {

                        ?>
                                    <tr class="<?= $user['id'] ?>">
                                        <td>
                                            <button class="btn btn-default btn-xs" data-bs-toggle="collapse" data-bs-target="<?php echo "#demouser" . $user['id'] ?>">
                                                <span>+</span>
                                            </button>
                                        </td>
                                        <td><?php echo $user["name"] ?></td>
                                        <td><?php echo $user["totalPrice"] ?></td>

                                    </tr>



                                    <!-- /------------------------end of users--------------------------/ -->

                                    <tr class="<?= $user['id'] ?>">
                                        <td colspan="5" class="hiddenRow">
                                            <div class="collapse" id="<?php echo "demouser" . $user['id'] ?>">
                                                <div class="container">
                                                    <div class="row">
                                                        <table class="table" style="width: 300px; margin-left:50px ; border : 2px solid white">
                                                            <thead class="thead-primary" style="background-color: #9e7b5c ">
                                                                <tr class="text-center">
                                                                    <th> order details </th>
                                                                    <th> date</th>
                                                                    <th> price </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="background-color: #f7e2d0;">
                                                                <?php

                                                                $orders = $db->userorders($user['id']);

                                                                foreach ($orders as $order) {

                                                                ?>
                                                                    <tr class="text-center" class="<?= $order['id'] ?>">
                                                                        <td>
                                                                            <button class="btn btn-default btn-xs" data-bs-toggle="collapse" data-bs-target="<?php echo "#demoorder" . $order['id'] ?>" style="background-color:#9e7b5c;">
                                                                                <span style="color: white;">+</span>
                                                                            </button>
                                                                        </td>
                                                                        <td><?php echo $order["date"] ?></td>
                                                                        <td><?php echo $order["totalPrice"] ?></td>
                                                                    </tr>
                                                                    <!-- /------------------------end of orders--------------------------/ -->

                                                                    <tr class="text-center">
                                                                        <td colspan="5" class="hiddenRow" style="background-color: #e6cfbc ; width:20px; padding: 0px;">
                                                                            <div class="collapse" id="<?php echo "demoorder" . $order['id'] ?>">
                                                                                <div class="container">
                                                                                    <div class="row">

                                                                                        <?php
                                                                                        $products = $db->getProductsInOrders($order['id']);

                                                                                        foreach ($products as $product) {
                                                                                        ?>
                                                                                            <div class="col-xs-3 " style="margin: 10px;">
                                                                                                <div class="thumbnail">
                                                                                                    <img src="<?php echo "../images/product_image/" . $product['picture'] ?>" class="col-xs-3" width="75px" class="img-rounded">
                                                                                                    <div class="caption">
                                                                                                        <p>EGP <?php echo $product['price'] ?></p>
                                                                                                        <p>Quantity <?php echo $product['quantity'] ?></p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        <?php
                                                                                        }
                                                                                        ?>

                                                                                    </div>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- /------------------------end of products--------------------------/ -->
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                }
                            }
                                ?>