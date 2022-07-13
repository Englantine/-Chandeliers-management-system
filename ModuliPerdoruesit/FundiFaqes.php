<footer id="footer">

						<?php
            $rezultati = mysqli_query($lidh_Fundi, "CALL TeDhenatAbst()");
			mysqli_next_result($lidh_Fundi);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
						<section>
							<h3><?php echo $titulli_iTedhenave ?></h3>
							<p><?php echo $Pershkrimi_iTedhenave; ?>
							</p>
						</section>
			<?php } ?>
			
												<?php
            $rezultati = mysqli_query($lidh_Fundi, "CALL TeDhenatAdresa()");
			mysqli_next_result($lidh_Fundi);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
						<section>
						
							<?php echo $Pershkrimi_iTedhenave; ?>
						
			<?php } ?>
				<?php
            $rezultati = mysqli_query($lidh_Fundi, "CALL TeDhenatRrSoc()");
			mysqli_next_result($lidh_Fundi);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
						
							<?php echo $Pershkrimi_iTedhenave; ?>
						</section>
			<?php } ?>
			
		<?php
            $rezultati = mysqli_query($lidh_Fundi, "CALL TeDhenatCRight()");
			mysqli_next_result($lidh_Fundi);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  
			  
if($rezultati==null)
  mysqli_free_result($rezultati);

            ?>
					
					
							<?php echo $Pershkrimi_iTedhenave; ?>
					
			<?php } ?>
</footer>