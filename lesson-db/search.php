<?php

$query = db_escape($_GET['query']);

if (empty($query)) {
	$users = [];
	$alert = get_alert('warning', 'Users not found!');
}else{
	$users = db_query("SELECT *,IF(avatar IS NULL or avatar = '', 'images/unnamed.jpg', avatar) as avatar FROM users WHERE
			name  LIKE '%$query%' OR
			last_name  LIKE '%$query%' OR
			username  LIKE '%$query%' OR
			email  LIKE '%$query%' 
		");
	$alert = get_alert('success', 'Found <b>' . count($users) . '</b> users!');
}

?>

<pre>
<?php

// print_r($users);

?>
</pre>

<div class="container">
	<?= $alert ?>
	<div class="row row-cols-1 row-cols-md-4 g-4">
		<?php foreach ($users as $key => $user): ?>
		  <div class="col">
		    <a href="index.php?action=profile&id=<?= $user['id'] ?>" class="card h-100" style="text-decoration: none; color: #333;">
		      <img src="<?= $user['avatar'] ?>" class="card-img-top" alt="...">
		      <div class="card-body">
		        <h5 class="card-title"><?= $user['name'] ?></h5>
		        <p class="card-text"><?= $user['email'] ?></p>
		      </div>
		      <div class="card-footer">
		        <small class="text-muted"><?= $user['city'] ?></small>
		      </div>
		    </a>
		  </div>
		<?php endforeach; ?>
	</div>
</div>