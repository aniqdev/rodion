<?php
	// include 'auth_check.php';
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

// print_r($_POST);
$message = '';
if (isset($_POST['reset-password'])) {
	$email = db_escape($_POST['email']);
	$check_email = db_query("SELECT id FROM users WHERE email = '$email' ");
	if ($check_email) {
		$message = reset_password($email);
	}
}

?>
</pre>


<div class="container">
	<p>
		<?= $message; ?>
	</p>
<form class="login-form" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" value="aniq.dev@gmail.com" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button name="reset-password" type="submit" class="btn btn-primary">Reset password</button>
</form>
</div>





<?php
	include __DIR__.'/footer.php';
?>