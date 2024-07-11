<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/extention/choices.js"></script>
    <style>
        body {
            background-color: #81b86c;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .s003 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            margin: 20px auto;
            max-width: 600px;
        }

        input[type="text"] {
            height: 40px;
            width: 300px;
            padding: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .btn-search {
            height: 40px;
            width: 100px;
            white-space: nowrap;
            color: #fff;
            border: 0;
            cursor: pointer;
            background: #FF9800;
            transition: all .2s ease-out, color .2s ease-out;
            border-radius: 4px;
            margin-left: 10px;
        }

        .btn-search:hover {
            background: #FFA726;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            z-index: 1000;
        }

        .popup-content {
            color: #4CAF50;
        }

        .input-field.second-wrap input[type="text"] {
            height: 40px;
            width: 300px;
            padding: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            text-align: center;
        }

        .message-container {
            margin-top: 10px;
            text-align: center;
        }

        .remove-btn {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .save-btn {
            background-color: #19934a;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        #confirmOrderBtn {
            background-color: #19934a;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="s003">
    <form method="post">
        <img src="Images/add1.png" width="40px" style= "margin-right:20px;">
        <h1><font color="white">My Cart</font></h1>
        <div class="inner-form">
            <div class="input-field second-wrap">
                <input id="search" type="text" placeholder="Search Items" name="valueToSearch" />
            </div><br>
            <div class="input-field third-wrap">
                <input class="btn-search" type="submit" name="search" value="Search">
            </div>
        </div>
    </form>
</div>
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });
</script>
<div class="popup-container" id="popupContainer">
    <div class="popup-content" id="popupContent"></div>
</div>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `product` WHERE CONCAT(`Name`) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `product`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "agro");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if (isset($_POST['quantity'])) {
    $quantities = $_POST['quantity'];
    foreach ($quantities as $quantity) {
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connect = mysqli_connect("localhost", "root", "", "agro");

    if (isset($_POST['removeProductId'])) {
        $productIdToRemove = $_POST['removeProductId'];

        $query = "DELETE FROM `product` WHERE `id` = ?";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "i", $productIdToRemove);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo 'Removed successfully';
        } else {
            echo 'Error removing item';
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connect);
        exit();
    }
}

if (isset($_POST['updateProductId'])) {
    $productIdToUpdate = $_POST['updateProductId'];
    $newQuantity = $_POST['newQuantity'];

    $query = "UPDATE `product` SET `Quantity` = ? WHERE `id` = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ii", $newQuantity, $productIdToUpdate);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'Updated successfully';
    } else {
        echo 'Error updating quantity';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
    exit();
}

?>

<?php

if (mysqli_num_rows($search_result) == 0) {
    echo "<p class='message-container'>No Items Available</p>";
} else {
    echo "<form action='' method='post' id='update-form'>";
    echo "<table align='center'>";
    echo "<tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Save</th>
            <th>Remove</th>
          </tr>";

    while ($row = mysqli_fetch_array($search_result)) {
        echo "<tr id='product-row-" . $row['id'] . "' data-product-id='" . $row['id'] . "'>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>";
        echo "<input type='number' id='quantity-" . $row['id'] . "' class='quantity' name='quantity[" . $row['id'] . "]' value='" . $row['Quantity'] . "' min='1'>";
        echo "</td>";
        echo "<td class='price'>" . $row['Price'] . "</td>";
        echo "<td class='total-price'>" . $row['Price'] . "</td>";
        echo "<td><button type='button' class='save-btn' data-product-id='" . $row['id'] . "'>Save</button></td>";
        echo "<td><button type='button' class='remove-btn' data-product-id='" . $row['id'] . "'>Remove</button></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</form>";

    echo "<div class='confirm-btn-container'>
    <button id='confirmOrderBtn'>Confirm Order</button>
    </div>";
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantities = document.querySelectorAll('.quantity');
        const prices = document.querySelectorAll('.price');
        const totalPrices = document.querySelectorAll('.total-price');

        // Trigger the calculation on page load
        updateTotalPrices();

        quantities.forEach((quantity, index) => {
            quantity.addEventListener('input', function () {
                updateTotalPrices();
            });
        });

        function updateTotalPrices() {
            quantities.forEach((quantity, index) => {
                const price = parseFloat(prices[index].textContent);
                const qty = parseInt(quantity.value);
                const total = price * qty;
                totalPrices[index].textContent = total.toFixed(2);
            });
        }

        const removeButtons = document.querySelectorAll('.remove-btn');

        removeButtons.forEach((button) => {
            button.addEventListener('click', function () {
                console.log("click")

                const productId = this.getAttribute('data-product-id');

                // Send AJAX request to delete the item from the database
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: { removeProductId: productId },
                    success: function (response) {
                        // Check if the response contains the success message
                        if (response.includes('Removed successfully')) {
                            // Remove the row from the table
                            const rowId = 'product-row-' + productId;
                            const rowToRemove = document.getElementById(rowId);
                            if (rowToRemove) {
                                rowToRemove.remove();
                                displayPopup('Removed');
                            }
                        } else {
                            console.log(response);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

        const saveButtons = document.querySelectorAll('.save-btn');

        saveButtons.forEach((button) => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const quantityInput = document.getElementById('quantity-' + productId);
                const newQuantity = quantityInput.value;

                // Send AJAX request to update the quantity in the database
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: { updateProductId: productId, newQuantity: newQuantity },
                    success: function (response) {
                        // Check if the response contains the success message
                        if (response.includes('Updated successfully')) {
                            displayPopup('Updated');
                        } else {
                            console.log(response);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

        function displayPopup(message) {
            const popupContainer = document.getElementById('popupContainer');
            const popupContent = document.getElementById('popupContent');

            popupContent.textContent = message;
            popupContainer.style.display = 'block';

            // Hide the popup after a certain duration (e.g., 3 seconds)
            setTimeout(() => {
                popupContainer.style.display = 'none';
            }, 1500); // Adjust the duration as needed
        }

        const confirmOrderBtn = document.getElementById('confirmOrderBtn');

        confirmOrderBtn.addEventListener('click', function () {
            const details = [];
            const itemRows = document.querySelectorAll('tr[data-product-id]');

            itemRows.forEach(row => {
                const productId = row.getAttribute('data-product-id');
                const itemName = row.querySelector('td:first-child').textContent;
                const quantity = row.querySelector('.quantity').value;
                const price = row.querySelector('.price').textContent;
                const totalPrice = row.querySelector('.total-price').textContent;

                details.push({
                    productId: productId,
                    itemName: itemName,
                    quantity: quantity,
                    price: price,
                    totalPrice: totalPrice
                });
            });

            const detailsString = encodeURIComponent(JSON.stringify(details));
            window.location.href = 'confirmation_page.php?details=' + detailsString;
        });

    });
</script>

</body>

</html>