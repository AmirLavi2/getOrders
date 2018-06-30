<?php
require 'DAL/orders.php';

if(isset($_GET['startDate']) && isset($_GET['endDate'])){
    $start = $_GET['startDate'];;
    $end = $_GET['endDate'];
    
    $order1 = new Orders();
    $res = $order1->getOrderByDate($start, $end);
    
    $JSON = json_encode($res);
    echo $JSON;
}
?>