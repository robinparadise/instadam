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
    <h1>Instadam</h1>
    <div class="container posts">
        <?php
        include 'db/db.php';
        $posts = getPosts();
        foreach ($posts as $post) {
        ?>
          <!-- TODO -->
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://placekitten.com/200/287" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        <?php } ?>
    </div>
    <?php include 'components/scripts.php'; ?>
</body>
</html>