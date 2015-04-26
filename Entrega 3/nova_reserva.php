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
	
	//Comprovem que el camp persones no és igual a 0
    if ($persones == 0)
    {	
    	$bol_per = false;
    	$errors[] = "El camp persones no pot ser igual a 0";
    } else {
    	$bol_per = true;
    	
    }  

	//Comprovem que la data esta ben escrita
	if (preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$dia))  			   
    {
    	$bol_dia = true;
    } else {
    	$bol_dia = false;
    	$errors[] = "El format de data no és correcte";
    }

    //Si totes les premises es compleixen procedim a fer una nova reserva
    if ($bol_dia===true && $bol_per===true){
    	$errors[] = "DIA : ".$dia." ".booleanToString($bol_dia) ." PERSONES : ".$num_persones." ".booleanToString($bol_per);
		if(comprovar_disponibilitat($dia,$persones) === true){
		 		header('Location: habitacio.php?dia='.$dia.'&persones='.$persones);
		 		exit();
	    } else {
		 	$errors[] = "No hi ha places disponibles pel dia seleccionat";
		}
    }

    echo output_errors($errors);
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
			<input type="text" name="dia" value="dd-mm-aaaa">
		</li>
		<li>
			<br><input class='submit' type="submit" value="continuar">
		</li>
	</ul>
</form>





<?php include 'includes/overall/footer.php';?>

