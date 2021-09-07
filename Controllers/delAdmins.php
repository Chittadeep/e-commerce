<?php
require_once "config.php";

$adminID = $_GET["delete"];

$sql = "DELETE FROM `Admins` WHERE `ID` = $adminID;";


if($con->query($sql) == true)
{
    header("location: ../View/admin.php");
}
else{
    echo "Error while Deleting <br> $sql <br> $con->error";
}

?>