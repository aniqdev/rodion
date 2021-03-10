<?php

define('ROOT', __DIR__);
include 'auth_check.php';
include 'classes.php';
include 'functions.php';
include 'event-handler.php';
include 'header.php';





if (isset($_GET['action']) && $_GET['action']) {
	$action = $_GET['action'];
	$file_name = ROOT . '/' . $action . '.php';
	if (file_exists($file_name)) {
		include $file_name;
	}else{
		include ROOT . '/404.php';
	}
}else{
	include ROOT . '/home.php';
}





	include __DIR__.'/footer.php';
?>