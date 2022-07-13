<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
?>
<?php
//including the database connection file
include_once("konfigurimi.php");
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

							<form action="" method="post">  
							<div class="table-wrapper">
								<table class="alt">
								<tr>
								<h3>KERKO TE DHENAT PER MODIFIKIM</h3>
								</tr>
								<tr>

									<td>Shkruaj:</td>
									
									<td><input type="text" name="fjale" placeholder="Titullit ose Pamjes se faqes" value="%"/></td>
								
									<td> <input type="submit" value="Kërko" class="primary" /></td>
								</tr>
								</table> 
							</div>
							</form> 

						<div class="table-wrapper">
						<table class="alt">
							<thead>
							<tr>
								<th>Titulli</th>
								<th>Pershkrimi</th>
								<th>Skedari</th>
								<th>Pamja e faqes</th>
								<th>Modifiko</th>
							</tr>
						</thead>	
									<?php
									if (!empty($_REQUEST['fjale'])) {
									$fjale = mysqli_real_escape_string
									($lidh_tedhenat,$_REQUEST['fjale']);     
									$sql = mysqli_query($lidh_tedhenat,
									"CALL kerkoTeDhena('$fjale')"); 
									while($rreshti = mysqli_fetch_array($sql)) { 		
											echo "<tr>";
											echo "<td>".$rreshti['titulli_iTedhenave']."</td>";
											echo "<td>".$rreshti['Pershkrimi_iTedhenave']."</td>";
											echo "<td>".$rreshti['Skedari_iTedhenave']."</td>";	
											echo "<td>".$rreshti['PamjaeFaqes']."</td>";	
											echo "<td><a href=\"modifiko_teDhenat.php?Id_edhena=$rreshti[Id_edhena]\" class='button primary'>
											Modifiko</a></td></tr>";		
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
	