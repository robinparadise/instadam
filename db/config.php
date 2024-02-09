<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "instadam";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {      
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database if it doesn't exist
    try {
      $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
      if (mysqli_query($conn, $sql)) {
          // echo "Database created successfully<br>";
      } else {
          echo "Error creating database: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error creating database: " . $e->getMessage() . "<br>";
    }

    // Connect to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    try {
      // Create table if it doesn't exist
      $sql = "CREATE TABLE IF NOT EXISTS `posts` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `user_id` int(11),
          `title` varchar(255) NOT NULL,
          `description` text NOT NULL,
          `image_url` varchar(255) NOT NULL,
          PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
      if (mysqli_query($conn, $sql)) {
          // echo "Table created successfully<br>";
      } else {
          echo "Error creating table: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error creating table: " . $e->getMessage() . "<br>";
    }

    return $conn;
}

function populateData() {
    // Connect to the database
    $conn = connectDB();

    // Clean the posts table
    try {
        $sql_clean = "DELETE FROM posts";
        if (mysqli_query($conn, $sql_clean)) {
            // echo "Table cleaned successfully<br>";
        } else {
            echo "Error cleaning table: " . mysqli_error($conn) . "<br>";
        }
    } catch (Exception $e) {
        echo "Error cleaning table: " . $e->getMessage() . "<br>";
    }

    // Sample data array
    $sample_data = array(
      array(
        "title" => "Beautiful Sunset",
        "user_id" => 1,
        "description" => "A stunning sunset over the ocean with vibrant colors reflecting off the water.", 
        "image_url" => "https://picsum.photos/id/11/640/640"),
      array(
        "title" => "Cute Puppy",
        "user_id" => 1,
        "description" => "An adorable puppy playing in the park, chasing after a ball with its tongue out.", 
        "image_url" => "https://picsum.photos/id/12/640/640"),
      array(
        "title" => "Delicious Food",
        "user_id" => 1,
        "description" => "A mouth-watering dish prepared by a chef, featuring a colorful array of fresh ingredients.", 
        "image_url" => "https://picsum.photos/id/13/640/640"),
      array(
        "title" => "Snowy Mountain",
        "user_id" => 1,
        "description" => "A majestic snow-capped mountain towering over a peaceful valley, surrounded by pine trees.", 
        "image_url" => "https://picsum.photos/id/14/640/640"),
      array(
        "title" => "City Lights", 
        "description" => "The sparkling lights of a bustling city skyline at night, with tall skyscrapers reaching for the stars.", 
        "image_url" => "https://picsum.photos/id/15/640/640"),
      array(
        "title" => "Autumn Leaves", 
        "description" => "Golden leaves falling from trees in a serene autumn forest, creating a beautiful carpet on the ground.", 
        "image_url" => "https://picsum.photos/id/16/640/640"),
      array(
        "title" => "Morning Coffee", 
        "description" => "A steaming cup of freshly brewed coffee, with creamy foam on top, perfect for starting the day.", 
        "image_url" => "https://picsum.photos/id/17/640/640"),
      array(
        "title" => "Beach Vacation", 
        "description" => "Relaxing on a sandy beach under the shade of palm trees, with crystal-clear water stretching to the horizon.", 
        "image_url" => "https://picsum.photos/id/18/640/640"),
      array(
        "title" => "Travel Adventure", 
        "description" => "Exploring exotic destinations and experiencing new cultures, with unforgettable memories made along the way.", 
        "image_url" => "https://picsum.photos/id/19/640/640"),
      array(
        "title" => "Nature's Beauty", 
        "description" => "Breathtaking landscapes and awe-inspiring natural wonders, showcasing the beauty of our planet.", 
        "image_url" => "https://picsum.photos/id/110/640/640"),
      array(
        "title" => "Vintage Charm", 
        "description" => "Discovering hidden treasures in antique shops and flea markets, each with its own unique story to tell.", 
        "image_url" => "https://picsum.photos/id/111/640/640"),
      array(
        "title" => "Artistic Expression", 
        "description" => "Exploring the world of art and creativity, where imagination knows no bounds and every brushstroke tells a story.", 
        "image_url" => "https://picsum.photos/id/112/640/640"),
      array(
        "title" => "Music Melodies", 
        "description" => "Losing yourself in the rhythm and melody of your favorite songs, where the world fades away and only the music remains.", 
        "image_url" => "https://picsum.photos/id/113/640/640"),
      array(
        "title" => "Cozy Home", 
        "description" => "Curling up with a good book by the fireplace on a cold winter's day, surrounded by warmth and comfort.", 
        "image_url" => "https://picsum.photos/id/114/640/640"),
      array(
        "title" => "Adventure Awaits", 
        "description" => "Setting out on a journey into the unknown, with excitement and anticipation for the adventures that lie ahead.", 
        "image_url" => "https://picsum.photos/id/115/640/640"),
      array(
        "title" => "Dream Destination", 
        "description" => "Visiting bucket-list destinations and ticking off items from your travel wishlist, one unforgettable experience at a time.", 
        "image_url" => "https://picsum.photos/id/116/640/640"),
        // Add more sample data as needed
    );

    // Insert sample data into the posts table
    foreach ($sample_data as $post) {
        $user_id = mysqli_real_escape_string($conn, isset($post['user_id']) ? $post['user_id'] : 0);
        $title = mysqli_real_escape_string($conn, $post['title']);
        $description = mysqli_real_escape_string($conn, $post['description']);
        $image_url = mysqli_real_escape_string($conn, $post['image_url']);
        $sql = "INSERT INTO posts (user_id, title, description, image_url) VALUES ('$user_id', '$title', '$description', '$image_url')";
        if (mysqli_query($conn, $sql)) {
            // echo "Record inserted successfully: $title<br>";
        } else {
            echo "Error inserting record: " . mysqli_error($conn) . "<br>";
        }
    }


    // Close connection
    mysqli_close($conn);
}

// Populate data
//populateData();
?>