<?php
// Connect to the MySQL database


$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$Product = $_POST['Product'];
$Product_id = $_POST['ProductId'];
$cost = $_POST['cost'];
$category = $_POST['category'];
$image=$_POST['image'];
$description = $_POST['description'];

// Insert product details into the database
$sql = "INSERT INTO shopping VALUES ('$Product', '$Product_id', '$cost','$category', '$image', '$description')";
if ($conn->query($sql) === TRUE) {
    echo "Product added successfully";
} 

else {
    echo "" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
