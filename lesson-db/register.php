<?php
	// include 'auth_check.php';
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

// $hash = password_hash("123", PASSWORD_DEFAULT);


// var_dump(password_verify("123", '$2y$10$UsBb6MsGSBJ6MzvoQl9X/u77sdk8Dyozgwf276iI6jT'));

// $query = 'SELECT * FROM table_one';

// $result = DB::getInstance()->get_results($query);

// print_r($result);

// print_r($_POST);

$post_data = db_escape($_POST);

$message = '';

if (isset($_POST['add-user']) && $_POST['add-user'] === '') {
	$message = add_user();
}

// print_r($_GET);
// var_dump(isset($_GET['user_id']));

if (isset($_POST['add-user']) && $_POST['add-user'] !== '') {
	$user_id = (int)$_POST['add-user'];

	$position = $post_data['position'];
	$email = $post_data['email'];
	$name = $post_data['name'];
	$last_name = $post_data['last_name'];
	$username = $post_data['username'];
	$password = $post_data['password'];
	$password_confirmation = $post_data['password_confirmation'];
	$address = $post_data['address'];
	$city = $post_data['city'];
	$index = $post_data['index'];

	db_query("UPDATE users SET
		`position` = '$position',
		email = '$email',
		name = '$name',
		last_name = '$last_name',
		username = '$username',
		address = '$address',
		city = '$city',
		`index` = '$index'
		WHERE id = '$user_id' ");
}

if (isset($_GET['user_id'])) {
	$user_id = (int)$_GET['user_id'];

	$user = db_query("SELECT * FROM users WHERE id = '$user_id' ");
	// print_r($user);
	if($user) $user = $user[0];
	// print_r($user);
}
?>
</pre>


<div class="container">
	<p style="color:red;">
		<?= $message ?>
	</p>
<form class="login-form" method="POST">

	<div class="form-group">
	  <label for="inputPassword4">Email</label>
	  <input value="<?= isset($user['email']) ? $user['email'] : '' ?>" name="email" type="text" class="form-control" id="inputPassword4">
	</div>
	<div class="form-group">
	  <label for="inputPassword4">Username</label>
	  <input value="<?= isset($user['username']) ? $user['username'] : '' ?>" name="username" type="text" class="form-control" id="inputPassword4">
	</div>

	<div class="form-group">
	  <label for="inputEmail4">Password</label>
	  <input value="<?= isset($user['password']) ? $user['password'] : '' ?>" name="password" type="password" class="form-control" id="inputEmail4">
	</div>
	<div class="form-group ">
	  <label for="inputEmail4">Confirm password</label>
	  <input value="<?= isset($user['password']) ? $user['password'] : '' ?>" name="password_confirmation" type="password" class="form-control" id="inputEmail4">
	</div>

  <button name="add-user" value="<?= isset($user['id']) ? $user['id'] : '' ?>" type="submit"  class="btn btn-primary">Sign in</button>
</form>
</div>

<?php
	include __DIR__.'/footer.php';
?>