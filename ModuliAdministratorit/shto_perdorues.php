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
							
							
								
										<h2>SHTO TE DHENAT E PERDORUESIT</h2>
										<form method="post" action="shtoPerdorues.php">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="Emri" id="Emri" value="" placeholder="Perdoruesi" />
													</br>
													<input type="password" name="Fjalekalimi" id="Fjalekalimi" value="" placeholder="Fjalekalimi" />
													</br>
													<input type="email" name="EmailAdresa" id="EmailAdresa" value="" placeholder="Email" />
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit"  name="shtoPerdorues" value="SHTO" class="primary" /></li>
													</ul>
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
		