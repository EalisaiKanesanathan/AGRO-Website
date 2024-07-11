<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your-stylesheet.css">
    <style><?php include "Css/user.css" ?></style>
    <title>User Profile</title>
</head>
<body>

<header>
    <img class="profile-header-img" src="Images/man.png" alt="Profile Picture" width="100px" height="100px">
    <h1>User Profile</h1>
</header>

<div class="profile-container">
    <div class="profile-img-container">
        <img class="profile-img" src="Images/man.png" alt="Profile Picture" width="100px" height="100px">
    </div>
    <form id="profile-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required disabled>

        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" required disabled>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required disabled>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required disabled>

        <label for="district">District:</label>
        <input type="text" id="district" name="district" required disabled>

        <label for="user-category">User Category:</label>
        <input type="text" id="user-category" name="user-category" required disabled>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required disabled>

        <input type="submit" value = "Edit">
        <input type="submit" value="Save Changes">
    </form>
</div>

<script src="Javascript/user.js"></script>
</body>
</html>