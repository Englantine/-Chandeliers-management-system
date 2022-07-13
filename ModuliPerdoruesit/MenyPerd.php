<nav id="nav">	
	<?php
            $rezultati = mysqli_query($lidh_Meny, "CALL TeDhenatMenyPerd()");
			mysqli_next_result($lidh_Meny);
            while ($rreshti = mysqli_fetch_assoc($rezultati)) {

              extract($rreshti);
			  echo $Pershkrimi_iTedhenave;
			  
			 if($rezultati==null)
			mysqli_free_result($rezultati);
			}
            ?>
</nav>