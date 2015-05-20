<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
get_query_param('dia');
get_query_param('persones');
?>
<h3>Habitació</h3>
<p>Selecciona una habitació</p><br>

<?php
$errors = array();
$dia = $_GET['dia'];
$persones = $_GET['persones'];

if(empty($_POST) === false){
	$habitacio = $_POST['habitacio'];
	$sopar = $_POST['sopar'];
	$esmorzar = $_POST['esmorzar'];
	$picnic = $_POST['picnic'];
	$llits_disponibles = llits_disponibles_habitacio($habitacio,$dia);
	echo "habitacio: ".$habitacio." dia: ".$dia." persones: ".$persones." places disponibles: ".$llits_disponibles;
    //Comprovem que l'habitació seleccionada hi ha llits disponibles
	if ($llits_disponibles >= $persones){
		header('Location: confirmar_reserva.php?dia='.$dia.'&persones='.
		$persones.'&habitacio='.$habitacio.'&sopar='.$sopar.'&esmorzar='.
		$esmorzar.'&picnic='.$picnic);
		exit();
	}
}

?>


<form action="" method="post" style="margin-left: 40px;">
	<ul><li>
		<select name="habitacio">
			<option value="canigo">Canigó - <?php echo llits_disponibles_habitacio('canigo',$dia);?> llits disponibles de 10</option>
			<option value="peguera">Peguera - <?php echo llits_disponibles_habitacio('peguera',$dia);?> llits disponibles de 20</option>
			<option value="pedraforca">Pedraforca - <?php echo llits_disponibles_habitacio('pedraforca',$dia);?> llits disponibles de 25</option>	
		</select>
	</li>
	<br>
	<li>
		<style>
		#div1 {width:95px;height:50px;float:left;padding:10px;border:1px solid #aaaaaa;}
		#div2 {width:95px;height:50px;margin-left:10px;float:left;padding:10px;border:1px solid #aaaaaa;}
		</style>
		<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
			<ul>
				<li id="sopar" draggable="true" ondragstart="drag(event)" style="margin-left:10px;">Sopar</li>
				<li id="esmorzar" draggable="true" ondragstart="drag(event)" style="margin-left:10px;">Esmorzar</li>
				<li id="picnic" draggable="true" ondragstart="drag(event)" style="margin-left:10px;">Picnic</li>
			</ul>
		</div>
		<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
			<ul></ul>
		</div>
	</li>
	<br>
	<br>
	<br>
	<br>
	<li>
		<input id="i_sopar" name="sopar" type="text" value="no" style ="visibility: hidden;">
		<input id="i_esmorzar" name="esmorzar" type="text" value="no" style ="visibility: hidden;">
		<input id="i_picnic" name="picnic" type="text" value="no" style ="visibility: hidden;">
		<br><input class='submit' type="submit" value="continuar" style="margin-top:10px;">
	</li></ul>
</form>







<?php include 'includes/overall/footer.php';?>