
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
 $type = $_GET['productType'];
 $price = $_GET['productPrice'];
 $number =$_GET['productNumber'];
 $photo = $_GET['photo'];
 $productID = rand();

 $sql = "INSERT INTO `e-commerce`.`Products`(`SERIAL`, `NAME`, `TYPE`, `PRICE`, `NUMBER`, `PHOTO`, `DATE`) VALUES (NULL,'$name','$type','$price','$number','$photo' current_timestamp())";
 
if($con->query($sql) == true)
{
    echo "successfully inserted";
}
else{
    echo "Error while inserting <br> $sql <br> $con->error";
}

$con->close();
 ?>