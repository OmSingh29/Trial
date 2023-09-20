<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chaos Shoppping</title>
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
      color: #164B60;
      text-align: center;
      padding: 9px;
      text-decoration: none;
      margin-top: 70px;
      font-weight: 500;
    }

    .nav a:hover {
      background-color: #ddd;
      color: black;
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
      min-width: 10px;
      margin-top: 105px;
      margin-left: 75px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      height: 45px;
      min-height: 10px;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 10px 10px;
      text-decoration: none;
      display: block;
      text-align: left;
      min-height: 8px;
      margin-top: -0.5px;
     
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
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

    .all {
      background-image: url(./images/3829985.jpg);
      background-repeat: no-repeat;
      background-size: 95rem 55rem;
      margin-top: auto;

    }

    .kon {
      margin-left: 130px;
      margin-top: -140px;
      color: #164B60;
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


<body>`
  <!-- Creating the main menu -->
  <section class="all">
    <div class="nav">
      <!-- Adding the necessary links -->
      <a href="" style="font-weight: bold;   float:right; font-size:35px;margin-top:54px">CHAOS🛒</a>
      <a style="font-size: 18px;" href="CHAOSlogined.php?username=<?php echo $username; ?>&role=<?php echo $role; ?>">Home</a>

      <a style="font-size: 18px; margin-left:50px" href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Clothing</a>
      <a style="font-size: 18px; margin-left:55px" href="orderus.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>" style="float:right">Order Us</a>
      <a style="font-size: 18px; margin-left:55px" href="cart.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>" style="float:right">Cart</a>

      <a style="font-size: 18px; margin-left:60px" href="contact.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Contact Us</a>
      <?php
      // Retrieve username and role from URL parameters
      $username = $_GET['username'];
      $role = $_GET['role'];
      ?>


      <div class="dropdown "style="font-size: 18px; ">
        <button style="float: left;
      display: block;
      color: #164B60;
      text-align: center;
      padding: 9px;
      text-decoration: none;
      margin-top: 70px;
      margin-left:50px;
      font-size: 18px;  
      font-weight: 500;" class="dropbtn"><?php echo $_GET['username']; ?>(<?php echo $_GET['role']; ?>)
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="./usersignin.php">logout</a>
        </div>
      </div>



      <a style="font-size: 18px; margin-left:65px" href="about.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">About Us</a>


    </div>



    <section class="hero-section bg-cover bg-center bg text-white h-screen flex items-center justify-">
      <div class="kon" style="float: left;">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our eCommerce Store</h1>
        <p class="text-lg mb-8">Discover the best products and deals online!</p>
          <a  style="background-color: #164B60;" class="bg- hover:bg-yellow-600 text-white py-4 px-8 rounded text-lg no-underline"  href="productss1.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Shop Now     </a>
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