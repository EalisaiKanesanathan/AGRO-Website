<?php
// Include the connection file
include 'connection.php';

// Check if the form is submitted
if (isset($_POST['sub'])) {
    // Retrieve data from the form
    $name = $_POST['name'];
    $contact = $_POST['num'];
    $email = $_POST['email'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $usercategory = $_POST['usercategory'];
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // Check if the email already exists in either customer_register or farmer_register
    $checkExistingEmail = "SELECT email FROM customer_register WHERE email='$email' UNION SELECT email FROM farmer_register WHERE email='$email'";
    $resultExistingEmail = $db->query($checkExistingEmail);

    if ($resultExistingEmail->num_rows >= 1) {
        echo "This email already exists!";
    } else {
        // Insert data into the appropriate table based on user category
        if ($usercategory == 'Customer') {
            $sql = "INSERT INTO customer_register (name, cnumber, email, district, address, usercategory, uname)
                    VALUES ('$name', '$contact', '$email', '$district', '$address', '$usercategory', '$username')";

            $sql_login = "INSERT INTO customer_login (email, password) VALUES ('$email', '$password')";
        } elseif ($usercategory == 'Farmer') {
            $sql = "INSERT INTO farmer_register (name, cnumber, email, district, address, usercategory, uname)
                    VALUES ('$name', '$contact', '$email', '$district', '$address', '$usercategory', '$username')";

            $sql_login = "INSERT INTO farmer_login (email, password) VALUES ('$email', '$password')";
        }

        // Execute the queries
        if ($db->query($sql) === TRUE && $db->query($sql_login) === TRUE) {
            echo "New record created successfully";
            if ($usercategory == 'Customer') {
                header("Location: Customer.php");
            } elseif ($usercategory == 'Farmer') {
                header("Location: Farmer.php");
            }
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
}

// Close the database connection (not necessary in this case because it will be closed automatically when the script ends)
// $db->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="shortcut icon" href="Images/LOGO.png">
  <link rel="stylesheet" href="Css/reset.css">
  <link rel="stylesheet" href="Css/Signup.css">
  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <main>
    <div class="page-container">
      <div class="grid-container">
        <div class="left-side">
          <div class="img-and-text">
            <img class="cart-illustration" src="Images/LOGO.png" alt="">
            <h1>You Can Get Fresh Vegetables and Fruits & Seeds.</h1>
          </div>
        </div>
        <div class="right-side">
          <div class="wrapper">
            <form method="post" action="" onsubmit="return Validate()">
            <h2>Get started.</h2>
            <p>Already have an account? <a href="Sign.php">Login</a></p>
              <label for="name">Name</label>
              <div class="name-input-container">
                <input type="text" name="name" placeholder="Enter Your Name" id="name">
              </div> 
              <label for="contact">Contact Number</label>
              <div class="contact-input-container">
                <input type="text" name="num" placeholder="Enter Your Contact Number" id="num">
              </div> 
              <label for="email">Email address</label>
              <div class="email-input-container">
                <i class="fi fi-rr-envelope icon-email"></i>
                <input type="email" name="email" placeholder="example@email.com" id="email">
              </div>
              <label for="district">District</label>
              <div class="district-input-container">
                <select name="district" id="district">
                  <option value="Colombo">Select Your District Here</option>
                  <option value="Jaffna">Jaffna</option>
                  <option value="Kilinochchi">Kilinochchi</option>
                  <option value="Mannar">Mannar</option>
                  <option value="Mullaitivu">Mullaitivu</option>
                  <option value="Vavuniya">Vavuniya</option>
                  <option value="Puttalam">Puttalam</option>
                  <option value="Kurunegala">Kurunegala</option>
                  <option value="Gampaha">Gampaha</option>
                  <option value="Colombo">Colombo</option>
                  <option value="Kalutara">Kalutara</option>
                  <option value="Anuradhapura">Anuradhapura</option>
                  <option value="Polonnaruwa">Polonnaruwa</option>
                  <option value="Matale">Matale</option>
                  <option value="Kandy">Kandy</option>
                  <option value="Nuwara Eliya">Nuwara Eliya</option>
                  <option value="Kegalle">Kegalle</option>
                  <option value="Ratnapura">Ratnapura</option>
                  <option value="Trincomalee">Trincomalee</option>
                  <option value="Batticaloa">Batticaloa</option>
                  <option value="Ampara">Ampara</option>
                  <option value="Badulla">Badulla</option>
                  <option value="Monaragala">Monaragala</option>
                  <option value="Hambantota">Hambantota</option>
                  <option value="Matara">Matara</option>
                  <option value="Galle">Galle</option>
                </select>
              </div>
              <label for="address">Address</label>
              <div class="name-input-container">
                <input type="text" name="address" placeholder="Enter Your Address" id="address">
              </div>

              <!-- New Label and Dropdown for User Type -->
              <label for="user-type">User Catergory</label>
              <div class="user-type-input-container">
                <select name="usercategory" id="usercategory">
                  <option value="SelectCatergory">Select User Catergory Here</option>
                  <option value="Customer">Customer</option>
                  <option value="Farmer">Farmer</option>
                </select>
              </div>

              <label for="uname">Username</label>
              <div class="name-input-container">
                <input type="text" name="uname" placeholder="Enter Your Username" id="uname">
              </div> 
              <label for="password">Password</label>
              <div class="password-input-container">
                <i class="fi fi-rr-lock icon-password"></i>
                <input type="password" name="password" placeholder="Enter Your Password" id="password">
              </div>
              <label for="confirm-password">Confirm Password</label>
              <div class="password-input-container">
                <i class="fi fi-rr-lock icon-password"></i>
                <input type="password" name="confirm_password" placeholder="Enter Your Confirm Password" id="confirm-password">
              </div>
            
            <input id="register-button" type="submit" name="sub" value="Register" >
            <p class="credits">Made with ❤ by <a href="https://github.com/EEY4189-SD-Group/Cluster-5.5.git" target="_blank">AGRO Team</a></p>
          </div>

              <script type="text/javascript">
              function Validate() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm-password").value;
                if (password != confirmPassword) {
                  alert("Passwords did not match.");
                  return false;
                }
                return true;
        }
      </script>
        </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>