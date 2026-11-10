<?php
include("db-kobling.php");
?>

<?php
print("<h1>Slett student</h1>");


if (isset($_POST['slett'])) {
    $brukernavn = $_POST['brukernavn'];

    $sql = "DELETE FROM student WHERE brukernavn='$brukernavn'";
    mysqli_query($db, $sql);

    print("<p>Studenten er slettet.</p>");
}
?>

<h1>Slett Student</h1>
<form method="post">
    <label>Ny student:</label>

    <select name="brukernavn">
        <?php
        $sql = "SELECT brukernavn FROM student";
        $resultat = mysqli_query($db, $sql);

        while ($rad = mysqli_fetch_array($resultat)) {
            print("<option value='$rad[brukernavn]'>$rad[brukernavn]</option>");
        }
        ?>
    </select>

    <br><br>

    <input type="submit"
           name="slett"
           value="Slett student"
           onclick="return confirm('Er du sikker?')">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>
