<?php
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
	return '<ul><li>' . implode('</li><li>', $errors) . '</ul><br>';
}

function possibleFalseToString($false){
	($false===false)?'false':$false;
}

function booleanToString($boolean){
	return($boolean === true)?'true':'false';
}
?>