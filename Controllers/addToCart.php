<?php

require_once "config.php";

$id = $_GET["product_id"];
$num = $_GET["quantity"];
$customer_name= $_GET["customer_name"];
$customer_id= $_GET["customer_id"];
$cartid = rand();

$sql = "INSERT INTO `Cart`(`PRODUCT ID`, `CUSTOMER NAME`, `CUSTOMER ID`, `QUANTITY`, `CART ID`, `DATE`) VALUES ('$id', '$customer_name', '$customer_id', '$num', '$cartid', current_timestamp())";
 
if($con->query($sql) == true)
     {
        header("location: ../View/store.php");
     }
     else{
         echo "Error while inserting <br> $sql <br> $con->error";
     
     }
