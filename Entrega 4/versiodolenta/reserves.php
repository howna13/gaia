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
   
    <p><b>Comença escribint el nom de l'habitació</b></p><br>
	<form> 
		Habitació <input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggerències: <span id="txtHint"></span></p>
 
	<br>
	<form>
<select name="habitacions" onchange="showHabitacio(this.value)">
  <option value="">Selecciona una habitació:</option>
  <option value="pedraforca">Pedraforca</option>
  <option value="canigo">Canigó</option>
  <option value="peguera">Peguera</option>
  <option value="totes">Totes</option>
  </select>
</form>
<br>
<span id="txtHint2"></span></p>
 
	<?php
 	
 }
?>
</p>




<form action="nova_reserva.php" method="post" style="">

			<br><input class='submit' type="submit" value="nova reserva">
		</li>
	</ul>
</form>





<?php include 'includes/overall/footer.php';?>

