<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("Verifikimi.php");	
?>
<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifiko_teDhenat']))
{	
	$Id_edhena=$_POST['Id_edhena'];
	$titulli_iTedhenave=$_POST['titulli_iTedhenave'];
	$Pershkrimi_iTedhenave=$_POST['Pershkrimi_iTedhenave'];
	$Skedari_iTedhenave=$_POST['Skedari_iTedhenave'];	
	$PamjaeFaqes=$_POST['PamjaeFaqes'];

	
	// checking empty fields
	if(empty($titulli_iTedhenave) || empty($Pershkrimi_iTedhenave) || empty ($Skedari_iTedhenave) || empty($PamjaeFaqes) ) {	
			
		if(empty($titulli_iTedhenave)) {
			echo "<font color='red'>Fusha e Titullit eshte e zbrazet.</font><br/>";
		}
		if(empty($Pershkrimi_iTedhenave)) {
			echo "<font color='red'>Fusha e Pershkrimit eshte e zbrazet.</font><br/>";
		}
		if(empty($Skedari_iTedhenave)) {
			echo "<font color='red'>Fusha e Skedarit eshte e zbrazet.</font><br/>";
		}
		if(empty($PamjaeFaqes)) {
			echo "<font color='red'>Fusha e Pamjes eshte e zbrazet.</font><br/>";
		}
		
	
	} else {	
	
		mysqli_query($lidh_tedhenat, "SET @p_Id_tedhenat='${Id_edhena}'");
		mysqli_query($lidh_tedhenat, "SET @p_TitulliTedhenave='${titulli_iTedhenave}'");
		mysqli_query($lidh_tedhenat, "SET @p_PershkrimiTedhenave='${Pershkrimi_iTedhenave}'");
		mysqli_query($lidh_tedhenat, "SET @p_SkedariTedhenave='${Skedari_iTedhenave}'");
		mysqli_query($lidh_tedhenat, "SET @p_PamjaeFaqes='${PamjaeFaqes}'");

		$rezultati=mysqli_query($lidh_tedhenat,"CALL modifikoTedhenat(@p_Id_tedhenat,@p_TitulliTedhenave,@p_PershkrimiTedhenave,@p_SkedariTedhenave,@p_PamjaeFaqes)");
		//updating the table
		// $result = mysqli_query($conn,"UPDATE ummo_sherbimi_i_mirmbatjes_se_oborreve SET Emri_sherbimit_te_mirmbatjes='$Emri_sherbimit_te_mirmbatjes',Paisjet_qe_perdoren_per_sherbim='$Paisjet_qe_perdoren_per_sherbim',Id_lloji_sherbimit_per_mirmbatje='$Id_lloji_sherbimit_per_mirmbatje',Foto_sherbimit_te_oborreve='$Foto_sherbimit_te_oborreve',Emri_fotos='$Emri_fotos' WHERE Id_sherbimi_mirmbatjes_oborreve =$Id_sherbimi_mirmbatjes_oborreve");

		//redirectig to the display pProgrami. In our case, it is admin.php
		if($rezultati)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
			header("Location:modifikoTeDhenat.php");
		}
		else{
			die("Nuk eshte ekzekutuar procedura!");
		}
		
	}
}
?>
<?php
//getting ID_Dep from url
$Id_edhena = $_GET['Id_edhena'];

$rezultati = mysqli_query($lidh_tedhenat, "CALL zgjedhIdTedhenen('$Id_edhena')");

//selecting data associated with this particular ID_Dep
while($rez = mysqli_fetch_array($rezultati))
{
	$titulli_iTedhenave = $rez['titulli_iTedhenave'];
	$Pershkrimi_iTedhenave = $rez['Pershkrimi_iTedhenave'];
	$Skedari_iTedhenave = $rez['Skedari_iTedhenave'];
	$PamjaeFaqes = $rez['PamjaeFaqes'];
	

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
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h2>UEBAPLIKACIONI PER MENAXHIMIN E CHANDELIERS</h2>
					</header>

				<!-- Nav -->
					<nav id="nav">
					<ul>
							<li><a href="ballina.php">Ballina</a></li>
							<li><a href="kontakti.php"> Kontakti</a></li>
							<li><a href="Perdoruesit.php">Perdoruesit</a></li>
							<li><a href="Ckycu.php">Ckycu</a></li>
							</ul>
					</nav>

				<!-- Main -->
		<div id="main">

						<!-- Introduction -->
				<section id="content" class="main">
							
									
							<p style="text-align:right;">Përshëndetje, <em><?php  echo $Qasja_perdoruesit;?>!</em></p>
							<form form="form1" method="post" action="modifiko_teDhenat.php">
	
								<h3>Modifiko të dhënat</h3>
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
									Titulli
									<input type="text" name="titulli_iTedhenave" value='<?php echo $titulli_iTedhenave;?>'   required />
									<br>
									Pershkrimi
									
									<textarea name="Pershkrimi_iTedhenave"  rows="10" cols="30"><?php echo $Pershkrimi_iTedhenave;?></textarea>
									<br>
									Emri i file-it
									<input type="text" name="Skedari_iTedhenave" value='<?php echo $Skedari_iTedhenave;?>' />
									<br >
									Pamja e faqes
									<input type="text" name="PamjaeFaqes" value='<?php echo $PamjaeFaqes;?>'   required />
									<br >
									</div>
									<div class="col-12">
									<ul class="actions">
										<li><input type="hidden" name="Id_edhena" value='<?php echo $_GET['Id_edhena'];?>' /></li>
									<li><input type="submit" name="modifiko_teDhenat" value="Modifiko" class="primary"></li>
									</div>
								</div>

		
							</form>


			
			</section>
	</div>
		<footer id="footer">
		<section>
							<h2>Qellimi</h2>
							<p>Qellimi i ketij webaplikacioni qendron ne pasqyrimin e Chandeliers sipas vendosjes se tyre duke perfshire Brendin, Qmimin poashtu edhe  Ngjyren perkatese.</p>
							
				</section>
						<section>
							<h2>Adresa</h2>
							<dl class="alt">
								<dt>Adresa</dt>
								<dd>rr. Zija Shemsiu pn. 60000 Gjilan</dd>
								<dt>Tel</dt>
								<dd>+381 145-000-111</dd>
								<dt>Email</dt>
								<dd>englantiina@gmail.net</dd>
							</dl>
							<ul class="icons">
								<li><a href="https://twitter.com/home" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.facebook.com/" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="https://github.com/" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
								
							</ul>
						</section>
						
					<p class="copyright">&copy; Untitled. Te gjitha te drejtat e rezervuara. Meritat: <a href="https://html5up.net">HTML5 UP</a>. Fotot: <a href="http://unsplash.com">Unsplash</a> </p>
		</footer>

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