<?php
include 'core/init.php';
protect_page();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
	$q = $_GET['q'];
	$username = $user_data['username'];
	$sql = get_reserves_hab($username,$q);
	$result = mysql_query($sql);
	$fields_num = mysql_num_fields($result);
	echo "<table id=\"taula_reserves\"><tr>
			<th>Dia</th>
			<th>Persones</th>		
			<th>Habitació</th>
		  </tr>";

	 //imprimim les files de la taula 
	 while($row = mysql_fetch_row($result))
	 {
		 echo  "<tr>";

		 foreach($row as $cell)
			 echo "<td>$cell</td>";

		 echo "</tr>\n";
	 }

	 echo "</table>";

	 mysql_free_result($result);
?>
   <table><tr><td><input type="button" value="Amagar" onclick="hideElement();"/></td>
   <td></td>
   <td><input type="button" value="Mostrar" onclick="showElement();"/></td></tr>
   </table>
</body>
</html>
