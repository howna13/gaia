<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';

?>
<h3>Reserves</h3>
<p>
<?php
$username = $user_data['username'];
$num_reserves = num_reserves($username);
 if ($num_reserves == 0){
 	header('Location: nova_reserva.php');
 	exit();
 } else {
   ?>
   
    <p><b>Comença escribint el nom de l'habitació</b></p>
	<form> 
		Habitació <input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggerències: <span id="txtHint"></span></p>
   
   <br />
   <input type="button" value="Amagar" onclick="hideElement();"/>
   <input type="button" value="Mostrar" onclick="showElement();"/>
 
	<?php
 	$sql = get_reserves($username);
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
 }
?>
</p>



<form action="nova_reserva.php" method="post" style="">

			<br><input class='submit' type="submit" value="nova reserva">
		</li>
	</ul>
</form>





<?php include 'includes/overall/footer.php';?>

