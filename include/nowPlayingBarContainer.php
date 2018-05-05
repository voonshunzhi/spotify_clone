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
        
        $('document').ready(function()//All the code under inside the curly brackets will run once the page loads, while the code outside this will not
        {
            currentPlaylist = <?php echo $jsonArray; ?>;
            audioElement = new Audio();
            setTrackOfSong(currentPlaylist[0],currentPlaylist,false);
            updateVolumeProgressBar(audioElement.audio);
            
            //To prevent the other button from being highlishted when dragging mouse in the now playing bar
            //the .on part will detect those events
            $('#nowPlayingBarContainer').on('mousedown mousemove touchdown touchmove',function(e){
                e.preventDefault();
            })
            
            //Dragging the progressbar
            $('.playBackBar .progressBar').mousedown(function()
            {
                mousedown = true;
            })
            
            $('.playBackBar .progressBar').mousemove(function(e)
            {
                if(mousedown)
                    {
                        timefromOffset(e,this);
                    }
            })
            
            $('.playBackBar .progressBar').mouseup(function(e)
            {
                timefromOffset(e,this);
            })
            
            //Dragging the progressVolume bar 
            
            $('.volumeBar .progressBar').mousedown(function()
            {
                mousedown = true;
               
            })
            
            $('.volumeBar .progressBar').mousemove(function(e)
            {
                if(mousedown)
                    {
                        var percentage = e.offsetX / $(this).width();
                        if(percentage >= 0 && percentage <= 1)
                        {
                            audioElement.audio.volume = percentage;
                             
                        }
                    }
            })
            
            $('.volumeBar .progressBar').mouseup(function(e)
            {
                var percentage = e.offsetX / $(this).width();
                if(percentage >= 0 && percentage <= 1)
                {
                    audioElement.audio.volume = percentage;
                }
            })
            
            $(document).mouseup(function()
            {
                mousedown = false;
            })
            
            
        });
    
        
        function timefromOffset(mouse,progressBar)
        {
            //offsetX returns the position of mouse pointer relative to the topleft corner of the selected element(container)
            var percentage = mouse.offsetX / $(progressBar).width() * 100;
            var seconds = audioElement.audio.duration * (percentage/100);
            audioElement.setTime(seconds);
            
        }
    
        function setTrackOfSong(trackId,newPlayList,plays)
        {
            //Making an AJAX call in Jquery
            //1st - the url 2nd - the data you want to send to retrieve data from database(key value pair) 3rd - callback function(what do you want to do with the data retrieved)
            
            currentIndex = newPlayList.indexOf(trackId);
            pauseSong();
            
            $.post('handlers/Ajax/getSongJson.php',{songId:trackId},function(data)
            {
                console.log(data);
                var track = JSON.parse(data);
                console.log(track);
                $('.trackName span').text(track.title);
                
                //Getting the Artist Name via AJAX in Jquery
                $.post('handlers/Ajax/getArtistJson.php',{artistId:track.artist},function(data)
                {
                    var artist = JSON.parse(data);
                    $('.artistName span').text(artist.name);
                });
                
                //Getting the Album Name via AJAX in Jquery
                $.post('handlers/Ajax/getAlbumJson.php',{albumId:track.album},function(data)
                {
                    var album = JSON.parse(data);
                    $('.albumLink img').attr("src",album.artworkPath);
                });
                audioElement.setTrack(track);
            });
            
        }
    
    function playSong()
    {
        if(audioElement.audio.currentTime == 0 )
        {
            $.post('handlers/Ajax/updatePlays.php',{songId:audioElement.currentlyPlaying.id});
            console.log(audioElement.currentlyPlaying.id);
        }
        
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
    
    function nextSong()
    {
        if(repeat == true)
            {
                audioElement.setTime(0);
                playSong();
                return;//Stop the execution of the function
            }
        if(currentIndex == currentPlaylist.length - 1)
            {
                currentIndex = 0;
            }
        else
        {
            currentIndex++;
        }
        
        var trackToPlay = currentPlaylist[currentIndex];
        setTrackOfSong(trackToPlay,currentPlaylist,true);
    }
    
    function setRepeat()
    {
        repeat = !repeat;
        var imageName = repeat? '../assets/img/icons/repeat-active.png' : '../assets/img/icons/repeat.png';
        $('.controlButton.repeat img').attr("src",imageName);
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
                                <span></span>
                            </span>
                            <span class="artistName">
                                <span></span>
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
                             <button class="controlButton next" title="Next Button" onclick="nextSong()">
                            <img src="../assets/img/icons/next.png" alt="next">
                            </button>
                             <button class="controlButton repeat" title="Repeat Button" onclick='setRepeat()'>
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
                                <div class="progressVolume"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>