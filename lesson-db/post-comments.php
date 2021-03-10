<?php
	$post_id = (int)$post['id'];
	$comments = db_query("SELECT * FROM post_comments WHERE post_id = '$post_id' ");
	// pp($comments);
	$user_ids = [];
	foreach ($comments as $comment) {
		$user_ids[] = $comment['user_id'];
	}
	$user_ids = implode(',', array_unique($user_ids));

	$users = db_query("SELECT id,name,IF(avatar IS NULL or avatar = '', 'images/unnamed.jpg', avatar) as avatar FROM users WHERE id IN($user_ids) ");
	// pp($users);
	if($users) $users = array_column($users, null, 'id');
?>
<div class="accordion" id="post_comments_accordion">
	<div class="accordion-item">
		<h2 class="accordion-header" id="headingOne">
			<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pca_collaps" aria-expanded="true" aria-controls="pca_collaps">
				comments 
			</button>
		</h2>
		<div id="pca_collaps" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#post_comments_accordion">
			<div class="accordion-body">
				<form class="input-group mb-3" method="POST">
					<input type="hidden" name="post_id" value="<?= $post['id'] ?>">
					<input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
					<input name="comment" type="text" class="form-control" placeholder="Type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
					<button name="add-post-comment" class="btn btn-outline-primary" type="submit">Add comment</button>
				</form>
		        <ul class="list-group js-messages-list">
					<?php foreach ($comments as $comment):

					 ?>
				  		<li class="list-group-item">
				  			<b>(<?= $users[$post['user_id']]['name'] ?>) </b>
				  			<?= $comment['comment'] ?>
				  			<small style="float: right;"><?= $comment['created'] ?></small>
				  		</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>