<?php
// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Delete the product from the database
    $sql = "DELETE FROM shopping WHERE Product_Id = '$productID'";
    if ($conn->query($sql) === TRUE) {
       
        echo '<script type="text/javascript">
               window.onload = function () { alert("product deleted successfully"); }
                
        </script>'; 
        header("Location: productview.php");
        
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

$conn->close();
?>
