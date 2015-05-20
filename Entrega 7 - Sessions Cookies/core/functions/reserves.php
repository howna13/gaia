<?php
function nova_reserva($username,$dia,$persones,$habitacio){
	mysql_query("INSERT INTO reserves (habitacio,n_persones,username,dia)
	 			 VALUES ('$habitacio','$persones','$username','$dia')");
}

function cancelar_reserva($n_reserva){
	mysql_query("DELETE FROM reserves WHERE n_reserva = $n_reserva");
}

function llits_disponibles_habitacio($habitacio,$dia){
	$ocupats = mysql_result(mysql_query("SELECT SUM(n_persones) FROM reserves WHERE dia = '$dia' AND habitacio = '$habitacio'"), 0);
	$total = mysql_result(mysql_query("SELECT places FROM habitacions WHERE nom = '$habitacio'"),0);
	$disponibles = $total - $ocupats;
	return $disponibles;
}

function get_reserves($username){
	$num_reserves = num_reserves($username);
	$sql ="SELECT reserves.n_reserva, reserves.dia, reserves.n_persones,reserves.habitacio 
			FROM usuaris
			INNER JOIN reserves
			ON usuaris.username=reserves.username 
			WHERE usuaris.username = '$username'";
return $sql;
}

function get_reserves_hab($username,$habitacio){
	$num_reserves = num_reserves($username);
	$sql ="SELECT reserves.n_reserva, reserves.dia, reserves.n_persones,reserves.habitacio 
			FROM usuaris
			INNER JOIN reserves
			ON usuaris.username=reserves.username 
			WHERE usuaris.username = '$username' AND reserves.habitacio = '$habitacio'";
return $sql;
}

function num_reserves($username){
	$query = mysql_query("SELECT COUNT(`n_reserva`) FROM `reserves` WHERE `username` = '$username'");
	return (mysql_result($query, 0));
}

function comprovar_disponibilitat($dia,$num_persones){
	$places_ocupades = mysql_result(mysql_query("SELECT SUM(`n_persones`) FROM `reserves` WHERE `data` = '$dia'"), 0);
	$places_totals = mysql_result(mysql_query("SELECT SUM(`places`) FROM `habitacions`"), 0);
	$places_disponibles = $places_totals - $places_ocupades;
		
	return ($places_disponibles >= $num_persones) ? true : false ;
}
?>