<?php
	include 'header.php';
?>
<br>
<pre>
<?php
	// define('BRAKE', '<br>');

	// $name = 'Patya';

	// $string = 'Hello ' . $name;

	// echo $string . '<br>';

	// $string = "Hello $name";

	// echo $string;
	// echo BRAKE;



	// $string = 'Hello $name';

	// echo $string;



// $a = 1;
// $b = '2';

// var_dump($a < $b);
// var_dump($a > $b);

// $c = 3;
// $d = '3';

// var_dump($c === $d); // false
// var_dump($c == $d); // true

// var_dump('' == 0); // true
// var_dump(false == false); // true
// var_dump('0' == false); // true
// var_dump(' 0' == true); // false

	$langs = [
		'de' => 'In diesem Paket enthaltenen Artikel',
		'en' => 'Items included in this package',
		'fr' => 'Articles inclus dans ce package',
		'es' => 'Artículos incluidos en este pack',
		'it' => 'Oggetti inclusi in questo pacchetto',
	];

	// $langs = [
	// 	'In diesem Paket enthaltenen Artikel',
	// 	'Items included in this package',
	// 	'Articles inclus dans ce package',
	// 	'Artículos incluidos en este pack',
	// 	'Oggetti inclusi in questo pacchetto',
	// 	'In diesem Paket enthaltenen Artikel',
	// 	'Items included in this package',
	// 	'Articles inclus dans ce package',
	// 	'Artículos incluidos en este pack',
	// 	'Oggetti inclusi in questo pacchetto',
	// ];

	// print_r($langs);

	$num = 5;
	// $num = $num + 1;
	// $num += 1;
	// $num++;
	// ++$num;
	// var_dump($num++); // 5
	// var_dump($num); // 6
?>	
</pre>
<!-- <h2>My List</h2> -->
<ul class="list-group">
<?php
// $count = count($langs);
// // var_dump($count);
// for ($i=0; $i < $count; $i++) { 
// 	echo $langs[$i];
// 	echo '<br>';
// }

// foreach ($langs as $key => $value) {
// 	echo '<li class="list-group-item"><b>'.$key.': </b>'.$value.'</li>';
// 	echo "<li class=\"list-group-item\"><b>$key: </b>$value</li>";
// }


// sqr();


?>
</ul>
<pre>
<?php



function sqr($num = 5, $multiple = 10)
{
	if($num === null) $num = 5;
	print_r($num);
	echo "<br>";

	$num = $num * $multiple;

	print_r($num);
	echo "<hr>";
}

function sqr2($num = 5, $multiple = 10)
{
	$num = $num * $multiple;
	return $num;
}

$num1 = 50;
$bum2 = 150;

// $new_value = sqr2($num1, $bum2);
// $new_value = $new_value * 2;
// echo($new_value);

function greeting($name = 'user')
{
	$greet = 'Hello ' . $name . '!';
	return $greet;
}

function greeting2($user = 'user')
{
	return 'Hello ' . $user . '!';

	echo "string"; // не сработает
}



// $name = 'Igor';
// $greeting = greeting($name);
// echo($greeting);
// echo "<hr>";


// echo greeting2('Igor Ivanov'); // выодим приветствие

// sqr(6);
// sqr(67);
// sqr(675);
// sqr(345);

$points = '3';

switch ($points) {
	case (1 == $points):
		echo "We have 1 point";
		echo "<br>Nice";
		// break;
	case (2 == $points):
		echo "We have 2 points";
		echo "<br>Good";
		// break;
	case (3 == $points):
		echo "We have 3 points";
		echo "<br>Perfect";
		// break;
	
	default:
		echo "You lose!";
		break;
}


?>
</pre>
<?php
// sqr();
	include 'footer.php';
?>