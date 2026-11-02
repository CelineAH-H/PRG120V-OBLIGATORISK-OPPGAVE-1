<?php

$db=mysqli_connect ("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");


/*$sqlSetning = "INSERT INTO `klasse`(`brukernavn`, `fornavn`, `etternavn`, `klassekode`) VALUES ('ØKLED','Økonomi og ledelse','ØKLEDH26')";*/
$sqlSetning = "SELECT * FROM student";
$sqlResultat=mysqli_query($db,$sqlSetning);

print("Student er nå lagt til i databasen <br>");

$antallRader=mysqli_num_rows($sqlResultat);


for ($i=1; $i<=$antallRader; $i++) {
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];

    print(" $brukernavn $fornavn $etternavn $klassekode ");
}

?>