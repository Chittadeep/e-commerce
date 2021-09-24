<?php
require_once "config.php";

     $name = $_POST['firstName'].$_POST['lastName'];
     $password = $_POST['password'];
     $customerID = rand();
     $phone = $_POST['phone'];
     $handle = $_POST['handle'];
     $mail = $_POST['email'];

     $sql = "INSERT INTO `Customers`(`SERIAL`, `NAME`, `PASSWORD`, `ID`, `PHONE`, `HANDLE`, `EMAIL`, `DATE`) VALUES (NULL,'$name','$password','$customerID','$phone','$handle','$mail', current_timestamp())";
 
     if($con->query($sql) == true)
     {
        header("../index.html");
     }
     else{
         echo "Error while inserting <br> $sql <br> $con->error";
     }
     
?>