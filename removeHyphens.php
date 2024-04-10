<?php
// Load WordPress
require_once('wp-load.php');

// Get all posts
$posts = get_posts(array(
    'numberposts' => -1, // Get all posts
    'post_type' => 'post' // Change to your custom post type if needed
));

// Loop through each post
foreach ($posts as $post) {
    $post_title = $post->post_title;
    $new_title = str_replace('-', ' ', $post_title);

    // Update post title if hyphens were replaced
    if ($post_title !== $new_title) {
        $post_data = array(
            'ID' => $post->ID,
            'post_title' => $new_title
        );
        wp_update_post($post_data);
        echo 'Post ID: ' . $post->ID . ' - Title updated from ' . $post_title . ' to ' . $new_title . '<br>';
    }
}
?>