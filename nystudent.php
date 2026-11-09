<?php
$db = mysqli_connect("b-studentsql-1.usn.no", "ceheg4872", "4c41ceheg4872", "ceheg4872");

print("<h1>Registrer student</h1>");

if (isset($_POST['registrer']))
{
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

  
    $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
    $resultat = mysqli_query($db, $sql);

    if (mysqli_num_rows($resultat) > 0)
    {
        print("<p style='color:red;'>Brukernavnet finnes allerede.</p>");
    }
    else
    {
        $sql = "INSERT INTO student
                (brukernavn, fornavn, etternavn, klassekode)
                VALUES
                ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";

        mysqli_query($db, $sql);

        print("<p style='color:green;'>Student registrert.</p>");
    }
}
?>

<form method="post">

    Brukernavn:
    <input type="text" name="brukernavn" required>
    <br><br>

    Fornavn:
    <input type="text" name="fornavn" required>
    <br><br>

    Etternavn:
    <input type="text" name="etternavn" required>
    <br><br>

    Klasse:

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

    <input type="submit" name="registrer" value="Registrer student">

</form>