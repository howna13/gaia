<form action="login.php" method="post">
	<div id="m_login">
		<li id="text">
			Usuari
		</li>
		<li id="casella">
			<input type="text" style="width:100px;" name="username">
		</li>
		<li id="text">
			Constrasenya 
		</li>
		<li id="casella">
			<input type="password" style="width:100px;" name="password">
		</li>
		<li id="submit">
			<input type="submit" class='submit' style="font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif;" value="Entrar">
		</li>
		<?php
		if (isset($_GET['success']) === false){
		?>
		<li id="text">
			<a href="register.php" >Registrar-se</a>
		</li>
		<?php
		}
		?>
	</div>
</form>
