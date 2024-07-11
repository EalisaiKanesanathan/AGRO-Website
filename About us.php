<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="imgs/logo.png">
        <title>About Us</title>
        <style><?php include "Css/header.css" ?></style>
        <style><?php include "Css/About us.css" ?></style>
        <style><?php include "Css/Footer.css" ?></style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    </head>

    <body style="background-color:  #c3f0c5;"> 
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

        <section class="about-section">
            <div class = "image">
               <img src="Images/about.webp"> 
            </div>

            <div class = "content about">
                <h2>About Us</h2> 
                <p> We can distribute the seeds to them. During the current situation, due to the fuel problem, people face
                    getting all their vegetables from outside. (Different districts) so the cost of vegetables is increasing
                    day by day. That is why we introduce our website to the people who like to do farming on their own
                    they can contact us, get the best seeds or plants, and make their own home garden. They can
                    distribute their vegetables or fruits to us. We can help them to deliver the goods freely. If they give
                    the goods to us, we sell them and get a profit. The people have the benefit such as they consume
                    fresh vegetables and fruits without mixing any chemicals.</p>
            </div>
        </section>
        
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

    </body>
</html>