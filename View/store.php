<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <table class="table">
        <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "e-commerce";

        $con = mysqli_connect($server, $username, $password, $database);

        if (!$con) {
            die("connection to the database failed due to" . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `Products`";
        $result = mysqli_query($con, $sql);

        $num = mysqli_num_rows($result);
        ?>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">type</th>
                <th scope="col">Product ID</th>
                <th scope="col">date</th>
                <th scope="col">left</th>
                <th scope="col">update</th>
                <th scope="col">select</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                // echo var_dump($row);
                echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['NAME'] . "</td><td>" . $row['TYPE'] . "</td><td>" . $row['PRODUCT ID'] . "</td><td>" . $row['DATE'] . "</td><td>" . $row['NUMBER'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>