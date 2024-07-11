<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="imgs/logo.png">
    <title>AGRO</title>
    <style><?php include "Css/Customer.css" ?></style>
    <style><?php include "Css/Footer.css" ?></style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body style="background-color: #c3f0c5;">
<div class="content">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#" id="logo">
            <img src="Images/LOGO.png" width="50px">
            <span style="color:black">AG</span><span style="color:rgb(11, 212, 11)">RO</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="FarmerHome.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="About us.php">ABOUT US</a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">CATEGORIES <i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-menu">
                    <a href="Seeds.php" class="dropdown-item">Seeds</a>
                    <a href="Vegetables.php" class="dropdown-item">Vegetables</a>
                    <a href="Fruits.php" class="dropdown-item">Fruits</a>
                </div>
            </li>

              <li class="nav-item">
                  <a class="nav-link" href="Shop.php">SHOP</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="contact.php">CONTACT US</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="Blog.php">BLOG</a>
              </li>
                <!-- Your navigation items -->
            </ul>
        </div>
        <div class="icons">
            <img src="Images/search.svg" width="40px">
            <a href="card.php"><img src="Images/add to.svg" width="40px" style= "margin-right:20px;"></a>
            <a href="User.php"><img src="Images/userf.svg" width="40px"></a>
        </div>
    </nav>
</div>

<!-- banner -->
<section id="banner">
    <img src="Images/AGRO.png" class="bg-1" alt="bg">
</section>

<!-- Text between banner and buttons -->
<div class="text-between">
    <div class="delivery-info">
        <span class="running-text">Best Tasty and Healthy Organic Groceries For You!</span>
    </div>
</div>
<div id="product-title">Select Your Product</div>
<section id="images-section">
    <!-- Image 1 with a link -->
    <a href="Seeds.php">
        <img src="Images/sunflower-seed.png" alt="Image 1" class="responsive-image">
    </a>
    <!-- Image 2 with a link -->
    <a href="Vegetables.php">
        <img src="Images/vegetable.png" alt="Image 2" class="responsive-image">
    </a>

    <!-- Image 3 with a link -->
    <a href="Fruits.php">
        <img src="Images/fruits.png" alt="Image 3" class="responsive-image">
    </a>
</section>
<section id="text-section">
     <div class="responsive-text">Seeds</div>
      <div class="responsive-text">Vegetables</div>
       <div class="responsive-text">Fruits</div>
</section>
   
<footer>
  <p class="text">Sign up for Fresh Organic Vegetables and Fruits</p>

  <ul class="list-footer">
      <li><a href="CustomerHome.php">Home</a></li>
      <li><a href="About us.php">About Us</a></li>
      <li><a href="#">Categories</a></li>
      <li><a href="Shop.php">Shop</a></li>
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

</body>
</html>