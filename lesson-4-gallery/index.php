<?php
	include 'classes.php';
	include 'header.php';
?>

<pre>
<?php
// print_r($_FILES);
$uploaded = '';
if (isset($_FILES['file-pic']) && $_FILES['file-pic']['size'] > 0) {
	print_r($_FILES);
	if (in_array($_FILES['file-pic']['type'], ['image/jpeg','image/png','some other type'])) {
		$uploaded = move_uploaded_file($_FILES['file-pic']['tmp_name'], 'images/'.$_FILES['file-pic']['name']);
		if($uploaded) $uploaded = 'File uploaded!';
	}else{
		$uploaded = 'Wrong filetype';
	}
}

// $image = new SingleFile('cat.jpg');
// $image2 = new SingleFile('bird.jpg');


// $image->filename = 'dog';

// print_r($image);
// print_r($image2);

// echo "<hr>";
// print_r($image->get_name());

?>
</pre>

<div class="container"><br>
	<?php
		echo "<p>$uploaded</p>";
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
	// print_r(__DIR__); // путь к текущей папке
	// print_r(__FILE__); // путь к текущему файлу

	if (isset($_POST['delete'])) {
		$image = new SingleFile($_POST['delete']);
		$image->delete();
	}

	$catalog = new Catalog('images');
	$file_array = $catalog->getAllFiles();


	$obj = new Catalog('test directory 2');
	print_r($obj->dir_path);
	$obj->create_dir();
	// $obj->remove_dir();
?>
</pre>

	<br>
	<div class="">
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
  	<?php foreach ($file_array as $i => $file): ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>" class="<?= $i===0 ? 'active' : '' ?>"></li>
	<?php endforeach; ?>
  </ol>
  <div class="carousel-inner">
  	<?php foreach ($file_array as $i => $file): ?>
    <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
      <img src="<?php echo $file->path ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="background: rgb(0 0 0 / 45%); padding: 15px;"><?php echo $file->filename ?></h5>
      </div>
    </div>
	<?php endforeach; ?>
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
		<?php foreach ($file_array as $i => $file){ ?>
		<div class="card" style="width: 18rem; margin: 0 15px 15px 0" >
		  <img src="<?php echo $file->path ?>" class="card-img-top" alt="...">
		  <div class="card-body">
		    <p class="card-text"><?php echo $file->get_name() ?></p>
		  </div>
		  <form action="" method="post">
		  	<button name="delete" value="<?php echo $file->get_name() ?>" type="submit" class="btn btn-danger" style="width: 100%;">Delete</button>
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