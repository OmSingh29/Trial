<?php
// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $Product = isset($_POST["Product"]) ? $_POST["Product"] : '';
    $Product_id = isset($_POST["ProductId"]) ? $_POST["ProductId"] : '';
    $cost = isset($_POST["cost"]) ? $_POST["cost"] : '';
    $category = isset($_POST["category"]) ? $_POST["category"] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $targetDir = "images/";  // Directory to store uploaded images
    $image = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

    // Insert product details into the database
    if (!empty($Product) && !empty($Product_id) && !empty($cost) && !empty($category) && !empty($image) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO shopping (Product, Product_Id, Cost, Catagory, Image, Description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss", $Product, $Product_id, $cost, $category, $image, $description);

        if ($stmt->execute()) {
            header("Location: productmenu.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
      body {
      background-image: url("123.jpg");
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }
        body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 20px;
    }

    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    textarea {
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .qwert{
      color: white;
    }
    .form{
      box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);
      background: transparent;

    }
    .label{
      color: white;
    }
    .input{
      background: transparent;
      color:white;
      box-shadow: -1px -1px 5px #aaa9a9a2,
              2px 1px 5px rgba(147, 149, 151, 0.671);

    }
    .file{
      background: transparent;
      color: white;
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
    </style>
</head>
<body>
<div class="nav">
  <!-- Adding the necessary links -->
  <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>

  <a style="float:right" href="productmenu.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Manage Products</a>
  <a href="./usershow.php" style="float:right">Manage users</a>




  <div class="dropdown " style="float: right;">
      <button style="float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 9px;
      text-decoration: none;
      font-size: 17px;" class="dropbtn"><?php echo $_GET['username']; ?>(<?php echo $_GET['role']; ?>)
        <i class="fa fa-caret-down"></i>
      </button>

      <div class="dropdown-content">
        <a href="./adminlogin.php">logout</a>
      </div>
    </div>
  
  <!-- <a href="contact.html" style="float:right">Contact Us</a>   -->
  <a href="#about" style="float:right">Order Us</a>
  <a style="float:right" href="productss1Admin.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>



  <a style="float:right" href="CHAOSloginedadmin.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a>

  

</div>

    <h2 class="qwert">Add Product</h2>
    <form class="form" action="" method="POST" enctype="multipart/form-data">
        <label  class="label" for="Product">Product:</label>
        <input  class="input" type="text" name="Product" required>

        <label  class="label" for="ProductId">Product ID:</label>
        <input  class="input" type="number" name="ProductId" required>

        <label  class="label" for="cost">Cost:</label>
        <input  class="input" type="number" step="0.01" name="cost" required>

        <label  class="label" for="category">Category:</label>
        <input  class="input" type="text" name="category" required>

        <label  class="label" for="image">Image:</label>
        <input  class="file" type="file" name="image" required>

        <label  class="label" for="description">Description:</label>
        <textarea class="input" name="description" rows="5" required></textarea>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
