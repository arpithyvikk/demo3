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

        <title>Arpit | Admin | Add Product</title>
    </head>
    <body>
        <?php include "header.php";?>

        <div class="container-fluid main">
            <div class="row">
                <div class="col-md-2 col-sm-12 nav1">
                        <?php include "navbar.php"; ?>
                </div>
                <div class="col-md-10 col-sm-12">
                    <div class="row">
                        <div class="title-head">
                            <h1>Add Products</h1>
                        </div>
                    </div>
                    <div class="row">           
                        <div class="col-sm-12 col-md-8 offset-md-2">
                            <form class="row g-3 needs-validation" name="form" id="form" action="add_product_con.php" enctype="multipart/form-data" method="POST">
                                
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="product_img" name="product_img">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="inputGroupPrepend" >
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" id="product_price" name="product_price" aria-describedby="inputGroupPrepend" >
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Product Categories : </label>
                                </div>
                                <div class="col-md-12">
                                <select class="selectpicker" name="category[]" id="category" multiple data-live-search="true">
                                    <?php $query = "SELECT * FROM categories"; $res = mysqli_query($con, $query); while($data=mysqli_fetch_array($res)){ ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                                </div>                                
                                
                                <div class="col-12">
                                <input class="btn btn-danger" id="submit" name="submit" type="submit" value="Submit" />
                                <div id="error_message" class="ajax_response" style="float:right"></div>
                                <div id="success_message" class="ajax_response" style="float:right"></div>
                                </div>
                            </form>
                            <br>
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
        <script>
            $(document).ready(function(){
                var $form = $(this);
                $('#form').validate({
                    rules:{
                        product_img:{
                            required: true,
                        },
                        product_name:{
                            required: true
                        },
                        product_price:{
                            required: true,
                            number:true
                        },
                        category:{
                            required: true
                        }
                    },
                    messages:{
                        product_img: 'Please upload product image',
                        product_name: 'Please enter product name',
                        product_price: {
                            required: 'Please enter product price',
                            number: 'product price is must be in number'
                        },
                        category: 'Please select product category'
                    },
                    submitHandler: function(form){
                        // $.ajax({
                        //     type: "POST",
                        //     url: "add_productajax.php",
                        //     data: $(form).serialize(),
                           
                        //     success: function(data){
                        //         console.log(data);
                        //         $('#success_message').fadeIn().html(data);
                        //         setTimeout(function() {
                        //             $('#success_message').fadeOut("slow");
                        //         }, 2000 );
                        //     }
                        // });
                        // $("form").trigger("reset");
                        form.submit();

                    }
                    
                });

            });
        </script>
        </body>
    </html>