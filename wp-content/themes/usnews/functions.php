<?php
/**
 * U.S. News & World Report — pixel recreation theme.
 *
 * This file is a thin bootstrap. All logic is modularized under /inc.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'USNEWS_VERSION' ) ) {
	define( 'USNEWS_VERSION', '1.0.0' );
}

if ( ! defined( 'USNEWS_DIR' ) ) {
	define( 'USNEWS_DIR', get_template_directory() );
}

if ( ! defined( 'USNEWS_URI' ) ) {
	define( 'USNEWS_URI', get_template_directory_uri() );
}

/**
 * Load theme modules in dependency order.
 *
 * - setup.php         Theme supports + nav menus.
 * - enqueue.php       Styles/scripts (ordered cascade + defer).
 * - template-tags.php Reusable output helpers (nav, placeholder image).
 * - class-...-walker  Flat nav walker used by template tags/header.
 * - shortcodes.php    [usnews_home] / [usnews_section].
 * - elementor.php     Optional Elementor integration + page template.
 */
$usnews_modules = array(
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/class-usnews-nav-walker.php',
	'inc/template-tags.php',
	'inc/shortcodes.php',
	'inc/elementor.php',
);

foreach ( $usnews_modules as $usnews_module ) {
	require_once USNEWS_DIR . '/' . $usnews_module;
}
