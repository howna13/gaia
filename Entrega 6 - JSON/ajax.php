<?php
include 'core/init.php';

//$c = $_REQUEST['data'];
$dades = $_REQUEST['data'];
//$location = $_REQUEST['location'];
//$obj = json_decode($json);
//$password = $_REQUEST['password'];
$info = JSON_decode($dades,true);
$meuca = update_user_data($info);
$list = array('nom'=>$meuca);


$c = json_encode($list);

//echo $dades;
echo $c;
?>
