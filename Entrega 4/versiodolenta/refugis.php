<form action="" method="post">
	<ul style="margin-left: 40px;" id="reserva">
		<li>
			El Canigó (10 places)<br>
			<select name="num_persones">
			<?php
			for ($i=0; $i<=llits_disponibles_hab('El Canigó'); $i++)
			{
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
			?>
		</select>
		</li>
		<li>
			El Peguera (20 places)<br>
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
			Les Agulles (25 places)<br>
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
			<br><input class='submit' type="submit" value="continuar">
		</li>
	</ul>
</form>