<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Information - My eCommerce Store</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
     body {
      background-image: url("usermanagement1.png");
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
    }

    .button-container {
      max-width: 400px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
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
    }

    .button:hover {
      background-color: #45a049;
    }
               /* using media queries to make it responsive */
               @media only screen and (max-width: 300px) {
      .nav {
        float: left;
      } 
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
      color:black;
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
      color:black;
    }	 
    .nav {
      background-color: transparent;
      overflow: hidden;
      padding: 8px;
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
    .by{
color: #fff;
font-size: 30px;
    }
    .bye{
      margin-top:7rem;
    }
  </style>
</head>
<body>
<div class="nav">
  <!-- Adding the necessary links -->
  <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>

  <a href="" style="float:right">Manage Products</a>
  <a style="float:right" href="usershow.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Manage Users</a>
  




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
 <div  class="bye">
 <h2 class="by">Product Management</h2>
  <div class="button-container">
    <a href="products.php" class="button">Add Product</a>
    <!-- <a href="./productview.php" class="button">Edit Product</a>
   -->
   <a style="float:right"  class="button" href="productview.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">View Product</a>

   <a style="float:right"  class="button" href="productview.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Edit Product</a>


  </div>
 </div> 
</body>
</html>
