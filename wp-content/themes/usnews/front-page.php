<?php
/**
 * Front page — Elementor page when it has output, otherwise full static home.
 *
 * On some hosts Elementor can be inactive or fail to render, which left only
 * header/footer. Falling back to home-main keeps the site complete.
 *
 * @package usnews
 */

get_header();

$rendered = '';

if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) {
	while ( have_posts() ) {
		the_post();
		ob_start();
		the_content();
		$rendered = trim( (string) ob_get_clean() );
	}
}

if ( '' === $rendered ) {
	get_template_part( 'template-parts/home', 'main' );
} else {
	echo $rendered; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- the_content already filtered.
}

get_footer();
