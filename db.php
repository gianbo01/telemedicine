<?php
    $servername = "localhost";
    $username = "root";
    $pw = "9K7OhpsiJF4LnLOy";

    // Create connection
    $conn = new mysqli($servername, $username, $pw);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Seleziona il database creato
    $conn->select_db("telemedicine");

?>