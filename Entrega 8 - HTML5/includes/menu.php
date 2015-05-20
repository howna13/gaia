<div id="menu">
	<ul>
		<li id="m_benvinguts"><strong><a href="index.php">BENVINGUTS</a></strong></li>
		<li id="m_tarifes"><a href="tarifes.php"><strong>TARIFES</strong></a></li>
		<li id="m_calendari"><a href="calendari.php"><strong>CALENDARI</strong></a></li>
		<?php 
		if (logged_in() === true){
		?>
			<li id="m_reserves"><a href="reserves.php"><strong>RESERVES</strong></a></li>
		<?php
			include 'includes/loggedin.php';
		} else {
			include 'includes/login_menu.php';
		}
		?>
	</ul>
</div>