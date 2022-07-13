		<?php
            $rezultati = mysqli_query($lidh_Fillimi, "CALL TeDhenatFillimi()");
			mysqli_next_result($lidh_Fillimi);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);

            ?>
					<header id="header" class="alt">
						<span class="logo"><img src="<?php echo $Skedari_iTedhenave ?>" alt="" /></span>
						<h2><?php echo $titulli_iTedhenave ?></h2>
					</header>
			<?php } ?>