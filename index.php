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

/* FELVÉTEL  KEZDETE */

if (isset($_POST["action"]) && $_POST["action"] == "cmd_insert") {
    if (!empty($_POST["input_kerdes"]) &&
    !empty($_POST["input_a"]) &&
    !empty($_POST["input_b"]) &&
    !empty($_POST["input_c"]) &&
    !empty($_POST["input_d"]) &&
    !empty($_POST["input_helyes"]) &&) {
        $sql = "INSERT quiz (kerdes, valasz_A, valasz_B, valasz_C, valasz_D, helyes) 
        VALUES ('".$_POST["input_kerdes"]."',
                '".$_POST["input_a"]."'),
                '".$_POST["input_b"]."'),
                '".$_POST["input_c"]."'),
                '".$_POST["input_d"]."'),
                '".$_POST["input_helyes"]."')";
        if (mysqli_query($conn, $sql)) {
            echo "Sikeres adatfelvétel!";
        } else {
            echo "Sikertelen adatfelvétel!";
        }
    }
    else {
        echo "Valami nincs kitöltve!";
    }
}

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

/* LISTÁZÁS KEZDETE */

/* LISTÁZÁS VÉGE */

?>