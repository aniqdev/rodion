<?php if(!defined('ROOT')) die('Not allowed') ?>

<?php

if (!empty($_POST['delete_post'])) {
	$post_id = $_POST['delete_post'];
	$deleted = delete_post($post_id);
	echo json_encode([
		'status' => $deleted ? 'ok' : 'error',
		'post_id' => $post_id,
	]);
	return;
}

$alert = '';

$user_id = (int)$_GET['id'];

$user = db_query("SELECT * FROM users WHERE id = '$user_id' ");

if (!$user) return;
else $user = $user[0];

if(!$user['avatar']) $user['avatar'] = 'images/unnamed.jpg';

if (isset($_POST['add-post'])) {
	// pp(@count($_FILES['pics']['nasme']));
	// pp($_FILES);
	// die;
	add_post();
}


if (isset($_GET['invite'])) {
	invite_friend();
}

if (isset($_POST['send-message'])) {
	$user_name = $user['name'];
	$user_from = (int)$_SESSION['user']['id'];
	$user_to = (int)$_GET['id'];
	$message = db_escape($_POST['message']);
	$alert = send_message($user_name, $user_from, $user_to, $message);
}

?>


<pre>
<?php
// print_r($user);
// print_r($user);
print_r($_POST);
// print_r($_SESSION);


?>
</pre>

<div class="container">
	<div>
		<?= $alert ?>
	</div>
	<div class="row profile-info">

		<div class="col-sm-4">
			<div class="card" style="width: 18rem;">
			  <img src="<?= $user['avatar'] ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <?php if(!is_anonymous()): ?>
				    <?php if(!is_invited((int)$_SESSION['user']['id'], (int)$_GET['id'])): ?>
				    <a href="index.php?action=profile&id=<?= @$_GET['id'] ?>&invite" class="btn btn-primary">Invite</a>
				    <?php elseif (is_friends((int)$_SESSION['user']['id'], (int)$_GET['id'])): ?>
				    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Send message</button>
					<?php else: ?>
				    <a class="btn btn-primary">Request sent</a>
					<?php endif; ?>
				<?php endif; ?>
			  </div>
			</div>
		</div>

		<div class="col-sm-8">
			<dl class="row">
			  <dt class="col-sm-3">Name</dt>
			  <dd class="col-sm-9"><?= $user['name'] ?></dd>

			  <dt class="col-sm-3">Last Name</dt>
			  <dd class="col-sm-9"><?= $user['last_name'] ?></dd>

			  <dt class="col-sm-3">Position</dt>
			  <dd class="col-sm-9"><?= $user['position'] ?></dd>

			  <dt class="col-sm-3">City</dt>
			  <dd class="col-sm-9"><?= $user['city'] ?></dd>

			  <dt class="col-sm-3">Address</dt>
			  <dd class="col-sm-9"><?= $user['address'] ?></dd>

			  <dt class="col-sm-3">Email</dt>
			  <dd class="col-sm-9"><?= $user['email'] ?></dd>

			  <dt class="col-sm-3">Username</dt>
			  <dd class="col-sm-9"><?= $user['username'] ?></dd>
			</dl>
		</div>

	</div><!-- /profile-info -->
	<div class="row profile-posts my-3">
		<div class="col"><hr></div>
		<h2>Posts 
		<?php if(is_me($_GET['id']) || is_admin()): ?>
		<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add post</button>
		<?php endif; ?>
		</h2>
		<div class="col">
			<div class="row">
				<?php 
				$posts = db_query("SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY id DESC");
				foreach ($posts as $post):
					if (!can_i_see_post($post)) continue;
				 ?>
				 <div class="col-sm-4">
					<div class="card my-1 js-post-<?= $post['id'] ?>">
					  <?php if(is_me($_GET['id']) || is_admin()): ?>
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
					  	<div class="post-pics">
					  		<?= get_post_imgs($post) ?>
					  	</div>
					    <h5 class="card-title"><?= $post['title'] ?></h5>
					    <p class="card-text"><?= $post['content'] ?></p>
					    <a href="index.php?action=profile&id=<?= @$_GET['id'] ?>&likes-count=increase&post_id=<?= $post['id'] ?>" style="color:green;"><i class="fa fa-heart"></i></a>
					    <b><?= $post['likes_count'] ?></b>
					    |
					    <a href="index.php?action=profile&id=<?= @$_GET['id'] ?>&dislikes-count=increase&post_id=<?= $post['id'] ?>" style="color:red;"><i class="fa fa-heart-broken"></i></a>
					    <b><?= $post['dislikes_count'] ?></b>
					    <hr>
					    <?php include ROOT.'/post-comments.php'; ?>
					  </div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div><!-- /profile-posts -->
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="index.php?action=profile&id=<?= @$_GET['id'] ?>" enctype="multipart/form-data">
       <input type="hidden" name="user_id" value="<?= @$_GET['id'] ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="mb-3">
			<label for="recipient-name" class="col-form-label">Post title:</label>
			<input name="title" type="text" class="form-control" id="recipient-name">
		</div>
		<div class="mb-3">
			<label for="message-text" class="col-form-label">Post content:</label>
			<textarea name="content" class="form-control" id="message-text"></textarea>
		</div>
		<div class="mb-3">
			<label for="formFileMultiple" class="form-label">Add pics</label>
			<input name="pics[]" class="form-control" type="file" id="formFileMultiple" multiple>
		</div>
        <div class="form-check">
		  <input name="is_private" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
		  <label class="form-check-label" for="flexCheckDefault">
		    Private
		  </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add-post" class="btn btn-primary">Add post</button>
      </div>
    </form>
  </div>
</div>






<div class="modal fade" id="exampleModalMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="index.php?action=profile&id=<?= @$_GET['id'] ?>">
       <input type="hidden" name="user_id" value="<?= @$_GET['id'] ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
			<h4>Meesage to <?= $user['name'] ?></h4>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea name="message" class="form-control" id="message-text"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="send-message" class="btn btn-primary">Send</button>
      </div>
    </form>
  </div>
</div>


<script>
var cl = console.log

$('.delete_post_form').submit(function(e) {
	e.preventDefault()
	if(!confirm('Are you sure?')) return false
	$.post('ajax.php'+location.search,
		$(this).serialize(),
		function(data) {
		if (data.status === 'ok') {
			$('.js-post-' + data.post_id).remove()
		}
	}, 'json')
})

setTimeout(function() {
    $(".alert").alert('close');
}, 5000);
</script>