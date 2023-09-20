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
    $sql = "SELECT * FROM shopping WHERE Catagory = '$selectedCategory'";
  
} 
else if (isset($_POST['sort_dropdown']) && $_POST['sort_dropdown'] == 'all') {
  $selectedCategory = $_POST['sort_dropdown'];
  $sql = "SELECT * FROM shopping";
}
else {
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

$conn->close();
?>

<!DOCTYPE html>
<html>
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
    </style>

  </style>
<head>
  <title>Chaos Shopping</title>
    <!-- Rest of your code -->
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
    <a href="" style="float:right">Clothing</a>
    <!-- <a style="float:right" href="CHAOSlogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a> -->
    <a style="float:right" href="Chaoslogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a>

  </div>
  <div style="margin-top: 10px;">
<form method="POST" action="">
            <div class="dropdown">
                          <button><a class="buttons" href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">All Product</a></button>

                <select name="sort_dropdown" onchange="this.form.submit()">
                    <option value="">Product</option>
                    <option value="T-Shirt">T-Shirt</option>
                    <option value="Shirt">Shirt</option>
                    <option value="Jeans">Jeans</option>

                    <!-- Add more options for different categories -->
                </select> 
               

            </div>
        </form>
</div>
    <div class="container" style="margin-top: 50px;">
      
        
        <div class="product">
            <?php foreach ($products as $product) { ?>
                <div class="product-card">
                    <!-- Product card details -->
                    <img src="./images/<?php echo $product['Image']; ?>" alt="Product">
                    <h3><?php echo $product['Product']; ?></h3>
                    <h3>Cost: <?php echo $product['Cost']; ?></h3>
                    <p>Category: <?php echo $product['Catagory']; ?></p>
                    <p>Product Id:<?php echo $product['Product_Id']; ?> </p>
                    <p> <?php echo $product['Description']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Rest of your code -->
</head>
<body>
    <!-- Rest of your code -->
</body>
</html>
