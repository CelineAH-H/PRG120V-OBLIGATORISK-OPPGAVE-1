<?php
   include("db-kobling.php");

   $sqlSetning="SELECT student.brukernavn, studnet.fornavn, student.etternavn, klasse.klassenavn, klasse.klassekode FROM studnet INNER JOIN klasse ON student.klassekode = klasse.klassekode;";
   $sqlResultat=myqli_query($db,$sqlSetning) or die ("Det er ikke mulig &aring; hente data fra databasen");

   print ("<h2> Studenter </h3>");
   print ("<table border=1>");
   print (<tr><th align=left>Brukernavn</th> <th align=left>Fornavn</th> <th align=left>Etternavn</th> <th align=left>Klassenavn</th> <th>Klassekode</th>);

   for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqil_fetch_array($sqlResultat);
        $brukernavn=$rad[0];
        $fornavn=$rad[1];
        $etternavn=$rad[2];
        $klasseNavn=$rad[3];
        $klasseKode=$rad[4];

        print("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klasseNavn </td> <td> $klasseKode</td> </td>");
    }

    print ("</table>");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vis alle studenter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
