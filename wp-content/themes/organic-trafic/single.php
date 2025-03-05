<?php

/**
 * The Template for displaying all single posts.
 */

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();

		the_content();

	endwhile;
endif;

wp_reset_postdata();
?>

<?php
get_footer();
