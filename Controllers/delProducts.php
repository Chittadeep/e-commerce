<?php
require_once "config.php";

$productID = $_GET["delete"];

$sql = "DELETE FROM `Products` WHERE `PRODUCT ID` = $productID;";


if($con->query($sql) == true)
{
    header("location: ../View/admin.php");
}
else{
    echo "Error while Deleting <br> $sql <br> $con->error";
}

?>