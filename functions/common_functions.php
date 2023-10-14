<?php
include('./includes/connect.php');
// Include a file named 'connect.php', which likely contains database connection code.

// Define a function named 'getproducts'.
function getproducts (){
    global $con;
    // Make the '$con' variable (presumably a database connection) accessible within this function.

    // Check if 'category' and 'brand' parameters are not set in the URL.
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            // Construct an SQL query to select all rows from the 'products' table and order them randomly.
            $select_query = "SELECT * FROM `products` ORDER BY RAND()";

            // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
            $result_query = mysqli_query($con, $select_query);

            // Iterate through the result set using a while loop.
            while ($row = mysqli_fetch_assoc($result_query)) {
                // Retrieve various column values from the current row.
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                // Output HTML code to display product information.
                echo "<div class='col-md-4'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View More</a>
                            </div>
                        </div>
                      </div>";
            }
        }
    }
}


// Define a function named 'get_all_products'.
function get_all_products(){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Check if 'category' and 'brand' parameters are not set in the URL.
  if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {

          // Construct an SQL query to select all rows from the 'products' table and order them randomly.
          $select_query = "SELECT * FROM `products` ORDER BY RAND()";

          // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
          $result_query = mysqli_query($con, $select_query);

          // Iterate through the result set using a while loop.
          while ($row = mysqli_fetch_assoc($result_query)) {
              // Retrieve various column values from the current row.
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];

              // Output HTML code to display product information in a card format.
              echo "<div class='col-md-4'><div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                      <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>Price: $product_price /=</p>

                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View More</a>  
                      </div>
                    </div></div>";

          }
      }
  }
}
// Define a function named 'get_unique_categories'.
function get_unique_categories (){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Check if 'category' parameter is set in the URL.
  if (isset($_GET['category'])) {
      // Retrieve the value of 'category' from the URL and store it in '$category_id'.
      $category_id = $_GET['category'];

      // Construct an SQL query to select all rows from the 'products' table where 'category_id' matches the provided category.
      $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";

      // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
      $result_query = mysqli_query($con, $select_query);

      // Get the number of rows in the result set and store it in '$num_of_rows'.
      $num_of_rows = mysqli_num_rows($result_query);

      // Check if there are no products in the specified category, and if so, display a message.
      if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
      }

      // Iterate through the result set using a while loop.
      while ($row = mysqli_fetch_assoc($result_query)) {
          // Retrieve various column values from the current row.
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];

          // Output HTML code to display product information in a card format.
          echo "<div class='col-md-4'>
                  <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                      <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>Price: $product_price /=</p>

                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View More</a>
                      </div>
                  </div>
                </div>";
      }
  }
}


// Define a function named 'get_unique_brands'.
function get_unique_brands (){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Check if 'brand' parameter is set in the URL.
  if (isset($_GET['brand'])) {
      // Retrieve the value of 'brand' from the URL and store it in '$brand_id'.
      $brand_id = $_GET['brand'];

      // Construct an SQL query to select all rows from the 'products' table where 'brand_id' matches the provided brand.
      $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";

      // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
      $result_query = mysqli_query($con, $select_query);

      // Get the number of rows in the result set and store it in '$num_of_rows'.
      $num_of_rows = mysqli_num_rows($result_query);

      // Check if there are no products for the specified brand, and if so, display a message.
      if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
      }

      // Iterate through the result set using a while loop.
      while ($row = mysqli_fetch_assoc($result_query)) {
          // Retrieve various column values from the current row.
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];

          // Output HTML code to display product information in a card format.
          echo "<div class='col-md-4'>
                  <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                      <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>Price: $product_price /=</p>

                          <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View More</a>
                      </div>
                  </div>
                </div>";
      }
  }
}



// Define a function named 'getbrands'.
function getbrands(){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Construct an SQL query to select all rows from the 'brands' table.
  $select_brands = "SELECT * FROM `brands`";

  // Execute the SQL query using the database connection '$con' and store the result in '$result_brands'.
  $result_brands = mysqli_query($con, $select_brands);

  // Iterate through the result set using a while loop.
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
      // Retrieve the 'brand_title' and 'brand_id' from the current row.
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];

      // Output HTML code to display each brand as a list item in the navigation bar.
      echo " <li>
                <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
             </li>";
  }
}

// Define a function named 'getcategories'.
function getcategories (){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Construct an SQL query to select all rows from the 'categories' table.
  $select_categories = "SELECT * FROM `categories`";

  // Execute the SQL query using the database connection '$con' and store the result in '$result_categories'.
  $result_categories = mysqli_query($con, $select_categories);

  // Iterate through the result set using a while loop.
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
      // Retrieve the 'category_title' and 'category_id' from the current row.
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];

      // Output HTML code to display each category as a list item in the navigation bar.
      echo " <li>
                <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
             </li>";
  }
}

// Define a function named 'search_data'.
function search_data(){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Check if 'search_data_product' parameter is set in the URL.
  if (isset($_GET['search_data_product'])) {
      // Retrieve the value of 'search_data' from the URL and store it in '$search_data_value'.
      $search_data_value = $_GET['search_data'];

      // Construct an SQL query to select all rows from the 'products' table where 'product_keywords' contains the search value.
      $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";

      // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
      $result_query = mysqli_query($con, $search_query);

      // Get the number of rows in the result set and store it in '$num_of_rows'.
      $num_of_rows = mysqli_num_rows($result_query);

      // Check if there are no results matching the search query, and if so, display a message.
      if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>No results match</h2>";
      }

      // Iterate through the result set using a while loop.
      while ($row = mysqli_fetch_assoc($result_query)) {
          // Retrieve various column values from the current row.
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];

          // Output HTML code to display product information in a card format.
          echo "<div class='col-md-4'><div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price /=</p>

                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View More</a>  
                </div>
              </div></div>";
      }
  }
}


// Define a function named 'view_details'.
function view_details(){
  global $con;
  // Make the '$con' variable (presumably a database connection) accessible within this function.

  // Check if 'product_id' parameter is set in the URL.
  if (isset($_GET['product_id'])) {
      // Check if 'category' parameter is not set in the URL.
      if (!isset($_GET['category'])) {
          // Check if 'brand' parameter is not set in the URL.
          if (!isset($_GET['brand'])) {
              // Retrieve the value of 'product_id' from the URL and store it in '$product_id'.
              $product_id = $_GET['product_id'];

              // Construct an SQL query to select the product with the specified 'product_id'.
              $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";

              // Execute the SQL query using the database connection '$con' and store the result in '$result_query'.
              $result_query = mysqli_query($con, $select_query);

              // Iterate through the result set using a while loop.
              while ($row = mysqli_fetch_assoc($result_query)) {
                  // Retrieve various column values from the current row.
                  $product_id = $row['product_id'];
                  $product_title = $row['product_title'];
                  $product_description = $row['product_description'];
                  $product_image1 = $row['product_image1'];
                  $product_image2 = $row['product_image2'];
                  $product_image3 = $row['product_image3'];
                  $product_price = $row['product_price'];
                  $category_id = $row['category_id'];
                  $brand_id = $row['brand_id'];

                  // Output HTML code to display product information and related images in a card format.
                  echo "<div class='col-md-4'>
                          <div class='card'>
                              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=''>
                              <div class='card-body'>
                                  <h5 class='card-title'>$product_title</h5>
                                  <p class='card-text'>$product_description</p>
                                  <p class='card-text'>Price: $product_price /=</p>

                                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to Cart</a>
                                  <a href='index.php' class='btn btn-primary bg-secondary'>Go home</a>  
                              </div>
                          </div>
                        </div>
                        <div class='col-md-8'>
                          <div class='row'>
                              <div class='col-md-12'>
                                  <h4 class='text-center text-info mb-5'>Related products</h4>
                              </div>
                              <div class='col-md-6'>
                                  <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt=''>
                              </div>
                              <div class='col-md-6'>
                                  <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt=''>
                              </div>
                          </div>
                        </div>";
              }
          }
      }
  }
}


// Define a function named 'getIPAddress' to retrieve the user's IP address.
function getIPAddress() {  
  // Check if the IP is from a shared internet connection.
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
  }  
  // Check if the IP is from a proxy.
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
  }  
  // Use the remote address as the IP.
  else {  
      $ip = $_SERVER['REMOTE_ADDR'];  
  }  
  return $ip;  
}  

// Define a function named 'cart' to handle adding items to the shopping cart.
function cart (){
  if (isset($_GET['add_to_cart'])) {
      global $con;
      // Get the user's IP address.
      $get_ip_add = getIPAddress();
      // Get the product ID from the URL.
      $get_product_id = $_GET['add_to_cart'];
      // Construct an SQL query to check if the product is already in the cart for the given IP.
      $select_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      // Check if the product is already in the cart.
      if ($num_of_rows > 0) {
          echo "<script>alert('This Item is Already present in the cart')</script>";
          echo "<script>window.open('index.php', '_self')</script>";
      } else {
          // If the product is not in the cart, insert it with a quantity of 0.
          $insert_query = "INSERT INTO `card_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
          $result_query = mysqli_query($con, $insert_query);
          echo "<script>alert('Successfully added item to cart')</script>";
          echo "<script>window.open('index.php', '_self')</script>";
      }
  }
}

// function to get cart item numbers
function cart_item() {
  if (isset($_GET['add_to_cart'])) {
    global $con;
    // Get the user's IP address.
    $get_ip_add = getIPAddress();
  
    // Construct an SQL query to check if the product is already in the cart for the given IP.
    $select_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add' ";
    $result_query = mysqli_query($con, $select_query);
    $count_number_of_items = mysqli_num_rows($result_query);
    // Check if the product is already in the cart.
   } else {
    global $con;
    // Get the user's IP address.
    $get_ip_add = getIPAddress();
  
    // Construct an SQL query to check if the product is already in the cart for the given IP.
    $select_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add' ";
    $result_query = mysqli_query($con, $select_query);
    $count_number_of_items = mysqli_num_rows($result_query);
    }
    echo $count_number_of_items;
}
// total price function
function total_cart_price (){
  global $con;
  $get_ip_add = getIPAddress();
  $total_price=0;
  $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$get_ip_add'";

$result=mysqli_query($con,$cart_query);
while ($row=mysqli_fetch_array($result)) {
  $product_id=$row['product_id'];
  $select_products = "Select * from  `products` where product_id='$product_id'";
  $result_products=mysqli_query($con,$select_products);
  while ($row_product_price=mysqli_fetch_array($result_products)) {


$product_price=array($row_product_price['product_price']);
$product_values=array_sum($product_price);
$total_price+=$product_values;

}

}
echo $total_price;
}
?>

