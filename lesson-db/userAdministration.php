<?php if(!defined('ROOT')) die('Not allowed') ?>

<pre>
<?php


// print_r($_POST);

if (isset($_POST['delete'])) {
	$user_id = (int)$_POST['delete'];
  delete_user($user_id);
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
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Last visit</th>
      <th scope="col">buttons</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($users as $key => $user) { 
      if(!$user['avatar']) $user['avatar'] = 'images/unnamed.jpg';
      ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><img src="<?= $user['avatar'] ?>" alt="" style="width:40px;"></td>
      <td><?= $user['name'] ?></td>
      <td><?= $user['last_name'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['last_visit'] ?></td>
      <td>
        <?php if(is_admin()): ?>
      	<a href="edit-user.php?user_id=<?= $user['id'] ?>" class="btn btn-info" style="float: right;"><i class="fa fa-edit"></i></a>
      	<form method="POST" style="float: right;">
      		<button type="submit" name="delete" value="<?= $user['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
      	</form>
        <?php elseif ($_SESSION['user']['username'] === $user['username']): ?>
          <a href="edit-user.php?user_id=<?= $user['id'] ?>" class="btn btn-info" style="float: right;"><i class="fa fa-edit"></i></a>
        <?php endif; ?>
        <a class="btn btn-success" href="?action=profile&id=<?= $user['id'] ?>"><i class="fa fa-eye"></i></a>
      </td>
    </tr>
  	<?php } ?>
  </tbody>
</table>
</div>

