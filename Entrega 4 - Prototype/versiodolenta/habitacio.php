<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
<h3>Habitació</h3>
<p>Selecciona una habitació</p><br>

<?php
$errors = array();
$dia = $_GET['dia'];
$persones = $_GET['persones'];

if(empty($_POST) === false){
	$habitacio = $_POST['habitacio'];
	$llits_disponibles = llits_disponibles_habitacio($habitacio,$dia);
	echo "habitacio: ".$habitacio." dia: ".$dia." persones: ".$persones." places disponibles: ".$llits_disponibles;
    //Comprovem que l'habitació seleccionada hi ha llits disponibles
	if ($llits_disponibles >= $persones){
		header('Location: confirmar_reserva.php?dia='.$dia.'&persones='.$persones.'&habitacio='.$habitacio);
		exit();
	}
}

?>


<form action="" method="post">
	<ul><li>
		<select name="habitacio">
			<option value="canigo">Canigó - <?php echo llits_disponibles_habitacio('canigo',$dia);?> llits disponibles de 10</option>
			<option value="peguera">Peguera - <?php echo llits_disponibles_habitacio('peguera',$dia);?> llits disponibles de 20</option>
			<option value="pedraforca">Pedraforca - <?php echo llits_disponibles_habitacio('pedraforca',$dia);?> llits disponibles de 25</option>	
		</select>
	</li>
	<li>
		<br><input class='submit' type="submit" value="continuar">
	</li></ul>
</form>





<?php include 'includes/overall/footer.php';?>