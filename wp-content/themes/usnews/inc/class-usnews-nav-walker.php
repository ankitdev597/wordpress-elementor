<?php
/**
 * Flat nav walker — outputs bare <a> tags to match the original markup
 * (.nav-links a, .drawer a) without <ul>/<li> wrappers.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Walker that emits only anchor elements.
 */
class USNews_Flat_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Start the list before the elements are added. Intentionally empty.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * End the list after the elements are added. Intentionally empty.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * Start the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		$output .= sprintf(
			'<a href="%s">%s</a>',
			esc_url( $item->url ),
			esc_html( $title )
		);
	}

	/**
	 * End the element output. Intentionally empty.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Page data object.
	 * @param int      $depth  Depth of page.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
