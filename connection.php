<?php
    $serverName = "localhost";
    $email = "root";
    $password = "";
    $db_name = "database1";
    $conn = new mysqli($serverName,$email,$password,$db_name);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

    else{
        echo "";
    }
?>