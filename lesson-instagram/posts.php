<?php



$posts = db_query("SELECT * FROM posts WHERE is_private = 0 ORDER BY id DESC");

// pp($posts);
$correspondents_list = [];
foreach ($posts as $post) {
	$correspondents_list[] = $post['user_id'];
}
$correspondents_list = implode(',', $correspondents_list);

$users = db_query("SELECT id,name,IF(avatar IS NULL or avatar = '', 'images/unnamed.jpg', avatar) as avatar FROM users WHERE id IN($correspondents_list) ");
// pp($users);
if($users) $users = array_column($users, null, 'id');

// pp($users);

?>

<div class="container">
	<?php 
	foreach ($posts as $post):
		if (!can_i_see_post($post)) continue;
	 ?>
	<div class="card my-1 js-post-<?= $post['id'] ?>">
	  <?php if(is_me($post['user_id']) || is_admin()): ?>
  	  <form method="POST" class="delete_post_form">
  	  	<input type="hidden" name="delete_post" value="<?= $post['id'] ?>">
  	  	<button type="submit" class="btn btn-outline-danger delete-post"><i class="fa fa-trash"></i></button>
  	  </form>
  	  <form method="POST">
  	  	<input type="hidden" name="post_id" value="<?= $post['id'] ?>">
  	  	<button type="submit" name="post-toogle-private" class="btn btn-outline-primary post-make-private 
  	  	<?= $post['is_private'] ? 'inactive' : '' ?>"><i class="fa fa-eye"></i></button>
  	  </form>
  	  <?php endif; ?>
	  <div class="card-body">
	  	<div class="post-pics d-flex">
	  		<?= get_post_imgs($post) ?>
	  	</div>
	    <h5 class="card-title">
	    	<?= $post['title'] ?>
	    	<small style="font-weight: normal; padding-right: 90px;">(<?= $users[$post['user_id']]['name'] ?>)</small>
	    </h5>
	    <p class="card-text"><?= $post['content'] ?></p>
	    <a href="index.php?action=<?= @$_GET['action'] ?>&id=<?= @$_GET['id'] ?>&likes-count=increase&post_id=<?= $post['id'] ?>" style="color:green;"><i class="fa fa-heart"></i></a>
	    <b><?= $post['likes_count'] ?></b>
	    |
	    <a href="index.php?action=<?= @$_GET['action'] ?>&id=<?= @$_GET['id'] ?>&dislikes-count=increase&post_id=<?= $post['id'] ?>" style="color:red;"><i class="fa fa-heart-broken"></i></a>
	    <b><?= $post['dislikes_count'] ?></b>

	  </div>
	</div>
	<?php endforeach; ?>
</div>