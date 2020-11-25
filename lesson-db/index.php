<?php
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

// $query = 'SELECT * FROM table_one';

// $result = DB::getInstance()->get_results($query);

// print_r($result);

print_r($_POST);

if (isset($_POST['add-user'])) {
	$position = DB::getInstance()->escape($_POST['position']);
    $email = DB::getInstance()->escape($_POST['email']);
    $name = DB::getInstance()->escape($_POST['name']);
    $last_name = DB::getInstance()->escape($_POST['last_name']);
    $username = DB::getInstance()->escape($_POST['username']);
    $password = DB::getInstance()->escape($_POST['password']);
    $password_confirmation = DB::getInstance()->escape($_POST['password_confirmation']);
    $address = DB::getInstance()->escape($_POST['address']);
    $city = DB::getInstance()->escape($_POST['city']);
    $index = DB::getInstance()->escape($_POST['index']);

    $query = "INSERT INTO users SET
    	`position` = '$position',
    	email = '$email',
    	name = '$name',
    	last_name = '$last_name',
    	username = '$username',
    	`password` = '$password',
    	address = '$address',
    	city = '$city',
    	`index` = '$index'";

    print_r($query);

    DB::getInstance()->query($query);
}

	// $hash = md5('#$%^&*('.'123');
	// var_dump($hash === '70421e2d2babe37e201a887d878440a6');
	// print_r($hash);
?>
</pre>


<div class="container">
<form method="POST">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Position</label>
      <input name="position" type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">email</label>
      <input name="email" type="email" class="form-control" id="inputPassword4">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input name="name" type="text" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last name</label>
      <input name="last_name" type="text" class="form-control" id="inputEmail4">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPassword4">Username</label>
      <input name="username" type="text" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Password</label>
      <input name="password" type="password" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Confirm password</label>
      <input name="password_confirmation" type="password" class="form-control" id="inputEmail4">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input name="city" type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input name="index" type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <button name="add-user" type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

<?php
	include 'footer.php';
?>