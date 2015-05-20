<?php
include 'core/init.php';

$dades = $_REQUEST['data'];
$info = JSON_decode($dades,true);

if ($info['mode'] == "update"){
	update_user_data($info);
} else if ($info['mode'] == "register"){
	register_user($info);
}

?>
