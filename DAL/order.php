<?php
require 'connection.php';

class Order{
    public $orderId;   

    public function getOrderData($orderId){
        $query = "SELECT * FROM orders WHERE orderId = $orderId";
        $result = connectToDB($query);
        $adminsInfo = mysqli_fetch_all($result,MYSQLI_ASSOC);
        Database::closeConnection();
        
        foreach($adminsInfo[0] as $res) {
            // header('content-Type: text/html');

            return $res;
        }
    }
}

if(isset($_POST['id1']) && !empty($_POST['id1'])){
    $id = $_POST['id1'];   
    
    $order2 = new Order();
    $order2->getOrderData($id);
    header('Content-Type: application/json');
    echo json_decode($res);
}



?>