<?php include "dbconfig.php"; 
session_start();?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img itemprop="image" class="mobile" src="https://hyvikk.com/wp-content/uploads/2018/06/Hyvikk-logo-350px-1.png" alt="Logo" style="height: 50px!important"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="profile.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Categoris
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php $query = "SELECT * FROM categories"; $res = mysqli_query($con, $query); while($data=mysqli_fetch_array($res)){ ?>  
                  <li><a class="dropdown-item" href="category.php?id=<?php echo $data['id']; ?>"><?php echo $data['category_name']; ?></a></li>
                  <?php } ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
          <div class="cartbtn">
            <a href="cart.php">
            <button class="btn btn-outline" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
            <span style="font-size:10px; margin-left:-3px;" id="mycart">
                    <?php
                      if(isset($_SESSION['cart'])){
                        echo count($_SESSION['cart']);
                      }
                      else{
                        echo 0;
                      }
                    ?>
            </span>
            </button>
            </a>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                Account
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <?php if(isset($_SESSION['user_id'])){ ?>
                  <li><a href="profile.php"><button class="dropdown-item" type="button">Profile</button></a></li>
                  <li><a href="orders.php"><button class="dropdown-item" type="button">Orders</button></a></li>
                  <li><a href="logout.php"><button class="dropdown-item" type="button">Sign out</button></a></li>
              <?php } else{ ?>                    
                <li><a href="login.php"><button class="dropdown-item" type="button">Sign in</button></a></li>
                <li><a href="register.php"><button class="dropdown-item" type="button">Sign up</button></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>

      </div>
    </nav>
</header>