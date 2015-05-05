<?php
session_start();
header('Location: '.$_SERVER['PHP_SELF']);
session_destroy();
?>