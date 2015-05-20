<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';

?>
<h3>Reserves</h3>
<p>Gestiona una nova reserva</p>
<br>

<?php
$errors = array();

if(empty($_POST) === false){
	$dia = $_POST['dia'];
	$persones = $_POST['num_persones'];

	//Comprovem que la data esta ben escrita
	if (preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$dia))  			   
    {
    	$bol_dia = true;
    } else {
    	$bol_dia = false;
    	$errors[] = "El format de data no és correcte";
    }

    //Si la data es correcta procedim a comprovar la disponibilitat
    if ($bol_dia===true){
    	//$errors[] = "DIA : ".$dia." ".booleanToString($bol_dia) ." PERSONES : ".$num_persones;
		if(comprovar_disponibilitat($dia,$persones) === true){
		 		header('Location: habitacio.php?dia='.$dia.'&persones='.$persones);
		 		exit();
	    } else {
		 	$errors[] = "No hi ha places disponibles pel dia seleccionat";
		}
    }
    echo output_errors($errors)."<br>";
}

?>

<form action="" method="post">
	<ul style="margin-left: 40px;" id="reserva">
		<li>
			Persones<br>
			<select name="num_persones" title="Indicans quantes persones sereu">
			<?php
			for ($i=1; $i<=45; $i++)
			{
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
			?>
		</select>
		</li>
			<br>Dia<br>
		<li>
			<input type="text" title="Escull un dia" id="datepicker" name="dia" placeholder="dd-mm-aaaa">
		</li>
		<li>
			<br><input class='submit' title="Continuar i sel·leccionar habitació" type="submit" value="continuar">
		</li>
	</ul>
</form>





<?php include 'includes/overall/footer.php';?>

