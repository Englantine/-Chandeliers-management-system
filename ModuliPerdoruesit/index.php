<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once("konfigurimi.php"); ?>
<html>
	<head>
		<title>Moduli Perdoruesit</title>
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
					<?php include_once("MenyPerd.php"); ?>

				<!-- Main -->
					<div id="main">
					
						<!-- Content -->
							<section id="content" class="main">
								<?php 
						$vizitaPerd=1;
						if(isset($_COOKIE["vizitaPerd"])){
							$vizitaPerd=(int)$_COOKIE["vizitaPerd"];
						}$Muaji=2592000+ time();
						//this adds 30 days to the current time
						setcookie("vizitaPerd",date("F jS - g:i a"), $Muaji);
						if(isset($_COOKIE['vizitaPerd'])){
						$Vizita_fundit=$_COOKIE['vizitaPerd']; 
						echo "<p style='text-align:right;'>Vizita juaj e fundit ishte me: ".$Vizita_fundit.".</p>";}
						else
						{
						echo "<p style='text-align:right;'>Vizita juaj e pare ne uebaplikacionin tone! Ju deshirojme mireseardhje!</p>";}
						?>
						
						
								<div class="box alt">
											<div class="row gtr-uniform">
									<?php
											$query = "CALL SelektoChandeliersMP()";
											$rezultati = mysqli_query($lidhu, $query);
											while ($rreshti = mysqli_fetch_assoc($rezultati)) {

											  extract($rreshti);
											  
											  
								if($rezultati==null)
								  mysqli_free_result($rezultati);

											?>
						<!-- Introduction -->
											
											
											<div class="col-4">
												<span class="image fit">
													<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $rreshti['Foto'] ).'">'; ?><br>
													<p style="text-align:center;background-color:#c68a53; color:white;">
													<?php echo $Brendi; ?>,<?php echo $Ngjyra; ?><br><?php echo $Qmimi; ?>$</br><?php echo $Vendi; ?></p></span>
											
											</div>
									<?php } ?>
									
									
												
											</div>
										
								</div>
							
							</section>
					</div>
						<!-- First Section -->
							

				<!-- Footer -->
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