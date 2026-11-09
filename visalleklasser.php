<?php
   include("db-kobling.php");

   $sqlSetning="SELECT * FROM klasse;";
   
   $sqlResultat=myqli_query($db,$sqlSetning) or die ("Det er ikke mulig &aring; hente data fra databasen");
   $antallRader=myqli_num_rows($sqlResultat);

   print ("<h2> Registrere klasser </h3>");
   print ("<table border=1>");
   print (<tr><th align=left>klassekode</th> <th align=left> klassenavn</th> <th align=left>studiekode</th> </th>);

   for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqil_fetch_array($sqlResultat);
        $klasseKode=$rad["klasseKode"];
        $klasseNavn=$rad["klassenavn"];
        $studiumKode=$rad["studiumkode"];

        print("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klasseNavn </td> <td> $klasseKode</td> </td>");
    }

    print ("</table>");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vis alle klasser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <div class="knapper">
        <button><a href="index.html">Tilbake til forsiden</a></button>
    </div>
</body>
</html>