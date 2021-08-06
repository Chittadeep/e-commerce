<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'e-commerce');

/*
$server = "localhost";
 $username = "root";
 $password = "";
 $database = "e-commerce";*/

 $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 if(!$con)
 {
     die("connection to the database failed due to".mysqli_connect_error());
 }

 ?>