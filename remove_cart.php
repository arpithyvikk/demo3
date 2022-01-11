<?php 
    
    session_start();

    include "dbconfig.php";

if(isset($_SESSION['cart'])){
    
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
    elseif(empty($_GET['pro_id'])){
        echo "<script>
        alert('Product not found please try again')
        window.location.href = 'index.php'
        </script>";
    }
    else{
        $product_id = $_REQUEST['pro_id'];

        $to_remove = array($product_id);

        $_SESSION['cart'] = array_diff($_SESSION['cart'], $to_remove);

        if($_GET['type'] == 'category')
        {
            header("location:category.php?id=$category_id");
        }
        elseif($_GET['type'] == 'cart')
        {
            header("location:cart.php");
        }
        else{
            header('location:index.php');
        }
    }

}
else{
    header('location:cart.php');
}
?>