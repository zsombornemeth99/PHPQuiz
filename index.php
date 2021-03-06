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
        $mennyiHasonlit = 0;
        $ugyanolyan = 0;
        $kerdes = array($_POST["input_a"], $_POST["input_b"], $_POST["input_c"], $_POST["input_d"]);
        for ($i = 0; $i < count($kerdes); $i++) {
            if ($kerdes[$i] == $_POST["input_helyes"]) {
                $mennyiHasonlit++;
            }
            for ($j = 0; $j < $i; $j++) {
                if ($kerdes[$i] == $kerdes[$j]) {
                    $ugyanolyan++;
                }
            }
        }
        if ($mennyiHasonlit == 1 && $ugyanolyan == 0) {
            $sql = "INSERT quiz (kerdes, valasz_A, valasz_B, valasz_C, valasz_D, helyes) 
            VALUES ('".$_POST["input_kerdes"]."',
                    '".$_POST["input_a"]."',
                    '".$_POST["input_b"]."',
                    '".$_POST["input_c"]."',
                    '".$_POST["input_d"]."',
                    '".$_POST["input_helyes"]."')";
            if (mysqli_query($conn, $sql)) {
                echo "Sikeres adatfelvétel!";
            } else {
                echo "Sikertelen adatfelvétel!";
            }
        } else if ($mennyiHasonlit == 0) {
            echo "A helyes válaszra egy válaszlehetőség sem hasonlít!";
        } else if ($mennyiHasonlit > 1) {
            echo "A válaszra csak egy válaszlehetőség hasonlíthat!";
        } else {
            echo "Két ugyanolyan válasz nem lehet!";
        }
    }
    else {
        echo "Valami nincs kitöltve!";
    }
}

/* FELVÉTEL VÉGE */

//Törlés

if (isset($_POST["action"]) && $_POST["action"] == "cmd_delete") 
{
    $sql="DELETE FROM quiz WHERE kerdes_id= ".$_POST['input_id'];
    if (mysqli_query($conn, $sql)) {
        echo "Sikeres törlés!";
    } else {
        echo "Sikertelen törlés!";
    }
}

//Törlés vége

/* LISTÁZÁS KEZDETE */

$sql = "SELECT * FROM quiz";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    echo "<table><tr><th>Kérdés</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Törlés</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>"; ?>
          <td><?php echo $row['kerdes']; ?></td>
          <td id='<?php echo 'valaszA'.$row['kerdes_id']; ?>' style="cursor: pointer;" onclick="helyesE('<?php echo $row['valasz_A']; ?>', '<?php echo $row['helyes']; ?>', '<?php echo 'valaszA'.$row['kerdes_id']; ?>')"><?php echo $row['valasz_A']; ?></td>
          <td id='<?php echo 'valaszB'.$row['kerdes_id']; ?>' style="cursor: pointer;" onclick="helyesE('<?php echo $row['valasz_B']; ?>', '<?php echo $row['helyes']; ?>', '<?php echo 'valaszB'.$row['kerdes_id']; ?>')"><?php echo $row['valasz_B']; ?></td>
          <td id='<?php echo 'valaszC'.$row['kerdes_id']; ?>' style="cursor: pointer;" onclick="helyesE('<?php echo $row['valasz_C']; ?>', '<?php echo $row['helyes']; ?>', '<?php echo 'valaszC'.$row['kerdes_id']; ?>')"><?php echo $row['valasz_C']; ?></td>
          <td id='<?php echo 'valaszD'.$row['kerdes_id']; ?>' style="cursor: pointer;" onclick="helyesE('<?php echo $row['valasz_D']; ?>', '<?php echo $row['helyes']; ?>', '<?php echo 'valaszD'.$row['kerdes_id']; ?>')"><?php echo $row['valasz_D']; ?></td>
            <script>
                function helyesE(valasz, helyesvalasz, id) {
                    if (valasz == helyesvalasz) {
                        document.getElementById(id).style.backgroundColor = "green";
                        document.getElementById(id).style.color = "white";
                    } else {
                        document.getElementById(id).style.backgroundColor = "red";
                        document.getElementById(id).style.color = "white";
                    }
                    setTimeout(function(){ document.getElementById(id).style.backgroundColor = "white"; }, 500);
                    setTimeout(function(){ document.getElementById(id).style.color = "black"; }, 500);
                }
            </script>
        <td><form method="POST">
          <input type="hidden" name="input_id" value="<?php echo $row['kerdes_id']; ?>">
          <input type="hidden" name="action" value="cmd_delete">
          <input type="submit" value="Törlés">
        </form> 
        </td> <?php
        echo "</tr>";
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