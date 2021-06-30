<?php
 $server = "localhost";
 $username = "root";
 $password = "";

 $con = mysqli_connect($server, $username, $password);

 if(!$con)
 {
     die("connection to the database failed due to".mysqli_connect_error());
 }

 $name = $_GET['productName'];

 $sql = "INSERT INTO `e-commerce`.`Products` (`SERIAL`, `NAME`, `TYPE`, `NUMBER`, `DATE`) VALUES (NULL, 'Product 6', 'Product type 6', '10', current_timestamp());";
 
if($con->query($sql) == true)
{
    echo "successfully inserted";
}
else{
    echo "Error while inserting <br> $sql <br> $con->error";
}

$con->close();
 ?>