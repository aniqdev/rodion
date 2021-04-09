<?php

define('ROOT', __DIR__);
include 'auth_check.php';
include 'classes.php';
include 'functions.php';
// include 'header.php';





if (isset($_GET['action']) && $_GET['action']) {
	$action = $_GET['action'];
	include ROOT . '/' . $action . '.php';
}





	// include __DIR__.'/footer.php';
?>