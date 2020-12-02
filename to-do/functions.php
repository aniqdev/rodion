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

function add_new_task()
{
	$task = db_escape(trim($_POST['task']));

	if($task) db_query("INSERT INTO tasks SET task = '$task', created = NOW()");
}


function mark_as_done()
{
	$id = (int)$_GET['done'];

	db_query("UPDATE tasks SET done = '1' WHERE id = '$id' ");
}


function delete_task()
{
	$id = (int)$_GET['delete'];

	db_query("DELETE FROM tasks WHERE id = '$id' ");
}