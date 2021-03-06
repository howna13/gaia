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
	
	<p id="canvis"></p>
	<?php
	
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
	echo "<script>updateUser();</script>";

	} else if (empty($errors) === false){
		echo output_errors($errors);
	}
	?>
	<table><tr><td>
	<form name="ajaxform" id="ajaxform" method="POST">
	<ul id="form">
		<li>
			Nom<br>
			<input type="text" id ="nom" value="<?php echo $user_data['nom']?>" name="nom">
		</li>
		<li>
			<br>Cognoms<br>
			<input type="text" id="cognoms" value="<?php echo $user_data['cognoms']?>" name="cognoms">
		</li>
		<li>
			<br>Nom d'usuari<br>
			<input type="text" id="username" name="username" value="<?php echo $user_data['username']?>">
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
			<input type="text" id="email" name="email" value="<?php echo $user_data['email']?>">
		</li>
		<li>
			<br><input type="submit" class='btn btn-info' id="simplepost" value="Modificar">
		</li>
	</ul>
</form>
</td><td>
<div id="map-canvas" style="height: 375px; width: 550px;margin-left:100px;margin-top:20px;"></div>

<button id="boto" style="margin-left:330px;margin-top:10px;" onclick="getLocation()">Coordenades</button>

<p style="opacity: 0%; margin-left:300px;margin-top:10px;" id="coordenades"></p>

<script>
var x = document.getElementById("coordenades");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	$("#boto").remove();
	$("#coordenades").fadeIn("slow");

	x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>


</td></tr></table>
<br><br>
<img onclick="changeFoc()" class="centered" src="img/flama.png" alt="Refugi Gaia 2310 m">
<span id="txtHint2"></span></p>
<?php include 'includes/overall/footer.php';?>