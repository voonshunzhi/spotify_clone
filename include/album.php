<?php 
    include "header.php";
    include "classes/Artist.php";
    include "classes/Album.php";
    include "classes/Song.php";

    if(isset($_GET['id']))
    {
        $albumId = $_GET['id'];
    }
    else
    {
        header("Location:index.php");
    }

    //Create object out of Album class to use the function stored by the class
    $album = new Album($con,$albumId);
       

    

?>
<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album -> getArtworkPath(); ?>">
    </div>   
    <div class="RightSection">
        <h2><?php echo $album -> getAlbumTitle(); ?> </h2>
        <span>By : <?php //Get artist name 
                echo $album -> getArtistName(); ?></span>
        <h5>Number of songs : <?php echo $album -> getNumberOfSongs(); ?></h5>
        
    </div>  
</div>
<div class="trackListContainer">
   <ul class="trackList">
       
       <?php
       $songIdArray = $album -> getSongIds();
       
       $i = 1;
       foreach($songIdArray as $oneId)
       {
           
            $albumSong = new Song($con,$oneId);
            $albumArtist = $album -> getArtistName();
            
            echo    "<li class='tracklistRow'>
                        <div class='trackCount'>
                        <img class='play' src='../assets/img/icons/play-white.png'>
                        <span class='trackNumber'>".$i."</span>
                        </div>
                        <div class='trackInfo'>
                        <span class='trackName'>".$albumSong -> getTitle(). "</span>
                        <span class='artistName'>".$albumArtist ."</span>
                        </div>
                        <div class='trackOptions'>
                        <img class='optionsButton' src='../assets/img/icons/more.png'>
                        
                        <div class='trackDuration'>
                        <span class='duration'>". $albumSong -> getDuration()."
                        </div>
                        </div>
                    </li>";
           
           $i = $i + 1;
       }
       
       ?>
   </ul>
</div>

<?php include "footer.php";?>