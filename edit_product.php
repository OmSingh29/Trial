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
    $productDescription = $_POST['productDescription'];

    $targetDir = "images/";
    $productImage = basename($_FILES["productImage"]["name"]);
    $targetFilePath = $targetDir . $productImage;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check if a new image file is uploaded
    if ($_FILES["productImage"]["tmp_name"] !== "") {
        $check = getimagesize($_FILES["productImage"]["tmp_name"]);
        if ($check !== false) {
            // Allow only certain image file formats
            if ($imageFileType === "jpg" || $imageFileType === "jpeg" || $imageFileType === "png") {
                if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)) {
                    echo "The file " . $productImage . " has been uploaded.";
                    header("Location: productview.php?username=" . $_GET['username'] . "&role=" . $_GET['role']);


                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            } else {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
                $uploadOk = 0;
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Update the product details in the database if image upload is successful
    if ($uploadOk) {
        $sql = "UPDATE shopping SET Product = '$productName', Cost = '$productCost', Catagory = '$productCategory',
                Image = '$productImage', Description = '$productDescription' WHERE Product_Id = '$productID'";

        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product: " . $conn->error;
        }
    }
}

// Retrieve product details from the database
if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    $sql = "SELECT * FROM shopping WHERE Product_Id = '$productID'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $productName = $row['Product'];
        $productCost = $row['Cost'];
        $productCategory = $row['Catagory'];
        $productImage = $row['Image'];
        $productDescription = $row['Description'];
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Invalid product ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
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

        form {
            width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 5px;
            font-size: 14px;
        }

        .btn {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Edit Product</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="productID" value="<?php echo $productID; ?>">

    <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" id="productName" value="<?php echo $productName; ?>" required>
    </div>

    <div class="form-group">
        <label for="productCost">Product Cost:</label>
        <input type="text" name="productCost" id="productCost" value="<?php echo $productCost; ?>" required>
    </div>

    <div class="form-group">
        <label for="productCategory">Product Category:</label>
        <input type="text" name="productCategory" id="productCategory" value="<?php echo $productCategory; ?>" required>
    </div>

    <div class="form-group">
        <label for="productImage">Product Image:</label>
        <input type="file" name="productImage" id="productImage" required>
    </div>

    <div class="form-group">
        <label for="productDescription">Product Description:</label>
        <textarea name="productDescription" id="productDescription" required><?php echo $productDescription; ?></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn">Save</button>
    </div>
</form>
</body>
</html>

<?php
$conn->close();
?>
