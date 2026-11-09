<?php
$db = mysqli_connect("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");

print("<h1>Slett klasse</h1>");

if (isset($_POST['slett'])) {

    $klassekode = $_POST['klassekode'];

    // Sjekk om klassen har studenter
    $sql = "SELECT * FROM student WHERE klassekode='$klassekode'";
    $resultat = mysqli_query($db, $sql);

    if (mysqli_num_rows($resultat) > 0) {
        print("<p style='color:red;'>Kan ikke slette klassen. Det finnes studenter i klassen.</p>");
    }
    else {
        $sql = "DELETE FROM klasse WHERE klassekode='$klassekode'";
        mysqli_query($db, $sql);

        print("<p style='color:green;'>Klassen er slettet.</p>");
    }
}
?>

<form method="post">

    <label>Velg klasse:</label>

    <select name="klassekode">

        <?php
        $sql = "SELECT klassekode FROM klasse";
        $resultat = mysqli_query($db, $sql);

        while ($rad = mysqli_fetch_array($resultat))
        {
            print("<option value='$rad[klassekode]'>$rad[klassekode]</option>");
        }
        ?>

    </select>

    <br><br>

    <input type="submit"
           name="slett"
           value="Slett klasse"
           onclick="return confirm('Er du sikker?')">

</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett klasse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>