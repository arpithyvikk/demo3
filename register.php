    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="https://hyvikk.com/wp-content/uploads/2018/06/favicon.png">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> -->

        <title>Arpit | Register</title>
    </head>
    <body>
        <?php include "header.php"; 
        if(isset($_SESSION['user_id'])){
            echo "<script>
                    alert('Plaese logout first..')
                    window.location.href = 'index.php'
                    </script>";
        }?>

        <div class="container-fluid main">
            <div class="row">
                <div class="title-head">
                    <h1>Sign up</h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-12 col-md-8 offset-md-2">
                    <form class="row g-3 needs-validation" name="form" id="form" action="" method="POST">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Full name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">E-amil</label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" >
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="inputGroupPrepend" >
                        </div>
                        
                        <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" >
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom03" class="form-label ugender">Gender : </label>
                        </div>
                        <div class="col-md-2">
                            <input class="form-check-input ugender1" type="radio" name="gender" id="gender" value="Male" checked>
                            <label class="form-check-label ugender" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="col-md-2">
                            <input class="form-check-input ugender1" type="radio"  name="gender" id="gender" value="Female">
                            <label class="form-check-label ugender" for="flexRadioDefault1">
                                Female
                            </label>
                        </div>
                        <div class="col-md-10">
                            <label for="validationCustom01" class="form-label">Full Address</label>
                            <input type="text" class="form-control" id="address" name="address" autofocus>
                        </div>
                        
                        <div class="col-12">
                        <input class="btn btn-danger" id="submit" name="submit" type="submit" value="Submit" />
                        <div id="error_message" class="ajax_response" style="float:right; color:red;"></div>
	                    <div id="success_message" class="ajax_response" style="float:right: color:red;"></div>
                        </div>
                    </form>
                </div>
            </div>
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
                var $form = $(this);
                $('#form').validate({
                    rules:{
                        name:{
                            required: true,
                        },
                        email:{
                            required: true,
                            email: true
                        },
                        mobile:{
                            required: true
                        },
                        password:{
                            required: true,
                            minlength:6
                        },
                        age:{
                            required: true,
                            number:true
                        },
                        gender:{
                            required: true
                        },
                        address:{
                            required: true
                        }
                    },
                    messages:{
                        name: 'Please enter name',
                        email:{
                            required: 'Please enter your email',
                            email: 'Please enter valid email'
                        },
                        mobile: 'Please enter your mobile number',
                        password:{
                            required: 'Please enter your password',
                            minlenght: 'Password must be in 6 char long'
                        },
                        age: {
                            required: 'Please enter your age',
                            number: 'Age is must be in number'
                        },
                        gender: 'Please select your gender city',
                        address: 'Please enter your address skills'
                    },
                    submitHandler: function(form){
                        $.ajax({
                            type: "POST",
                            url: "registerajax.php",
                            data: $(form).serialize(),
                            //dataType: "json",
                            //encode: true,
                            success: function(data){
                                console.log(data);
                                $('#success_message').fadeIn().html(data);
                                setTimeout(function() {
                                    $('#success_message').fadeOut("slow");
                                }, 2000 );
                            }
                        });
                        $("form").trigger("reset");
                        
                    }
                    
                });

            });
        </script>
        </body>
    </html>