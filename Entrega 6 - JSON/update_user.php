<?php
include 'core/init.php';

$dades = $_REQUEST['data'];
$info = JSON_decode($dades,true);
update_user_data($info);

?>
