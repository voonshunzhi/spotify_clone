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
    <link rel="stylesheet" href="../../CSS_WEB_DESIGN/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div id="mainContainer">
           <div id="topContainer">
                <div id="navBarContainer">
                    <nav class="navBar">
                        <a href="index.php">
                            <img src="../assets/img/icons/dog_logo%20(2).png" alt="logo"  class="logo">
                        </a>
                        <div class="group">
                            <div class="navItem">
                                <a href="search.php" class="navItemLink">Search
                                <img src="../assets/img/icons/search.png" alt="Search" class="Search"></a>
                            </div>
                        </div>
                        <div class="group">
                            <div class="navItem">
                                <a href="browse.php" class="navItemLink">Browse</a>
                            </div>
                            <div class="navItem">
                                <a href="yourMusic.php" class="navItemLink">Your Music</a>
                            </div>
                            <div class="navItem">
                                <a href="profile.php" class="navItemLink">Reece Kenney</a>
                            </div>
                        </div>
                    </nav>
                </div>
           </div>
            <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
    <!-- span tags in html : much like div but it is inline element rather than block elements, it doesn't really represent something but it is used to group elements like for styling purpose-->
                        <span class="albumLink">
                            <img src="../assets/img/square_pic.jpg" class="albumArtwork">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Best Song Ever</span>
                            </span>
                            <span class="artistName">
                                <span>One Direction</span>
                            </span>
                        </div>
                    </div>
                </div>
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
                        <div class="playBackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button" >
                            <img src="../assets/img/icons/volume.png" alt="Volume" style="width:25px;cursor:pointer;">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</body>
</html>