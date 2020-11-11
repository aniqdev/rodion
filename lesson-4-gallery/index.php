<?php
	include 'header.php';
?>

<pre>
<?php
	// print_r($_FILES);
	$uploaded = false;
	if (isset($_FILES['file-pic']) && $_FILES['file-pic']['size'] > 0) {
		$uploaded = move_uploaded_file($_FILES['file-pic']['tmp_name'], 'images/'.$_FILES['file-pic']['name']);
	}
?>
</pre>

<div class="container"><br>
	<?php
	if ($uploaded) {
		echo "<p>File uploaded!</p>";
	}
	?>
	<form action="" enctype="multipart/form-data" method="post">
	  <div class="input-group is-invalid">
	    <div class="custom-file">
	      <input name="file-pic" type="file" class="custom-file-input" id="validatedInputGroupCustomFile">
	      <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
	    </div>
	    <div class="input-group-append">
	       <button class="btn btn-primary" type="submit">Add picture</button>
	    </div>
	  </div>
	</form>

<pre>
<?php
	$dir = scandir('images');
	// print_r($dir);
	// for ($i=2; $i < count($dir); $i++) {
	// 	echo $dir[$i];
	// 	echo "<hr>";
	// }
	print_r($_POST);
	if (isset($_POST['delete'])) {
		unlink('images/'.$_POST['delete']);
	}
?>
</pre>
	<br>
	<div class="gallery" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
		<?php for ($i=2; $i < count($dir); $i++){ ?>
		<div class="card" style="width: 18rem; margin-bottom: 15px;" >
		  <img src="images/<?php echo $dir[$i] ?>" class="card-img-top" alt="...">
		  <div class="card-body">
		    <p class="card-text"><?php echo $dir[$i] ?></p>
		  </div>
		  <form action="" method="post">
		  	<button name="delete" value="<?php echo $dir[$i] ?>" type="submit" class="btn btn-danger" style="width: 100%;">Delete</button>
		  </form>
		</div>
		<?php } ?>
	</div>

</div>

<script>
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
</script>

<?php
	include 'footer.php';
?>