

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vis klasse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vis klassene</h1>
<?php
include("db-kobling.php");
?>

<?php

/*$sqlSetning = "INSERT INTO `klasse`(`klassekode`, `klassenavn`, `studiumkode`) VALUES ('ØKLED','Økonomi og ledelse','ØKLEDH26')";*/
$sqlSetning = "SELECT * FROM klasse";
$sqlResultat=mysqli_query($db,$sqlSetning);

$antallRader=mysqli_num_rows($sqlResultat);

/*print("Klassen er nå lagt til i databasen <br>");*/

$antallRader=mysqli_num_rows($sqlResultat);

echo "<table border=1>";
echo "<tr>
    <th>Klassekode</th>
    <th>Klassenavn</th>
    <th>Studiumkode</th>
    </tr>";

for ($i=1; $i<=$antallRader; $i++) {
   $rad=mysqli_fetch_array($sqlResultat); 
   $klassekode=$rad["klassekode"];
    $klassenavn=$rad["klassenavn"];
    $studiumkode=$rad["studiumkode"];

   /* print(" $klassekode $klassenavn $studiumkode ");*/

    echo "<tr>";
    echo "<td>$klassekode</td>";
    echo "<td>$klassenavn</td>";
    echo "<td>$studiumkode</td>";
    echo "</tr>";
}
 echo "</table>";
 echo "<br>";
?>
    <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
        <button><a href="visstudent.php">Vis studenter</a></button>
    </div>
</body>
</html>