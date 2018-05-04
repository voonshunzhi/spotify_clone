<?php
    //Include the config file so thet the session_starts() is included.
    include "config.php";
    include "classes/Artist.php";
    include "classes/Album.php";
    include "classes/Song.php";

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
    <title>Welcome to Spotify!</title>
    <link rel="stylesheet" href="../../CSS_WEB_DESIGN/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Include jquery first before the js file because the linked js file will use jquery library-->
    <script src="../assets/js/script.js"></script>
</head>
<body>
   
    <div id="mainContainer">
           <div id="topContainer">
                <?php 
                    include "navBarContainer.php";
                ?>
                <div id="mainViewContainer">
                    <div id="mainContent">