<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "jobies";

    $con = new mysqli($server, $user, $pass, $db);

    if($con->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
?>