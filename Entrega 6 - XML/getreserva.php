<?php
include 'core/init.php';
protect_page();
?>

<?php
	$habitacio = $_GET['habitacio'];
	$username = $user_data['username'];
	if ($habitacio == 'totes'){
		$sql = get_reserves($username);
	}else {
		$sql = get_reserves_hab($username,$habitacio);
	}
	$result = mysql_query($sql);
	
	//XML
	$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$xml         .= "<RESERVES>"; //reserves
	
	if(mysql_num_rows($result)>0)
	{
	   while($result_array = mysql_fetch_assoc($result))
	   {
		  $xml .= "<RESERVA>";
	 
		  //loop through each key,value pair in row
		  foreach($result_array as $key => $value)
		  {
			 //$key holds the table column name
			 $xml .= "<".strtoupper($key).">";
	 
			 //embed the SQL data in a CDATA element to avoid XML entity issues
			 $xml .= "$value";
	 
			 //and close the element
			 $xml .= "</".strtoupper($key).">";
		  }
	 
		  $xml .= "</RESERVA>";
	   }
	}
	$xml .= "</RESERVES>";
	echo $xml;
	mysql_free_result($result);
?>
