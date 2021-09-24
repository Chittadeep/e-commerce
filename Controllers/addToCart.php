<?php

require_once "config.php";

$id = $_GET["product_id"];
$num = $_GET["quantity"];

$sql = "INSERT INTO `Cart`(`PRODUCT ID`, `CUSTOMER NAME`, `CUSTOMER ID`, `QUANTITY`) VALUES ('$id', NULL, NULL,'$num')";
 
if($con->query($sql) == true)
     {
        header("location: ../View/store.php");
     }
     else{
         echo "Error while inserting <br> $sql <br> $con->error";
     
     }
?>