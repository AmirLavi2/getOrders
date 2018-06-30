<?php
require 'connection.php';

class Orders{
    public $startDate;
    public $endDate;

    public function getOrderByDate($startDate, $endDate){

        $query = "SELECT orderId, orderDate, orderComments FROM orders 
            WHERE orderDate BETWEEN '$startDate' AND '$endDate' 
            ORDER BY orderDate";
        
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