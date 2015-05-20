<?php
function llits_disponibles_hab($dia,$persones){
	$places = array();
	//$a = array('foo' => 'bar'); // when you create
	//$a['Title'] = 'blah'; // later
	$persones = (int) $persones;
	
	$sql = "SELECT COUNT(places) FROM habitacions";
	//$num_refugis = mysql_result(mysql_query($sql),0);
	//echo "NUM REFUGIS :".$num_refugis;
	
	//$sql = "SELECT * FROM habitacions";
	
	
	//for ($i=0;$i<$num_refugis){
	//	$sql = "SELECT places FROM habitacions"
	//	$sql($sql, 'PLACES HABITACIO');
	//	$places_habitacio =
	//}

	echo "<br>DIA: ".$dia."<br>";
	//$places_disponibles = mysql_query("SELECT `places` FROM `habitacions` WHERE `nom` = '$habitacio'");
	//echo "PLACES DISPONIBLES: " . $places_disponibles;
	//while($places_disponibles_hab = mysql_fetch_assoc($places_disponibles)) {
    //echo "<br>>HAB".$places_disponibles_hab;
	//}
	//echo "PLACES DISPONIBLES: " . $places_disponibles;
	//$places_ocupades = mysql_result(mysql_query("SELECT SUM(n_persones) FROM reserves WHERE habitacio = '$habitacio' AND dia = '$dia'"),0);
	//echo "OCUPATS: ".$places_ocupades;
	//return ($places_disponibles); //- $places_ocupades);
	return $places;
}

function comprovar_disponibilitat($dia,$num_persones){
	$places_ocupades = mysql_result(mysql_query("SELECT SUM(`n_persones`) FROM `reserves` WHERE `data` = '$dia'"), 0);
	$places_totals = mysql_result(mysql_query("SELECT SUM(`places`) FROM `habitacions`"), 0);
	$places_disponibles = $places_totals - $places_ocupades;
		
	return ($places_disponibles >= $num_persones) ? true : false ;
}
?>