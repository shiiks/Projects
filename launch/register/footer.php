
 <div class="container"> 
      
      <!-- Footer Link -->
      
      <ul class="foot-link">

			<?php
				
				if($_SERVER['PHP_SELF']=="/index.php")
				{
					?>
        <li><a href="#wrap">Home </a></li>
        <li><a href="#welcome"> Welcome To CELT </a></li>
        <!--<li><a href="#section-5"> Events </a></li>-->
        <!--<li><a href="#gallery"> Gallery </a></li>-->
        <li><a href="#sponsers"> Sponsers </a></li>
        <li><a href="#map"> Location</a></li>
		<?php
				}
				else
				{
					?>
					<li><a href="../index.php">Home </a></li>
					<li><a href="../index.php#welcome"> Welcome To CELT </a></li>
					<!--<li><a href="http://www.celtindia.org/index.php#event"> Events </a></li>-->
					<!--<li><a href="#gallery"> Gallery </a></li>-->
					<li><a href="../index.php#sponsers"> Sponsers </a></li>
					<li><a href="../index.php#map"> Location</a></li>
					<?php
				}
				?>
      </ul>
      <!-- Footer Logo -->
      <div class="foot-logo"> <img src="images/celt logonew.png" alt="CELT 2016" height=153 width=183> </div>
      
      <!-- Footer Logo -->
      <div class="under-footer">
        <ul class="con-info">
          <li>
            <p> <i class="fa fa-map-marker"></i>KIIT University</p>
          </li>
          <li>
            <p> <i class="fa fa-phone"></i>(+91) 8093992761</p>
          </li>
          <li>
            <p> <i class="fa fa-envelope"></i>celtindia@celtindia.org</p>
          </li>
		  <li>
            <p> <i class="fa fa-code" style="font-size:18px;"></i>Developed By : <a href="http://shikhar.honor.es">Shikhar Saran Srivastava</a></p>
          </li>
        </ul>
        <ul class="social-link">
          <li><a href="#.">Facebook </a></li>
          <li><a href="#."> Twitter </a></li>
          <li><a href="#."> Linkedin </a></li>
          <li><a href="#."> instagram </a></li>
        </ul>
      </div>
    </div>
