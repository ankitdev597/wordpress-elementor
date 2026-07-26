<?php
/**
 * Page template: Elementor / blank canvas body.
 *
 * Header + footer stay native (pixel-accurate). The page body is
 * whatever Elementor (or the editor) outputs — use Custom HTML /
 * Shortcode widgets with [usnews_home] or section shortcodes.
 *
 * Template Name: Elementor Home Canvas
 *
 * @package usnews
 */

get_header();

/*
 * Do NOT wrap in <main> — [usnews_home] / Custom HTML already includes
 * .decision-hero + <main id="main"> matching index.html.
 */
while ( have_posts() ) {
	the_post();
	the_content();
}

get_footer();
