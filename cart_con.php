<?php 
    
    session_start();

    include "dbconfig.php";


    if(empty($_GET['type'])){
        echo "<script>
        alert('Somthing is wrong please try again')
        window.location.href = 'index.php'
        </script>";
    }
    elseif(empty($_GET['pro_id'])){
        echo "<script>
        alert('Product not found please try again')
        window.location.href = 'index.php'
        </script>";
    }
    elseif(empty($_GET['cat_id'])){
        echo "<script>
        alert('Product category not found please try again')
        window.location.href = 'index.php'
        </script>";
    }
    else{
        
        if(isset($_SESSION['cart_id'])){
            $cart_id = $_SESSION['cart_id'];
        }
        else{
        $cart_number = rand(99,999999);
        $_SESSION['cart_id'] = $cart_number;
        }
        $cart_id = $_SESSION['cart_id'];
        $product_id = $_REQUEST['pro_id'];
        $category_id = mysqli_real_escape_string($con, $_REQUEST['cat_id']);
        
        // echo $category_id; 
        
        // $sql = "INSERT INTO carts(cart_id,user_id,product_id,category_id) VALUES('$cart_id','','$product_id','$category_id')";
        // $result = mysqli_query($con, $sql);

        // if($result)
        // {
        //     if($_GET['type'] == 'categoty'){ 
        //         echo "<script> window.location.href = 'category.php?id='.$category_id;";
        //     }
        //     echo "<script> window.location.href = 'index.php'; </script>";
        // }
        // else {
            
        //     if($_GET['type'] == 'categoty'){ 
        //         echo "<script> alert('Porduct not added to cart please try again'); window.location.href = 'category.php?id='.$category_id;";
        //     }
        //     echo "<script> alert('Porduct not added to cart please try again'); window.location.href = 'index.php'; </script>";
        // }
        
    }
?>