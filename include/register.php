<?php
    //The path for include is relative to the directory where the index.php is in
    include "config.php";
    include "classes/Account.php";
    include "classes/Constants.php";
    $account = new Account($con);
    include "handlers/register-handler.php";
    include "handlers/logIn-handler.php";
    //Retain the set value in the input
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
    <link rel="stylesheet" href="../assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/register.js"></script>
</head>
<body>

    <?php
        if(isset($_POST['registerButton']))
        {
           echo '<script>
                $("document").ready(function(){
                    $("#logInForm").hide();
                    $("#registerForm").show();
                });
                </script>';
        }else
        {
            echo '<script>
                $("document").ready(function(){
                    $("#logInForm").show();
                    $("#registerForm").hide();
                });
                </script>';
        }
    ?>
      

   <div id="background">
       <div id="logInContainer">
            <div id="inputContainer">
                <form id="logInForm" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account -> getError(Constants::$logInFailed); ?>
                        <label for="logInUsername">Username :</label> 
                        <input name="logInUsername" type="text" id="logInUsername" placeholder="e.g. Donald Trump" value="<?php getInputValue('logInUsername');?>" required>
                    </p>
                    <p>
                        <label for="logInPassword">Password :</label>
                        <input name="logInPassword" type="password" id="logInPassword" placeholder="Your Password" value="<?php getInputValue('logInPassword'); ?>" required>
                    </p>
                    <button type="submit" name="logInButton">LOGIN</button>
                    <div class="hasAccountText">
                        <span class="hideLogin">Don't have an account yet?Register here!</span>
                    </div>
                </form>


                <form id="registerForm" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account -> getError(Constants::$usernameCharacter); ?>
                        <?php echo $account -> getError(Constants::$usernameTaken); ?>
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
                       <?php echo $account -> getError(Constants::$emailTaken); ?>
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
                    <button type="submit" name="registerButton">REGISTER</button>
                    <div class="hasAccountText">
                        <span class="hideRegister">Already have an account?Log in here!</span>
                    </div>
                </form>
            </div>
            
            <div id="logInText">
                <h1>Get great music right now!</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
       </div>
    </div>
</body>
</html>