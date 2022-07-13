<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko_Vendet']))
{	
	$Id_Vendi = $_POST['Id_Vendi'];
	
	$Vendi=$_POST['Vendi'];
	
	
	// checking empty fields
	if(empty($Vendi) ) {	
			
		if(empty($Vendi)) {
			echo "<font color='red'>Fusha e Vendit eshte e zbrazet.</font><br/>";
		}
		
	
	} else {	
				mysqli_query($lidh_Vend, "SET @p_Id_Vendi=${Id_Vendi}");
				mysqli_query($lidh_Vend, "SET @p_Vendi='${Vendi}'");
		//updating the table
		$rezultati = mysqli_query($lidh_Vend,"CALL modifikoVendin(@p_Id_Vendi,@p_Vendi)");
		
		if($rezultati)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
			header("Location:menaxho_Vendosjen.php");
		}
		else{
			die("Nuk eshte ekzekutuar procedura!");
		}
	}
}
?>
<?php
//getting ID_Dep from url
$Id_Vendi = $_GET['Id_Vendi'];

//selecting data associated with this particular ID_Dep
$rezultati = mysqli_query($lidh_Vend,"CALL zgjedhVendinId ('$Id_Vendi')");

while($rez = mysqli_fetch_array($rezultati))
{
	$Vendi = $rez['Vendi'];
	
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
							
							<form  method="post" action="modifiko_Vendet.php">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="Vendi"  value='<?php echo $Vendi;?>'   required />
												</div>
					
											<div>
												<div class="col-12">
													<ul class="actions">
													<input type="hidden" name="Id_Vendi" value='<?php echo $_GET['Id_Vendi'];?>' />
														<li><input type="submit"  name="modifiko_Vendet" value="Modifiko" class="primary" /></li>
													</ul>
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