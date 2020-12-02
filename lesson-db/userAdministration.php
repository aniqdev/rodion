<?php
  include 'auth_check.php';
  include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php



// print_r($_POST);

if (isset($_POST['delete'])) {
	$user_id = (int)$_POST['delete'];
	db_query("DELETE FROM users WHERE id = '$user_id'");
}



$users = db_query('SELECT * FROM users');

// print_r($users);

?>
</pre>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Last name</th>
      <th scope="col">email</th>
      <th scope="col">buttons</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($users as $key => $user) { ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['name'] ?></td>
      <td><?= $user['last_name'] ?></td>
      <td><?= $user['email'] ?></td>
      <td>
      	<a href="index.php?user_id=<?= $user['id'] ?>" class="btn btn-info" style="float: right;"><i class="fa fa-edit"></i></a>
      	<form method="POST" style="float: right;">
      		<button type="submit" name="delete" value="<?= $user['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
      	</form>
      </td>
    </tr>
  	<?php } ?>
  </tbody>
</table>
</div>

<?php
	include 'footer.php';
?>