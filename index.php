<?php
  include 'db/db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Instadam</title>
  <?php include 'components/head.php'; ?>
</head>

<body>
  <?php include 'components/navbar.php'; ?>
  <div class="container-sm text-center">
    <h1>Instadam</h1>
    <p>Welcome to Instadam, the best place to share your photos!</p>
  </div>
  <div class="container-md margin-auto text-center d-flex flex-column justify-content-center align-items-center">
    <?php
    $posts = getPosts();
    foreach ($posts as $post) {
      $cardStyle = 'my-3';
      $styles = 'max-width:600px';
      include 'components/card.php';
    }?>
  </div>
  <?php include 'components/footer.php'; ?>
  <?php include 'components/scripts.php'; ?>
</body>

</html>