<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
      <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!--- font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- style.css -->
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/fruits/apple.jpg " class="logo" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>

        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                
                <div>
                    <a href=""><img src="../img/vegetables/carrot.jpg" class="admin-image" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center  p-3">
                    <!-- Use anchor links styled as buttons -->
                    <a href="insert_products.php" class="btn btn-info text-light my-1">Insert Products</a>
                    <a href="" class="btn btn-info text-light my-1">View Products</a>
                    <a href="index.php?insert_category" class="btn btn-info text-light my-1">Insert Categories</a>
                    <a href="" class="btn btn-info text-light my-1">View Categories</a>
                    <a href="index.php?insert_brand" class="btn btn-info text-light my-1">Insert Brands</a>
                    <a href="" class="btn btn-info text-light my-1">View Brands</a>
                    <a href="" class="btn btn-info text-light my-1">All Brands</a>
                    <a href="" class="btn btn-info text-light my-1">All Payments</a>
                    <a href="" class="btn btn-info text-light my-1">List Users</a>
                    <a href="" class="btn btn-info text-light my-1 ">Logout</a>

                    <!-- Add more buttons as needed -->
                </div>
                
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-3">
            <?php 
            if (isset($_GET['insert_category'])) {
                include('Insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            ?>
        </div>
        <!-- last child -->
<div class="bg-info p-3 text-center footer">
    all rights reserved Yemen
  </div>
    </div>


       <!-----bootstrap js link------>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

                    <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
