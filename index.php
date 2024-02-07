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
          <span>.</span>
        <?php } ?>
    </div>
    <?php include 'components/scripts.php'; ?>
</body>
</html>
