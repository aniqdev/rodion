<?php
	// include 'auth_check.php';
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

$message = '';

if (isset($_POST['add-user']) && $_POST['add-user'] === '') {
	$message = add_user();
}

// $str = 'saf sadfD ';

// print_r(($str));
// echo "<hr>";
// print_r(strtoupper($str));
// echo "<hr>";
// var_dump(strtoupper($str) === $str);

?>
</pre>


<div class="container">
<form class="login-form" method="POST">

	<p style="color:red;"><?= $message ?></p>

	<div class="form-group">
	  <label for="inputPassword4">Email</label>
	  <input value="<?= @$_POST['email'] ?>" name="email" type="text" class="form-control" id="inputPassword4">
	</div>
	<div class="form-group">
	  <label for="inputPassword4">Username</label>
	  <input value="<?= @$_POST['username'] ?>" name="username" type="text" class="form-control" id="inputPassword4">
	</div>

	<div class="form-group">
	  <label for="inputEmail4">Password</label>
	  <input value="<?= @$_POST['password'] ?>" name="password" type="password" class="form-control" id="inputEmail4">
	</div>
	<div class="form-group ">
	  <label for="inputEmail4">Confirm password</label>
	  <input value="<?= @$_POST['password_confirmation'] ?>" name="password_confirmation" type="password" class="form-control" id="inputEmail4">
	</div>
	<p>Already have an account? 
		<a href="login.php">Login</a>
	</p>
  <button name="add-user" value="<?= isset($user['id']) ? $user['id'] : '' ?>" type="submit"  class="btn btn-primary">Sign in</button>
</form>
</div>

<?php
	include __DIR__.'/footer.php';
?>