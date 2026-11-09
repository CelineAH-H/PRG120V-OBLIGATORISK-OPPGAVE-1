
<?php
$db = mysqli_connect("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");

print("<h1>Slett student</h1>");


if (isset($_POST['slett'])) {
    $brukernavn = $_POST['brukernavn'];

    $sql = "DELETE FROM student WHERE brukernavn='$brukernavn'";
    mysqli_query($db, $sql);

    print("<p>Studenten er slettet.</p>");
}
?>

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