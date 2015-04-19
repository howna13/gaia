<?php
function connect_db(){
	//XAMMP 
	//$connect_error = 'Sorry, we\'re experiencing connection problems';
	//mysql_connect('localhost','root','') or die($connect_error);
	//mysql_select_db('refugi');
	
	//HOSTINGER
	// create the connection to mysql.
	$con = mysqli_connect("mysql.hostinger.es", "u317235263_bru", "bru4791", "u317235263_refug");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $con;
}

function disconnect_db($con) {
	mysqli_close($con);
}

?>