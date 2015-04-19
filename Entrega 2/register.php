<?php 
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';

if (empty($_POST) === false) {
	$required_fields = array('nom','username','password','password_again','email');
	foreach($_POST as $key=>$value){
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = "Els camps marcats amb un asterix són obligatoris";
			break 1;
		}
	}
	
	if (empty($errors) === true){
		if (user_exists($_POST['username']) === true) {
			$errors[] = 'El nom d\'usuari \'' . $_POST['username'] . '\' ja existeix.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){
			$errors[] = 'El nom d\'usuari no pot contenir espais en blanc';
		}
		if (strlen($_POST['password']) < 6 ) {
			$errors[] = 'La contrasenya hauria de tenir almenys 6 caràcters';
		}
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Les contrasenyes no coincideixen';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'L\'email no és vàlid';
		}
		if(email_exists($_POST['email']) === true) {
			$errors[] = 'L\'adressa de correu ' . $_POST['email'] . ' ja està en ús';
		}
		
	}
}
?>

<h3>Registrar-se</h3><br>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'T\'has registrat correctament';
} else {
	if (empty($_POST) === false && empty($erros) === true) {
		$register_data = array(
			'username' 		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'nom' 			=> $_POST['nom'],
			'cognoms' 		=> $_POST['cognoms'],
			'email' 		=> $_POST['email']
		);
		//print_r($register_data);
		register_user($register_data);
		header('Location: register.php?success=');
		exit();
		
	} else if (empty($errors) === false){
		echo output_errors($errors);
	}
?>

<form action="" method="post">
	<ul id="register">
		<li>
			Nom*<br>
			<input type="text" name="nom">
		</li>
		<li>
			<br>Cognoms<br>
			<input type="text" name="cognoms">
		</li>
		<li>
			<br>Nom d'usuari*<br>
			<input type="text" name="username">
		</li>
		<li>
			<br>Constrasenya*<br>
			<input type="password" name="password">
		</li>
		<li>
			<br>Reescriu la constrasenya*<br>
			<input type="password" name="password_again">
		</li>
		<li>
			<br>Email*<br>
			<input type="text" name="email">
		</li>
		<li>
			<br><input class='submit' type="submit" value="Registrar-se">
		</li>
	</ul>
</form>
		
<?php 
}
include 'includes/overall/footer.php';?>