<div id="post_carousel_<?= $post['id'] ?>" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <?php foreach ($pics as $key => $img_src): ?>
    <button type="button" 
            data-bs-target="#post_carousel_<?= $post['id'] ?>" 
            data-bs-slide-to="<?= $key ?>" 
            class="<?= $key === 0 ? 'active' : '' ?>"
    ></button>
    <?php endforeach; ?>
  </div>
  <div class="carousel-inner">
    <?php foreach ($pics as $key => $img_src): ?>
    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
      <img src="<?= $img_src ?>" class="d-block" alt="...">
    </div>
    <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#post_carousel_<?= $post['id'] ?>" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#post_carousel_<?= $post['id'] ?>" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>