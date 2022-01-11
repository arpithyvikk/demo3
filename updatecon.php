<?php 
include ('../dbconfig.php');

if (isset($_POST['submit'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $date = $_POST['date'];
    $skills = implode(',', $_POST['skills']);
    $gender = $_POST['gender'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
	if (empty($id)) {
        echo "<script>
            alert('User Not Found Please try again')
            window.location.href = 'profile.php'
            </script>";
	    exit();
	}
    else if(empty($name)){
        echo "<script>
        alert('Plase enter your full name')
        window.location.href = 'profile.php'
        </script>";
        exit();
	}
    else if(empty($email)){
        echo "<script>
        alert('Plase enter your email address')
        window.location.href = 'profile.php'
        </script>";
        exit();
	}
	else if(empty($mobile)){
        echo "<script>
        alert('Plase enter your mobile number')
        window.location.href = 'profile.php'
        </script>";
        exit();
	}

	else if(empty($date)){
        echo "<script>
            alert('Plase enter your birth date')
            window.location.href = 'profile.php'
            </script>";
	    exit();
	}
    else if(empty($city)){
        echo "<script>
            alert('Plase select your city')
            window.location.href = 'profile.php'
            </script>";
	    exit();
	}
    else if(empty($gender)){
        echo "<script>
            alert('Plase select you gender')
            window.location.href = 'profile.php'
            </script>";
	    exit();
	}
	else
    {

		// hashing the password
        $password = md5($password);

        $sql2 = "UPDATE users SET name='$name', email='$email', mobile='$mobile', gender='$gender', dob='$date', city='$city', skills='$skills' WHERE id ='$id'";
        $result2 = mysqli_query($con, $sql2);
        if ($result2) {
            echo "<script>
            alert('Your account has Updated successfully')
            window.location.href = 'profile.php'
            </script>";
        }
        else {
            echo "<script>
            alert('Update profile form submition error')
            window.location.href = 'profile.php'
            </script>";
        }
	}
	
}
else
{
	echo "<script>
            alert('Redirection error')
            window.location.href = 'profile.php'
            </script>";
	    exit();
}