<?php

require_once "config.php";
session_start();


$mail = $_POST['e-mail'];
$password = $_POST['password'];
$option = $_POST['option'];

if ($option=="admin")
{
    $vari = "`Admins`";
    $location = "location: ../View/admin.php";
    $sess = "admin";
}
if($option=="customer"){
    $vari = "`Customers`";
    $location = "location: ../View/store.php";
    $sess = "customer";
}


$sql = "SELECT * FROM $vari WHERE EMAIL = ? AND PASSWORD = ?";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, 'ss', $mail, $password);


mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);


$row = mysqli_fetch_row($result);

$count = mysqli_num_rows($result);


if($count == 1){

    $_SESSION[$sess]= $row;
    
    header($location);
    
    //echo $_SESSION["admin"][1];

}
else{
    echo "failed logging in";
}

?>