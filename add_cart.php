<?php 
    
    session_start();

    include "dbconfig.php";


    if(empty($_GET['id'])){
        echo "Product not found please try again";
    }
    else{
        $product_id = $_REQUEST['id'];

        if(isset($_SESSION['cart'])){

            $cart_item = array_push($_SESSION['cart'],$product_id);

            // if($_GET['type'] == 'category')
            // {
            //     header("location:category.php?id=$category_id");
            // }
            // elseif($_GET['type'] == 'cart')
            // {
            //     header("location:cart.php");
            // }
            // else{
            //     header('location:index.php');
            // }
            if($cart_item)
            {
                echo "success";
            }
            else{
                echo "error";
            }
        }
        else{

            $_SESSION['cart'] = array($product_id);
           
            echo 'success';
            
            // if($_GET['type'] == 'category')
            // {
            //     header("location:category.php?id=$category_id");
            // }
            // elseif($_GET['type'] == 'cart')
            // {
            //     header("location:cart.php");
            // }
            // else{
            //     header('location:index.php');
            // }
        }
    }
?>