<?php
	include 'auth_check.php';
	include 'classes.php';
	include 'functions.php';
	include 'header.php';
?>

<pre>
<?php

$arr = [
	'name' => 'Kirill',
	'age' => 25,
	'is_single' => true,
	'address' => [
		'city' => 'NY',
		'street' => 'Awenu',
	]
];

// $json = json_encode($arr, JSON_PRETTY_PRINT);

// $res = file_put_contents('files/user.json', $json);

// $file = file_get_contents('files/user.json');

// $array = json_decode($file, true);

// print_r($array['address']);















$json = json_encode($arr);

// var_dump($json);

// $str = '{"name":"Kirill","age":25,"is_single":true}';

$obj = json_decode($json); // объект

// var_dump($obj->address->street);

$arr = json_decode($json, true); // массив

// var_dump($arr['address']['city']);

// $server_string = file_get_contents('https://jsonplaceholder.typicode.com/users');

// $array = json_decode($server_string, true);
$array = [];

// print_r($array);



$file = file_get_contents('files/ebay-list-may.csv');

$file = explode("\n", $file);

print_r($file);


?>
</pre>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($array as $key => $user) { ?>
    <tr>
      <th><?= $user['id'] ?></th>
      <td><?= $user['name'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
    </tr>
  	<?php } ?>
  </tbody>
</table>
</div>


<div class="container">
	<h1>Home Page</h1>
</div>

<?php
	include __DIR__.'/footer.php';
?>