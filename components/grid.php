<div class="container-md margin-auto text-center d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <?php
      include 'db/db.php';
      $posts = getPosts();
      foreach ($posts as $post) {
      ?>
        <div class="col-sm-4">
          <div class="card">
            <img src="<?php echo $post['image_url']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $post['title']; ?></h5>
              <p class="card-text"><?php echo $post['description']; ?></p>
              <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">View</a>

              <button type="button" class="btn btn-primary">
                Save
            </div>
          </div>
        </div>
      <?php } ?>
  </div>
</div>