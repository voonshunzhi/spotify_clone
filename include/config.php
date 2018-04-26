<?php 
    //Turn on output buffering 
    //Think of ob_start() as saying "Start remembering everything that would normally be outputted(eg: echo), but don't quite do anything with it yet."
    //Because the output might be altered, the web server would always wait for those scripts to run till rhe end before it sends the output. 
    ob_start();

    session_start();

    $timezone = date_default_timezone_set("Asia/Kuala_Lumpur");
    
    $con = mysqli_connect("localhost","root","Shunzhivoon112893332030","spotify");

    if(mysqli_connect_errno())
    {
        echo "Failed to connect :" . mysqli_connect_errno();
    }
?>