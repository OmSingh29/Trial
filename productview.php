<?php
// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form submission
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productCost = $_POST['productCost'];
    $productCategory = $_POST['productCategory'];
    $productImage = $_POST['productImage'];
    $productDescription = $_POST['productDescription'];



    // Update the product details in the database
    $sql = "UPDATE shopping SET Product = '$productName', Cost = '$productCost', Catagory = '$productCategory',
            Image = '$productImage', Description = '$productDescription' WHERE Product_Id = '$productID'";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

// Retrieve product details from the database
$sql = "SELECT * FROM shopping";
$result = $conn->query($sql);

// Process search query
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    // Modify the SQL query to search for the given Product ID
    $sql = "SELECT * FROM shopping WHERE Product_Id = '$searchQuery'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>View Products</title>
    <style>
        .nav {
            background-color: #111;
            overflow: hidden;
            padding: 8px;
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 5px;
            width: 200px;
        }

        .search-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;

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
               
    </style>
</head>

<body>
    <div class="nav ">
        <!--    Adding the necessary links      -->
        <a href="" style="font-weight: bold; font-size : 20px">CHAOS🛒</a>



    </div>
    <div class="button-container">
        <a style="float:right" class="button" href="productmenu.php?username=<?php echo $_GET['username']; ?>&role=<?php echo $_GET['role']; ?>">Back</a>

    </div>
    <h2>View Products</h2>
    <div class="search-container">
        <form method="GET" action="">
            <input type="text" class="search-input" name="search" placeholder="Search by Product ID">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    <table>
        <tr>
            <th>Product</th>
            <th>Product ID</th>
            <th>Cost</th>
            <th>Category</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Product'] . "</td>";
                echo "<td>" . $row['Product_Id'] . "</td>";
                echo "<td>" . $row['Cost'] . "</td>";
                echo "<td>" . $row['Catagory'] . "</td>";
                echo "<td><img src='images/" . $row['Image'] . "' width='50'></td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td><a href='edit_product.php?id=" . $row['Product_Id'] . "'>Edit</a></td>"; // Edit button
                echo "<td><a  href='delete_product.php?id=" . $row['Product_Id'] . "'>Delete</a></td>"; // Delete button
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found.</td></tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
$conn->close();
?>