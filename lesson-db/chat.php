<?php if(!defined('ROOT')) die('Not allowed');

$user = db_escape($_SESSION['user']);

$all_messages = db_query("SELECT * FROM messages WHERE user_from = '$user[id]' || user_to = '$user[id]' ");

$dialogs = [];
foreach ($all_messages as $key => $message) {
	$correspondent = $message['user_from'] === $user['id'] ? $message['user_to'] : $message['user_from'];
	$dialogs[$correspondent][] = $message;
}

$correspondents_list = implode(',', array_keys($dialogs));

$users = db_query("SELECT id,name FROM users WHERE id IN($correspondents_list) ");

$users = array_column($users, null, 'id');

?>

<pre>
<?php

print_r($users);

// print_r(implode(',', array_keys($dialogs)));
// print_r(array_keys($dialogs));
print_r($dialogs);

?>
</pre>

<div class="container">
	<div class="accordion" id="accordionExample">
		<?php foreach ($dialogs as $key => $dialog): ?>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="headingOne">
		      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapseOne">
		        Dialog with:&nbsp;<b><?= $users[$key]['name'] ?></b>&nbsp;<span class="badge bg-primary rounded-pill"><?= count($dialog) ?></span>
		      </button>
		    </h2>
		    <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		      <div class="accordion-body">
		        <ul class="list-group">
					<?php foreach ($dialog as $message): ?>
				  		<li class="list-group-item"><?= $message['message'] ?></li>
					<?php endforeach; ?>
				</ul>
		      </div>
		    </div>
		  </div>
		<?php endforeach; ?>
	</div>
</div>
