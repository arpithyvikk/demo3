<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://hyvikk.com/wp-content/uploads/2018/06/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
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
        <link rel="stylesheet" href="assets/css/style.css">
    <title>Demo-3 | Home</title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="container-fluid main">
      <?php include "slider.php"; ?>
      <div class="row">
          <div class="col-md-12">
              <div class="title-head">
                <h1>Trending Products</h1>
              </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql = "SELECT * FROM products";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
          ?>
            <div class="col-md-4">
              <div class="card">
                <img src="assets/images/<?php echo $row['product_image']; ?>" class="card-img-top pro-img" alt="product image">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                  <p class="card-text"><strong>₹</strong><?php echo $row['product_price']; ?></p>
                  <?php if(isset($_SESSION['cart'])){ 
                        if(in_array($row['id'], $_SESSION['cart'])) { ?>
                    <a href="remove_cart.php?tyep=home&&pro_id=<?php echo $row['id']; ?>&&cat_id=0" class="btn btn-danger">Remove to Cart</a>
                  <?php }else{?>
                    <a href="#" data-id="<?php echo $row['id']; ?>" class="btn btn-warning addcart">Add to Cart</a>
                  <?php } }else{?>
                  <!-- <a href="add_cart.php?type=home&&pro_id=<?php echo $row['id']; ?>&&cat_id=0" class="btn btn-warning">Add to Cart</a> -->
                  <a href="#" data-id="<?php echo $row['id']; ?>" class="btn btn-warning addcart">Add to Cart</a>

                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <br><br>
    </div>

    <?php include "footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
        <script>
          $(document).ready(function(){
              
            $(document).on('click', '.addcart', function(e){
            
                e.preventDefault();
                var pid = $(this).data('id');
                $.ajax({
                    url: 'add_cart.php',
                    type: 'GET',
                    data: 'id='+pid,
                    // data: {'id': room_id, 'date': rb_date},

                    dataType: 'html',
                    
                    success: function(response) {
                        console.log(response); 
                        if(response == 'success'){
                        
                        }
                        else{
                            $(".t1").attr('disabled', false);
                            $(".t2").attr('disabled', false);
                        }
                    }
                })
            });
          });
        </script>
    </body>
</html>