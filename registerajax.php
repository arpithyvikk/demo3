<?php

include('dbconfig.php');
$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}
if (empty($_POST['mobile'])) {
    $errors['mobile'] = 'Mobile Number is required.';
}
if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required.';
}
if (empty($_POST['age'])) {
    $errors['age'] = 'Age is required.';
}
if (empty($_POST['address'])) {
    $errors['address'] = 'Address is required.';
}
if (empty($_POST['gender'])) {
    $errors['gender'] = 'Gender is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password = md5($password);

    $number = rand(10,100);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo "E-mail is already exist";
    }
    else{
        $sql2 = "INSERT INTO users(name,email,mobile,gender,age,address,password,rand_no) VALUES('$name','$email','$mobile','$gender','$age','$address','$password','$number')";
        $result2 = mysqli_query($con, $sql2);

        if($result2)
        {
            $file = fopen("users/".$number.".txt", 'a+');
            $file1 = fopen("user_list.txt", 'a+');
            $text = "Name: ".$name."\nE-mail: ".$email."\nMobile No: ".$mobile."\nGender: ".$gender."\nAge: ".$age."\nAddress: ".$address."\n\n";
            fwrite($file, $text);
            fwrite($file1, $text);
            // $data['success'] = true;
            // $data['message'] = 'Success!';
            echo "Completed";
        }
        else {
            $data['success'] = false;
            $data['errors'] = $errors;
        }
    }
    
}
die();
?>