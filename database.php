
<?php

$server = "localhost";
 $username = "root";
 $password = "";
 $database = "e-commerce";

 $con = mysqli_connect($server, $username, $password, $database);

 if(!$con)
 {
     die("connection to the database failed due to".mysqli_connect_error());
 }

 $name = $_GET['productName'];
 $type = $_GET['productType'];
 $price = $_GET['productPrice'];
 $number =$_GET['productNumber'];
 $photo = $_GET['photo'];
 $productID = rand();

 $sql = "INSERT INTO `Products`(`SERIAL`,`PRODUCT ID`, `NAME`, `TYPE`, `PRICE`, `NUMBER`, `PHOTO`, `DATE`) VALUES (NULL,'$productID','$name','$type','$price','$number','$photo', current_timestamp())";
 
if($con->query($sql) == true)
{
    echo "successfully inserted";
}
else{
    echo "Error while inserting <br> $sql <br> $con->error";
}

$con->close();
 ?>