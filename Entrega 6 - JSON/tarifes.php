<?php 
include 'core/init.php';
include 'includes/overall/header.php';?>
<h3>Tarifes</h3>
<p><br></p>
<table style="margin-left:30px;">
	<tr>
		<td>Pernoctació</td>
		<td>17.00</td>
		<td>€</td>
	</tr>
	
	<tr>
		<td>Sopar (tres plats i postre)</td>
		<td>18.00</td>
		<td>€</td>
	</tr>
	
	<tr>
		<td>Esmorzar</td>
		<td>8.00</td>
		<td>€</td>
	</tr>
	
	<tr>
		<td>Picnic</td>
		<td>11.00</td>
		<td>€</td>
	</tr>
	
	<tr>
	</tr>
	
	<tr>
		<td>Mitja pensió (pernocta, sopar i esmorzar)</td>
		<td>43.00</td>
		<td>€</td>
	</tr>
	
	<tr>
		<td>Pensió Completa UIAA i convenis</td>
		<td>54.00</td>
		<td>€</td>
	</tr>
</table>

<?php if (logged_in() === false){ ?>
<p><br>Recorda que per fer reserves has d'estar <a class="link" href="register.php">registrat</a></p>
<?php } ?>


<?php include 'includes/overall/footer.php';?>