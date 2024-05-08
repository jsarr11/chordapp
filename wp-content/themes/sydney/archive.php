<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sydney
 */

get_header();

$layout         = sydney_blog_layout();
$sidebar_pos    = sydney_sidebar_position();

$posts_per_page = 20; // Number of posts per page

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

//// Modify the main query to display 20 posts per page
//query_posts( array( 'posts_per_page' => 20 ) );

?>

<?php do_action('sydney_before_content'); ?>

<div id="primary" class="content-area <?php echo esc_attr( $sidebar_pos ); ?> <?php echo esc_attr( $layout ); ?> <?php echo esc_attr( apply_filters( 'sydney_content_area_class', 'col-md-9' ) ); ?>">
    <main id="main" class="post-wrap" role="main">

        <?php
        // Custom query to retrieve posts sorted alphabetically
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $posts_per_page, // Show all posts
            'orderby'        => 'title',
            'order'          => 'ASC', // Order posts in ascending order
            'paged'          => $paged // Current page
        );

        $custom_query = new WP_Query($args);

        if ( $custom_query->have_posts() ) :
            ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <div class="posts-layout">
                <div class="row" <?php sydney_masonry_data(); ?>>
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                        <?php get_template_part( 'content', get_post_format() ); ?>

                    <?php endwhile; ?>
                </div>
            </div>

            <?php
            // Pagination
            echo '<nav class="navigation pagination">';
            echo paginate_links( array(
                'total'     => $custom_query->max_num_pages,
                'current'   => max( 1, $paged ),
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
            ) );
            echo '</nav>';
            ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php do_action('sydney_after_content'); ?>


<?php get_footer(); ?>
