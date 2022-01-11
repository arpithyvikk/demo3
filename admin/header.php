<?php 

include "../dbconfig.php";
session_start();

include "auth.php";
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img itemprop="image" class="mobile" src="https://hyvikk.com/wp-content/uploads/2018/06/Hyvikk-logo-350px-1.png" alt="Logo" style="height: 50px!important"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <div class="cartbtn">
            
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <?php if(isset($_SESSION['admin_name'])){  echo $_SESSION['admin_name']; } else{ echo 'Account';} ?>

            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <?php if(isset($_SESSION['admin_id'])){ ?>
                    <li><a href="logout.php"><button class="dropdown-item" type="button">Logout</button></a></li>
                <?php }else{?>                    
                <li><button class="dropdown-item" type="button">Login</button></li>
                <?php } ?>
                
            </ul>
          </div>
        </div>
        </div>
</nav>
</header>