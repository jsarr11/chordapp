<?php
/**
 * The home template file.
 *
 * @package Sydney
 */

get_header(); ?>

<?php

    // Get all categories
    $categories = get_categories();
?>

<h3 class="categories-title">Ακόρντα - Κατηγορίες</h3>

<?php
    // Display all categories with links
    echo '<ul>';
    foreach ( $categories as $category ) {
    echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
    }
    echo '</ul>';


    ?>


<?php get_footer(); ?>