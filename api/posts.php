<?php
session_start();

// set posts initially
$_SESSION['posts'] = isset($_SESSION['posts']) ? $_SESSION['posts'] : [];
// set user initially
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// save posts to session
function savePost($id) {
    $_SESSION['posts'][] = intval($id);
}

// remove posts from session
function unsavePost($id) {
    $_SESSION['posts'] = array_diff($_SESSION['posts'], [intval($id)]);
}

// check if post is saved
function isSaved($id) {
    return in_array($id, $_SESSION['posts']);
}


$urlParts = explode('/', $_SERVER['REQUEST_URI']);
$postId = end($urlParts);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isSaved($postId)) {
        unsavePost($postId);
    } else {
        savePost($postId);
    }
}

echo json_encode([
  'status' => 'ok',
  'posts' => $_SESSION['posts']
]);

?>