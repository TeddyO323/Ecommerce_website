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
     

     
      </ul>

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

<!-- fourth-child -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
           
                <!-- php code to display cart items -->
                 <?php
                   $get_ip_add = getIPAddress();
                   $total_price=0;
                   $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add'";
                 
                 $result=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result);
                 if ($result_count>0) {
                  echo " <thead>
                  <tr>
                     <th>Product Title</th>
                     <th>Product Image</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                     <th>Remove</th>
                     <th colspan='2'>Operations</th>
                  </tr>
  
              </thead>
              <tbody>";              
                 while ($row=mysqli_fetch_array($result)) {
                   $product_id=$row['product_id'];
                   $select_products = "Select * from  `products` where product_id='$product_id'";
                   $result_products=mysqli_query($con,$select_products);
                   while ($row_product_price=mysqli_fetch_array($result_products)) {
                 
                 
                 $product_price=array($row_product_price['product_price']);
                 $price_table=$row_product_price['product_price'];
                 $product_title=$row_product_price['product_title'];
                 $product_image1=$row_product_price['product_image1'];
                 $product_values=array_sum($product_price);
                 $total_price+=$product_values;
                 
                
                 ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt=""></td>
                    <td><input type="text" name="qty"></td>
                    <?php
                     $get_ip_add = getIPAddress();
                     if(isset($_POST['update_cart']))
                   {
                    $quantities=$_POST['qty'];
                    $update_cart="update `card_details` set quantity = $quantities where ip_address='$get_ip_add'";
                    $result_products_quantity=mysqli_query($con,$update_cart);
                    $total_price=$total_price*$quantities;
                    
                   }

                    ?>
                    <td><?php echo $price_table?> Ksh</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <!-- <button class= "bg=info p-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" class= "bg=info p-3 py-2 border-0 mx-3"value="Update Cart" name="update_cart">
                        <!-- <button class= "bg=info p-3 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" class= "bg=info p-3 py-2 border-0 mx-3"value="Remove Cart" name="remove_cart">
                    </td>
                </tr>
                <?php
                 }
                 
                } }

                else {
                  echo "<h2 class='text-center text-danger' >Cart is Empty</h2>";
                };
                ?>
            </tbody>

        </table>
        <!-- subtotal -->
        <div class="d-flex mb-3">
        <div>
          <?php
                  $get_ip_add = getIPAddress();
                  $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add'";
                
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if ($result_count>0) {
                  echo "  <h4 class='px-3'>Subtotal: <strong classs='text-info'>$total_price Ksh</strong></h4>
                  <input type='submit' class= 'bg=info p-3 py-2 border-0 mx-3'value='Continue Shopping' name='continue_shopping'>
                  <a href=''><button class='bg=secondary p-3 text=light border-0'>Check out</button></a>";
                }
                else {
echo " <input type='submit' class= 'bg=info p-3 py-2 border-0 mx-3'value='Continue Shopping' name='continue_shopping'>";   
}

if (isset($_POST['continue_shopping'])) {
echo "<script>window.open('index.php', '_self')";
}

          ?>

          
        </div>
        </div>
    </div>
    </form>
    <!-- function to remove cart item -->
    <?php
   function remove_cart_item(){
    global $con;
    if (isset($_POST['remove_cart'])) {
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query= "DELETE FROM `card_details` WHERE product_id = $remove_id";
            $run_delete = mysqli_query($con, $delete_query);
            if ($run_delete) { // Use $run_delete here
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

echo $remove_item = remove_cart_item();

    ?>
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