<?php

session_start();

if (isset($_GET['logout'])) {
	unset($_SESSION['user']);
    header("Location: login.php"); 
    die;
}

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); 
    die;
}

