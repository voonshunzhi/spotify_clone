<?php
    //This is the ajax page
    //Whatever that's ECHO here will be passed back

    include "../../config.php";

    if(isset($_POST['songId']))
    {
        $songId = $_POST['songId'];
        
        $query = mysqli_query($con, "UPDATE songs SET plays = plays + 1 WHERE id = '$songId'");
    }
        
        ?>