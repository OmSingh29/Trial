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
    

    .button {
      display: inline-block;
      padding: 3px 8px;
      background-color: #ccc;
      color: #fff;
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
      margin-top: 1px;
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
    .dropdown select {
    font-size: 16px;
    padding: 10px;
    border: none;
    background-color: #f9f9f9;
    color: #888;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
  }

  /* Styling the dropdown arrow */
  .dropdown select::-ms-expand {
    display: none;
  }

  .dropdown select::before {
    content: '\25BC';
    display: block;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #888;
    pointer-events: none;
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

    </style>

  </style>
<head>
  <title>Chaos Shopping</title>
    <!-- Rest of your code -->
    <div class="nav">
    <!-- Navbar links -->
     <!--    Adding the necessary links      -->
     <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>
    <a href="aboutvisitor.php" style="float:right">About Us</a>
    <a href="usersignin.php" style="float:right">Login/Signup</a>
    
    <a href="contact.html" style="float:right">Contact Us</a>
    <a href="usersignin.php" style="float:right">Order Us</a>
    <a href="" style="float:right">Clothing</a>
    <!-- <a style="float:right" href="CHAOSlogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a> -->
    <a href="./CHAOS_user.php" style="float:right" >Home</a>

  </div>

  <div style="margin-top: 10px;">
<form method="POST" action="">
            <div class="dropdown">
                          <button><a class="buttons" href="productss_visitor.php">All Product</a></button>

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
        <form method="POST" action="">
            
        
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
