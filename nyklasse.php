<?php
include("db-kobling.php");
?>

<h1>Registrer klasse</h1>
<form method="post" action="nyklasse.php" id="registrerKlasse" name="registrerKlasse">
klassekode: <input type="text" name="klassekode" id="klassekode" required><br>
klassenavn: <input type="text" name="klassenavn" id="klassenavn" required><br>
studiekode: <input type="text" name="studiekode" id="studiekode" required><br>
<input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp">
<input type="reset" value="Nullstill" id="nullstill" name="nullstill"/> <br />
</form>


<?php
if (isset($_POST["registrerKlasseKnapp"])) 
    {
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiekode = $_POST["studiekode"];

if (!$klassekode || !$klassenavn || !$studiekode) 
    {
        print("klassekode, klassenavn og studiekode m&aring; fylles ut");
    }
    else {

include("db-kobling.php");

$sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("Det er ikke mulig &aring; hente data fra databasen");
$antallRader = mysqli_num_rows($sqlResultat);

if
    ($antallRader != 0) 
        {
            print("klasse $klassekode er registrert fra f&oslashr");
        }
        else 
        {
            $sqlSetning ="INSERT INTO klasse VALUES('$klassekode','$klassenavn','$studiekode')";
            mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");

            print("følglgende data er nå registert:$klassekode, $klassenavn og $studiekode");
        
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny klasse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>