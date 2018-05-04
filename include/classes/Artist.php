<?php
    //To retrieve data from Artist table in the database
    class Artist
    {
        private $con;
        private $id;
        private $name;
        
        public function __construct($connection,$idd)
        {
            $this -> con = $connection;
            $this -> id = $idd;
        }
        
        public function getArtistName()
        {
            $artistQuery = mysqli_query($this -> con,"SELECT * FROM artists WHERE id = '$this->id'");
            $artist = mysqli_fetch_array($artistQuery);
            $artistName = $artist['name'];
            return $artistName;
        }
    }

?>