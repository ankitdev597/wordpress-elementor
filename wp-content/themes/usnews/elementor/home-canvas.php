<?php
/**
 * Page template: Elementor / blank canvas body.
 *
 * Header + footer stay native. Body prefers Elementor output; if empty,
 * falls back to the full static homepage so production never shows a blank
 * middle section.
 *
 * Template Name: Elementor Home Canvas
 *
 * @package usnews
 */

get_header();

$rendered = '';
while ( have_posts() ) {
	the_post();
	ob_start();
	the_content();
	$rendered = trim( (string) ob_get_clean() );
}

if ( '' === $rendered ) {
	get_template_part( 'template-parts/home', 'main' );
} else {
	echo $rendered; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- the_content already filtered.
}

get_footer();
