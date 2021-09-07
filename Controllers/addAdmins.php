<?php
require_once "config.php";

     $name = $_POST['firstName'].$_POST['lastName'];
     $password = $_POST['password'];
     $adminID = rand();
     $phone = $_POST['phone'];
     $handle = $_POST['handle'];
     $mail = $_POST['email'];
     $photo = $_POST['photo'];

     $sql = "INSERT INTO `Admins`(`SERIAL`, `NAME`, `PASSWORD`, `ID`, `PHONE`, `HANDLE`, `EMAIL`, `DATE`, `PHOTO`) VALUES (NULL,'$name','$password','$adminID','$phone','$handle','$mail', current_timestamp(), '$photo')";
 
     if($con->query($sql) == true)
     {
        header("location: ../View/admin.php");
     }
     else{
         echo "Error while inserting <br> $sql <br> $con->error";
     }
     
?>