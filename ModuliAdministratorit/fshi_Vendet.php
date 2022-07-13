<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$Id_Vendi = $_GET['Id_Vendi'];

//deleting the row from table
$rezultati = mysqli_query($lidh_Vend,"CALL fshijVend('$Id_Vendi')");

//redirecting to the display page (index.php in our case)
header("Location:menaxho_Vendosjen.php");
?>