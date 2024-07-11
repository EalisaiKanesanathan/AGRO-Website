<?php
include('connection.php');
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: Farmer.php"); // or "location: Customer.php" based on your session
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $category = $_POST["category"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];

    // Handle image upload
    $productImage = $_FILES["productImage"]["tmp_name"];
    $imageData = addslashes(file_get_contents($productImage));

    // Insert data into the add_product table
    $sql = "INSERT INTO add_product (productImage, category, productName, productPrice, productQuantity) VALUES ('$imageData', '$category', '$productName', '$productPrice', '$productQuantity')";

    if (mysqli_query($db, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
    <?php include "Css/AddProduct.css" ?>
    </style>
</head>

<body>

    <div class="container">
        <div class="image-container">
            <img src="Images/addproductimg.png" alt="Your Image">
        </div>
        <div class="form-container">
            <h1>Add Your Products</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="productImage">Product Image:</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="category">Select Your Product Category:</label>
                    <select id="category" name="category">
                        <option value="SelectCatergory">Select Your Product Type</option>
                        <option value="vegetables">Vegetables</option>
                        <option value="fruits">Fruits</option>
                        <option value="seeds">Seeds</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" required>
                </div>

                <div class="form-group">
                    <label for="productPrice">Product Price:</label>
                    <input type="number" id="productPrice" name="productPrice" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="productQuantity">Product Quantity(Kg):</label>
                    <input type="number" id="productQuantity" name="productQuantity" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</body>

</html>
