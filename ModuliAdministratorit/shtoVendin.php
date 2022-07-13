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

if(isset($_POST['shtoVendin'])) {	
	$Vendi = $_POST['Vendi'];
	
		
	// checking empty fields
	if(empty($Vendi)) {			
		if(empty($Vendi)) {echo "<font color='red'>Fusha e Vendit eshte e zbrazur.</font><br/>";}
		
		//link to the previous programi
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$rezultati = mysqli_query($lidh_Vend, "CALL shtoVendosje('$Vendi')");
		//display success messprogrami
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxho_Vendosjen.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne webaplikacion. Ju lutem pritni 5 sekonda. <b></p>";
	
	}
}
?>
</body>
</html>