<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sydney
 */

get_header();
?>

<?php do_action('sydney_before_content'); ?>

<?php do_action('sydney_single_content'); ?>

<footer class="entry-footer">
    <?php
    $post_id = get_the_ID();
    $categories = get_the_category();
    $all_categories = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));

    // Get the IDs of the categories that the post belongs to
    $category_ids = array();
    foreach ( $categories as $category ) {
        $category_ids[] = $category->term_id;
    }

    if ( ! empty( $categories ) ) {
        echo '<div class="post-categories">';
        echo '<span>' . esc_html__( 'Categories:', 'sydney' ) . '</span>';
        foreach ( $categories as $category ) {
            echo '<a class="category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
            echo '<button class="remove-category" data-post-id="' . $post_id . '" data-category-id="' . $category->term_id . '">-</button>';
        }
        echo '</div>';
    }

    if ( ! empty( $all_categories ) ) {
        echo '<div class="all-categories">';
        echo '<span>' . esc_html__( 'Rest Categories:', 'sydney' ) . '</span>';
        foreach ( $all_categories as $category ) {
            // Only display the category if the post doesn't belong to it
            if ( ! in_array( $category->term_id, $category_ids ) ) {
                echo '<a class="category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                echo '<button class="add-category" data-post-id="' . $post_id . '" data-category-id="' . $category->term_id . '">+</button>';
            }
        }
        echo '</div>';
    }
    ?>


    <div class="post-navigation">
        <div class="prev-post">
            <?php previous_post_link('%link', '← Previous Post'); ?>
        </div>
        <div class="next-post">
            <?php next_post_link('%link', 'Next Post →'); ?>
        </div>
    </div>
    <style>
        .post-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .prev-post a,
        .next-post a {
            text-decoration: none;
            color: #0073aa;
        }

        .prev-post a:hover,
        .next-post a:hover {
            color: #005177;
        }

    </style>

</footer><!-- .entry-footer -->

<?php do_action('sydney_after_content'); ?>

<?php get_footer(); ?>
