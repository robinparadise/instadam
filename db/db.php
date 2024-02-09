<?php
session_start();

// set posts initially
$_SESSION['posts'] = isset($_SESSION['posts']) ? $_SESSION['posts'] : [];
// set user initially
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : null;



include 'config.php';

function getPosts() {
    $sessionPosts = $_SESSION['posts'];
    $conn = connectDB();
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $row['saved'] = in_array($row['id'], $sessionPosts);
            $posts[] = $row;
        }
    }
    mysqli_close($conn);
    return $posts;
}

function getUserPosts() {
    $user_id = 1;
    
    $sessionPosts = $_SESSION['posts'];
    $conn = connectDB();
    $sql = "SELECT * FROM posts WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $posts[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'image_url' => $row['image_url'],
                'user_id' => $row['user_id'],
                'saved' => in_array($row['id'], $sessionPosts)
            ];
        }
    }
    mysqli_close($conn);
    return $posts;
}

function getSessionPosts() {
    $sessionPosts = $_SESSION['posts'];
    $ids = implode(',', $sessionPosts);
    $conn = connectDB();
    $sql = "SELECT * FROM posts WHERE id IN ($ids)";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $row['saved'] = true;
            $posts[] = $row;
        }
    }
    mysqli_close($conn);
    return $posts;
}

?>