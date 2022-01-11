<?php
   
 require_once '../dbconfig.php';
 if (isset($_REQUEST['id'])) {
   
    $id = $_GET['id'];

    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $res = mysqli_query($con,$sql);
    
    while($data = mysqli_fetch_array($res)){
        $id = $data['id'];
        $category = $data['category_name'];
    }

    // For Update User Details 

    if($_REQUEST['type'] == 'update')
    {
?>
        
        <form class="row g-3 needs-validation" name="form1" id="form1" action="" method="POST">
            
            <div class="col-md-10 offset-md-1">
                <label for="validationCustomUsername" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $category ?>" aria-describedby="inputGroupPrepend" >
            </div>                                 
            
            <div class="col-md-10 offset-md-1">
                <input class="btn btn-success" id="submit" name="submit" type="submit"  value="Submit" style="margin-top:26px;"/>
                <div id="error_message" class="ajax_response" style="float:right; color:red; margin-top:26px;"></div>
                <div id="success_message" class="ajax_response" style="float:right; color:green; margin-top:26px;"></div>
            </div>
        </form>
  
<?php }  

} ?>