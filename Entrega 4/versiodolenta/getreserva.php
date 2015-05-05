<?php
include 'core/init.php';
?> 
protect_page();

<?php
	$habitacio = $_GET['habitacio'];
	$username = $user_data['username'];
	if ($habitacio == 'totes'){
		$sql = get_reserves($username);
	}else {
		$sql = get_reserves_hab($username,$habitacio);
	}
	$result = mysql_query($sql);
	$fields_num = mysql_num_fields($result);
	?>
	
	<table id="taula_reserves"><tr>
			<th>Dia</th>
			<th>Persones</th>		
			<th>Habitació</th>
		  </tr>
	<?php
	 //imprimim les files de la taula 
	 while($row = mysql_fetch_row($result))
	 {
		 echo  "<tr>";

		 foreach($row as $cell)
			 echo "<td align=\"center\">$cell</td>";

		 echo "</tr>\n";
		 mysql_free_result($result);
	 }
	 ?>

	 </table>

   <button>Amaga</button>
</body>
</html>
