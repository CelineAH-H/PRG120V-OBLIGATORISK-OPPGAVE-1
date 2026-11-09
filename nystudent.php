<?php
include("db-kobling.php");
?>

<h1>Registrer student</h1>
<form method="post" action="nystudent.php" id="registrerSrudnet" name="registrerStudent">
Brukernavn: <input type="text" name="brukernavn" id="brukernavn" required><br>
Fornavn: <input type="text" name="fornavn" id="fornavn" required><br>
Etternavn: <input type="text" name="etternavn" id="etternavn" required><br>
Klassekode: <select id="klassekode" name="klassekode" required>

<?php
$sqlSetning = "SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode";
$sqrResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");

while (
    $rad = mysqli_fetch_array($sqrResultat)
) 
{
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    print("<option value='$klassekode'>$klassekode $klassenavn</option>");
}
?>
</select><br>
<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp">
<input type="reset" value="Nullstill" id="nullstill" name="nullstill"/>; <br/>
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) 
    {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];


if (! ($brukernavn && $fornavn && $etternavn && $klassekode)) 
    {
        print("brukernavn, fornavn, etternavn og klassekode m&aring; fylles ut <br>");
    }
    else {

    $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Det er ikke mulig &aring; hente data fra databasen");
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader != 0) 
        {
            print("student $brukernavn er registrert fra f&oslashr");
        }
        else 
        {
            $sqlSetning ="INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode')";
            mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");
            print("student $brukernavn er n&aring; registrert i databasen");
    }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapper">
        <button><a href="index.html"></a>Tilbake til forsiden</button>
    </div>
</body>
</html>