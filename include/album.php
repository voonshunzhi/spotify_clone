<?php include "header.php";

    if(isset($_GET['id']))
    {
        $albumId = $_GET['id'];
    }
    else
    {
        header("Location:index.php");
    }

?>






<?php include "footer.php";?>