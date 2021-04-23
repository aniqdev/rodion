<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

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
	<div class="meeting-content">
		<div class="meeting-title">
			1:1 meeting
		</div>
		<hr>
		<div class="meeting-body">
			<div class="meeting-subtitle">
				Invitations for this calendar
			</div>
			<div class="poll">
				<div class="poll-option option1">
					<div>
						<div class="date">Apr 21 WED</div>
						<div class="time">1:15 AM</div>
					</div>
					<div class="vote">
						<span class="votes-qtt">15</span>
						<button type="button" class="btn btn-success">vote</button>
					</div>
				</div>
				<div class="poll-option option2">
					<div>
						<div class="date">Apr 22 WED</div>
						<div class="time">5:15 PM</div>
					</div>
					<div class="vote">
						<span class="votes-qtt">26</span>
						<button type="button" class="btn btn-success">vote</button>
					</div>
				</div>
				<div class="poll-option option3">
					<div>
						<div class="date">Apr 23 WED</div>
						<div class="time">12:15 AM</div>
					</div>
					<div class="vote">
						<span class="votes-qtt">32</span>
						<button type="button" class="btn btn-success">vote</button>
					</div>
				</div>
			</div>
			<div class="location">
				Location: Skype
			</div>
			<h5>Owner note</h5>
			<p class="owner-note">
				Lorem ipsum dolor sit amet consectetur adipisicing, elit. Aliquid hic deleniti consequuntur earum blanditiis quae laborum aperiam totam corrupti necessitatibus, ad, similique quaerat consequatur, esse expedita fuga! Temporibus, aut sequi.
			</p>
			<h5 style="line-height: 38px;">User notes <button class="btn btn-primary ms-5" id="add_note_btn">Add note</button></h5>
			<ul class="notes">
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab labore unde, enim voluptatum deserunt. Fugiat voluptate omnis, repellendus, esse explicabo distinctio modi illum dolor, delectus eum nobis rem, quaerat temporibus.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab labore unde, enim voluptatum deserunt. Fugiat voluptate omnis, repellendus, esse explicabo distinctio modi illum dolor, delectus eum nobis rem, quaerat temporibus.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab labore unde, enim voluptatum deserunt. Fugiat voluptate omnis, repellendus, esse explicabo distinctio modi illum dolor, delectus eum nobis rem, quaerat temporibus.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab labore unde, enim voluptatum deserunt. Fugiat voluptate omnis, repellendus, esse explicabo distinctio modi illum dolor, delectus eum nobis rem, quaerat temporibus.</li>
				<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab labore unde, enim voluptatum deserunt. Fugiat voluptate omnis, repellendus, esse explicabo distinctio modi illum dolor, delectus eum nobis rem, quaerat temporibus.</li>
			</ul>
		</div>
	</div>
</div>

<?php include 'modals.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://unpkg.com/js-datepicker"></script>
<script src="js/main.js"></script>
</body>
</html>