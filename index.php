<?php
include('includes/connect.php');
include('functions/common_functions.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>again</title>
    <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!--- font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- style.css -->
  <link rel="stylesheet" href="styless.css">
</head>
<body>
  <!-- navbar -->

<div class="container-fluid p-0">
  <!-- first child -->
  <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
<img src="./img/fruits/990047__94557.jpg" alt="" class= "logo">    
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Resgister</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price ()?> /=</a>
        </li>
        

     
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> 
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">
    Hidden Store
  </h3>
  <p class="text-center">
    I am just trying please
  </p>
</div>
<!-- fourth child -->
<div class="row px-3">
  
  <div class="col-md-10">
      <!-- products -->
      <div class="row mb-2">
        <!-- fetch products -->
  <?php
   getproducts ();
   get_unique_categories ();
   get_unique_brands ();
//    $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
cart ();
  ?>
   
<!-- row end -->
</div>

<!-- column end -->
  </div>
  
  <div class="col-md-2">
    <!-- sidenav -->
    <div class="sidenav">
        <!-- Brands to be displayed -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="" class="nav-link"><h4>Delivery Brands</h4></a>
            </li>
            <?php
        getbrands();
            ?>
           
        </ul>

        <!-- Spacer div -->
        <div class="spacer"></div>

        <!-- Categories to be displayed -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="" class="nav-link"><h4>Categories</h4></a>
            </li>
            <?php
            // Categories list here 

           getcategories ();
            ?>
     
        </ul>
    </div>
</div>

  <!-- end of sidenav -->

</div>
<!-- last child -->
<?php
include("./includes/footer.php")
?>
</div>

      <!-----bootstrap js link------>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>