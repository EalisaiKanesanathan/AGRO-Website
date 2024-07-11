<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers' Orders</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            text-align: center;
            background-color: #c7e0b4;
        }

        h1 {
            color: #466b35;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #466b35;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #d3e4bb;
        }

        tr:hover {
            background-color: #a9cf8e;
        }

        /* Adjust column widths */
        th:nth-child(1),
        td:nth-child(1) {
            width: 30%;
        }

        th:nth-child(2),
        td:nth-child(2),
        th:nth-child(3),
        td:nth-child(3),
        th:nth-child(4),
        td:nth-child(4) {
            width: 15%;
        }

        .back-btn {
            background-color: #466b35;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #5c7042;
        }
    </style>
</head>
<body>
<h1>Farmers' Orders</h1>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "agro");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve orders from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $orderNumber = 1; // Initialize order number

    while ($row = $result->fetch_assoc()) {
        // Decode the order data from JSON
        $orderDetails = json_decode($row['order_data'], true);

        $totalAmount = 0;

        // Display order details as a table with an order number column
        echo '<h2>Order Summary (Order #'.$orderNumber.'):</h2>';
        echo '<table border="1">';
        echo '<tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                          </tr>';

        foreach ($orderDetails as $detail) {
            echo '<tr>';
            echo '<td>' . $detail['itemName'] . '</td>';
            echo '<td>' . $detail['quantity'] . '</td>';
            echo '<td>' . $detail['price'] . '</td>';
            echo '<td>' . $detail['totalPrice'] . '</td>';
            echo '</tr>';

            $totalAmount += $detail['totalPrice'];
        }

        echo '</table>';
        echo '<p>Total Amount for Order #'.$orderNumber.': Rs. ' . number_format($totalAmount, 2) . '</p>';
        echo '<hr>';

        $orderNumber++;
    }
} else {
    echo '<p>No orders available.</p>';
}

// Close the database connection
$conn->close();
?>

<a href="#" class="back-btn" onclick="history.back()">Back to Previous Page</a>
</body>
</html>
