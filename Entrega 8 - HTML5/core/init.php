<?php
session_start();
error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/reserves.php';

//connect_db();
ob_start();
if (logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'nom', 'cognoms', 'email');
    if (user_active($user_data['username']) === false) {
            session_destroy();
            header('Location: index.php');
            exit();
    }
}

$errors = array();
?>