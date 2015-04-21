<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';

?>
<h3>Reserves</h3>
<p>Gestiona una nova reserva</p>
<br>

<?php

if(empty($_POST) === false){
	$dia = $_POST['dia'];
	$persones = $_POST['persones'];
	if(comprovar_disponibilitat($dia,$persones) === true){
		$places = places_disponibles_per_habitacio($dia,$persones);
 
		header('Location: confirmar_reserva.php');
		exit();
	} else {
		?><br> No hi ha places disponibles pel dia seleccionat<br><?php
	}
}

?>

<form action="" method="post">
	<ul style="margin-left: 40px;" id="reserva">
		<li>
			Persones<br>
			<select name="num_persones">
			<?php
			for ($i=0; $i<=45; $i++)
			{
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
			?>
		</select>
		</li>
		<li>
			<br>Dia<br>
			<input type="text" name="dia" value="dd/mm/aaaa">
		</li>
		<li>
			<br>Menjars<br>
			<!--<input type="checkbox" name="menjars" value="sopar"> Sopar 18€<br>
			<input type="checkbox" name="menjars" value="esmorzar"> Esmorzar 8€<br>
			<input type="checkbox" name="menjars" value="dinar"> Picnic 11€<br>-->
		</li>
				<li>
			<br><input class='submit' type="submit" value="continuar">
		</li>
	</ul>
</form>





<?php include 'includes/overall/footer.php';?>

