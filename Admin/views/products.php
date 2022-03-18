 <?php 

 include '../../DataBase.php';


    $db = new DataBase();
    $db->connect();
    $products = $db->select_All('products'); 
    $jsonprod = json_encode($products);
    
    echo $jsonprod;
   

?>

 
      