
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="Images/LOGO.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Inputcode.css">
    <title>Code Verification</title>
</head>
<body>

    <div class="code-input-container">
        <div class="logo-container">
            <img src="Images/code.png" alt="Logo">
        </div>
        <h2>Code Verification</h2>
        <label for="digit1">Enter 4-Digit Code from the email we just sent you.</label>
        <input type="text" id="digit1" class="code-input" maxlength="1" pattern="\d" title="Please enter a single digit" required>
        
        <input type="text" id="digit2" class="code-input" maxlength="1" pattern="\d" title="Please enter a single digit" required>
        
        <input type="text" id="digit3" class="code-input" maxlength="1" pattern="\d" title="Please enter a single digit" required>
        
        <input type="text" id="digit4" class="code-input" maxlength="1" pattern="\d" title="Please enter a single digit" required>
    </div>

</body>
</html>
