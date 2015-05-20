<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';?>
	
	<?php
	if (empty($_POST) === false) {
		if ($_POST['username'] != $user_data['username'] && user_exists($_POST['username']) === true) {
			$errors[] = 'El nom d\'usuari \'' . $_POST['username'] . '\' ja existeix.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){
			$errors[] = 'El nom d\'usuari no pot contenir espais en blanc';
		}
		
		if ($_POST['password_actual'] != '' || $_POST['password'] != '' || $_POST['password_again'] != ''){
			if(md5($_POST['password_actual']) != $user_data['password']){
				$errors[] = 'La contrasenya actual no és correcta';
			} else if ($_POST['password'] != $_POST['password_again']) {
				$errors[] = 'Les contrasenyes no coincideixen';
			} else if (strlen($_POST['password']) < 6) {
				$errors[] = 'La contrasenya hauria de tenir almenys 6 caràcters';
			} else {
				$user_data['password'] = md5($_POST['password']);
			}
			
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'L\'email no és vàlid';
			}
		}
	}
	?>
	
	<h1>Informació personal</h1>
	
	
	<?php
	if (isset($_GET['success']) && $_GET['success']=='yes') {
		echo 'Canvis efectuats correctament';
	}
	
	if (empty($_POST) === false && empty($errors) === true) {
		$data = array(
			"nom" => $_POST['nom'],
			"cognoms" => $_POST['cognoms'],
			"username" => $_POST['username'],
			"password" => $user_data['password'],
			"email" => $_POST['email'],
			"user_id" => $_SESSION['user_id'],
			"mode" => "update"
		);
	echo "<script>loadJSON(".json_encode($data).");</script>";
	header("Refresh: 0; url=user.php?success=yes");
	exit();
	} else if (empty($errors) === false){
		echo output_errors($errors);
	}
	?>

	<form name="ajaxform" id="ajaxform" method="POST">
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
			<input type="password" name="password_actual">
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
			<br><input type="submit" class='btn btn-info' id="simplepost" value="Modificar">
		</li>
	</ul>
</form>
<?php include 'includes/overall/footer.php';?>