<?php
$db=mysqli_connect ("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");

$navn = $_POST['navn'];
$klassekode = $_POST['klassekode'];
$studiumkode = $_POST['studiumkode'];

/* Isteden for '[value-1]', '[value-2]', '[value-3]', bruk $variabel */
$sqlSetning = "INSERT INTO `klasse`(`klassekode`, `klassenavn`, `studiumkode`) VALUES ('$klassekode','$navn','$studiumkode')";
$sqlResultat=mysqli_query($db,$sqlSetning);

?>

