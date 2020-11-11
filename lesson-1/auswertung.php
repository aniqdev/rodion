<?php
	include 'header.php';
?>

<style>
.error{
	color: red;
	display: inline;
}
</style>
	<pre>
	<?php
		// print_r($_GET);
		// echo "=======================================================";
		// print_r($_POST);
		// echo "=======================================================";
		// print_r($_REQUEST);
	?>
	</pre>
	<?php

		$errormassege = "field is empty";
	?>

	<?php 
			$outputData=$_REQUEST;

	 ?>

	 LastName:
	 <?php if(empty($outputData["LastName"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["LastName"];
	 }
	  ?> <br>

	 Email:
	 <?php if(empty($outputData["Email"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["Email"];
	 }
	  ?> <br>

	 SVN:
	 <?php if(empty($outputData["SVN"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["SVN"];
	 }
	  ?> <br>

	 BirthDate:
	 <?php if(empty($outputData["BirthDate"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["BirthDate"];
	 }
	  ?> <br>

	 DastolicBloodPressure:
	 <?php if(empty($outputData["DastolicBloodPressure"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["DastolicBloodPressure"];
	 }
	  ?> <br>

	 Remarks:
	 <?php if(empty($outputData["Remarks"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["Remarks"];
	 }
	  ?> <br>

	 Sex:
	 <?php if(empty($outputData["Sex"])){
	 	echo '<div class="error">' .$errormassege. '</div>';
	 }else{
	 	echo $errormassege["Sex"];
	 }
	  ?> <br>

	  <?php 
	  	 // var_dump()
	   ?>
<?php
	include 'footer.php';
?>