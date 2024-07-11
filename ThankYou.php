<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            text-align: center;
            background-color: #c7e0b4;
        }

        h1 {
            color: #466b35;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .redirect-info {
            margin-top: 50px;
            font-size: 16px;
            color: #466b35;
        }
    </style>
</head>
<body>
<h1>Thank You!</h1>
<p>Your order has been confirmed successfully.</p>

<div class="redirect-info">
    <p>You will be redirected to the home page shortly.</p>
</div>

<script>
    setTimeout(function () {
        window.location.href = 'CustomerHome.php';
    }, 5000);
</script>
</body>
</html>
