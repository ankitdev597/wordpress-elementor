<?php
/**
 * Front page — prefers Elementor/static page content when configured.
 *
 * @package usnews
 */

get_header();

if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) {
	// Dynamic Elementor (or block editor) homepage.
	while ( have_posts() ) {
		the_post();
		the_content();
	}
} else {
	// Fallback: original static markup.
	get_template_part( 'template-parts/home', 'main' );
}

get_footer();
