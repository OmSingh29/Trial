<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CHAOS Shopping</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Adding a background to the navbar */
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

    /* Adding an active class to highlight the current page */

    .heading {
      text-align: center;
    }

    .content {
      font-size: 20px;
    }

    /*using media queries to make it responsive  */

    @media only screen and (max-width : 300px) {
      .nav {
        float: left;
      }
    }



    .footer-bottom p {
      font-size: 12px;
      margin: 0;
      background-color: black;
      color: #ddd;
      text-align: center;
    }

    .kon {
      margin-left: 130px;
      margin-top: -140px;
      color: #164B60;
    }

    .all {
      background-image: url(./images/3829985.jpg);
      background-repeat: no-repeat;
      background-size: 95rem 55rem;
      margin-top: auto;

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
  <!--  Creating the main menu    -->
  <section class="all">
    <div class="nav ">
      <!--    Adding the necessary links      -->
      <a href="" style="font-weight: bold;   float:right; font-size:35px">CHAOS🛒</a>

      <a style="font-size: 18px;" href="">Home</a>
      <a style="font-size: 18px; margin-left:50px" href="productss_visitor.php">Clothing</a>
      

      <a style="font-size: 18px; margin-left:60px" href="aboutvisitor.php">About Us</a>




    </div>

    </div>
    </ul>
    </div>
    </nav>

    <section class="hero-section bg-cover bg-center bg text-white h-screen flex items-center justify-">
      <div style="float: left;" class="kon">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our eCommerce Store</h1>
        <p class="text-lg mb-8">Discover the best products and deals online!</p>
        <a style="background-color: #164B60;" class="bg- hover:bg-yellow-600 text-white py-4 px-8 rounded text-lg no-underline" href="productss_visitor.php">Shop Now</a>
        <a style="background-color: #164B60;" class="bg- hover:bg-yellow-600 text-white py-4 px-8 rounded text-lg no-underline" href="usersignin.php">Login/Signup</a>

      </div>
    </section>
  </section>


  <
  <section style="margin-top:-45px" class="features-section py-16" id="features">
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

  <section style="background-color: #50c1a9;" class="shopping-images bg-gray-100 py-16" id="shopping-images">
    <h2 class="text-3xl font-bold text-center mb-8">Happy Shopping Moments</h2>
    <div class="flex flex-wrap justify-center">
      <div class="m-4">

      </div>

  </section>

  <script src="https://cdn.tailwindcss.com/2.2.15/tailwind.min.js"></script>
  <footer>

    <div class="footer-bottom">
      <p>&copy; 2023 CHAOS. All rights reserved. | Privacy Policy | Terms of Service</p>
    </div>
  </footer>
</body>

</html>