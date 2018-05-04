<?php
    //This is the ajax page
    //Whatever that's ECHO here will be passed back

    include "../../config.php";

    if(isset($_POST['albumId']))
    {
        $albumId = $_POST['albumId'];
        $query = mysqli_query($con,"SELECT * FROM albums WHERE id = '$albumId'");
        
        $result_array = mysqli_fetch_array($query);
        
        echo json_encode($result_array);
    }


?>