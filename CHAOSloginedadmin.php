<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chaos Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Adding a background to the navbar */
    .nav {
      /* background-color: black; */
      overflow: hidden;
      padding: 8px;
      margin-top: -24px;
      padding-top: 2rem;
      margin-left: 10rem;
      margin-right: 10rem;
      

    }

    /* Styling the links inside the navbar */
    .nav a {
      float: left;
      display: block;
      color:#164B60;
            text-align: center;
      padding: 9px;
      text-decoration: none;
      margin-top: 90px;
font-weight: 500;
    }

    .nav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Adding an active class to highlight the current page */
    .heading {
      text-align: center;
    }

    .content {
      font-size: 20px;
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
      margin-top: 100px;
      
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color:darkblue;
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
      color:#164B60;
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

    .all {
      background-image: url(./images/3829985.jpg);
      background-repeat: no-repeat;
      background-position: 0px;
      background-size: 95rem 55rem;
      margin-top:auto;

    }
    .kon{
      margin-left: 130px;
      margin-top: -140px;
      color:#164B60;
      
    }
    .features-section {
    background-color: #acf3d1;
    margin-top: -14px;
    padding: 40px 0;
}

.features-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.features-section h2 {
    margin-left: 20px;
    text-align: center;
    color: #333;
}

.features-section .flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
}

.features-section .feature-item {
    flex: 0 0 300px;
    margin: 20px;
    padding: 20px;
    text-align: center;
    background-color:#50c1a9 ;
    border-radius: 5px;
    /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
     */
    box-shadow: -5px -3px 9px white,
              3px 5px 7px rgba(147, 149, 151, 0.671);


}

.features-section .feature-item .icon {
    font-size: 36px;
    margin-bottom: 20px;
}

.features-section .feature-item .text {
    margin-bottom: 20px;
}

.features-section .text-2xl {
    font-size: 1.5rem;
    line-height: 2rem;
}

.features-section .text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
}

    
  </style>
</head>

<body>
  <section class="all">
    <!-- Creating the main menu -->
 
    <div class="nav">
      <!-- Adding the necessary links -->
      <a href="" style="font-weight: bold; font-size : 20px;margin-top:80px;  float:right; font-size:35px">CHAOS🛒</a>
      <a style="font-size: 18px;" href="CHAOSloginedadmin.php?username=<?php echo $username; ?>&role=<?php echo $role; ?>">Home</a>
      <a style="font-size: 18px;" href="productss1Admin.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>
      <a style="font-size: 18px;" href="#about" >Order Us</a>
      <a style="font-size: 18px;" href="usershow.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Manage User</a>
      <a style="font-size: 18px;" href="productmenu.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Manage Product</a>



<?php
// Retrieve username and role from URL parameters
$username = $_GET['username'];
$role = $_GET['role'];
?>


<div class="dropdown " >
  <button style="float: left;
display: block;
color: #164B60;
text-align: center;
font-size: 18px;
font-weight: 500;
padding: 9px;
text-decoration: none;
margin-top:-9px;
" class="dropbtn"><?php echo $_GET['username']; ?>(<?php echo $_GET['role']; ?>)
    <i class="fa fa-caret-down"></i>
  </button>

  <div class="dropdown-content">
    <a href="./adminlogin.php">logout</a>
  </div>
</div>


      <!-- <a href="./usershow.php" style="float:right">Manage users</a> -->
      

      <!-- <a href="contact.html" style="float:right">Contact Us</a>   -->
      




    </div>
 

    <section id="hero" class="hero-section bg-cover bg-center  h-screen flex items-center ">
      <div style="float: left;" class="kon">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our eCommerce Store</h1>
        <p class="text-lg mb-8">Discover the best products and deals online!</p>
        <a style="background-color: #164B60;" class="bg- hover:bg-yellow-600 text-white py-4 px-8 rounded text-lg no-underline" href="productss1Admin.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Shop Now</a>

      </div>
    </section>
  </section>

  <section class="features-section py-16" id="features">
    <div class="container">
        <h2 class="text-3xl font-bold mb-8 text-center">Why Choose Us?</h2>
        <div class="flex flex-col md:flex-row justify-center items-center">
            <div class="feature-item">
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <div class="text">
                    <h3 class="text-2xl font-bold mb-2">Wide Selection</h3>
                    <p class="text-lg">Choose from a vast collection of products in various categories.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="text">
                    <h3 class="text-2xl font-bold mb-2">Secure Shopping</h3>
                    <p class="text-lg">Shop with confidence knowing your information is protected.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="icon">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <div class="text">
                    <h3 class="text-2xl font-bold mb-2">Fast Shipping</h3>
                    <p class="text-lg">Get your orders delivered quickly and reliably.</p>
                </div>
            </div>
        </div>
    </div>
</section>



  <section class="shopping-images bg-gray-100 py-16" id="shopping-images" style="background-color: #50c1a9;">
    <h2 class="text-3xl font-bold text-center mb-8">Happy Shopping Moments</h2>
    <div class="flex flex-wrap justify-center">
      <div class="m-4">

      </div>
    </div>
  </section>

  <script src="https://cdn.tailwindcss.com/2.2.15/tailwind.min.js"></script>
</body>

</html>