<?php
  include 'db/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Instadam</title>
    <?php include 'components/head.php'; ?>
    <!-- https://picsum.photos/v2/list -->
</head>
<body>
  <?php include 'components/navbar.php'; ?>
  <div class="container-sm">
    <?php include 'components/user.php'; ?>
  </div>

  <div class="container-md margin-auto text-center d-flex flex-column justify-content-center align-items-center">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Saved</a>
      </li>
    </ul>


    <!-- Tab panes -->

    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="tab-content">
        <div class="container">
          <div class="row">
            <?php
            $posts = getUserPosts();
            foreach ($posts as $post) {
            ?>
              <div class="col-sm-4">
                <?php
                $cardStyle = '';
                $styles = '';
                include 'components/card.php';
                ?>
              </div>
            <?php } ?>
            <?php if (count($posts) == 0) { ?>
              <div class="col-sm-12">
                <p>No posts</p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="tab-content">
        <div class="container">
          <div class="row">
            <?php
            $posts = getSessionPosts();
            foreach ($posts as $post) {
            ?>
              <div class="col-sm-4">
                <?php
                $cardStyle = '';
                $styles = '';
                include 'components/card.php';
                ?>
              </div>
            <?php } ?>
            <?php if (count($posts) == 0) { ?>
              <div class="col-sm-12">
                <p>No saved posts</p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>
    
  <?php include 'components/scripts.php'; ?>
</body>
</html>
