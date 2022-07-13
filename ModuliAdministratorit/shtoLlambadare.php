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

if(isset($_POST['shtoLlambadare'])) {	
	$Brendi = $_POST['Brendi'];
	$Ngjyra = $_POST['Ngjyra'];
	$Id_Vendi = $_POST['Id_Vendi'];
	$Qmimi = $_POST['Qmimi'];
	
	
	$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$Emri_Fotos = $_FILES['userfile']['name'];
	
	 $maxsize = 10000000; //set to approx 10 MB
	




 //trigger error
 
$test=5000;
	

	
	
	// checking empty fields
	if(empty($Brendi) || empty($Ngjyra)|| empty($Qmimi)) {
				
		if(empty($Brendi)) {
			echo "<font color='red'>Fusha e Brendit eshte e zbrazet</font><br/>";
		}
		
		if(empty($Ngjyra)) {
			echo "<font color='red'>Fusha e Ngjyres eshte e zbrazet.</font><br/>";
		}
		if(empty($Qmimi)) {
			echo "<font color='red'>Fusha e Qmimit eshte e zbrazet</font><br/>";
		}

	} else { 
			if ($Qmimi>=5000 ){
					trigger_error("<p>Qmimi i Chandeliers nuk duhet te jete me i madhe se 5000. <br> Kthehuni mbrapa për ta përmirsuar të dhënën.</p>");
		// if all the fields are filled (not empty) 
			
		//insert data to database	
			}else{
				
					$rezultati = mysqli_query($lidh_Chand, "CALL shtoLlambadare('$Brendi','$Ngjyra','$Id_Vendi','$Qmimi','$imgData','$Emri_Fotos')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxho_Chandeliers.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne webapliakcion. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
			}
	}
}
?>

</body>
</html>