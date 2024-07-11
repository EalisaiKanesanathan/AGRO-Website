<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/LOGO.png">
    <title>User Type Selection</title>
    <style>
    <?php include "Css/Select.css" ?>
    </style>
</head>
<body>
    <video autoplay muted loop id="video-background">
        <source src="Images/AG1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="logo-container">
        <img src="Images/LOGO.png" alt="Logo" width="160" height="160">
    </div>

    <div class="selection-container">
        <h1>Select Your User Category</h1>
        <div class="selection-buttons">
            <a href="Farmer.php" style="text-decoration: none;"><button class="farmer-button">
                <img src="Images/farmer.jpg" alt="Farmer Icon" width="250" height="250">
                Farmer
            </button></a>
            <a href="Customer.php" style="text-decoration: none;"><button class="customer-button">
                <img src="Images/customer.jpg" alt="Buyer Icon" width="120" height="120">
               Customer
            </button></a>
        </div>
    </div>
</body>
</html>
