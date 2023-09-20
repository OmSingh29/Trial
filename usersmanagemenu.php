<!DOCTYPE html>
<html>
<head>
  
  <title>Product Management</title>
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
    
      margin-top:10px;
      justify-content: center;
      display: flex;
      flex-direction: column;
      align-items: center;
     
      padding: 50px;
      margin-left:30rem;
      margin-right: 30rem;
      
    }

    .button {
      padding: 10px 20px;
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

     /* Adding a background to the navbar */
     .nav {
      background-color: #111;
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
    .hii{
      color: white;
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

  <a href="./productmenu.php" style="float:right">Manage Products</a>
  <a href="./usersmanagemenu.php" style="float:right">Manage users</a>


  <?php
  // Retrieve username and role from URL parameters
  $username = $_GET['username'];
  $role = $_GET['role'];
  ?>
  

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
  <a style="float:right" href="productss1Admin.php?username=<?php echo $username; ?>&role=<?php echo $role; ?>">Clothing</a>


  <a style="float:right" href="CHAOSloginedadmin.php?username=<?php echo $username; ?>&role=<?php echo $role; ?>">Home</a>
  

</div>
  
  <div class="button-container">
  <h2 class="hii">Product Management</h2><br>
    <a href="./usershow.php" class="button">Show Users</a>
    <a href="./usershow.php" class="button">Edit Users</a>
  </div>
</body>
</html>
