<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sydney
 */

get_header(); ?>


	<?php do_action('sydney_before_content'); ?>

	<?php do_action('sydney_single_content'); ?>

	<?php do_action('sydney_after_content'); ?>


<?php get_footer(); ?>
