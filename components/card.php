<!-- $post, $saved -->

<div class="card <?=$cardStyle?>" style="<?= $styles ?>">
  <img src="<?= $post['image_url']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $post['title']; ?></h5>
    <p class="card-text"><?= $post['description']; ?></p>

    <button type="button" class="disabled btn btn-base">
      <!-- fontawesome mark -->
      <i class="<?= $post['saved'] ? 'fa-solid' : 'fa-regular'; ?> fa-bookmark"></i>
    </button>
  </div>
</div>