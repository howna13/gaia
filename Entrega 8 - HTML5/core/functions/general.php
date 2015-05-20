<?php

function get_query_param($name) {
	if (!isset($_GET[$name])) {
		header("HTTP/1.1 400 Invalid Request");
		die("HTTP/1.1 400 Invalid Request: falta el parametro necesario '$name'");
	}
	if ($_GET[$name] == "") {
		header("HTTP/1.1 400 Invalid Request");
		die("HTTP/1.1 400 Invalid Request: el parametro '$name'	debe ser rellenado");
	}
	return $_GET[$name];
}

function sql($query){
	echo "<br>SQL: <br>".$query."<br>";
}

function sql_arg($query,$text){
	echo "<br>SQL ".$text.": <br>".$query."<br>";
}

function loggout_redirect(){
	session_start();
	header('Location: '.$_SERVER['PHP_SELF']);
	session_destroy();
}
function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}

function protect_page(){
	if (logged_in() === false){
		header('Location: protected.php');
		exit();
	}
}

function array_sanitize(&$item) {
	//XXAMP
	$item = mysql_real_escape_string($item);
	//HOSTINGER
	//$item = mysql_real_escape_string(connect_db,$item);
}

function sanitize($data) {
	//XXAMP
	return mysql_real_escape_string($data);
	
	//HOSTINGER
	//$con = connect_db();
	//$data = mysqli_real_escape_string($con, $data);
	//disconnect_db();
	//return $data;
}

function output_errors($errors){
	return '<br><ul><li>' . implode('</li><li>', $errors) . '</ul><br>';
}

function possibleFalseToString($false){
	($false===false)?'false':$false;
}

function booleanToString($boolean){
	return($boolean === true)?'true':'false';
}
?>