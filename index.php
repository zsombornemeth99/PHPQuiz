<?php

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nemeth_zsombor";


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");

/* FELVÉTEL KEZDETE */



/* FELVÉTEL VÉGE */

?>