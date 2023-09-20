<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Chaos User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            margin-top: 8rem;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .success-msg {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-msg {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .signIn-link {
        /* display: block; */
        text-align: center;
        margin-top: 10px;
        text-decoration:underline;
        color: #333;
        }
        /* Adding a background to the navbar */
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
<div class="nav ">
      <!--    Adding the necessary links      -->
      <a href=""  style="font-weight: bold; font-size : 20px">CHAOS🛒</a>
      <a href="aboutvisitor.php" style="float:right">About Us</a>
      <a href="usersignin.php" style="float:right">Login/Signup</a>
      
      <a href="contact.html" style="float:right">Contact Us</a>
      <a href="#about" style="float:right">Order Us</a>
      <a href="productss_visitor.php" style="float:right">Clothing</a>
      <a href="CHAOS_user.php" style="float:right">Home</a>
      

      
    </div>
    
    </div>
      </ul>
    </div>
  </nav>
    
    <div class="container">
        <h2>User Registration</h2>
        <?php
        // Define variables and set to empty values
        $username = $email = $password = "";
        $error_msg = $success_msg = "";

        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate input
            if (empty($username) || empty($email) || empty($password)) {
                $error_msg = "Please fill in all the fields.";
            } else {
                // Connect to the MySQL database
                $conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare the SQL statement
                $sql = "INSERT INTO users (UserName, Password, Email, Role) VALUES (?, ?, ?, 'USER')";

                // Prepare the statement and bind the parameters
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $username, $password, $email);

                // Execute the statement
                if ($stmt->execute()) {
                    $success_msg = "User registered successfully.";
                } else {
                    $error_msg = "Error: " . $sql . "<br>" . $stmt->error;
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            }
        }
        ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Register</button>

        </form>

        <?php
        // Display success or error message
        if (!empty($success_msg)) {
            echo '<div class="success-msg">' . $success_msg . '</div>';
        } elseif (!empty($error_msg)) {
            echo '<div class="error-msg">' . $error_msg . '</div>';
        }
        ?>
        <p>Already have an account?<a href="./usersignin.php" class="signIn-link">Sign In</a></p>
    </div>
</body>

</html>
