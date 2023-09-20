<?php
// Include the database connection file
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for search
$searchName = '';
$searchId = '';
$searchRole = '';
$searchEmail = '';

// Check if the search form is submitted
if (isset($_POST['search'])) {
    // Get the search input values
    $searchName = $_POST['search_name'];
    $searchId = $_POST['search_id'];
    $searchRole = $_POST['search_role'];
    $searchEmail = $_POST['search_email'];
    
    // Build the search query
    $query = "SELECT * FROM users WHERE 1=1";
    
    // Add conditions based on the search inputs
    if (!empty($searchName)) {
        $query .= " AND UserName LIKE '%$searchName%'";
    }
    if (!empty($searchId)) {
        $query .= " AND id = '$searchId'";
    }
    if (!empty($searchRole)) {
        $query .= " AND Role LIKE '%$searchRole%'";
    }
    if (!empty($searchEmail)) {
        $query .= " AND Email LIKE '%$searchEmail%'";
    }
    
    // Execute the search query
    $result = mysqli_query($conn, $query);
    
    // Fetch the search results
    if (mysqli_num_rows($result) > 0) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $users = [];
    }
} else {
    // Fetch all users from the database if search form is not submitted
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    // Check if there are any users
    if (mysqli_num_rows($result) > 0) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $users = [];
    }
}
$username=$_GET['username'];
$role=$_GET['role'];

// Check if the delete form is submitted
if (isset($_POST['delete'])) {
    // Get the user ID to delete
    $deleteId = $_POST['delete_id'];
    
    // Delete the user from the database
    $deleteQuery = "DELETE FROM users WHERE id = '$deleteId'";
    mysqli_query($conn, $deleteQuery);
    
    // Refresh the page after deletion
    header("Location: usershow.php?username='$username'&role='$role'");

    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
       
        body {
      background-image: url(" istockphoto-1146367620-612x612.jpg");
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }
        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form label {
            display: inline-block;
            width: 120px;
        }

        .search-form input[type="text"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        .search-form input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .search-form input[type="submit"]:focus {
            outline: none;
        }

        .action-buttons {
            display: flex;
        }

        .action-buttons button {
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .action-buttons button.edit {
            background-color: #2196F3;
        }

        .action-buttons button.delete {
            background-color: #F44336;
        }
        .you{
            margin-top: 40px;
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

    .nav a:hover {
      background-color: #ddd;
      color: black;
    }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }
    </script>
</head>
<body>
<div class="nav">
  <!-- Adding the necessary links -->
  <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>

  <a style="float:right" href="productmenu.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Manage Products</a>
  <a href="./usershow.php" style="float:right">Manage users</a>




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
    <div class="you">
    <h2>User List</h2>

<form class="search-form" method="POST" action="">
    <label for="search_name">User Name:</label>
    <input type="text" id="search_name" name="search_name" value="<?php echo $searchName; ?>">

    <label for="search_id">User ID:</label>
    <input type="text" id="search_id" name="search_id" value="<?php echo $searchId; ?>">

    <label for="search_role">Role:</label>
    <input type="text" id="search_role" name="search_role" value="<?php echo $searchRole; ?>">

    <label for="search_email">Email ID:</label>
    <input type="text" id="search_email" name="search_email" value="<?php echo $searchEmail; ?>">

    <input type="submit" name="search" value="Search">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['UserName']; ?></td>
            <td><?php echo $user['Password']; ?></td>
            <td><?php echo $user['Email']; ?></td>
            <td><?php echo $user['Role']; ?></td>
            <td class="action-buttons">
                <form method="POST" action="useredit.php">
                    <input type="hidden" name="edit_id" value="<?php echo $user['id']; ?>">
                    <button class="edit" name="edit_" type="submit">Edit</button>
                </form>
                <form method="POST" action="" onsubmit="return confirmDelete();">
                    <input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
                    <button class="delete" type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>    
    </div>
</body>
</html>
