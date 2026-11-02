<?php

$db=mysqli_connect ("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");


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
?>