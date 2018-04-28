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
    <title>Welcome to Spotify!</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft"></div>
            <div id="nowPlayingCenter">
                <div class="content playerControls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle Button">
                        <img src="../assets/img/icons/shuffle.png" alt="Shuffle">
                        </button>
                         <button class="controlButton previous" title="Previous Button">
                        <img src="../assets/img/icons/previous.png" alt="previous">
                        </button>
                        <button class="controlButton pause" title="Pause Button" style="display:none;">
                        <img src="../assets/img/icons/pause.png" alt="pause" style="height:32px;width:32px">
                        </button>
                         <button class="controlButton play" title="Play Button">
                        <img src="../assets/img/icons/play.png" alt="play" style="height:32px;width:32px">
                        </button>
                         <button class="controlButton next" title="Next Button">
                        <img src="../assets/img/icons/next.png" alt="next">
                        </button>
                         <button class="controlButton repeat" title="Repeat Button">
                        <img src="../assets/img/icons/repeat.png" alt="repeat">
                        </button>
                    </div>
                </div>
            </div>
            <div id="nowPlayingRight"></div>
        </div>
    </div>
    
    
</body>
</html>