
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Information - My eCommerce Store</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
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
</head>

<body>`
<div class="nav ">
    <!--    Adding the necessary links      -->
    <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>
    <a style="float:right" href="about.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">About Us</a>

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
        <a href="./usersignin.php">logout</a>
      </div>
    </div>
   
    <a href="" style="float:right">Contact Us</a>
    <a style="float:right" href="cart.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Cart</a>

    <a style="float:right" href="orderus.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Order Us</a>

    <a style="float:right" href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>
    <a style="float:right" href="CHAOSlogined.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Home</a>

  </div>
</div>

  <section class="py-16">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-white mb-8">Contact Information</h2>
      <div class="md:w-1/2 mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
          <h3 class="text-lg font-bold mb-4">Contact Details</h3>
          <ul>
            <li class="mb-4">
              <span class="block font-bold">Email:</span>
              <a href="mailto:info@example.com" class="text-blue-500">reach.us@chaos.ac.in</a>
            </li>
            <li class="mb-4">
              <span class="block font-bold">Phone:</span>
              <a href="tel:+123456789" class="text-blue-500">+123456789</a>
            </li>
            <li>
              <span class="block font-bold">Address:</span>
              <address class="text-gray-700">
                123 Main Street<br>
                Faridaabad, Haryana<br>
                India, 121004
              </address>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.tailwindcss.com/2.2.15/tailwind.min.js"></script>
</body>

</html>