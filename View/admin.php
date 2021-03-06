<?php
require_once "../Controllers/config.php";

session_start();

if (!isset($_SESSION["admin"]))
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

        <div style="align-content: center;">
          <?php
          echo "<h3 style = 'color: white'> ";
          echo $_SESSION["admin"][1];
          echo "</h2>";
          ?>

          <a href="../Controllers/logout.php" style="color: white;">Log out</a>
        </div>

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
            <th scope="col">photo</th>
            <th scope="col">Product ID</th>
            <th scope="col">Price</th>
            <th scope="col">Product Description</th>
            <th scope="col">date</th>
            <th scope="col">left</th>
            <th scope="col">update</th>
            <th scope="col">select</th>
          </tr>
        </thead>

        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['NAME'] . "</td><td>" . $row['TYPE'] . "</td><td> <img src ='", $row['PHOTO'], "'></td><td>" . $row['PRODUCT ID'] . "</td><td>" . $row['PRICE'] . "</td><td>" . $row['PRODUCT DESCRIPTION'] . "</td><td>" . $row['DATE'] . "</td><td>" . $row['NUMBER'] . "</td><td>" . "<button type='button' id = 'update' onclick = updateProduct('" . $row["NAME"] . "','" . $row["TYPE"] . "','" . $row["PRODUCT ID"] . "','" . $row["PRODUCT DESCRIPTION"] . "','" . $row["PRICE"] . "','" . $row["NUMBER"] . "') class='btn btn-info'>Update</button>" . "</td><td>" . "<form action = '../Controllers/delete.php' method = 'GET'><input type = 'text' value = 'products' name = 'type' hidden = true><button type='submit' class='btn btn-success' name='delete' value = '" . $row['PRODUCT ID'] . "'>Delete</button></form>" . "</td></tr>";
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

                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="Product description" name="description" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Product Description</label>
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

      <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="../Controllers/updateProduct.php" method="GET">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">product name</span>
                  <input type="text" name="productName" id="productName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <input type="number" id=productID name="productID" hidden = true>
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
                  <input name="productPrice" id="productPrice" type="text" class="form-control" placeholder="Price" aria-label="price">
                  <input name="productNumber" id="productNumber" type="number" class="form-control" placeholder="number" aria-label="Server">
                </div>

                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="productDescription" name="description" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Product Description</label>
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
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <tbody>
          <?php

          $sql = "SELECT * FROM `Admins`";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            // echo var_dump($row);
            echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['NAME'] . "</td><td>" . $row['ID'] . "</td><td>" . $row['PHONE'] . "</td><td>" . $row['EMAIL'] . "</td><td>" . $row['HANDLE'] . "</td><td>" . $row['DATE'] . "</td><td>" . "<button type='button'id = 'update' onclick = updateAdmin('" . $row["NAME"] . "','" . $row["ID"] . "','" . $row["PHONE"] . "','" . $row["EMAIL"] . "','" . $row["HANDLE"] . "') class='btn btn-info'>Update</button>" . "</td><td>" . "<form action = '../Controllers/delete.php' method = 'GET'><input type ='text' value = 'admins' name = 'type' hidden = true><button type='submit' class='btn btn-success' name='delete' value = '" . $row['ID'] . "'>Delete</button></form>" . "</td></tr>";
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

        <div class="modal fade" id="updateAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="../Controllers/updateAdmin.php" method="POST">
                <div class="modal-body">

                  <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    <input type="text" aria-label="First name" class="form-control" id="adminName" name="firstName">
                    <input type="text" aria-label="Last name" class="form-control" name="lastName">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="adminEmail" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <input type="number" id=adminID name="adminID" hidden = true>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>


                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">phone</span>
                    <input type="phone" class="form-control" id="adminPhone" aria-describedby="basic-addon3" name="phone">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Handle</span>
                    <input type="text" class="form-control" placeholder="Username" id="adminHandle" aria-label="Username" aria-describedby="basic-addon1" name="handle">
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="photo" name="photo">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane fade" id="pills-cart" role="tabpanel" aria-labelledby="pills-contact-tab">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer id</th>
            <th scope="col">Quantity</th>
            <th scope="col">Cart id</th>
            <th scope="col">Date Time</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM `Cart`";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            // echo var_dump($row);
            echo "<tr><td>" . $row['SERIAL'] .  "</td><td>" . $row['PRODUCT ID'] . "</td><td>" . $row['CUSTOMER NAME'] . "</td><td>" . $row['CUSTOMER ID'] . "</td><td>" . $row['QUANTITY'] . "</td><td>" . $row['CART ID'] . "</td><td>" . $row['DATE'] . "</td><td>" . "<button type='button' class='btn btn-info'>Update</button>" . "</td><td>" . "<form action = '../Controllers/delete.php' method = 'GET'><input type = 'text' value = 'cart' name = 'type' hidden = true><button type='submit' class='btn btn-success' name='delete' value = '" . $row['CART ID'] . "'>Dispatch</button></form>" . "</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    function drop(opt) {
      document.getElementById("productType").value = opt;
    }

    function updateProduct(name, type, id, description, price, number) {
      console.log(name, type, id, description, price, number);
      productName.value = name;
      productType.value = type;
      productNumber.value = number;
      productDescription.value = description;
      productPrice.value = price;
      productID.value = id;
      $('#updateProduct').modal('toggle');
    }

    function updateAdmin(name, id, phone, email, handle) {
      console.log(name, id, phone, email, handle);
      adminName.value = name;
      adminEmail.value = email;
      adminPhone.value = phone;
      adminHandle.value = handle;
      adminID.value=id;
      $('#updateAdmin').modal('toggle');
    }
  </script>


</body>

</html>