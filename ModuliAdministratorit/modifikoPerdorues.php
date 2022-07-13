<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifikoPerdorues']))
{	
	$Id_Perdoruesi = $_POST['Id_Perdoruesi'];
	
	$Emri=$_POST['Emri'];
	$Fjalekalimi=MD5($_POST['Fjalekalimi']);
	$EmailAdresa=$_POST['EmailAdresa'];	
	
	// checking empty fields
	if(empty($Emri) || empty($Fjalekalimi) || empty($EmailAdresa)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Fusha e Perdoruesit eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Fjalekalimi)) {
			echo "<font color='red'>Fusha e Fjalekalimit eshte e zbrazet.</font><br/>";
		}
		
		if(empty($EmailAdresa)) {
			echo "<font color='red'>Fusha e Email eshte e zbrazet.</font><br/>";
		}		
	} else {	
		mysqli_query($lidh_Perd, "SET @p_Id_Perdoruesi=${Id_Perdoruesi}");
		mysqli_query($lidh_Perd, "SET @p_Emri='${Emri}'");
		mysqli_query($lidh_Perd, "SET @p_Fjalekalimi='${Fjalekalimi}'");
		mysqli_query($lidh_Perd, "SET @p_EmailAdresa='${EmailAdresa}'");
		
		$rezultati=mysqli_query($lidh_Perd,"CALL modifikoPerdoruesin(@p_Id_Perdoruesi,@p_Emri,@p_Fjalekalimi,@p_EmailAdresa)");
		
		if($rezultati)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
			header("Location:modifiko_perdorues.php");
		}
		else{
			die("Nuk eshte ekzekutar procedura!");
		}
	}
}
?>
<?php
//getting uid from url
$Id_Perdoruesi = $_GET['Id_Perdoruesi'];

//selecting data associated with this particular uid
$rezultati = mysqli_query($lidh_Perd,"CALL zgjedhIdPerdoruesin('$Id_Perdoruesi')");

while($rez = mysqli_fetch_array($rezultati))
{
	$Emri = $rez['Emri'];
	$Fjalekalimi = $rez['Fjalekalimi'];
	$EmailAdresa = $rez['EmailAdresa'];
}
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

						<!-- Header -->
					<?php include_once("fillimiFaqes.php"); ?>

				<!-- Nav -->
					
					<?php include_once("MenyAdm.php"); ?>
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
					<section id="content" class="main">
							<p style="text-align:right;">Përshëndetje, <em><?php  echo $Qasja_perdoruesit;?>!</em></p>
							
							<form name="form1" action="modifikoPerdorues.php" method="post">
							<h3>Modifiko te dhenat e perdoruesit</h3>
							<div class="row gtr-uniform">
							`<div class="col-6 col-12-xsmall">
		
									Perdoruesi
									<input type="text" name="Emri" value='<?php echo $Emri;?>' />
									<br>
									Fjalekalimi
									<input type="text" name="Fjalekalimi" value='<?php echo $Fjalekalimi;?>' />
									<br>
									Email
									<input type="text" name="EmailAdresa" value='<?php echo $EmailAdresa;?>' />
									<br>
									<input type="hidden" name="Id_Perdoruesi" value='<?php echo $_GET['Id_Perdoruesi'];?>' />
									</div>
									<div class="col-12">
										<ul class="actions">
											<input type="submit" name="modifikoPerdorues" value="Modifiko" class="primary">
									</div>
								</div>
							</form>
						
					</section>
				</div>
					<?php include_once("FundiFaqes.php"); ?>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
								
								
							