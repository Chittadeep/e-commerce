<?php

use function PHPSTORM_META\type;

require_once "config.php";

$ID = $_GET["delete"];

$type = $_GET["type"];

if($type == 'admins'){
$sql = "DELETE FROM `Admins` WHERE `ID` = $ID;";
}
if ($type == 'products') {
    $sql = "DELETE FROM `Products` WHERE `PRODUCT ID` = $ID;";
}
if ($type == 'cart') {
    $sql = "DELETE FROM `Cart` WHERE `CART ID` = $ID;";
}

echo $sql;

if($con->query($sql) == true)
{
    header("location: ../View/admin.php");
}
else{
    echo "Error while Deleting <br> $sql <br> $con->error";
}

?>