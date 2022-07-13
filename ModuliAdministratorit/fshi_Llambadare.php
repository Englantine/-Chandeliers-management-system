<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$Id_Llambadari = $_GET['Id_Llambadari'];

//deleting the row from table
$rezultati = mysqli_query($lidh_Chand,"CALL fshijLlambadare('$Id_Llambadari')");

//redirecting to the display page (index.php in our case)
header("Location:menaxho_Chandeliers.php");
?>