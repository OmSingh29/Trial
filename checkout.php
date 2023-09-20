<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}


label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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
     
  </div>
  <BR></BR>
<div  style="margin-left:250px" class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
          <h3>Billing Address</h3>
<label for="fname"><i class="fa fa-user"></i> Full Name</label>
<input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
<label for="email"><i class="fa fa-envelope"></i> Email</label>
<input type="text" id="email" name="email" placeholder="john@example.com" required>
<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
<input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
<label for="city"><i class="fa fa-institution"></i> City</label>
<input type="text" id="city" name="city" placeholder="New York" required>
<div class="row">
  <div class="col-50">
    <label for="state">State</label>
    <input type="text" id="state" name="state" placeholder="NY" required>
  </div>
  <div class="col-50">
    <label for="zip">Zip</label>
    <input type="text" id="zip" name="zip" placeholder="10001" required>
  </div>
</div>
</div>
<div class="col-50">
<h3>Payment</h3>
<label for="fname">Accepted Cards</label>
<div class="icon-container">
  <i class="fa fa-cc-visa" style="color:navy;"></i>
  <i class="fa fa-cc-amex" style="color:blue;"></i>
  <i class="fa fa-cc-mastercard" style="color:red;"></i>
  <i class="fa fa-cc-discover" style="color:orange;"></i>
</div>
<label for="cname">Name on Card</label>
<input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
<label for="ccnum">Credit card number</label>
<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
<label for="expmonth">Exp Month</label>
<input type="text" id="expmonth" name="expmonth" placeholder="September" required>
<div class="row">
  <div class="col-50">
    <label for="expyear">Exp Year</label>
    <input type="text" id="expyear" name="expyear" placeholder="2018" required>
  </div>
  <div class="col-50">
    <label for="cvv">CVV</label>
    <input type="text" id="cvv" name="cvv" placeholder="352" required>
  </div>
</div>
</div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <br>    
        <a class="btn" style="text-decoration: none; text-align:center"  href="final.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Place Order</a>
      </form>
    </div>
  </div>
  <div class="col-25">
   
  </div>
</div>

</body>
</html>
