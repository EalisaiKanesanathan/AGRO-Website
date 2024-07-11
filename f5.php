<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agro";
$new=$_POST['new'];
session_start();
session_regenerate_id();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `customer_login` SET `password`='$new' WHERE email='$_SESSION[e]'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
   header('Location:Customer.php');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>