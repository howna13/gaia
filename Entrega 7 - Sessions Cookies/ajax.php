<?php
include 'core/init.php';

if($_GET['mode'] == 'json'){
	$dades = $_REQUEST['data'];
	$info = JSON_decode($dades,true);

	if ($info['mode'] == "update"){
		update_user_data($info);
	} else if ($info['mode'] == "register"){
		register_user($info);
	}
} else if ($_GET['mode'] == 'xml') {
	$data = user_data($_SESSION['user_id'], 'username', 'nom', 'cognoms', 'email');
	//XML
	$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	
	$xml .= "<USER>";

	$xml .= "<USERNAME>" . $data['username'] . "</USERNAME>";
	$xml .= "<NOM>" . $data['nom'] . "</NOM>";
	$xml .= "<COGNOMS>" . $data['cognoms'] . "</COGNOMS>";
	$xml .= "<EMAIL>" . $data['email'] . "</EMAIL>";
 
	$xml .= "</USER>";

	echo $xml;
} else if ($_GET['mode'] == 'reserva'){
	cancelar_reserva($_POST['n_res']);
}


?>
