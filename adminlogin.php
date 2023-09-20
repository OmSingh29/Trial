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
    $sql = "SELECT * FROM users WHERE UserName='$username' AND Password='$password' AND Role='Admin'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        session_start();
        $user = $result->fetch_assoc();
        $username = $user['UserName'];
        $role = $user['Role'];
        header("Location: CHAOSloginedadmin.php?username=$username&role=$role");
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
<head><meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHAOS Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login</title>
  <style>
    body {
      background-color: #ddd;
      font-family: Arial, sans-serif;
    }
    body {
      background-image: url("bi.jpg");
      background-size: cover;
      background-position: center;
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
      background-color:#333 ;
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
      box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);
      
    }

    .login-form {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
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
      background-color: #ff0000;
      border: none;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-form input[type="submit"]:hover {
      background-color: #CC5500;
    }

    .login-form .error {
      color: #ff0000;
      margin-top: 10px;
    }
    .nav {
  background-color: #111;
  overflow: hidden;
  padding:8px;
}

/* Styling the links inside the navbar */
.nav a {
  
  display: block;
  color: white;
  text-align: center;
  padding: 9px;
  text-decoration: none;
  font-size: 17px;
  
}
.login-form{
  background: transparent;
  box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);

}
.form{
  background: transparent;
  box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);
  
}



  </style>
</head>
<body>`
<div class="nav ">
    <!--    Adding the necessary links      -->
    <a href=""  style="font-weight: bold; font-size : 20px" >CHAOS🛒</a>
    

    
  </div>
  <div class="container">
    <div class="login-form">
      <h1 style="color: white;font-weight: bold;font-size:30px">Admin Login</h1>
      <form class="form" action="adminlogin.php" method="POST">
        <label style="color: white;float:left" for="username">Username:</label>
        <input style="float:left"type="text" name="username" required>

        <label style="color: white;float:left" for="password">Password:</label>
        <input style="float:left" type="password" name="password" required>

        <input type="submit" value="Login">
        <p class="error"><?php echo isset($error) ? $error : ''; ?></p>
      </form>
    </div>
  </div>
</body>
</html>
