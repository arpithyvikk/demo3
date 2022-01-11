<?php

include('../dbconfig.php');
$errors = [];
$data = [];

if (empty($_FILES['product_img']['name'])) {
    $errors['product_img'] = 'Product Image is required.';
}
if (empty($_POST['product_name'])) {
    $errors['product_name'] = 'Product Name is required.';
}
if (empty($_POST['product_price'])) {
    $errors['product_price'] = 'Product price is required.';
}
if (empty($_POST['category'])) {
    $errors['category'] = 'Product category is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    
    $product_img = $_FILES["product_img"]["name"];
    $product_img_temp = $_FILES["product_img"]["tmp_name"];    
    $folder = "../assets/images/".$product_img;

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category = implode(',', $_POST['category']);
    
    $number = rand(10,100);

    $sql2 = "INSERT INTO products(product_image,product_name,product_category,product_price,product_number) VALUES('$product_img','$product_name','$category','$product_price','$number')";
    $result2 = mysqli_query($con, $sql2);

    if($result2 || move_uploaded_file($product_img_temp, $folder))
    {
        $file = fopen("../products/".$number.".txt", 'a+');
        $file1 = fopen("../product_list.txt", 'a+');
        $text = "Name: ".$product_name."\nPrice: ".$product_price."\nCategory: ".$category."\n\n";
        fwrite($file, $text);
        fwrite($file1, $text);
        // $data['success'] = true;
        // $data['message'] = 'Success!';
        echo "Product Added..";
    }
    else {
        $data['success'] = false;
        $data['errors'] = $errors;
    }
}
die();
?>