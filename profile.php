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
        <title>Arpit | Profile</title>
    </head>
    <body>
        <?php include "header.php"; ?>
        <?php include "auth.php"; 
        
        $id = $_SESSION['id'];

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
            $count = count($skill);
            
        }
        ?>

        <div class="container-fluid main">
            <div class="row">
                <div class="title-head">
                </div>
            </div>
            <div class="row">
                <div class`="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
                    <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-12 col-md-8 offset-md-2">
                                <h2><?php echo $name; ?></h2>
                                <p><strong>E-mail: </strong> <?php echo $email; ?> </p>
                                <p><strong>Mobile No: </strong>  <?php echo $mobile; ?></p>
                                <p><strong>Birth Date: </strong> <?php echo $date; ?> </p>
                                <p><strong>Gender: </strong> <?php echo $gender; ?> </p>
                                <p><strong>City: </strong> <?php echo $city; ?> </p>

                                <p><strong>Skills: </strong>
                                <?php
                                for ($i = 0; $i < $count; $i++){
                                ?>
                                    <span class="badge rounded-pill" style="background-color:#307468;"><?php echo $skill[$i]; ?></span>
                                    <?php } ?>
                                </p>
                                <br>
                                <a href="update.php?id=<?php echo $id; ?>"><button class="btn btn-danger" type="button">Edit Profile</button></a>
                            </div>             
                        </div>            
                    </div>
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
    
        </body>
    </html>