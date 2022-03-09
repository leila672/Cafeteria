<form method="post" action="">
    <!-- date -->
    <table class="col-8" style="left: 20%;">
        <tr>
            <td>
                <h4 style="display: inline-block;">Filter By User :</h4>
            </td>
        
            <td>


                <?php


                require_once("../../Database.php");
                $db = new DataBase();
                try {
                    $db->connect();
                    $users = $db->select_All("users");
                    if ($users) {
                ?>
                        <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="userselected" id="" class="form-control" style="color: #734d26; margin-right: 15px;">
                                <option style="color:  #734d26; "  value="" disabled selected>Select User</option> ;
                            <?php
                            foreach ($users as $user) {

                                echo '<option  class= "selectuser" style="color:  #734d26;" value="' . $user['id'] . '">' . $user['name'] . '</option>';
                            }
                        }

                            ?>
                            </select>
                        </div>
                        </div>
                    <?php
                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
                    ?>



            </td>


            <td>
                <input  style="margin-right:-25px; margin-left: 10px;" type="submit" name="submit2" value="search">
            </td>
        </tr>
    </table>
</form>