<html>
	<head>
		<title>Moduli  Perdoruesit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body class="is-preload">
<?php
//including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['shtoKontakt'])) {	
	$Subjekti = mysqli_real_escape_string($lidh_Kont,$_POST['Subjekti']);
	$Mesazhi = mysqli_real_escape_string($lidh_Kont,$_POST['Mesazhi']);
	$Email = mysqli_real_escape_string($lidh_Kont,$_POST['Email']);
		
	// checking empty fields
	if(empty($Subjekti) || empty($Mesazhi) || empty($Email)) {			
		if(empty($Subjekti)) {echo "<font color='red'>Fusha e Subjektit eshte e zbrazet.</font><br/>";}
		if(empty($Mesazhi)) {echo "<font color='red'>Fusha e Mesazhit eshte e zbrazet.</font><br/>";}
		if(empty($Email)) {echo "<font color='red'>Fusha e Email eshte e zbrazet.</font><br/>";}
		//link to the previous Mesazhi
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$rezultati = mysqli_query($lidh_Kont, "CALL shtoKontakt('$Subjekti','$Mesazhi','$Email')");
		//display success messMesazhi
	//	echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='contact.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'index.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne webaplikacion. Ju lutem pritni 5 sekonda. <b></p>";
	
	}
}
?>
</body>
</html>
