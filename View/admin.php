<?php
require_once "../Controllers/config.php";

session_start();

if(!isset($_SESSION["admin"]))
die("login required");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

  <title>Admin Dashboard</title>
</head>

<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">CB Cart</a>
      <div class="d-flex">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-products" type="button" role="tab" aria-controls="pills-products" aria-selected="true">
              Products
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button" role="tab" aria-controls="pills-admin" aria-selected="false">
              Admins
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-cart" type="button" role="tab" aria-controls="pills-cart" aria-selected="false">
              Cart
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Button trigger modal -->

  <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="pills-home-tab">
      <table class="table">
        <?php
        require_once "../Controllers/config.php";

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

            echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['NAME'] . "</td><td>" . $row['TYPE'] . "</td><td>" . $row['PRODUCT ID'] . "</td><td>" . $row['DATE'] . "</td><td>" . $row['NUMBER'] . "</td></tr>";
          }
          ?>
        </tbody>
      </table>


      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addProduct">Add item</button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="../Controllers/addProducts.php" method="GET">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">product name</span>
                  <input type="text" name="productName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary dropdown-toggle" data-target="productType" type="button" data-bs-toggle="dropdown" aria-expanded="false">type</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="drop('Clothes')">Clothes</a></li>
                    <li><a class="dropdown-item" href="#" onclick="drop('Accessiories')">Accessiories</a></li>
                    <li><a class="dropdown-item" href="#" onclick="drop('Something else here')">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                  <input name="productType" id="productType" type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>

                <div class="input-group mb-3">
                  <input name="productPrice" type="text" class="form-control" placeholder="Price" aria-label="price">
                  <input name="productNumber" type="number" class="form-control" placeholder="number" aria-label="Server">
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupFile01">Upload</label>
                  <input name="photo" type="file" class="form-control" id="inputGroupFile01">
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addItem">Save changes</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane fade" id="pills-admin" role="tabpanel" aria-labelledby="pills-profile-tab">
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">ID</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Handle</th>
            <th scope="col">Date</th>
          </tr>
        </thead>

        <tbody>
          <?php
          
          $sql = "SELECT * FROM `Admins`";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            // echo var_dump($row);
            echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['NAME'] . "</td><td>" . $row['DATE'] . "</td><td>" . $row['PHONE'] . "</td><td>" . $row['EMAIL'] . "</td><td>" . $row['HANDLE'] . "</td><td>" . $row['DATE'] . "</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addAdmin">Add admin</button>

        <div class="modal fade" id="addAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="../Controllers/addAdmins.php" method="POST">
                <div class="modal-body">

                  <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    <input type="text" aria-label="First name" class="form-control" name="firstName">
                    <input type="text" aria-label="Last name" class="form-control" name="lastName">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                  </div>


                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">phone</span>
                    <input type="phone" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="phone">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Handle</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="handle">
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="inputGroupFile02" name="photo">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-cart" role="tabpanel" aria-labelledby="pills-contact-tab">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Customer name</th>
              <th scope="col">Customer id</th>
              <th scope="col">product id</th>
              <th scope="col">product name</th>
              <th scope="col">cart id</th>
              <th scope="col">select</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    function drop(opt) {
      document.getElementById("productType").value = opt;
    }
  </script>
<?php

    //session_start();
    echo "<h2>";
    echo $_SESSION["admin"][1];
    echo "</h2>";
    session_unset();
?>
</body>

</html>