<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko_Llambadare']))
{	
	$Id_Llambadari = $_POST['Id_Llambadari'];
	$Brendi=$_POST['Brendi'];
	$Ngjyra=$_POST['Ngjyra'];
	$Id_Vendi=$_POST['Id_Vendi'];		
	$Qmimi=$_POST['Qmimi'];	
	
	$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$Emri_Fotos = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB
	
	// checking empty fields
	if(empty($Brendi) || empty($Ngjyra) || empty($Qmimi)) {	
			
		if(empty($Brendi)) {
			echo "<font color='red'>Fusha Brendit eshte e zbarazet</font><br/>";
		}
		
		if(empty($Ngjyra)) {
			echo "<font color='red'>Fusha Ngjyres eshte e zbarazet</font><br/>";
		}
		if(empty($Qmimi)) {
			echo "<font color='red'>Fusha Qmimit eshte e zbarazet.</font><br/>";
		}		
	} else {	
		//updating the table
		mysqli_query($lidh_Chand, "SET @p_Id_Llambadare=${Id_Llambadari}");
		mysqli_query($lidh_Chand, "SET @p_Brendi='${Brendi}'");
		mysqli_query($lidh_Chand, "SET @p_Ngjyra='${Ngjyra}'");
		mysqli_query($lidh_Chand, "SET @p_Id_Vendi='${Id_Vendi}'");
		mysqli_query($lidh_Chand, "SET @p_Qmimi='${Qmimi}'");
		mysqli_query($lidh_Chand, "SET @p_Foto='${imgData}'");
		mysqli_query($lidh_Chand, "SET @p_Emri_Fotos='${Emri_Fotos}'");
		
		$rezultati=mysqli_query($lidh_Chand,"CALL modifikoLlamadare(@p_Id_Llambadare,@p_Brendi,@p_Ngjyra, @p_Id_Vendi,@p_Qmimi,@p_Foto,@p_Emri_Fotos)");
			//redirectig to the display pProgrami. In our case, it is admin.php
		if($rezultati)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
				header("Location:menaxho_Chandeliers.php");
		}
		else{
				die("Nuk eshte ekzekutuar procedura!");
		}
		
	}
		
}

?>
<?php
//getting ID_Studenti from url
$Id_Llambadari = $_GET['Id_Llambadari'];

//selecting data associated with this particular ID_Studenti
$rezultati = mysqli_query($lidh_Chand,"CALL zgjedhIdLlambadarin('$Id_Llambadari')");

while($rez = mysqli_fetch_array($rezultati))
{
	$Brendi = $rez['Brendi'];
	$Ngjyra = $rez['Ngjyra'];
	$Id_Vendi=$rez['Id_Vendi'];	
	$Qmimi = $rez['Qmimi'];
	$imgData=$rez['Foto'];
	$Emri_Fotos=$rez['Emri_Fotos'];		
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
							<form enctype="multipart/form-data" name="form1" action="modifiko_Llambadare.php" method="post">
							<div class="table-wrapper">
							<table class="alt">
							<thead>
							<tr>
								<select name="Id_Vendi">
									<option selected="selected" required>Zgjedh Vendosjen </option>
								<?php
									$rez=mysqli_query($lidh_Vend,"CALL zgjedhVendin()");
														while($rreshti=$rez->fetch_array())
														{
															?>
															<option value="<?php echo $rreshti['Id_Vendi']; ?>"><?php echo $rreshti['Vendi']; ?></option>
															<?php
														}
														?>
												</select>
												<br/>
												</tr>
											</thead>
												
												<thead>
												<tr> 
													<th>Brendi:</th>
													<td><input type="text" name="Brendi"  value='<?php echo $Brendi;?>'  required ></td>
												</tr>
				

												<tr> 
													<th>Ngjyra:</th>
													<td><input type="text" name="Ngjyra"  value='<?php echo $Ngjyra;?>'  required ></td>
												</tr>
											    <tr> 
												<th>Qmimi:</th>
													<td><input type="text" name="Qmimi"  value='<?php echo $Qmimi;?>'  required ></td>
												</tr>
												
												<tr>
													<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input name="userfile" type="file" /></td>
												</tr>
												

												<tr> 
													<td><input type="hidden" name="Id_Llambadari" value='<?php echo $_GET['Id_Llambadari'];?>' /></td>
													<td><input type="submit" name="modifiko_Llambadare" value="Modifiko" class="primary" ></td>
												</tr>
											</thead>
											</table>
											</div>
									</form>
						</section>
				</div>
					<?php include_once("FundiFaqes.php");	?>
				
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