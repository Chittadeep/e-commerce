<?php
require_once "config.php";

$mail = $_POST['e-mail'];
$password = $_POST['password'];


$sql = "SELECT * FROM `Admins` WHERE EMAIL = ? AND PASSWORD = ?";
$stmt = mysqli_prepare($con, $sql);


mysqli_stmt_bind_param($stmt, 'ss', $mail, $password);


mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_row($result);

$count = mysqli_num_rows($result);


if($count == 1){


    $_SESSION["admin"]= $row;
    header("location: ../View/admin.php");

    //echo $_SESSION["admin"][1];

}
else{
    echo "failed logging in";
}

?>