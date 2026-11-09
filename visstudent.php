<?php

$db=mysqli_connect ("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");


/*$sqlSetning = "INSERT INTO `klasse`(`brukernavn`, `fornavn`, `etternavn`, `klassekode`) VALUES ('ØKLED','Økonomi og ledelse','ØKLEDH26')";*/
$sqlSetning = "SELECT * FROM student";
$sqlResultat=mysqli_query($db,$sqlSetning);

/*print("Student er nå lagt til i databasen <br>");*/

$antallRader=mysqli_num_rows($sqlResultat);

echo "<table border=1>";
echo "<tr>
    <th>Brukernavn</th>
    <th>Fornavn</th>
    <th>Etternavn</th>
    <th>Klassekode</th>
    </tr>";

for ($i=1; $i<=$antallRader; $i++) {
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];

   /* print(" $brukernavn $fornavn $etternavn $klassekode ");*/
    echo "<tr>";
    echo "<td>$brukernavn</td>";
    echo "<td>$fornavn</td>";
    echo "<td>$etternavn</td>";
    echo "<td>$klassekode</td>";
    echo "</tr>";
}
 echo "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vis studnet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
        <button><a href="visklasse.php">Vis klasser</a></button>
    </div>
</body>
</html>