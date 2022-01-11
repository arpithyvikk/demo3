<?php 


include('../dbconfig.php');
$errors = [];
$data = [];

if (empty($_GET['id'])) {
    $errors['id'] = 'Category not found.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    

    $id = $_GET['id'];
    $sql2 = "DELETE FROM `categories` WHERE `categories`.`id` = '$id'";
    $result2 = mysqli_query($con, $sql2);
    if($result2)
    {
        echo "YES";
    } else {
       echo "NO";
    }
}

?>