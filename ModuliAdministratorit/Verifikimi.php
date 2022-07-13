<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$Verifikimi_perdoruesit=$_SESSION['Emri'];
$ses_sql = mysqli_query($lidhu,"CALL kontrolloPerdoruesin('$Verifikimi_perdoruesit') ");
$rreshti=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$Qasja_perdoruesit=$rreshti['Emri'];
if(!isset($Verifikimi_perdoruesit))
{ 
	header("Location: index.php");
} 
?>