<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';?>
<h3>Habitacions</h3><br>

<?php

$llits = llits_disponibles_hab($dia,$persones,'canigo');
echo "<br>Llits doisponibles a el canigo: " . $llits;?>

<?php include 'includes/overall/footer.php';?>
