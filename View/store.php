<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

    <title>Store</title>

</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>

    </ <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js' integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js' integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin='anonymous'></script>
    -->


    <?php

    require_once '../Controllers/config.php';

    $sql = 'SELECT * FROM `Products`';
    $result = mysqli_query($con, $sql);
    //$num = mysqli_num_rows($result);
    echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";

    while ($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);
    
    echo"<div class='col'>";
    
        echo "<div class='card' style='width: 18rem;'>";
        echo "    <img src='...' class='card-img-top' alt='...'>";
        echo "    <div class='card-body'>";
        echo "        <h5 class='card-title'>";
        echo            $row['NAME'];
        echo "        </h5>";
        echo "        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";

        echo "        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>Add to cart</button>";

        echo "    </div>";
        
        echo"</div>";
    echo"</div>";
    }
    ?>
    <div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='addProductLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <form action='../Controllers/addToCart.php' method='GET'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Add product</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                <input type = 'text' value='product id' hidden='true' name='product_id' >
                <input type = 'number' name='number'>

              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='submit' class='btn btn-primary' name='addItem'>Save changes</button>
              </div>
            </form>

          </div>
        </div>
      </div></div>

</body>

</html>