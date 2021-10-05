<?php

require_once "../Controllers/config.php";

$productName = $_GET['productName'];
$productID = $_GET['productID'];
$productType = $_GET['productType'];
$productPrice = $_GET['productPrice'];
$productNumber = $_GET['productNumber'];
$productDescription = $_GET['description'];

echo $productID;
echo $productName;
echo $productID;
echo $productType;
echo $productPrice;
echo $productNumber;
echo $productDescription;

$sql = "UPDATE `Products` SET `NAME` = '$productName', `TYPE`= '$productType', `PRICE`='$productPrice', `PRODUCT DESCRIPTION`='$productDescription', `NUMBER`= '$productNumber' WHERE `PRODUCT ID` = '$productID'";


if($con->query($sql) == true)
{
    header("location: ../View/admin.php");
}
else{
    echo "Error while inserting <br> $sql <br> $con->error";
}

$con->close();

?>