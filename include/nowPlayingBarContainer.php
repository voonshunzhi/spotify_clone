<?php
    $songQuery = mysqli_query($con,"SELECT id FROM songs ORDER BY RAND() LIMIT 10");
    $resultArray = array();
    while($row = mysqli_fetch_array($songQuery))
    {
        array_push($resultArray,$row['id']);
    }
    $jsonArray = json_encode($resultArray);
?>
<script>
    
        $('document').ready(function()//Just to check if the document object is ready, this is beacuse the Jquery might need to access the DOM, so if the javascript is linked at the bottom of the script, this function might not be necessary since the Document object is already ready but if it is place before the <body> tags then this is neccessary because only when the document object is ready the javascript(jquery) can be run 
        {
            currentPlaylist = <?php echo $jsonArray; ?>;
            audioElement = new Audio();
            setTrackOfSong(currentPlaylist[0],currentPlaylist,false)
        });
    
        function setTrackOfSong(trackId,newPlayList,plays)
        {
            audioElement.setTrack('../assets/music/bensound-acousticbreeze.mp3');
            if(plays)
            {
                audioElement.play();
            }
        }
    
    function playSong()
    {
        $('.play').hide();
        $('.pause').show();
        audioElement.play();
        
    }
    
    function pauseSong()
    {
        $('.play').show();
        $('.pause').hide();
        audioElement.pause();
    }
</script>          

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
                            <button class="controlButton pause" title="Pause Button" style="display:none;" onclick="pauseSong()">
                            <img src="../assets/img/icons/pause.png" alt="pause" style="height:32px;width:32px">
                            </button>
                             <button class="controlButton play" title="Play Button" onclick="playSong()">
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