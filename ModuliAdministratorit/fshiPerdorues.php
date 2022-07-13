<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$Id_Perdoruesi = $_GET['Id_Perdoruesi'];

//deleting the row from table
$rezultati = mysqli_query($lidh_Perd,"CALL fshijPerdorues ('$Id_Perdoruesi')");

//redirecting to the display page (index.php in our case)
header("Location:fshij_perdorues.php");
?>
