<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendar</title>

	<!-- styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<!-- <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> -->
	<link rel="stylesheet" href="css/style.css">

	<!-- datetimepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/ >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="js/jquery.datetimepicker.full.min.js"></script>
</head>
<body>

<?php include 'navigation.php' ?>

<div class="container">

	<div class="card mt-3">
	    <h5 class="card-header">Featured</h5>
		<div class="row">
			<div class="col-1 content-center">
				<div class="first-letter">R</div>
			</div>
			<div class="col-11">
			  <div class="card-body">
			    <h5 class="card-title">Special title treatment</h5>
			    <div class="options">
			    	<i class="bi bi-calendar3"></i>
			    	3 options
			    </div>
			    <div class="people">
			    	<i class="bi bi-person-square"></i>
			    	1-on-1, 1 invitee
			    </div>
			    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	</div>

	<div class="card mt-3">
	    <h5 class="card-header">Featured</h5>
		<div class="row">
			<div class="col-1 content-center">
				<div class="first-letter">Z</div>
			</div>
			<div class="col-11">
			  <div class="card-body">
			    <h5 class="card-title">Special title treatment</h5>
			    <div class="options">
			    	<i class="bi bi-calendar3"></i>
			    	3 options
			    </div>
			    <div class="people">
			    	<i class="bi bi-person-square"></i>
			    	1-on-1, 1 invitee
			    </div>
			    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	</div>

	<div class="card mt-3">
	    <h5 class="card-header">Featured</h5>
		<div class="row">
			<div class="col-1 content-center">
				<div class="first-letter">A</div>
			</div>
			<div class="col-11">
			  <div class="card-body">
			    <h5 class="card-title">Special title treatment</h5>
			    <div class="options">
			    	<i class="bi bi-calendar3"></i>
			    	3 options
			    </div>
			    <div class="people">
			    	<i class="bi bi-person-square"></i>
			    	1-on-1, 1 invitee
			    </div>
			    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	</div>

</div>

<?php include 'modals.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://unpkg.com/js-datepicker"></script>
<script src="js/main.js"></script>
</body>
</html>