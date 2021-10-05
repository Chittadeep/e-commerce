<?php

require_once "../Controllers/config.php";

$name = $_POST['firstName'].$_POST['lastName'];
$email = $_POST['email'];
$adminID= $_POST['adminID'];
$phone = $_POST['phone'];
$handle = $_POST['handle'];
$password = $_POST['password'];

echo $name;
echo $email;
echo $adminID;
echo $handle;

$sql = "UPDATE `Admins` SET `NAME` = '$name', `EMAIL`= '$email', `PHONE`='$phone', `HANDLE`='$handle', `PASSWORD`= '$password' WHERE `ID` = '$adminID'";

if($con->query($sql) == true)
{
    header("location: ../View/admin.php");
}
else{
    echo "Error while inserting <br> $sql <br> $con->error";
}

$con->close();


?>