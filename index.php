<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <style>
        table, th, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        td, th {
            width: 10%;
            height: 50px;
        }
    </style>
</head>
<body>
<form method="POST">
    <input type="text" name="input_kerdes" placeholder="Kérdés"><br>
    <input type="text" name="input_a" placeholder="'A' válasz"><br>
    <input type="text" name="input_b" placeholder="'B' válasz"><br>
    <input type="text" name="input_c" placeholder="'C' válasz"><br>
    <input type="text" name="input_d" placeholder="'D' válasz"><br>
    <input type="text" name="input_helyes" placeholder="Helyes válasz"><br>
    <input type="hidden" name="action" value="cmd_insert">
    <input type="submit" value="Felvétel">
</form> <?php

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
    !empty($_POST["input_helyes"])) {
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

/* FELVÉTEL VÉGE */

/* LISTÁZÁS KEZDETE */

$sql = "SELECT * FROM quiz";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    echo "<table><tr><th>Kérdés</th><th>A</th><th>B</th><th>C</th><th>D</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>".
          "<td>".$row['kerdes']."</td>".
          "<td>".$row['valasz_A']."</td>".
          "<td>".$row['valasz_B']."</td>".
          "<td>".$row['valasz_C']."</td>".
          "<td>".$row['valasz_D']."</td>".
        "</tr>";   
    }   
    echo "</table>";
        
}
else
{
    echo "Nincs adat";
}

/* FELVÉTEL KEZDETE */


/* FELVÉTEL VÉGE */


/* LISTÁZÁS VÉGE */

?>
</body>
</html>