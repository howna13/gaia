<?php
function username($user_id){
	return mysql_result(mysql_query("SELECT username FROM usuaris WHERE user_id = '$user_id'"),0);
}

function register_user($register_data){
	unset($register_data['mode']);
	array_walk($register_data, array_sanitize());
	$register_data['password'] = md5($register_data['password']);
	//XXAMP
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`' ;
	$data = '\'' . implode('\', \'', $register_data) . '\'' ;
	mysql_query("INSERT INTO `usuaris` ($fields) VALUES ($data)");
	
	//HOSTINGER
	//$fields = implode(', ', array_keys($register_data));
	//$data = '\'' . implode('\', \'', $register_data) . '\'' ;
	//$con = connect_db();
	//$sql = "INSERT INTO usuaris ($fields) VALUES ($data)";
	//mysqli_query($con,$sql);
}

function update_user_data($data){
	$sql = "UPDATE `usuaris` SET `username` = '".$data['username']."',
			`password` = '".$data['password']."', `nom` = '".$data['nom']."',
			`cognoms` = '".$data['cognoms']."', `email` = '".$data['email']."' 
			WHERE `usuaris`.`user_id` = ".$data['user_id'].";";
	mysql_query($sql);
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		//XXAMP
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM usuaris WHERE user_id= $user_id"));
		
		//HOSTINGER
		//$con = connect_db();
		//$fields = implode(', ', $func_get_args);
		//$sql = "SELECT $fields FROM usuaris WHERE user_id= $user_id";
		//$result = mysqli_query($con,$sql);
		//$data = mysqli_fetch_assoc($result);
		//mysqli_free_result($result);
		//disconnect_db($con);
		
		return $data;
	}
}

function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username){
	$username = sanitize($username);
	//XXAMP
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `usuaris` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
	
	//HOSTINGER
	//$con = connect_db();
	//$sql = "SELECT COUNT(user_id) FROM usuaris WHERE username = '$username'";
	//$result = mysqli_query($con,$sql);
	//disconnect_db($con);
	//return ($result == 1) ? true : false;
}

function email_exists($email){
	$username = sanitize($email);
	
	//XXAMP
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `usuaris` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1) ? true : false;
	
	//HOSTINGER
	//$con = connect_db();
	//$sql = "SELECT COUNT(user_id) FROM usuaris WHERE email = '$email'";
	//$result = mysqli_query($con,$sql);
	//disconnect_db($con);
	//return ($result == 1) ? true : false;
}

function user_active($username){
	$username = sanitize($username);
	
	//XXAMP
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `usuaris` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;
	
	//HOSTINGER
	//$con = connect_db();
	//$sql = "SELECT COUNT(user_id) FROM usuaris WHERE username = '$username' AND active = 1";
	//$result = mysqli_query($con,$sql);	
	//disconnect_db($con);
	//return ($result == 1)? true : false;
}

function user_id_from_username($username){
	$username = sanitize($username);
	
	//XXAMP
	return mysql_result(mysql_query("SELECT `user_id` FROM `usuaris` WHERE `username` = '$username'"), 0, 'user_id');
	
	//HOSTINGER
	//$con = connect_db();
	//$sql = "SELECT user_id FROM usuaris WHERE username = '$username'";
	//$id = mysqli_query($con,$sql);
	//disconnect_db($con);
	//return $result;
}

function login(){
	//echo 'password: '.$_POST['password']."<br>username: " . $_POST['username']."<br>".' url: '. $_SESSION['url'];
	$username = sanitize($_POST['username']);
	$user_id = user_id_from_username($username);
	$password = md5($_POST['password']);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `usuaris` WHERE `username` = '$username' AND `password` = '$password'");
	$row = mysql_fetch_array($query);
	$my_info =  $row[0];
	//echo "MY INFO:" . $my_info . "MY USER ID: " . $user_id;
	//XXAMP
	return ($my_info == 1) ? $user_id : false;
	
	//HOSTINGER
	//$con = connect_db();
	//$sql = "SELECT user_id FROM usuaris WHERE username = '$username' AND password = '$password'";
	//$result = mysqli_query($con,$sql);
	//disconnect_db($con);
	//return $result;
}
?>