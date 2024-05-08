<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sydney
 */

get_header(); ?>


	<?php do_action('sydney_before_content'); ?>



	<?php do_action('sydney_single_content'); ?>

<footer class="entry-footer">
	<?php
	$categories = get_the_category();
	$all_categories = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));
	if ( ! empty( $categories ) ) {
		echo '<div class="post-categories">';
		echo '<span>' . esc_html__( 'Categories:', 'sydney' ) . '</span>';
		foreach ( $categories as $category ) {
			echo '<a class="category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}
		echo '</div>';
	}

	if ( ! empty( $all_categories ) ) {
		echo '<div class="all-categories">';
		echo '<span>' . esc_html__( 'All Categories:', 'sydney' ) . '</span>';
		foreach ( $all_categories as $category ) {
			echo '<a class="category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}
		echo '</div>';
	}
	?>
</footer><!-- .entry-footer -->




	<?php do_action('sydney_after_content'); ?>



<?php get_footer(); ?>
