<?php
	include 'header.php';
?>
<br>
<div class="card" style="width: 18rem;">
  <img src="https://i.pinimg.com/originals/72/a2/02/72a2027b417410f1381ce25d3190bff7.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis culpa, quam expedita accusantium ab id voluptates molestias iusto tempora sed officiis nisi, odit odio praesentium. Voluptatibus beatae facilis quia, laborum.</p>
  </div>
</div>
<pre>
	<?php
	// $var = [
	// 	'qwe' => 'first',
	// 	'asd' => 2,
	// 	'dfg' => 3.54,
	// 	'cxcv' => null,
	// 	'dfgh' => true
	// ];
	// print_r($var['qwe']);
		// print_r($_SERVER['PHP_SELF']);
	$var = 'asd';
	echo $var ? 'TRUE' : 'FALSE';
	?>	
</pre>
<?php
	include 'footer.php';
?>