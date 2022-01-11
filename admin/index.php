<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://hyvikk.com/wp-content/uploads/2018/06/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <title>Demo-3 | Admin | Home</title>
  </head>
  <body>

  <?php include "header.php"; ?>

    <div class="container-fluid main">
        <div class="row">
          <div class="col-md-2 col-sm-12 nav1">
                <?php include "navbar.php"; ?>
          </div>
          <div class="col-md-10 col-sm-12">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <h1 class="main-head">Customers</h1>
                <center><hr style="max-width:200px;"></center>
                <h2 class="main-head">
                <?php
                  $result = mysqli_query($con, "SELECT * FROM users");
                  $rows = mysqli_num_rows($result);
                  if($rows > 10){
                    echo $rows;
                  }
                  else {
                    echo '0'.$rows;
                  }
                ?>
                </h2>
              </div>
              <div class="col-md-4 col-sm-12">
                <h1 class="main-head">Products</h1>
                <center><hr style="max-width:200px;"></center>
                <h2 class="main-head">
                <?php
                  $result = mysqli_query($con, "SELECT * FROM products");
                  $rows = mysqli_num_rows($result);
                  if($rows > 10){
                    echo $rows;
                  }
                  else {
                    echo '0'.$rows;
                  }
                ?>
                
                </h2>
              </div>
              <div class="col-md-4 col-sm-12">
                <h1 class="main-head">Categories</h1>
                <center><hr style="max-width:200px;"></center>
                <h2 class="main-head">
                <?php
                  $result = mysqli_query($con, "SELECT * FROM categories");
                  $rows = mysqli_num_rows($result);
                  if($rows > 10){
                    echo $rows;
                  }
                  else {
                    echo '0'.$rows;
                  }
                ?>
                
                </h2>
              </div>
            </div>
          </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  
    </body>
</html>