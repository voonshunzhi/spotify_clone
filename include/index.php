<?php
    //Include the config file so thet the session_starts() is included.
    include "config.php";

    if(isset($_SESSION["userLoggedIn"]))
    {
        $userLoggedIn = $_SESSION["userLoggedIn"];
    }
    else
    {
        header("Location:register.php");
    }

    //NOTE THAT : session_destroy() is used when logging out.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>