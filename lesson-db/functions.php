<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

define('db_HOST', 'localhost');
define('db_USER', 'root');
define('db_PASS', '');
define('db_NAME', 'test_db');


function db_query($query = '')
{
	if(!$query) return [];
	if (stripos($query, 'select') === 0 || stripos($query, 'show') === 0 || stripos($query, 'describe') === 0) {
		return DB::getInstance()->get_results($query);
	}else{
		return DB::getInstance()->query($query);
	}
}


function db_escape($string = '')
{
	return DB::getInstance()->escape($string);
}


function hash_password($password)
{
	return password_hash('#$%^&*'.$password, PASSWORD_DEFAULT);
}


function check_password($password, $hash)
{
	return password_verify('#$%^&*'.$password, $hash);
}


function add_user()
{
	$post_data = db_escape($_POST);

	$position = @$post_data['position'];
	$email = @$post_data['email'];
	$name = @$post_data['name'];
	$last_name = @$post_data['last_name'];
	$username = @$post_data['username'];
	$password = @$post_data['password'];
	$password_confirmation = @$post_data['password_confirmation'];
	$address = @$post_data['address'];
	$city = @$post_data['city'];
	$index = @$post_data['index'];


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return 'please enter valid email!';

	if(!trim($email)) return 'please enter email!';

	if(!trim($username)) return 'please enter username!';

	$username_check = db_query("SELECT id FROM users WHERE username = '$username' ");
	if ($username_check) {
		return "Username $username is already taken!";
	}

	$email_check = db_query("SELECT id FROM users WHERE email = '$email' ");
	if ($email_check) {
		return 'Please choose another email address!';
	}

	if ($password !== $password_confirmation) {
		return 'Passwords should match!';
	}

	if (strlen($password) < 8) {
		return 'Password length should be more than 8 characters!';
	}

	if (strtolower($password) === $password || 
		strtoupper($password) === $password ||
		!preg_replace('/\D/', '', $password)) {
			return 'Password should contain uppercase and lowercase letters and digit(s)';
	}

	$password = hash_password($post_data['password']);

	$query = "INSERT INTO users SET
		`position` = '$position',
		email = '$email',
		name = '$name',
		last_name = '$last_name',
		username = '$username',
		password = '$password',
		address = '$address',
		city = '$city',
		`index` = '$index' ";

	db_query($query);

	return "User $username created!";
}


function reset_password($email)
{
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	  $mail->isSMTP();
	  $mail->Host = 'tls://smtp.gmail.com';
	  $mail->SMTPAuth   = true;
	  $mail->Username   = 'fgpasswprd@gmail.com';
	  $mail->Password   = '123aa678';
	  $mail->Port = 587;// 587 465
	  $mail->setFrom('fgpasswprd@gmail.com',"Mailer");
	  $mail->addAddress($email);//Кому отправляем
	//$mail->addReplyTo("kudaotvetit@yandex.ru","Имя кому писать при ответе");
	  $mail->SMTPSecure = 'tls'; // tls ssl
	  $mail->isHTML(true);//HTML формат
	  $mail->Subject = "Тема сообщения";
	  $mail->Body    = "Содержание сообщения";
	  $mail->AltBody = "Альтернативное содержание сообщения";

	  $mail->send();
	  return "Сообщение отправлено";
	} catch (Exception $e) {
	  return "Ошибка отправки: {$mail->ErrorInfo}";
	}
}

function is_admin()
{
	return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function isAdmin()
{
	return is_admin();
}

function add_post()
{
	if(!is_me($_GET['id']) && !is_admin()) return false;

	$post_data = db_escape($_POST);

	$is_private = isset($post_data['is_private']) ? 1 : 0;
	pp($is_private);

	$uploaded = '';
	$filenames = [];

	$total = @count($_FILES['pics']['name']);

	// Loop through each file
	for( $i=0 ; $i < $total ; $i++ ) {
		if ($_FILES['pics']['size'][$i] > 0) {
			if (in_array($_FILES['pics']['type'][$i], ['image/jpeg','image/png','some other type'])) {
				$filename = 'images/'.time().'-'.$_FILES['pics']['name'][$i];
				$uploaded = move_uploaded_file($_FILES['pics']['tmp_name'][$i], $filename);
				$filenames[] = $filename;
				// if($uploaded) $uploaded = 'File uploaded!';
			}else{
				// $uploaded = 'Wrong filetype';
			}
		}
	}

	$filenames = db_escape(implode(',', $filenames));

	db_query("INSERT INTO posts SET
		user_id = '$post_data[user_id]',
		title = '$post_data[title]',
		content = '$post_data[content]',
		pics = '$filenames',
		is_private = '$is_private'
	");
}


function increase_post_likes_count()
{
	$post_id = (int)$_GET['post_id'];
	db_query("UPDATE posts SET likes_count = likes_count + 1 WHERE id = '$post_id'");
	header("Location: index.php?action=".$_GET['action']."&id=".@$_GET['id']);
}
function increase_post_dislikes_count()
{
	$post_id = (int)$_GET['post_id'];
	db_query("UPDATE posts SET dislikes_count = dislikes_count + 1 WHERE id = '$post_id'");
	header("Location: index.php?action=".$_GET['action']."&id=".@$_GET['id']); 
}

function is_invited($user_from, $user_to)
{
	return db_query("SELECT id FROM friends WHERE user_from = '$user_from' AND user_to = '$user_to' ");
}

function invite_friend()
{
	$user_from = (int)$_SESSION['user']['id'];
	$user_to = (int)$_GET['id'];
	if (!is_invited($user_from, $user_to)) {
		db_query("INSERT INTO friends SET user_from = '$user_from', user_to = '$user_to' ");
	}
}


function is_friends($user_from, $user_to)
{
	$requested = db_query("SELECT id FROM friends WHERE user_from = '$user_from' AND user_to = '$user_to' ");
	$responded = db_query("SELECT id FROM friends WHERE user_from = '$user_to' AND user_to = '$user_from' ");
	return $requested && $responded;
}

function send_message($user_name, $user_from, $user_to, $message)
{
	db_query("INSERT INTO messages SET user_from = '$user_from', user_to = '$user_to', message = '$message', time_sent = NOW() ");

	return get_alert('success', "Message to <b>$user_name</b> has been sent!");
}

function get_alert($status, $text)
{
	return '<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert">
	  '.$text.'
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
}

function pp($text)
{
	$return = '<pre>';
	$return .= print_r($text, true);
	$return .= '</pre>';
	echo $return;
}

function delete_post($post_id)
{
	if(!is_me($_GET['id']) && !is_admin()) return false;

	$post_id = (int)$post_id;
	$post = db_query("SELECT pics FROM posts WHERE id = '$post_id'");
	if ($post) {
		$pics = $post[0]['pics'];
		if ($pics) {
			foreach (explode(',', $pics) as $pic) {
				unlink(ROOT . '/' . $pic);
			}
		}
	}
	db_query("DELETE FROM posts WHERE id = '$post_id' ");
	return true;
}

function get_post_imgs(&$post)
{
	$pics = '';
	if ($post['pics']) {
		$pics = explode(',', $post['pics']);
		$pics = array_map(function($src)
		{
			return '<a data-fancybox="gallery" href="'.$src.'"><img src="'.$src.'"></a>';
		}, $pics);
		$pics = implode('', $pics);
	}
	return $pics;
}

function can_i_see_post($post)
{
	$user_from = $_SESSION['user']['id'];
	$user_to = $post['user_id'];
// var_dump($user_from == $user_to);
	if($user_from == $user_to) return true;
// var_dump($post['is_private'] == 0);
	if($post['is_private'] == 0) return true;
// var_dump(is_friends($user_from, $user_to));
	if(is_friends($user_from, $user_to)) return true;

	return false;
}

function is_me($user_id, $true = true, $false = false)
{
	if ($user_id == $_SESSION['user']['id']) {
		return $true;
	}else{
		return $false;
	}
}

function post_toogle_private($post_id)
{
	$post_id = (int)$post_id;
	db_query("UPDATE posts SET is_private = IF(is_private = 1, 0, 1) WHERE id = '$post_id' ");
	header("Location: index.php?action=".$_GET['action']."&id=".$_GET['id']);
}

function is_anonymous()
{
	return isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'anonymous';
}

function is_logged()
{
	return isset($_SESSION['user']);
}

function delete_user($user_id)
{
	db_query("DELETE FROM users WHERE id = '$user_id'");
	db_query("DELETE FROM posts WHERE user_id = '$user_id'");
}

function add_post_comment($post_id, $user_id, $comment)
{
	$post_id = (int)$post_id;
	$user_id = (int)$user_id;
	$comment = db_escape($comment);
	db_query("INSERT INTO post_comments SET post_id = '$post_id', user_id = '$user_id', comment = '$comment', created = NOW() ");
	header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
	die;
}