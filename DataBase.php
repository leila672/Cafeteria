<?php
class DataBase
{
    private $serverName;
    private $userName;
    private $userPass;
    private $dbName;
    private $charSet;
    private $dsn;
    private $db;

    public function __construct()
    {
        $this->serverName  = "localhost";
        $this->userName = "root";
        $this->userPass  = "12345";
        $this->dbName = "cafeteria";
        $this->charSet = "utf8mb4";

        $this->dsn = "mysql:host=" . $this->serverName . "; dbname=" . $this->dbName . "; charset=" . $this->charSet;
    }

    public function connect()
    {
        try {
            $this->db = new PDO($this->dsn, $this->userName, $this->userPass);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    public function insert_Product($usrname, $password, $email, $picture)
    {
        $insertQuery = "Insert INTO products (name, price, category, picture) Values(?, ?, ?, ?)";
        return $this->db->prepare($insertQuery)->execute([$usrname, $password, $email, $picture]);
    }

    public function insert_Category($category)
    {
        $insertQuery = "Insert INTO category (category) Values(?)";
        return $this->db->prepare($insertQuery)->execute([$category]);
    }

    public function update_Table($id, $name, $price, $category, $picture)
    {
        $update = "update products set name = ?, price = ?, category = ?, picture = ? where id = ?";
        return $this->db->prepare($update)->execute([$name, $price, $category, $picture, $id]);
    }

    public function update_Category($newValue, $oldValue)
    {
        $updateQuery = "update category set category = ? where category = ?";
        return $this->db->prepare($updateQuery)->execute([$newValue, $oldValue]);
    }

    public function insert_into($table_name, ...$args)
    {
        $query = "INSERT INTO `$table_name` ";
        switch ($table_name) {
            case 'users':
                $query .= ' ( `name`, `email`, `password`, `roomNum`, `ext`, `profile_Picture`, `role`)  VALUES(?,?,?,?,?,?,?)';
                break;
            case 'products':
                $query .= ' (`name`,``price, `category`, `picture`) VALUES(?,?,?,?)';
                break;
            case 'orders':
                $query .= ' (`date`,`status`, `totalPrice`, `user_id`) VALUES(?,?,?,?)';
                break;
            case 'order-product':
                $query .= ' (`order_id`, `product_id`,`quantity`) VALUES(?,?,?)';
                break;
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute($args);
    }


    public function delete($table_name, $id)
    {
        $the_int_id = (int) $id;
        $query = "DELETE FROM $table_name WHERE id=$the_int_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    // $db->update("students",id, "name", $_REQUEST["name"], "password", $_REQUEST["password"], "email",$_REQUEST["email"], "room", $_REQUEST["room"], "path", $Picture);
    public function update($table_name, $id, ...$args)
    {
        $query = "UPDATE $table_name SET ";
        for ($i = 0; $i < count($args); $i += 2) {
            $some_number = $i + 1;
            if ($some_number == count($args) - 1) {
                $query .= "`$args[$i]`" . "=" . "'$args[$some_number]' ";
            } else {
                $query .= "`$args[$i]`" . "=" . "'$args[$some_number]', ";
            }
        }
        $the_int_id = (int) $id;
        $query .= "WHERE id=$the_int_id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public function select_row($table_name, $id)
    {
        $the_int_id = (int) $id;
        $query = "SELECT * FROM $table_name WHERE id= $the_int_id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function select_All($table_name)
    {
        $query = "SELECT * FROM $table_name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public function showOrders()
    {
        $data = array();
        try {
            $query = 'SELECT * FROM users 
            JOIN orders ON users.id = orders.user_id WHERE status ="Processing" ORDER BY date DESC';

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $orders = $stmt->fetchAll();
            return $orders;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getProductsInOrders($oid)
    {
        try {
            $sql_order = 'SELECT id, name,  price , picture , product_id, order_id, quantity  FROM orders_products
             JOIN products 
             ON orders_products.product_id = products.id
              WHERE orders_products.order_id = ' . $oid;
            $stat = $this->db->prepare($sql_order);
            $stat->execute();
            $orders_products = $stat->fetchAll();
            return $orders_products;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function changeOrderStatus($id, $status)
    {
        try {

            $sql = 'UPDATE `orders` SET `status`="' . $status . '" WHERE id =' . $id . ' ';
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
    }

    public function showusers()
    {

        try {

            $limit = 2;

            // update the active page number

            if (isset($_GET["page"])) {

                $page_number  = $_GET["page"];
            } else {

                $page_number = 1;
            }

            // get the initial page number

            $initial_page = ($page_number - 1) * $limit;

            // get data of selected rows per page 

            $query1 = "SELECT users.id ,name , SUM(totalPrice)  as totalPrice FROM users JOIN orders ON users.id = orders.user_id  GROUP BY name  LIMIT $initial_page, $limit";
            $stmt = $this->db->prepare($query1);
            $stmt->execute();
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function showuserswithdate($from, $to)
    {

        try {
            $query = "SELECT users.id ,name , SUM(totalPrice)  as totalPrice FROM users JOIN orders ON users.id = orders.user_id and date between '$from' and '$to'  GROUP BY name";


            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $user_orders = $stmt->fetchAll();
            return $user_orders;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function paginate()
    {
        $query2 = "SELECT COUNT( distinct user_id) FROM orders";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->execute();
        $paginator = $stmt2->fetchAll();

        return $paginator;
    }

    public function userorders($uid)
    {

        try {
            $query = 'SELECT * FROM orders where  orders.user_id = ' . $uid . ' ORDER BY date DESC';

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $user_orders = $stmt->fetchAll();
            return $user_orders;
        } catch (PDOException $e) {
            return false;
        }
    }
}
