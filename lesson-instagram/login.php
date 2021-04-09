<?php
	session_start();
	if (isset($_SESSION['user'])) {
	    header("Location: index.php"); 
	    die;
	}
	include 'classes.php';
	include 'functions.php';
	include 'header.php';

	if (isset($_POST['login-submit'])) {
		$username = db_escape($_POST['username']);
		$user = db_query("SELECT * FROM users WHERE username = '$username' ");
		if ($user) {
			$password_hash = $user[0]['password'];
			$password = $_POST['password'];
			$checked = check_password($password, $password_hash);
			if($checked) {
				db_query("UPDATE users SET last_visit = NOW() WHERE username = '$username' ");
				$_SESSION['user'] = $user[0];
				header("Location: index.php");
			}
		}
	}
	if (isset($_POST['login-anonymous'])) {
			$_SESSION['user'] = [
				'id' => 0,
				'username' => 'anonymous',
				'name' => 'anonymous',
				'role' => 'anonymous',
			];
			header("Location: index.php");
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
  <p>
  	<a href="register.php">Register</a>
  </p>
  <button name="login-submit" type="submit" class="btn btn-primary">Login</button>
  <button name="login-anonymous" type="submit" class="btn btn-primary">Login as anonymous</button>
</form>
</div>

<?php
	include __DIR__.'/footer.php';
?>