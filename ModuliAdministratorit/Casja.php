<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese username dhe passwordi qe ka shkruar useri ne Index.php gjindet ne db ne MySQL */
	session_start();
	include("konfigurimi.php"); //Establishing connection with our database
	
	$gabim = ""; //Variable for storing our errors.
	if(isset($_POST["Kycja"]))
	{
		if(empty($_POST["Emri"]) || empty($_POST["Fjalekalimi"]))
		{
			$gabim = "Te dy fushat jane te zbrazura.";
		}else
		{
			// Define $username and $password
			$Emri=$_POST['Emri'];
			$Fjalekalimi=MD5($_POST['Fjalekalimi']);
			//MD5($_POST['Fjalekalimi']);
			//Check username and password from database
			$sql="CALL zgjidhPerdoruesin('$Emri','$Fjalekalimi')";
			$rezultati=mysqli_query($lidhu,$sql);
			$rreshti=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['Emri'] = $Emri; // Initializing Session
				header("location: ballina_Admin.php"); // Redirecting To Other Page
			}else
			{
				$gabim = "Emri ose fjalekalimi eshte gabim.";
			}
		}
	}
?>