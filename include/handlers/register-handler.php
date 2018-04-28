<!-- REGISTER HANDLER.PHP -- BECAUSE IT HANDLE THE REGISTRATION -->
<!-- After sanitization , then perform validation such as making sure the username and password has enough length-->
<?php
    
    function saniztizeFormUsername($inputText)
    {
        //Sanitizing the input
        //strip_tags will strips/rule out a string input from HTML,XML and PHP tags input: <b>Hello</b> --> output : Hello
        //FILTER_VALIDATE_SPECIAL_CHARS : escape/treat differently the special character in the input such as @#$%^&*(){}><.... so that it is harmless to the script
        $inputText = strip_tags($inputText); //give a clean input after sanitizing
        $inputText = str_replace(" ", "",$inputText); // eg: Voon Shun Zhi -> VoonShunZhi
        return $inputText;
    }

    function sanitizeFormString($inputText)
    {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "",$inputText);
        $inputText = ucwords(strtolower($inputText));
        return $inputText;
    }

    function sanitizeFormPassword($inputText)
    {
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    if(isset($_POST["registerButton"]))
    {
        $userName = saniztizeFormUsername($_POST['userName']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $lastName = sanitizeFormString ($_POST['lastName']);
        $email = sanitizeFormString ($_POST['registerEmail']);
        $confirmEmail = sanitizeFormString ($_POST['confirmEmail']);
        $registerPassword = sanitizeFormPassword($_POST['registerPassword']);
        $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);
        
        $wasSuccessful = $account -> register($userName,$firstName,$lastName,$email,$confirmEmail,$registerPassword,$confirmPassword);
        
        if($wasSuccessful)
        {
            //Redirect to different page
            $_SESSION["userLoggedIn"] = $userName;
            header("Location:index.php");
        }
        
    }
?>