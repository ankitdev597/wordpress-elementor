<?php
/**
 * Elementor integration: page template, widgets, homepage seeder.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Elementor Home Canvas page template.
 *
 * @param array $templates Templates.
 * @return array
 */
function usnews_register_elementor_templates( $templates ) {
	$templates['elementor/home-canvas.php'] = __( 'Elementor Home Canvas', 'usnews' );
	return $templates;
}
add_filter( 'theme_page_templates', 'usnews_register_elementor_templates' );

/**
 * Load canvas template file.
 *
 * IMPORTANT: never override Elementor's own editor/preview templates,
 * or the editor stays stuck on "LOADING" / Safe Mode prompt.
 *
 * @param string $template Template path.
 * @return string
 */
function usnews_load_elementor_template( $template ) {
	// Elementor editor / preview / library — leave alone.
	if ( isset( $_GET['elementor-preview'] ) || isset( $_GET['elementor_library'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return $template;
	}
	if ( isset( $_GET['action'] ) && 'elementor' === $_GET['action'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return $template;
	}
	if ( class_exists( '\Elementor\Plugin' ) ) {
		$plugin = \Elementor\Plugin::$instance;
		if ( $plugin && isset( $plugin->preview ) && is_object( $plugin->preview ) && method_exists( $plugin->preview, 'is_preview_mode' ) && $plugin->preview->is_preview_mode() ) {
			return $template;
		}
		if ( $plugin && isset( $plugin->editor ) && is_object( $plugin->editor ) && method_exists( $plugin->editor, 'is_edit_mode' ) && $plugin->editor->is_edit_mode() ) {
			return $template;
		}
	}

	if ( is_page() && 'elementor/home-canvas.php' === get_page_template_slug() ) {
		$file = USNEWS_DIR . '/elementor/home-canvas.php';
		if ( file_exists( $file ) ) {
			return $file;
		}
	}
	return $template;
}
add_filter( 'template_include', 'usnews_load_elementor_template', 20 );

/**
 * Theme support for Elementor.
 */
function usnews_elementor_support() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}
	add_theme_support( 'elementor' );
}
add_action( 'after_setup_theme', 'usnews_elementor_support', 20 );

/**
 * Neutralize Elementor chrome that would fight our CSS.
 */
function usnews_elementor_compat_css() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}
	$css = '
		.elementor-section.elementor-section-boxed > .elementor-container { max-width: none; }
		.elementor-widget:not(:last-child) { margin-bottom: 0 !important; }
		.elementor-element { --widgets-spacing: 0px 0px; }
		body.elementor-page .elementor { overflow: visible; }
		.elementor-widget-usnews-hero,
		.elementor-widget-usnews-top-news,
		.elementor-widget-usnews-newsletter,
		.elementor-widget-usnews-feed,
		.elementor-widget-usnews-rankings,
		.elementor-widget-usnews-photos,
		.elementor-widget-usnews-topics,
		.elementor-widget-usnews-wire,
		.elementor-widget-usnews-app,
		.elementor-widget-usnews-ad {
			width: 100%;
		}
	';
	wp_add_inline_style( 'usnews-base', $css );
}
add_action( 'wp_enqueue_scripts', 'usnews_elementor_compat_css', 20 );

/**
 * Register Elementor widget category + widgets.
 */
function usnews_register_elementor_widgets( $widgets_manager ) {
	require_once USNEWS_DIR . '/inc/elementor/class-widget-base.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-hero.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-top-news.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-ad.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-newsletter.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-feed.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-rankings.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-photos.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-topics.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-wire.php';
	require_once USNEWS_DIR . '/inc/elementor/widgets/class-widget-app.php';

	$widgets_manager->register( new \USNews\Elementor\Widget_Hero() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Top_News() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Ad() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Newsletter() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Feed() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Rankings() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Photos() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Topics() );
	$widgets_manager->register( new \USNews\Elementor\Widget_Wire() );
	$widgets_manager->register( new \USNews\Elementor\Widget_App() );
}
add_action( 'elementor/widgets/register', 'usnews_register_elementor_widgets' );

/**
 * Add "U.S. News" category in Elementor panel.
 *
 * @param \Elementor\Elements_Manager $elements_manager Manager.
 */
function usnews_elementor_category( $elements_manager ) {
	$elements_manager->add_category(
		'usnews',
		array(
			'title' => __( 'U.S. News Homepage', 'usnews' ),
			'icon'  => 'fa fa-newspaper',
		)
	);
}
add_action( 'elementor/elements/categories_registered', 'usnews_elementor_category' );

require_once USNEWS_DIR . '/inc/elementor/seed-home.php';
