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
		return 'Password should contain uppercase and lowercase letters';
	}

	$password = hash_password($post_data['password']);

	$query = "INSERT INTO users SET
		`position` = '$position',
		email = '$email',
		name = '$name',
		last_name = '$last_name',
		username = '$username',
		`password` = '$password',
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
	  $mail->Host = 'smtp.gmail.com';
	  $mail->SMTPAuth   = true;
	  $mail->Username   = 'fgpasswprd@gmail.com';
	  $mail->Password   = '123aa678';
	  $mail->Port = 587;
	  $mail->setFrom('fgpasswprd@gmail.com',"Mailer");
	  $mail->addAddress($email);//Кому отправляем
	//$mail->addReplyTo("kudaotvetit@yandex.ru","Имя кому писать при ответе");
	  $mail->SMTPSecure = 'tls';
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