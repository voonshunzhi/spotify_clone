<?php
    //The path for include is relative to the directory where the index.php is in
    include "config.php";
    include "classes/Account.php";
    include "classes/Constants.php";
    $account = new Account($con);
    include "handlers/register-handler.php";
    include "handlers/logIn-handler.php";
    function getInputValue($name)
    {
        if(isset($_POST[$name]))
        {
            echo $_POST[$name];
        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to spotify</title>
</head>
<body>
    <div id="inputContainer">
        <form id="logInForm" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <h2>Log In into your account</h2>
            <p>
                <label for="logInUsername">Username :</label> 
                <input name="logInUsername" type="text" id="logInUsername" placeholder="e.g. Donald Trump" required>
            </p>
            <p>
                <label for="logInPassword">Password :</label>
                <input name="logInPassword" type="password" id="logInPassword" required>
            </p>
            <button type="submit" name="logInButton">Log In</button>
        </form>
        
        
        <form id="registerForm" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <h2>Create your free account</h2>
            <p>
                <?php echo $account -> getError(Constants::$usernameCharacter); ?>
                <label for="userName">Username :</label> 
                <input name="userName" type="text" id="userName" placeholder="e.g. Donald Trump" value="<?php getInputValue('userName');?>" required>
            </p>
            <p>
               <?php echo $account -> getError(Constants::$firstnameCharacter); ?>
                <label for="firstName">First Name :</label> 
                <input name="firstName" type="text" id="firstName" placeholder="e.g. Donald" value="<?php getInputValue('firstName');?>" required>
            </p>
            <p>
               <?php echo $account -> getError(Constants::$lastnameCharacter); ?>
                <label for="lastName">Last Name :</label> 
                <input name="lastName" type="text" id="lastName" placeholder="e.g. Trump" value="<?php getInputValue('lastName');?>" required>
            </p>
            <p>
               <?php echo $account -> getError(Constants::$emailDoNoMatch); ?>
               <?php echo $account -> getError(Constants::$emailInvalid); ?>
                <label for="registerEmail">Email :</label> 
                <input name="registerEmail" type="email" id="RegisterEmail" placeholder="donaldtrumph@gmail.com" value="<?php getInputValue('registerEmail');?>" required>
            </p>
            <p>
                <label for="confirmEmail">Confirm Email :</label> 
                <input name="confirmEmail" type="email" id="confirmEmail" placeholder="donaldtrumph@gmail.com" value="<?php getInputValue('confirmEmail');?>" required
            </p>
            <p>
               <?php echo $account -> getError(Constants::$passwordsDoNoMatch); ?>
               <?php echo $account -> getError(Constants::$passwordsNotAlphanumeric); ?>
               <?php echo $account -> getError(Constants::$passwordsCharacter); ?>
                <label for="registerPassword">Password :</label>
                <input name="registerPassword" type="password" id="registerPassword" placeholder="Your Password" value="<?php getInputValue('registerPassword');?>" required>
            </p>
            <p>
                <label for="confirmPassword">Confirm Password :</label>
                <input name="confirmPassword" type="password" id="confirmPassword" placeholder="Your Password" value="<?php getInputValue('confirmPassword');?>" required>
            </p>
            <button type="submit" name="registerButton">Register</button>
        </form>
    </div>
</body>
</html>