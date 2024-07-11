<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
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

        p {
            font-size: 18px;
            color: #333;
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

        .order-btn {
            background-color: #466b35;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .order-btn:hover {
            background-color: #5c7042;
        }
    </style>

    <body>
    <h1>Order Confirmation</h1>

    <?php
    // Retrieve the details from the URL parameter
    $detailsString = isset($_GET['details']) ? $_GET['details'] : '[]';

    // Decode the JSON string to an array of details
    $details = json_decode(urldecode($detailsString), true);

    if (!empty($details)) {
        echo '<h2>Order Details:</h2>';
        echo '<table border="1">';
        echo '<tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                  </tr>';

        foreach ($details as $detail) {
            echo '<tr>';
            echo '<td>' . $detail['itemName'] . '</td>';
            echo '<td>' . $detail['quantity'] . '</td>';
            echo '<td>' . $detail['price'] . '</td>';
            echo '<td>' . $detail['totalPrice'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';

        // Display the total order amount
        $orderTotal = array_sum(array_column($details, 'totalPrice'));
        echo '<p>Total Order Amount: LKR ' . number_format($orderTotal, 2) . '</p>';
    } else {
        echo '<p>No order details available.</p>';
    }
    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the orderDetails data is provided
        if (isset($_POST['orderDetails'])) {
            $orderDetails = json_decode($_POST['orderDetails'], true);

            $conn =  mysqli_connect("localhost", "root", "", "agro");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert the entire order as one row in the 'orders' table
            $sql = "INSERT INTO orders (order_data) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $orderData);

            // Convert the orderDetails array to a JSON string
            $orderData = json_encode($orderDetails);

            // Execute the prepared statement
            if ($stmt->execute() === TRUE) {
                echo "Order confirmed and saved to the database.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the prepared statement and the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Order details not provided.";
        }
    }
    ?>

    <button class="order-btn" id="orderBtn">Confirm Order</button>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const orderBtn = document.getElementById('orderBtn');

            orderBtn.addEventListener('click', function () {
                // Get the order details from the table (modify this selector based on your actual structure)
                const orderTable = document.querySelector('table');

                // Convert the table rows (excluding the header row) to an array of objects
                const orderDetails = Array.from(orderTable.querySelectorAll('tr:not(:first-child)')).map(row => {
                    const columns = row.querySelectorAll('td');
                    return {
                        itemName: columns[0].textContent,
                        quantity: columns[1].textContent,
                        price: columns[2].textContent,
                        totalPrice: columns[3].textContent
                    };
                });

                const orderDetailsJSON = JSON.stringify(orderDetails);

                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: { orderDetails: orderDetailsJSON },
                    success: function (response) {
                        if (response.includes('Order confirmed and saved to the database.')) {
                            console.log(response);
                            // Redirect to the thank you page after successful order confirmation
                            window.location.href = 'ThankYou.php';
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
    </script>

    </body>
    </html>
