<?php


define('db_HOST', 'localhost');
define('db_USER', 'root');
define('db_PASS', '');
define('db_NAME', 'test_db');


function db_query($query = '')
{
	if(!$query) return [];
	if (stripos($query, 'select') === 0 || stripos($query, 'show') === 0 || stripos($query, 'describe') === 0) {
		return DB::getInstance()->get_results($query);
	}else{
		return DB::getInstance()->query($query);
	}
}


function db_escape($string = '')
{
	return DB::getInstance()->escape($string);
}


function hash_password($password)
{
	return password_hash('#$%^&*'.$password, PASSWORD_DEFAULT);
}


function check_password($password, $hash)
{
	return password_verify('#$%^&*'.$password, $hash);
}
