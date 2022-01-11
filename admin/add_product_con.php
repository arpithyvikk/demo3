<?php 
include ('../dbconfig.php');

if (isset($_POST['submit'])){
    
    $product_img = $_FILES["product_img"]["name"];
    $product_img_temp = $_FILES["product_img"]["tmp_name"];
    $folder = "../assets/images/".$product_img;

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['category'];
    $category = implode(',', $product_category);
    
    $number = rand(10,100);
    $sql2 = "INSERT INTO products(product_image,product_name,product_category,product_price,product_number) VALUES('$product_img','$product_name','$category','$product_price','$number')";
    $result2 = mysqli_query($con, $sql2);

    if($result2 && move_uploaded_file($product_img_temp, $folder))
    {
        $file = fopen("../products/".$number.".txt", 'a+');
        $file1 = fopen("../product_list.txt", 'a+');
        $text = "Name: ".$product_name."\nPrice: ".$product_price."\nCategory: ".$category."\n\n";
        fwrite($file, $text);
        fwrite($file1, $text);
        echo "<script>
        alert('Prosuct inserted successfully')
        window.location.href = 'add_product.php'
        </script>";
    }
    else {
        echo "<script>
        alert('Porduct not inserted please try again')
        window.location.href = 'add_product.php'
        </script>";
    }
}
else
{
	echo "<script>
            alert('Redirection error')
            window.location.href = 'add_product.php'
            </script>";
	    exit();
}

?>