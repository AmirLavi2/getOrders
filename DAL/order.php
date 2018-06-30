<?php
require 'connection.php';

class Order{
    public $orderId;   

    public function getOrderData($orderId){
        
        $query = "SELECT orderId, orderDate, orderComments FROM orders 
            WHERE orderId = $orderId";
        
        $result = connectToDB($query);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        Database::closeConnection();
        
        $ret = array();
        foreach($data as $arr) {
            array_push($ret, $arr);
        }
        return $ret;
    }
}

?>
