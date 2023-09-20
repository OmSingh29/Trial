<?php
// Include the database connection file
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the edit form is submitted
if (isset($_POST['edit_'])) {
    // Get the user ID to edit
    $editId = $_POST["edit_id"];
    
    // Retrieve the user details from the database
    $query = "SELECT * FROM users WHERE id = '$editId'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Close the result set
    mysqli_free_result($result);
}

// Check if the update form is submitted
if (isset($_POST['update'])) {
    // Get the updated user data
    $updateId = $_POST['update_id'];
    $updatedUserName = $_POST['update_name'];
    $updatedPassword = $_POST['update_password'];
    $updatedEmail = $_POST['update_email'];
    $updatedRole = $_POST['update_role'];

    // Update the user in the database
    $updateQuery = "UPDATE users SET UserName = '$updatedUserName', Password = '$updatedPassword', Email = '$updatedEmail', Role = '$updatedRole' WHERE id = '$updateId'";
    mysqli_query($conn, $updateQuery);

    // Redirect to the user list page after update
    header("Location: usershow.php?username=$updatedUserName&role=$updatedRole");

    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .edit-form label {
            display: inline-block;
            width: 120px;
        }

        .edit-form input[type="text"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        .edit-form input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .edit-form input[type="submit"]:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>

    <form class="edit-form" method="POST" action="">
        <input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">

        <label for="update_name">User Name:</label>
        <input type="text" id="update_name" name="update_name" value="<?php echo $user['UserName']; ?>">

        <label for="update_password">Password:</label>
        <input type="text" id="update_password" name="update_password" value="<?php echo $user['Password']; ?>">

        <label for="update_email">Email ID:</label>
        <input type="text" id="update_email" name="update_email" value="<?php echo $user['Email']; ?>">

        <label for="update_role">Role:</label>
        <input type="text" id="update_role" name="update_role" value="<?php echo $user['Role']; ?>">

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
