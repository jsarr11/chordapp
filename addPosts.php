<?php
// Load WordPress environment
require_once('wp-load.php');

// Define the uploads directory path
$uploads_dir = wp_upload_dir()['basedir'];

// Define the target directory within uploads
$target_dir = $uploads_dir . '/2024/04'; // Adjusted to '04' for month 'March'

// Function to list files recursively
function listFiles($dir) {
    if (is_dir($dir)) {
        $files = scandir($dir);
        $files = array_diff($files, array('.', '..'));
        return $files;
    } else {
        echo "Directory not found: $dir";
        return array();
    }
}

// Retrieve list of files
$files = listFiles($target_dir);

// Include WordPress core functions for post insertion
require_once(ABSPATH . 'wp-admin/includes/post.php');

// Loop through each file
foreach ($files as $file) {
    // Extract filename without extension and replace spaces with empty strings
    $post_title = str_replace(' ', '', pathinfo($file, PATHINFO_FILENAME));

    // Check if the file is a PDF
    if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) == 'pdf') {
        // Insert post
        $post_id = wp_insert_post(array(
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_type' => 'post'
        ));

        // Construct URL to the PDF file
        $pdf_url = site_url('/wp-content/uploads/2024/04/' . $file);

        // Embed PDF viewer shortcode with PDF URL
        $pdf_shortcode = '[pdf-embedder url="' . $pdf_url . '"]';

        // Update post content with PDF viewer shortcode
        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => $pdf_shortcode
        ));

        echo "Post created: $post_title <br>";
    } else {
        echo "Not a PDF file: $file <br>";
    }
}

?>