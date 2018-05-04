<?php
    //To retrive data from the Album table in the database
    class Album
    {
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artworkPath;
        
        
        public function __construct($connection,$idd)
        {
            $this -> con = $connection;
            $this -> id = $idd;
            
            $albumQuery = mysqli_query($this -> con,"SELECT * FROM albums WHERE id = '$this->id'");
            $album = mysqli_fetch_array($albumQuery);
            
            $this -> title = $album['title'];
            $this -> artistId = $album['artist'];
            $this -> genre = $album['genre'];
            $this -> artworkPath = $album['artworkPath'];
        }
        
        public function getAlbumTitle()
        {
            return $this -> title;
        }
        
        public function getArtistId()
        {
            return $this -> artistId;
        }
        
        public function getArtistName()
        {
            $artistName = new Artist($this -> con, $this -> getArtistId());
            
            $artistName = $artistName -> getArtistName();
            
            return $artistName;
        }
        
        public function getArtworkPath()
        {
            return $this -> artworkPath;
        }
        
        public function getNumberOfSongs()
        {
            $songQuery = mysqli_query($this -> con,"SELECT * FROM songs WHERE album = '$this->id'");
            $numberOfSongs = mysqli_num_rows($songQuery);
            return $numberOfSongs;
        }
        
        public function getSongIds()
        {
            $songQuery = mysqli_query($this -> con,"SELECT id FROM songs WHERE album = '$this->id' ORDER BY albumOrder ASC");
            
            $array = array();
            
            while($row = mysqli_fetch_array($songQuery))
            {
                array_push($array,$row['id']);
            }
            
            return $array;
        }
    }

?>