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
	// for ($i=2; $i < count($dir); $i++) {
	// 	echo $dir[$i];
	// 	echo "<hr>";
	// }
	// print_r($_POST);
	if (isset($_POST['delete'])) {
		unlink('images/'.$_POST['delete']);
	}
	$dir = scandir('images');
	// print_r($dir);
?>
</pre>
	<br>
	<div class="">
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
  	<?php for ($i=2; $i < count($dir); $i++): ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i-2 ?>" class="<?= $i===2 ? 'active' : '' ?>"></li>
	<?php endfor; ?>
  </ol>
  <div class="carousel-inner">
  	<?php for ($i=2; $i < count($dir); $i++): ?>
    <div class="carousel-item <?= $i===2 ? 'active' : '' ?>">
      <img src="images/<?php echo $dir[$i] ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="background: rgb(0 0 0 / 45%); padding: 15px;"><?php echo $dir[$i] ?></h5>
      </div>
    </div>
	<?php endfor; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div><!-- .carousel -->
	<br>
	<div class="gallery" style="display: flex; flex-wrap: wrap;">
		<?php for ($i=2; $i < count($dir); $i++){ ?>
		<div class="card" style="width: 18rem; margin: 0 15px 15px 0" >
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