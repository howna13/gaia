<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';

get_query_param('dia');
get_query_param('persones');
get_query_param('habitacio');

$dia = $_GET['dia'];
$persones = $_GET['persones'];
$habitacio = $_GET['habitacio'];
$sopar = $_GET['sopar'];
$esmorzar = $_GET['esmorzar'];
$picnic = $_GET['picnic'];
$link = 'enregistrar_reserva.php?dia='.$dia.'&persones='.$persones.'&habitacio='.
		$habitacio.'&sopar='.$sopar.'&esmorzar='.$esmorzar.'&picnic='.$picnic;
?>


<h3>Confirmar Reserva</h3><br>
<p>Detalls de la seva sol·licitud de reserva</p><br>

<?php
if(empty($_POST) === false){
	echo "confirmes la reserva";
}
?>


<table>
	<tr>
	    <th>Dia</th>
	    <th>Persones</th>		
	    <th>Habitació</th>
		<th>Sopar</th>
		<th>Esmorzar</th>
		<th>Picnic</th>
  	</tr>
	<tr>
		<td><?php echo $dia;?></td>
		<td><?php echo $persones;?></td>		
		<td><?php echo $habitacio;?></td>
		<td><?php echo $sopar;?></td>
		<td><?php echo $esmorzar;?></td>
		<td><?php echo $picnic;?></td>
	</tr>
	<tr>
		<td>
			<form action="<?php echo $link ?>" method="post" >

						<br><input class='submit' type="submit" value="confirmar">
					</li>
				</ul>
			</form>
		</td>
		<td>
		</td>
		<td>
			<form action="reserves.php" method="get">

						<br><input class='submit' type="submit" value="cancelar">
					</li>
				</ul>
			</form>
		</td>
	</tr>
</table>


<?php include 'includes/overall/footer.php';?>
