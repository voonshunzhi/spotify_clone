<?php
    //This is the ajax page
    //Whatever that's ECHO here will be passed back

    include "../../config.php";

    if(isset($_POST['songId']))
    {
        $songId = $_POST['songId'];
        $query = mysqli_query($con,"SELECT * FROM songs WHERE id = '$songId'");
        
        $result_array = mysqli_fetch_array($query);
        
        echo json_encode($result_array);
    }


?>