<?php

include("../include/connection.php");
$userID = $_COOKIE['userID'];
$productID = $_POST['productID'];
$productName = $_POST['productName'];
$userName = $_POST['userName'];
$userAddress = $_POST['userAddress'];
$userPhone = $_POST['userPhone'];

if(isset($userID) && isset($productID))
{
    $orderID = rand(111111111,999999999);
    
    $insertOrderQuery = "insert into orders (order_id, user_id, product_id, order_date, order_status, order_address, order_name, order_phone) values ('$orderID', '$userID', '$productID', NOW(), 'pending', '$userAddress', '$userName', '$userPhone')";
    $runInsertOrder = mysqli_query($con, $insertOrderQuery);
    //echo"<p class='cart-success'> $productName order complete. </p>";
    echo"<script>window.open('../shopping-web-site/view-order.php?order_id=$orderID', '_self')</script>";
}
else
{
    echo"<script>window.open('../shopping-web-site/login.php', '_self')</script>";
}

?>