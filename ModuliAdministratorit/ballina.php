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

								<section id="first" class="main special">
									<header class="major">
										<h2>MENAXHIMI I TE DHENAVE TE BALLINES</h2>
									</header>
									<ul class="features">
										<li>
											<span class="icon major style3 fa-copy"></span>
											<h4><a href="menaxho_Vendosjen.php">Menaxho Vendosjet</a></h4>
											<p>Forma per menaxhimin e Vendosjeve ne webaplikacion.</p>
										</li>
										<li>
											<span class="icon major style3 fa-copy"></span>
											<h4><a href="menaxho_Chandeliers.php">Menaxho Chandeliers</a></h4>
											<p>Forma per menaxhimin e Chandeliers ne webaplikacion.</p>
										
										</li>
										<li>
											<span class="icon major style3 fa-copy"></span>
											<h4><a href="modifikoTeDhenat.php">Modifiko te dhenat</a></h4>
											<p>Forma per modifikimin e te dhenave ne webaplikacion.</p>
										</li>
									</ul>
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
							