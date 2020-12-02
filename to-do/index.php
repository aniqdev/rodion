<?php
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

// print_r($_POST);

if (isset($_POST['task'])) {
	add_new_task();
}
if (isset($_GET['done'])) {
	mark_as_done();
	header('Location: '.$_SERVER['PHP_SELF']);
}
if (isset($_GET['delete'])) {
	delete_task();
	header('Location: '.$_SERVER['PHP_SELF']);
}
// print_r($_SERVER);
$tasks = db_query("SELECT * FROM tasks ORDER BY id DESC");

// print_r($tasks);

// print_r($_GET);

?>
</pre>


<div class="container">
	<form method="POST">
		<div class="input-group mb-3">
		  <input name="task" type="text" class="form-control" placeholder="New task" aria-label="Recipient's username" aria-describedby="button-addon2">
		  <div class="input-group-append">
		    <button class="btn btn-primary" type="submit" id="button-addon2">Button</button>
		  </div>
		</div>
	</form>
	<ul class="list-group">
		<?php foreach ($tasks as $task) {
			echo '<li class="list-group-item">';
			echo '<a href="?done='.$task['id'].'" class="fa fa-check-square" style="margin-right:10px;"></a> ';
			if($task['done'] === '1') echo '<s>'.$task['task'].'</s>';
			else echo $task['task'];
			echo ' <a href="?delete='.$task['id'].'" onclick="return confirm(\'are you sure?\')" class="fa fa-minus-circle" style="float:right;color:red;margin-top: 4px;"></a> ';
			echo '<i style="float:right;margin-right:10px;">'.$task['created'].'</i>';
			echo '</li>';
		} ?>
	</ul>
</div>

<?php
	include 'footer.php';
?>