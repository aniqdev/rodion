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
	$post_data = db_escape($_POST);

	db_query("INSERT INTO posts SET
		user_id = '$post_data[user_id]',
		title = '$post_data[title]',
		content = '$post_data[content]'
	");
}


function increase_post_likes_count()
{
	$post_id = (int)$_GET['post_id'];
	db_query("UPDATE posts SET likes_count = likes_count + 1 WHERE id = '$post_id'");
	header("Location: index.php?action=profile&id=".$_GET['id']); 
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

function send_message($user_name)
{
	$user_from = (int)$_SESSION['user']['id'];
	$user_to = (int)$_GET['id'];
	$message = db_escape($_POST['message']);
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