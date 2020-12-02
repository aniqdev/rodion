<?php
	session_start();
	include 'classes.php';
	include 'functions.php';
	include 'header.php';

	if (isset($_POST['login-submit'])) {
		$username = db_escape($_POST['username']);
		$user = db_query("SELECT password FROM users WHERE username = '$username' ");
		if ($user) {
			$password_hash = $user[0]['password'];
			$password = $_POST['password'];
			// var_dump($password);
			// var_dump($password_hash);
			$checked = check_password($password, $password_hash);
			// var_dump($checked);
			if($checked) {
				$_SESSION['logged'] = true;
				$_SESSION['username'] = $username;
				header("Location: index.php");
			}
		}
	}
?>

<pre>
<?php

// print_r($user);
// print_r(hash_password($_POST['password']));

?>
</pre>


<div class="container">
<form class="login-form" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" value="asd" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" value="123" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button name="login-submit" type="submit" class="btn btn-primary">Login</button>
</form>
</div>

<?php
	include __DIR__.'/footer.php';
?>