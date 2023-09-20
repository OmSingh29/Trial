<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch products from the SQL table based on client name
function fetchProducts($clientName, $conn) {
    $query = "SELECT * FROM orders WHERE Client = '$clientName'";
    $result = mysqli_query($conn, $query);
    $products = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    return $products;
}

// Function to calculate the total price and quantity of products
function calculateTotal($products) {
    $totalPrice = 0;
    $totalQuantity = 0;

    foreach ($products as $product) {
        $totalPrice += $product['Price'] * $product['Quantity'];
        $totalQuantity += $product['Quantity'];
    }

    return array($totalPrice, $totalQuantity);
}

// Function to remove a product from the cart and SQL database
function removeProduct($productID, $conn) {
    $query = "DELETE FROM orders WHERE id = '$productID'";
    mysqli_query($conn, $query);
}

// Assuming you have already started the session and client name is stored in $_GET['username']
$clientName = $_GET['username'];

// Fetch products from the SQL table
$products = fetchProducts($clientName, $conn);

// Calculate the total price and quantity
list($totalPrice, $totalQuantity) = calculateTotal($products);

// Handle product removal
if (isset($_POST['delete'])) {
    $productID = $_POST['delete'];
    removeProduct($productID, $conn);
    // Redirect to update the cart page after removing the product
    header("Location: cart.php?username=$clientName&role={$_GET['role']}");
    exit();
}
?>

<!-- HTML code for displaying the cart page -->
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <title>Cart Page</title>
    <style>
        /* CSS code goes here */
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
    
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td:last-child {
        text-align: right;
    }

    tr:last-child td {
        border-bottom: none;
    }

    strong {
        font-weight: bold;
    }

    .total-row {
        background-color: #f2f2f2;
        font-weight: bold;
    }



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
    <a style="float:right" href="">Cart</a>

    <a style="float:right" href="orderus.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Order Us</a>
    <a style="float:right" href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>
    <!-- <a style="float:right" href="CHAOSlogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a> -->
    <a style="float:right" href="Chaoslogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a>

  </div>
  <br><br><br>
    <div style="margin-left: 150px; margin-right:90px;">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th style="text-align: end;">Quantity</th>
                <th></th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['Product']; ?></td>
                    <td><?php echo $product['Price']; ?></td>
                    <td style="text-align:end;"><?php echo $product['Quantity']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete" value="<?php echo $product['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
            </tr>
            <tr>
                <td colspan="2">Total Price: <?php echo $totalPrice; ?></td>
                <td>Total Quantity: <?php echo $totalQuantity; ?></td>
            </tr>
        </table>
    </div> <br> <br>
    <a style="background-color: black; margin-left:600px;" class="bg- hover:bg-yellow-600 text-white py-4 px-8 rounded text-lg no-underline" href="checkout.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Proceed to Checkout</a>
</body>
</html>
