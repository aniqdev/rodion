<?php 

if(isset($_POST['items_arr']) && is_array($_POST['items_arr'])){
	file_put_contents(__DIR__.'/data.json', json_encode($_POST['items_arr'],128));
}

if(isset($_POST['action']) && $_POST['action'] === 'get_todo_items'){
	$data = file_get_contents(__DIR__.'/data.json');
	echo $data;
}

