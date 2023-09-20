<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a category is selected for filtering
if (isset($_POST['sort_dropdown']) && $_POST['sort_dropdown'] != 'all') {
    $selectedCategory = $_POST['sort_dropdown'];

    // Retrieve products from the selected category
    $sql = "SELECT * FROM shopping WHERE Category = '$selectedCategory'";

} elseif (isset($_POST['sort_dropdown']) && $_POST['sort_dropdown'] == 'all') {
    $selectedCategory = $_POST['sort_dropdown'];
    $sql = "SELECT * FROM shopping";
} else {
    // Retrieve all products from the database
    $sql = "SELECT * FROM shopping";
}

$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    // Loop through each row and store the product details in an array
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "No products found.";
}


?>

<?php
// Insert order details into the "orders" table
if (isset($_POST['add_to_cart'])) {
    $clientId = $_POST['client_id'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = date('Y-m-d');
    $sql2 = "INSERT INTO orders (Client, Product, Quantity, Price, Date) 
        VALUES ('$clientId', '$productId', '$quantity', '$price', '$date')";
    if ($conn->query($sql2) === TRUE) {
      echo '<script>alert("item added successfully")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>  

<!DOCTYPE html>
<html>
<head>
    <title>Chaos Shopping</title>
    <!-- Rest of your code -->
    <!-- CSS styles -->
    <style>
               .nav {
  background-color: #111;
  overflow: hidden;
  padding:8px;
}

/* Styling the links inside the navbar */
.nav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 9px;
  text-decoration: none;
  font-size: 17px;
}

.nav a:hover {
  background-color: #ddd;
  color: black;
}

/* Adding an active class to highlight the current page */
.heading{
  text-align:center; 
}
.content{
  font-size: 20px; 
}
/*using media queries to make it responsive  */
@media only screen and (max-width : 300px) {
   .nav {
float:left;
}
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(0, 0, 0);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.container {
      max-width: 1200px;
      margin: 10px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      
    }
   
    .button {
      padding: 15px 25px;
      margin-bottom: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      text-align: center;
      cursor: pointer;
      margin-top: 10px;
    }
    .button-container{
        float: left;
    }

    .button:hover {
      background-color: #45a049;
    }
    .product {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
    }
    
    .product-card {
      width: 250px;
      background-color: #f9f9f9;
      margin: 10px;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    
    .product-card img {
      max-width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
    
    .product-card h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }
    
    .product-card p {
      font-size: 14px;
      color: #888;
    }
    .buttons {
      display: inline-block;
      padding: 3px 8px;
      background-color: #ccc;
      color: black;
      text-decoration: none;
      transition: all 0.3s;
      position: relative;
      border: none;
    }
    /* Underline effect on hover */
    .buttons::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #695c5c;
      visibility: hidden;
      transform: scaleX(0);
      transition: all 0.3s ease-in-out;
    }

    .buttons:hover::before {
      visibility: visible;
      transform: scaleX(1);
    }

    .button {
      display: inline-block;
      padding: 3px 8px;
      background-color: #ccc;
      color: black;
      text-decoration: none;
      transition: all 0.3s;
      position: relative;
    }
    /* Underline effect on hover */
    .button::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #695c5c;
      visibility: hidden;
      transform: scaleX(0);
      transition: all 0.3s ease-in-out;
    }

    .button:hover::before {
      visibility: visible;
      transform: scaleX(1);
    }
    
    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 40px;
      margin-top: 40px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }	
        .quantity-input {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-input input {
            width: 40px;
            text-align: center;
        }

        .add-to-cart {
            margin-top: 10px;
        }
        /* ... Existing CSS styles ... */
    </style>
</head>
<body>
<div class="nav">
    <!-- Navbar links -->
     <!--    Adding the necessary links      -->
     <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>
     <a style="float:right" href="about.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">About Us</a>

    <div class="dropdown " style="float: right;">
      <button style="float: left;
display: block;
color:#fff;
text-align: center;
font-size: 18px;
font-weight: 500;
padding: 9px;
text-decoration: none;"
 class="dropbtn"><?php echo $_GET['username']; ?>(<?php echo $_GET['role']; ?>)
        <i class="fa fa-caret-down"></i>
      </button>

      <div class="dropdown-content">
        <a href="./usersignin.php">logout</a>
      </div>
    </div>    
    <a style="float:right" href="contact.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Contact Us</a>
    <a style="float:right" href="cart.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Cart</a>

    <a href="#about" style="float:right">Order Us</a>
    <a style="float:right" href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>

    <!-- <a style="float:right" href="CHAOSlogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a> -->
    <a style="float:right" href="Chaoslogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a>

  </div>
<!-- Rest of your code -->
<div class="container" style="margin-top: 50px;">
    <div class="product">
        <?php foreach ($products as $product) { ?>
            <div class="product-card">
                <!-- Product card details -->
                <img src="./images/<?php echo $product['Image']; ?>" alt="Product">
                <h3><?php echo $product['Product']; ?></h3>
                <h3>Cost: <?php echo $product['Cost']; ?></h3>
                <p>Category: <?php echo $product['Catagory']; ?></p>
                <p>Product Id: <?php echo $product['Product_Id']; ?></p>
                <p><?php echo $product['Description']; ?></p>

                <!-- Quantity input and Add to Cart button -->
                <form method="POST" action="">
                    <div class="quantity-input">
                        <input type="number" min="1" value="1" name="quantity">
                    </div>
                    <div class="add-to-cart">
                        <input type="hidden" name="client_id" value="<?php echo $_GET['username']; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product['Product']; ?>">
                        <input type="hidden" name="price" value="<?php echo $product['Cost']; ?>">
                        <button class="button" name="add_to_cart">Add to Cart</button>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div> 
<script>
    function addToCart(productId) {
        var quantity = document.querySelector('input[name="quantity_' + productId + '"]').value;
        // Perform the necessary actions to add the product to the cart
        console.log("Added product with ID " + productId + " to cart with quantity " + quantity);
    }
</script>
<!-- Rest of your code -->
</body>
</html>
