<?php
class DataBase{
    private $dsn;
    private  $user;
    private  $password;
    private $db;

    function __construct(){
        $this->dsn = 'mysql:dbname=cafetria;host=127.0.0.1;port=3306;';
        $this->user =  'root';
        $this->password = "";
    }
    public function connect(){
        $this->db = new PDO($this->dsn, $this->user, $this->password);
    }


    public function insert_into( $table_name,...$args){
        $query = "INSERT INTO `$table_name` ";
        switch($table_name){
            case 'users': $query.= ' ( `Name`, `Email`, `Password`, `RoomNo`, `Ext`, `profile_picture`, `role`)  VALUES(?,?,?,?,?,?,?)'; break;
            case 'products': $query.= ' ( `Pname`, `Price`, `Category`, `Picture`) VALUES(?,?,?,?)'; break;
            case 'orders': $query.= ' (`OrderDate`, `Status`, `UserId`, `TotalPrice`) VALUES(?,?,?,?)'; break;
            case 'order-product': $query.= ' (`OID`, `PID`, `Quantity`) VALUES(?,?,?)'; break;
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute($args);
    }


    public function delete($table_name, $id){
        $query = "DELETE FROM $table_name WHERE ID=$id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    // $db->update("students",id, "name", $_REQUEST["name"], "password", $_REQUEST["password"], "email",$_REQUEST["email"], "room", $_REQUEST["room"], "path", $Picture);
    public function update($table_name, $id, ...$args){
        $query = "UPDATE $table_name SET ";
        for($i = 0; $i < count($args); $i+=2){
            $some_number = $i + 1;
            if($some_number == count($args) - 1)
            {
                $query .= "`$args[$i]`"."="."'$args[$some_number]' ";
            }
            else{
                $query .= "`$args[$i]`"."="."'$args[$some_number]', ";
            }
        }
        $the_int_id = (int) $id;
        $query .= "WHERE id=$the_int_id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public function select_row($table_name, $id){
        $query ="SELECT * FROM $table_name WHERE ID= $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function select_All($table_name){
        $query ="SELECT * FROM $table_name ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
   
    
 
}