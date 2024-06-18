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

<?php
/**
 * Template Name: Add New Category Template
 * Template for adding a new category dynamically.
 *
 * @package YourTheme
 */

get_header();
?>

<!--    <div id="primary" class="content-area">-->
<!--        <main id="main" class="site-main">-->
<!---->
<!--            <h3 class="categories-title">Προσθήκη Κατηγορίας</h3>-->
<!---->
<!--            <article id="post---><?php //the_ID(); ?><!--" --><?php //post_class(); ?><!-->-->
<!---->
<!---->
<!--                <div class="entry-content">-->
<!--                    <p>Use the form below to add a new category:</p>-->
<!---->
<!--                    <form id="add-category-form">-->
<!--                        <p>-->
<!--                            <label for="category-name">Category Name:</label>-->
<!--                            <input type="text" id="category-name" name="category_name" required>-->
<!--                        </p>-->
<!--                        <p>-->
<!--                            <label for="category-slug">Category Slug:</label>-->
<!--                            <input type="text" id="category-slug" name="category_slug" required>-->
<!--                        </p>-->
<!--                        <p>-->
<!--                            <input type="submit" value="Add Category">-->
<!--                        </p>-->
<!--                    </form>-->
<!---->
<!--                    <div id="category-message" style="display: none;"></div>-->
<!--                </div><!-- .entry-content -->-->
<!--            </article><!-- #post---><?php //the_ID(); ?><!-- -->-->
<!---->
<!--        </main><!-- #main -->-->
<!--    </div><!-- #primary -->-->

<?php get_footer(); ?>


<?php get_footer(); ?>