<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';?>
	<h1>Informació personal</h1>
	
	<form action="" method="post">
	<ul id="form">
		<li>
			Nom<br>
			<input type="text" value="<?php echo $user_data['nom']?>" name="nom">
		</li>
		<li>
			<br>Cognoms<br>
			<input type="text" value="<?php echo $user_data['cognoms']?>" name="cognoms">
		</li>
		<li>
			<br>Nom d'usuari<br>
			<input type="text" name="username" value="<?php echo $user_data['username']?>">
		</li>
		<li>
			<br>Contrasenya actual<br>
			<input type="password" name="password">
		</li>
		<li>
			<br>Nova contrasenya<br>
			<input type="password" name="password">
		</li>
		<li>
			<br>Reescriu la nova constrasenya<br>
			<input type="password" name="password_again">
		</li>
		<li>
			<br>Email<br>
			<input type="text" name="email" value="<?php echo $user_data['email']?>">
		</li>
		<li>
			<br><input type="submit" lass='submit' value="Modificar">
		</li>
	</ul>
</form>
<?php include 'includes/overall/footer.php';?>