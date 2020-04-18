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
?>
<form method="POST">
    <input type="text" name="input_kerdes" placeholder="Kérdés"><br>
    <input type="text" name="input_a" placeholder="'A' válasz"><br>
    <input type="text" name="input_b" placeholder="'A' válasz"><br>
    <input type="text" name="input_c" placeholder="'A' válasz"><br>
    <input type="text" name="input_d" placeholder="'A' válasz"><br>
    <input type="text" name="input_helyes" placeholder="Helyes válasz"><br>
    <input type="hidden" name="action" value="cmd_insert">
    <input type="submit" value="Felvétel">
</form> <?php

/* FELVÉTEL VÉGE */

?>