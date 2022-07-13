<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$Id_kontaktuesi= $_GET['Id_kontaktuesi'];

//deleting the row from table
$rezultati = mysqli_query($lidh_Kont,"CALL fshijKontaktin('$Id_kontaktuesi')");

//redirecting to the display page (index.php in our case)
header("Location:kontakti.php");
?>
