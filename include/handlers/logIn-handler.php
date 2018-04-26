<?php
    if(isset($_POST['logInButton']))
    { 
        //Log in button is pressed.
        $username = $_POST['logInUsername'];
        $password = $_POST['logInPassword'];
        
        //Login function
        $result = $account -> logIn($username,$password);
        
        if($result)
        {
            header("Location:index.php");
        }
    }

?>
