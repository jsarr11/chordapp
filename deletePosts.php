<?php
// Load WordPress
require_once('wp-load.php');

// Get all posts
$args = array(
    'post_type' => 'post', // Change 'post' to your custom post type if needed
    'posts_per_page' => -1, // Retrieve all posts
);

$posts = get_posts($args);

// Loop through posts and delete each one
foreach ($posts as $post) {
    wp_delete_post($post->ID, true); // Set the second parameter to true to force delete (bypass trash)
    echo "Deleted post with ID: $post->ID <br>";
}

echo "All posts have been deleted.";
?>
