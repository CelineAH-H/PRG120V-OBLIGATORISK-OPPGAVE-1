<?php
$db=mysqli_connect ("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");

$navn = $_POST['navn'];
$klassekode = $_POST['klassekode'];
$studiumkode = $_POST['studiumkode'];

/* Isteden for '[value-1]', '[value-2]', '[value-3]', bruk $variabel */
$sqlSetning = "INSERT INTO `klasse`(`navn`, `klassenavn`, `studiumkode`) VALUES ('$klassekode','$navn','$studiumkode')";
$sqlResultat=mysqli_query($db,$sqlSetning);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny klasse</title>
</head>
<body>
    <h2>Klasse registrert</h2>
    <p>Klassen har blitt registrert i databasen.</p>
</body>
</html>