<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
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
							<h3>SHTO TE DHENAT E CHANDELIERS</h3>
							
							<form enctype="multipart/form-data"  action="shtoLlambadare.php" method="post" name="form1">
									<div class="table-wrapper">
											<table class="alt">
												<tr>
												<select name="Id_Vendi">
													<option selected="selected">Zgjedh Vendosjen</option>
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
												<br />
												</tr>
												
												
												<tr> 
													<td>Brendi</td>
													<td><input type="text" name="Brendi"></td>
												</tr>
						
												<tr> 
													<td>Ngjyra</td>
													<td><input type="text" name="Ngjyra"></td>
												</tr>
											    <tr> 
												<td>Qmimi</td>
													<td><input type="text" name="Qmimi"></td>
												</tr>
												
												<tr>
													<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input name="userfile" type="file" /></td>
												</tr>
												

												<tr> 
													
													<td><input type="submit" name="shtoLlambadare" value="Shto Llambadare" class="primary" ></td>
												</tr>
												
											</table>
											</div>
											</form>
										
											<br/>						
																	
								
									<form action="" method="post">  
										<div class="table-wrapper">
										<table class="alt">
										<tr>
										<h3>KERKO TE DHENAT E CHANDELIERS PER MODIFIKIM OSE FSHIRJE</h3>
										</tr>
										<tr>
											<td>Shkruaj:</td>
											<td><input type="text" name="fjale" placeholder="Brendi" value="%"/></td>
											<td> <input type="submit" value="Kërko" class='button primary' /></td>
										</tr>
										</table>
										</div>
										</form>
									<div class="table-wrapper">
									<table class="alt">
									<thead>
										<tr>
											<td>Brendi</td>
											<td>Ngjyra</td>
											<td>Vendi</td>
											<td>Qmimi</td>
											<td>Foto</td>
											<td>Emri i Fotos</td>
											
											<td>Modifiko</td>
											<td>Fshij</td>
										</tr> 
									</thead>

									<?php
										if (!empty($_REQUEST['fjale'])) {

										$fjale = mysqli_real_escape_string($lidh_Chand,$_REQUEST['fjale']);     

										$sql = mysqli_query($lidh_Chand, "CALL kerkoChandeliers ('$fjale')"); 

										while($rreshti = mysqli_fetch_array($sql)) { 		
												echo "<tr>";
												echo "<td>".$rreshti['Brendi']."</td>";
												echo "<td>".$rreshti['Ngjyra']."</td>";	
												echo "<td>".$rreshti['Vendi']."</td>";	
												echo "<td>".$rreshti['Qmimi']."</td>";	

												
												echo "<td><img src=data:image/jpeg;base64,".base64_encode($rreshti['Foto'])." width='80'  height='100'/></td>";
												echo "<td>".$rreshti['Emri_Fotos']."</td>";
												
												
												echo "<td><a href=\"modifiko_Llambadare.php?Id_Llambadari=$rreshti[Id_Llambadari]\"  class='button primary'>Modifiko</a> </td>";	
												echo "<td><a href=\"fshi_Llambadare.php?Id_Llambadari=$rreshti[Id_Llambadari]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini te dhenen?')\"  class='button primary'>Fshij</a> </td>";			
														
											}

										}

										?>
										</table>
										</div>
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