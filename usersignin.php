<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chaos User Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>/* Adding a background to the navbar */
/* Adding a background to the navbar */
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
}}




</style>
  </head>

  <body>`
    <!--  Creating the main menu    -->
    <div class="nav ">
      <!--    Adding the necessary links      -->
      <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>
      <a href="aboutvisitor.php" style="float:right">About Us</a>
      <a href="#Articles" style="float:right">Login/Signup</a>
      
      <a href="contact.html" style="float:right">Contact Us</a>
      <a href="#about" style="float:right">Order Us</a>
      <a href="productss_visitor.php" style="float:right">Clothing</a>
      <a href="CHAOS_user.php" style="float:right">Home</a>
      

      
    </div>
    
    </div>
  </body>
</html>


  


<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials
    $sql = "SELECT * FROM users WHERE UserName='$username' AND Password='$password' AND Role='USER'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        // Authentication successful, redirect to the home page or dashboard
        // Authentication successful, redirect to the home page or dashboard
        session_start();
        $user = $result->fetch_assoc();
        $username = $user['UserName'];
        $role = $user['Role'];
        header("Location: CHAOSlogined.php?username=$username&role=$role");
exit();

    exit();
        exit();
    } else {
        // Invalid credentials, display an error message
        $error = "Invalid username or password";
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
  <title>Login</title>  

  

  
</head>

<style>
    body {
      background-color: #f1f1f1;
      font-family: Arial, sans-serif;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-top: 50px;
    }

    form {
      max-width: 300px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #333;
      border: none;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    .error {
      color: #ff0000;
      text-align: center;
      margin-top: 10px;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-form {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
      margin-top: -50px;
    }

    .login-form h2 {
      margin-bottom: 30px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      background-color: #f7f7f7;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #333;
      border: none;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-form input[type="submit"]:hover {
      background-color: #555;
    }

    .login-form .error {
      color: #ff0000;
      margin-top: 10px;
    }
    .signIn-link{
      text-decoration:underline;
    }


  </style>

  
<body>

  



  <div class="container">
    
    <div class="login-form">
      
      <h2 style="font-size:25 px;font-weight:bold">User Login</h2>
      <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
        <p class="error"><?php echo isset($error) ? $error : ''; ?></p>
      </form>
    <p>Don't have an account?<a href="./userregistration.php" class="signIn-link">Register here</a></p>

    </div>

  </div>


</body>
</html>
