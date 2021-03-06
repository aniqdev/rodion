<?php if(!defined('ROOT')) die('Not allowed');


if (isset($_POST['action']) && $_POST['action'] === 'send-message') {
	$user_name = db_escape($_POST['user_name']);
	$user_from = db_escape($_POST['user_from']);
	$user_to = db_escape($_POST['user_to']);
	$message = db_escape($_POST['message']);
	$alert = send_message($user_name, $user_from, $user_to, $message);
	$all_messages = get_messages_with_user($user_from, $user_to);
	echo json_encode(['alert' => '', 'messages_list' => $all_messages]);
	return;
}


function get_messages_with_user($user_from, $user_to)
{
	$all_messages = db_query("SELECT * FROM messages WHERE (user_from = '$user_from' AND user_to = '$user_to') OR (user_from = '$user_to' AND user_to = '$user_from') ORDER BY id DESC");
	$all_messages = array_map(function($message)
	{
		return '<li class="list-group-item">'. $message['message'] .'</li>';
	}, $all_messages);
	return implode('', $all_messages);
}

$user = db_escape($_SESSION['user']);

$all_messages = db_query("SELECT *,DATE_FORMAT(time_sent, '%M %d %Y [%H:%i]') as `time` FROM messages WHERE user_from = '$user[id]' || user_to = '$user[id]' ORDER BY id DESC");

$dialogs = [];
foreach ($all_messages as $key => $message) {
	$correspondent = $message['user_from'] === $user['id'] ? $message['user_to'] : $message['user_from'];
	$dialogs[$correspondent][] = $message;
}

$correspondents_list = implode(',', array_keys($dialogs));

$correspondents_list = $correspondents_list . ',' . $_SESSION['user']['id'];
// pp($correspondents_list);

$users = db_query("SELECT id,name,IF(avatar IS NULL or avatar = '', 'images/unnamed.jpg', avatar) as avatar FROM users WHERE id IN($correspondents_list) ");
// pp($users);
if($users) $users = array_column($users, null, 'id');



?>

<pre>
<?php

// print_r($users);

// print_r(implode(',', array_keys($dialogs)));
// print_r(array_keys($dialogs));
// print_r($dialogs);

?>
</pre>

<div class="container">
	<form id="send_message_form">
		<div class="input-group mb-3">
		  <input id="message_input" name="message" type="text" class="form-control" placeholder="Type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
		  <button class="btn btn-success" type="submit" id="button-addon2">Send</button>
		</div>
		<div class="input-group mb-3" id="alerts">

		</div>
	</form>
	<div class="accordion" id="accordionExample">
		<?php foreach ($dialogs as $key => $dialog): ?>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="headingOne">
		      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapseOne">
		        Dialog with:&nbsp;<b><?= $users[$key]['name'] ?></b>&nbsp;<span class="badge bg-primary rounded-pill"><?= count($dialog) ?></span>
		      </button>
		    </h2>
		    <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample"
		    	data-username="<?= $users[$key]['name'] ?>"
		    	data-userfrom="<?= $_SESSION['user']['id'] ?>"
		    	data-userto="<?= $users[$key]['id'] ?>">
		      <div class="accordion-body">
		        <ul class="list-group js-messages-list">
					<?php foreach ($dialog as $message):
						$class = ($user['id'] == $message['user_from']) ? 'from-me-bg text-light' : '';
					 ?>
				  		<li class="list-group-item <?= $class ?>">
				  			<img class="chat-avatar" src="<?= $users[$message['user_from']]['avatar'] ?>" alt="">
				  			<?= $message['message'] ?>
				  			<small style="float: right;"><?= $message['time'] ?></small>
				  		</li>
					<?php endforeach; ?>
				</ul>
		      </div>
		    </div>
		  </div>
		<?php endforeach; ?>
	</div>
</div>

<script>
var cl = console.log

cl($)

var form = $('#send_message_form')

form.on('submit', function(e) {
	e.preventDefault()
	var accordion_collapse = $('.accordion-collapse.show')
	if (!accordion_collapse.length) {
		_alert('Choose tab!')
		return;
	}
	$.post('ajax.php?action=chat',
		{action:'send-message',
		 user_name: accordion_collapse.data('username'),
		 user_from: accordion_collapse.data('userfrom'),
		 user_to: accordion_collapse.data('userto'),
		 message: $('#message_input').val()},
		function(data) {
			accordion_collapse.find('.js-messages-list').html(data.messages_list)
			_alert(data.alert)
		},'json')
})

function _alert(alert) {
	$('#alerts').html(alert)
}
</script>
