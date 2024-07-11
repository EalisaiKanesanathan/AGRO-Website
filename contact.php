<?php
include('connection.php');
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: Farmer.php"); // or "location: Customer.php" based on your session
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($db, $_POST["name"]);
    $contactNumber = mysqli_real_escape_string($db, $_POST["contactNumber"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $subject = mysqli_real_escape_string($db, $_POST["subject"]);
    $message = mysqli_real_escape_string($db, $_POST["message"]);

    $sql = "INSERT INTO contact_us (name, contactNumber, email, subject, message) VALUES ('$name', '$contactNumber', '$email', '$subject', '$message')";

    if (mysqli_query($db, $sql)) {
        echo "Data inserted successfully!";
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
    <style><?php include "Css/contact.css" ?></style>
    <style><?php include "Css/header.css" ?></style>
    <style><?php include "Css/Footer.css" ?></style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Contact Us</title>
</head>
<body style="background-color: #c3f0c5;">
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#" id="logo"><img src="Images/LOGO.png" width="50px"><span style="color:black">AG</span><sapn style="color:rgb(11, 212, 11)">RO</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="CustomerHome.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="About us.php">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu">
                        <a href="Seeds.php" class="dropdown-item">Seeds</a>
                        <a href="Vegetables.php" class="dropdown-item">Vegetables</a>
                        <a href="Fruits.php" class="dropdown-item">Fruits</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Blog.php">Blog</a>
                </li>
              </ul>
            </div>
            <div class="icons">
              <img src="Images/search.svg" width="20px">
              <a href="card.php"><img src="Images/add to.svg" width="20px"></a>
              <a href="User.php"><img src="Images/userf.svg" width="24px"></a>
          </div>
          </nav>
    </div>
    
    <div class="container">
        <div class="content-form">
            <div class="image-container">
                <img src="Images/contact.png" alt="Contact Image">
            </div>
            <div class="form-container">
                <h2>Contact Us</h2>
                <form class="contactForm" method="post" action="contact.php">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="contactNumber">Contact Number:</label>
                    <input type="tel" id="contactNumber" name="contactNumber" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit" class="btn-submit">Send</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p class="text">Sign up for Fresh Organic Vegetables and Fruits</p>
        
        <ul class="list-footer">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
        <div class="social-media">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <p class="copyrights">&copy; Agro</p>
    </footer>
    

    <script src="try.js"></script>
</body>
</html>
