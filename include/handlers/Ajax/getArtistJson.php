<?php
    //This is the ajax page
    //Whatever that's ECHO here will be passed back

    include "../../config.php";

    if(isset($_POST['artistId']))
    {
        $artistId = $_POST['artistId'];
        $query = mysqli_query($con,"SELECT * FROM artists WHERE id = '$artistId'");
        
        $result_array = mysqli_fetch_array($query);
        
        echo json_encode($result_array);
    }


?>