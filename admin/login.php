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
        <title>Arpit | Login</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    </head>
    <body>
    <?php include "../dbconfig.php"; ?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img itemprop="image" class="mobile" src="https://hyvikk.com/wp-content/uploads/2018/06/Hyvikk-logo-350px-1.png" alt="Logo" style="height: 50px!important"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        </div>
</nav>
</header>
          <?php
        if(isset($_SESSION['admin_id'])){
            echo "<script>
                    alert('You are already login..')
                    window.location.href = 'index.php'
                    </script>";
        }
        ?>

        <div class="container-fluid main">
            <div class="row">
                <div class="title-head">
                        <h1>Admin Login Form</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 offset-md-2">   
                    <form class="row g-3 needs-validation" id="form" method="POST" action="logincon.php">
                        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6 offset-md-3">
                        <label for="validationCustomUsername" class="form-label">E-amil</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_COOKIE["admin_email"])) { echo $_COOKIE["admin_email"]; } ?>" placeholder="type your email here.." aria-describedby="inputGroupPrepend">
                        </div>
                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6 offset-md-3">
                        <label for="validationCustom05" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_COOKIE["admin_password"])) { echo $_COOKIE["admin_password"]; } ?>" placeholder="type your pssword here..">
                        </div>
                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6 offset-md-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["admin_email"]) && isset($_COOKIE['admin_password'])) { ?> checked <?php } ?> style="margin-left:0px;">
                        <label class="form-check-label" for="invalidCheck" style="margin-left:20px;">
                          Remember me
                        </label>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6 offset-md-3">
                        <button class="btn btn-danger" id="submit" name="submit" type="submit">Login</button>
                        </div>
                    </form>
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
                $('#form').validate({
                    rules:{
                        email:{
                            required: true,
                            email: true
                        },
                        password:{
                            required: true
                        }
                    }
                ,
                messages:{
                    email:{
                        required: 'Please enter your email',
                        email: 'Please enter valid email'
                    },
                    mobile: 'Please enter your mobile number',
                    password:{
                        required: 'Please enter your password',
                    }
                },
                submitHandler:function (form){
                    form.submit();
                }
                });
            });
        </script>
        </body>
    </html>