<nav id="nav">	
	<?php
            $rezultati = mysqli_query($lidh_MenyAdm, "CALL TeDhenatMenyAdmin()");
			mysqli_next_result($lidh_MenyAdm);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  echo $Pershkrimi_iTedhenave;
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);
			}
            ?>
</nav>