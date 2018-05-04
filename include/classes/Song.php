<?php
//To retrieve data from Song table in the database
class Song
{
    //Variable needed to carry out the function
    private $con;
    private $id;
    //Variable returned fron the function
    private $mysqli_data;
    private $title;
    private $genre;
    private $artistId;
    private $albumId;
    private $duration;
    private $path;
    
    //The functions
    public function __construct($connection,$idd)
    {
        $this -> con = $connection;
        $this -> id = $idd;
        
        $songQuery = mysqli_query($this -> con, "SELECT * FROM songs WHERE id = '$this->id' ORDER BY albumOrder ASC");
        
        $this -> mysqli_data = mysqli_fetch_array($songQuery);
        $this -> title = $this -> mysqli_data['title'];
        $this -> artistId = $this -> mysqli_data['artist'];
        $this -> albumId = $this -> mysqli_data['album'];
        $this -> genre = $this -> mysqli_data['genre'];
        $this -> duration = $this -> mysqli_data['duration'];
        $this -> path = $this -> mysqli_data['path'];
    }
    
    
    public function getTitle()
    {
        return $this -> title;
    }
    public function getArtist()
    {
        return new Artist($this -> con, $this -> artistId);
    }
    public function getAlbum()
    {
        return new Album($this -> con, $this -> albumId);
    }
    public function getGenre()
    {
        return $this -> genre;
    }
    
    public function getDuration()
    {
        return $this -> duration;
    }
    public function getPath()
    {
        return $this -> path;
    }
    
    
    
    
    
}

?>