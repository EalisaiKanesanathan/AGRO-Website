<?php
   include('connection.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select email from farmer_login where email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['email'];
   if(!isset($_SESSION['login_user'])){
      header("location:Farmer.php");
      die();
   }
?>

<?php
   include('connection.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select email from customer_login where email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['email'];
   if(!isset($_SESSION['login_user'])){
      header("location:Customer.php");
      die();
   }
?>