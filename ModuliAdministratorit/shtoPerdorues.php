<html>
	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body class="is-preload">

<?php
//including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['shtoPerdorues'])) {	
	$Emri = $_POST['Emri'];
	$Fjalekalimi =MD5($_POST['Fjalekalimi']);
	$EmailAdresa = $_POST['EmailAdresa'];
		
	// checking empty fields
	if(empty($Emri) || empty($Fjalekalimi) || empty($EmailAdresa)) {			
		if(empty($Emri)) {echo "<font color='red'>Fusha e Emrit e zbrazet.</font><br/>";}
		if(empty($Fjalekalimi)) {echo "<font color='red'>Fusha e Fjalekalimit e zbrazet.</font><br/>";}
		if(empty($EmailAdresa)) {echo "<font color='red'>Fusha e Email-it e zbrazet.</font><br/>";}
		//link to the previous password
	} else {$EmailAdresa = filter_var($EmailAdresa, FILTER_SANITIZE_EMAIL);
		 if (filter_var($EmailAdresa, FILTER_VALIDATE_EMAIL) === false) {
				echo("$EmailAdresa nuk eshte valide");
				echo"<script>
				setTimeout(function(){
				window.location.href='shto_perdorues.php';
			},5000);
			</script>";
			 echo"<p><b>Ju lutem pritni 5 sekonda deri sa te ktheni ne formen e shtimit te perdoruesit. <b></p>";
			
		} else { 
			echo("$EmailAdresa eshte valide");
		// if all the fields are filled (not empty) 
		//insert data to database	
		$rezultati = mysqli_query($lidh_Perd, "CALL shtoPerdoruesin('$Emri','$Fjalekalimi','$EmailAdresa')");
		//display success messpassword
	echo "<script>
         setTimeout(function(){
            window.location.href = 'Perdoruesit.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne webaplikacion. Ju lutem pritni 5 sekonda. <b></p>";
	
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='perdoruesit.php'>View Result</a>";
		}
	}
}
?>

</body>
</html>
