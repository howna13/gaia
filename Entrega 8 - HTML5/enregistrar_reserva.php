<?php
include 'core/init.php';

get_query_param('dia');
get_query_param('persones');
get_query_param('habitacio');

protect_page();
	$dia = $_GET['dia'];
	$persones = $_GET['persones'];
	$habitacio = $_GET['habitacio'];
	$sopar = $_GET['sopar'];
	$esmorzar = $_GET['esmorzar'];
	$picnic = $_GET['picnic'];
	$user_id = $_SESSION['user_id']; 
	$username = username($user_id);

	echo "dia :".$dia." persones: ".$persones." habitacio: ".$habitacio." user id: ".$user_id." username: ".$username;
	nova_reserva($username,$dia,$persones,$habitacio,$sopar,$esmorzar,$picnic);
	header('Location: reserves.php');
	exit();	
?>