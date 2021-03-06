<?php
	include 'auth_check.php';
	include 'classes.php';
	include 'functions.php';
	include 'header.php';

	if (isset($_GET['user_id']) && !is_admin() && $_GET['user_id'] !== $_SESSION['user']['id']) {
		header("Location: userAdministration.php"); 
	}
?>

<pre>
<?php


// print_r($_SESSION['user']);
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

// print_r($_FILES);
// var_dump(isset($_GET['user_id']));

if (isset($_POST['add-user']) && $_POST['add-user'] !== '') {

	$uploaded = '';
	$avatar = '';
	if (isset($_FILES['file-pic']) && $_FILES['file-pic']['size'] > 0) {
		// print_r($_FILES);
		if (in_array($_FILES['file-pic']['type'], ['image/jpeg','image/png','image/gif'])) {
			$avatar = 'images/'.time().'-'.$_FILES['file-pic']['name'];
			$uploaded = move_uploaded_file($_FILES['file-pic']['tmp_name'], $avatar);
			if($uploaded) $uploaded = 'File uploaded!';
		}else{
			$uploaded = 'Wrong filetype';
		}
	}

	$user_id = (int)$_POST['add-user'];

	$position = $post_data['position'];
	$email = $post_data['email'];
	$name = $post_data['name'];
	$last_name = $post_data['last_name'];
	$username = $post_data['username'];
	// $password = $post_data['password'];
	// $password_confirmation = $post_data['password_confirmation'];
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

	if($avatar) db_query("UPDATE users SET avatar = '$avatar' WHERE id = '$user_id' ");
}

if (isset($_GET['user_id'])) {
	$user_id = (int)$_GET['user_id'];

	$user = db_query("SELECT * FROM users WHERE id = '$user_id' ");
	// print_r($user);
	if($user) $user = $user[0];
	// print_r($user);
	if($user['avatar']) $avatar = '<p><img src="'.$user['avatar'].'" alt="" style="max-width:120px"></p>';
}
?>
</pre>


<div class="container">
	<p style="color:red;">
		<?= $message ?>
		<?= @$avatar ?>
	</p>
<form method="POST" enctype="multipart/form-data">

  <div class="input-group">
    <div class="custom-file">
      <input name="file-pic" type="file" class="custom-file-input" id="validatedInputGroupCustomFile">
      <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
    </div>
<!--     <div class="input-group-append">
       <button class="btn btn-primary" type="submit">Add picture</button>
    </div> -->
  </div>

  <div class="form-row">
	<div class="form-group col-md-6">
	  <label for="inputEmail4">Position</label>
	  <input name="position" value="<?= isset($user['position']) ? $user['position'] : '' ?>" type="text" class="form-control" id="inputEmail4">
	</div>
	<div class="form-group col-md-6">
	  <label for="inputPassword4">email</label>
	  <input value="<?= isset($user['email']) ? $user['email'] : '' ?>" name="email" type="text" class="form-control" id="inputPassword4">
	</div>
  </div>

  <div class="form-row">
	<div class="form-group col-md-6">
	  <label for="inputPassword4">Name</label>
	  <input value="<?= isset($user['name']) ? $user['name'] : '' ?>" name="name" type="text" class="form-control" id="inputPassword4">
	</div>
	<div class="form-group col-md-6">
	  <label for="inputEmail4">Last name</label>
	  <input value="<?= isset($user['last_name']) ? $user['last_name'] : '' ?>" name="last_name" type="text" class="form-control" id="inputEmail4">
	</div>
  </div>

  <div class="form-row">
	<div class="form-group col-md-4">
	  <label for="inputPassword4">Username</label>
	  <input value="<?= isset($user['username']) ? $user['username'] : '' ?>" name="username" type="text" class="form-control" id="inputPassword4">
	</div>
<!-- 	<div class="form-group col-md-4">
	  <label for="inputEmail4">Password</label>
	  <input value="<?= isset($user['password']) ? $user['password'] : '' ?>" name="password" type="password" class="form-control" id="inputEmail4">
	</div>
	<div class="form-group col-md-4">
	  <label for="inputEmail4">Confirm password</label>
	  <input value="<?= isset($user['password']) ? $user['password'] : '' ?>" name="password_confirmation" type="password" class="form-control" id="inputEmail4">
	</div> -->
  </div>

  <div class="form-group">
	<label for="inputAddress">Address</label>
	<input value="<?= isset($user['address']) ? $user['address'] : '' ?>" name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
	<div class="form-group col-md-6">
	  <label for="inputCity">City</label>
	  <input value="<?= isset($user['city']) ? $user['city'] : '' ?>" name="city" type="text" class="form-control" id="inputCity">
	</div>
	<div class="form-group col-md-2">
	  <label for="inputZip">Zip</label>
	  <input value="<?= isset($user['index']) ? $user['index'] : '' ?>" name="index" type="text" class="form-control" id="inputZip">
	</div>
  </div>
  <button name="add-user" value="<?= isset($user['id']) ? $user['id'] : '' ?>" type="submit"  class="btn btn-primary">Save</button>
</form>
</div>

<script>
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        if(fileName) fileName = fileName.replace(/^.*[\\\/]/, '')
        $(this).next('.custom-file-label').html(fileName);
    })
</script>

<?php
	include __DIR__.'/footer.php';
?>