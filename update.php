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
        <link rel="stylesheet" href="../css/style.css">
        <title>Arpit | Edit</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    </head>
    <body>
        <?php include "header.php"; ?>
        <?php include "auth.php"; 
        
        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id='$id' LIMIT 1 ";
		$result = mysqli_query($con, $sql);

		while($data = mysqli_fetch_array($result)){
            
            $name = $data['name'];
            $email = $data['email'];
            $mobile = $data['mobile'];
            $city = $data['city'];
            $dob = $data['dob'];
            $date = date("d-m-Y", strtotime($dob));
            $gender = $data['gender'];

            $skills = $data['skills'];
            $skill = (explode(',',$skills));
            // echo '<pre>';
            // print_r($skill);
            // echo '</pre>';
            $count = count($skill);
            
        }
        ?>

        <div class="container-fluid main">
            <div class="row">
                <div class="title-head">
                    <h1>Update Your Deails</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 offset-md-2">
                    <form class="row g-3 needs-validation" id="form" action="updatecon.php" method="POST">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Mark" >
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">E-amil</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" aria-describedby="inputGroupPrepend" >
                        </div>
                        <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>" aria-describedby="inputGroupPrepend" >
                        </div>
                        
                       
                        <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $dob; ?>">
                        </div>
                        <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <select class="form-select" name="city" id="city" aria-label="Default select example">
                            <option value="Ahmedabad" <?php echo (($city == "Ahmedabad")?'selected':'')?>>Ahmedabad</option>
                            <option value="Bhavnagar" <?php echo (($city == "Bhavnagar")?'selected':'')?>>Bhavnagar</option>
                            <option value="Rajkot" <?php echo (($city == "Rajkot")?'selected':'')?>>Rajkot</option>
                            <option value="Surat" <?php echo (($city == "Surat")?'selected':'')?>>Surat</option>
                            <option value="Vadodara" <?php echo (($city == "Vadodara")?'selected':'')?>>Vadodara</option>
                        </select>
                        </div>

                        <div class="col-md-2">
                            <br>
                            <label for="validationCustom03" class="form-label">Gender : </label>
                        </div>
                        
                        
                        <div class="col-md-2"><br>
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" <?php echo (($gender == "Male")?'checked':'')?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="col-md-2"><br>
                            <input class="form-check-input" type="radio"  name="gender" id="gender" value="Female" <?php echo (($gender == "Female")?'checked':'')?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Female
                            </label>
                        </div>
                       

                        <div class="col-md-2"><br>
                            <label for="validationCustom03" class="form-label">Skills : </label>
                        </div>
                        <div class="col-md-2"><br>
                            <input class="form-check-input" type="checkbox"id="skills" name="skills[]" <?php echo ((in_array("HTML", $skill))?'checked':'')?> value="HTML" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                HTML
                            </label><br><br>
                            <input class="form-check-input" type="checkbox" value="CSS" name="skills[]" <?php echo ((in_array("CSS", $skill))?'checked':'')?> id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                CSS
                            </label><br><br>
                            <input class="form-check-input" type="checkbox" value="PHP" name="skills[]" <?php echo ((in_array("PHP", $skill))?'checked':'')?> id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                PHP
                            </label>
                        </div>
                        <div class="col-md-2"><br>
                            <input class="form-check-input" type="checkbox" value="JavaScript" name="skills[]" <?php echo ((in_array("JavaScript", $skill))?'checked':'')?> id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                JavaScript
                            </label><br><br>
                            <input class="form-check-input" type="checkbox" value="jQuery" name="skills[]" <?php echo ((in_array("jQuery", $skill))?'checked':'')?> id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                jQuery
                            </label>
                        </div>
                        
                        <div class="col-12">
                        <button class="btn btn-danger" id="submit" name="submit" type="submit">Update Profile</button>
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
                        date:{
                            required: true
                        },
                        city:{
                            required: true
                        },
                        skills:{
                            required: true
                        }
                    }
                ,
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
                    date: 'Please enter your date of birth',
                    city: 'Please select your city',
                    skills: 'Please select your skills'
                },
                submitHandler:function (form){
                    form.submit();
                }
                });
            });
        </script>
        </body>
    </html>