<?php
    $servername = "localhost";
    $username = "root";
    $pw = "9K7OhpsiJF4LnLOy";
    $dbname = "telemedicine";

    // Create connection
    $conn = new mysqli($servername, $username, $pw, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //else{
    //    echo("Connection Succesfull");
    //}
?>