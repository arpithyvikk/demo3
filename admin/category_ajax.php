<?php

include('../dbconfig.php');
$errors = [];
$data = [];

if (empty($_POST['category'])) {
    $errors['category'] = 'Category name is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    
  
    $category = $_POST['category'];
   
    $sql2 = "INSERT INTO categories(category_name) VALUES('$category')";
    $result2 = mysqli_query($con, $sql2);

    if($result2)
    {
        echo "Product Added..";
    }
    else {
        // $data['success'] = false;
        // $data['errors'] = $errors;
        echo "Please try again..";
    }
}
die();
?>