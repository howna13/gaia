<?php
include 'core/init.php';
include 'includes/overall/header.php';

logged_in_redirect();

if(empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) === true || empty($password) === true){
		$errors[] = 'Has d\'entrar un nom d\'usuari i contrassenya';
	} else if (user_exists($username) === false) {
		$errors[] = 'No hem trobat l\'usuari, estàs registrat?';
	} else if (user_active($username) === false) {
		$errors[] = 'No has activat el teu compte!';
	} else {
		
		if (strlen($password) > 32){
				$errors[] = 'Password too long';
		}
		
		$user_id = login();

		//echo $username . " " . $password . " " . $user_id;
		if($user_id === false){
			$errors[] = 'Combinació usuari/contrassenya incorrecta';
		} else{
			//echo "MY USER ID ".$user_id; 
			$_SESSION['user_id'] = $user_id;
			//echo "<br>MY SESSION " .$_SESSION['user_id'];
			header('Location: index.php');
			exit();
		}
	}
} else {
	$errors[] = 'No data received';
}

if (empty($errors) === false) {
?>
	<h3>T'hem intentat connectar però...</h3>
<?php
echo output_errors($errors);
}
include 'includes/overall/footer.php';
?>