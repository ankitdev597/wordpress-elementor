<?php
/**
 * Seeds a fully Elementor-editable Home landing page and sets it as the front page.
 *
 * Run once via WP-CLI:
 *   wp eval-file wp-content/themes/usnews/inc/elementor/seed-home.php
 * or call usnews_seed_elementor_home() from admin.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Allow running via `wp eval-file` which loads WordPress first.
	if ( ! defined( 'WP_CLI' ) ) {
		exit;
	}
}

/**
 * Generate a short Elementor element id.
 *
 * @return string
 */
function usnews_el_id() {
	return substr( md5( uniqid( (string) wp_rand(), true ) ), 0, 7 );
}

/**
 * Build one Elementor widget node.
 *
 * @param string $type     Widget type.
 * @param array  $settings Optional settings overrides.
 * @return array
 */
function usnews_el_widget( $type, $settings = array() ) {
	return array(
		'id'         => usnews_el_id(),
		'elType'     => 'widget',
		'widgetType' => $type,
		'settings'   => $settings,
		'elements'   => array(),
	);
}

/**
 * Create / refresh the Elementor Home page.
 *
 * @param bool $force Rebuild Elementor data even if page exists.
 * @return int Page ID.
 */
function usnews_seed_elementor_home( $force = true ) {
	if ( ! did_action( 'elementor/loaded' ) && ! class_exists( '\Elementor\Plugin' ) ) {
		return 0;
	}

	$page_id = (int) get_option( 'usnews_elementor_home_id' );
	if ( ! $page_id || 'publish' !== get_post_status( $page_id ) ) {
		$existing = get_page_by_path( 'home' );
		if ( $existing ) {
			$page_id = (int) $existing->ID;
		} else {
			$page_id = wp_insert_post(
				array(
					'post_title'  => 'Home',
					'post_name'   => 'home',
					'post_status' => 'publish',
					'post_type'   => 'page',
				)
			);
		}
		update_option( 'usnews_elementor_home_id', $page_id );
	}

	if ( ! $force && get_post_meta( $page_id, '_elementor_data', true ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_id );
		return $page_id;
	}

	$education_settings = array(
		'section_id'         => 'education',
		'heading'            => 'Education',
		'view_all_text'      => 'View All Education →',
		'view_all_url'       => array( 'url' => '#education' ),
		'rankings_title'     => 'Education Rankings',
		'rankings_more_text' => 'More Rankings →',
		'rankings_more_url'  => array( 'url' => '#education' ),
		'rankings'           => array(
			array( 'title' => 'Best Colleges', 'url' => array( 'url' => '#education' ), 'text' => 'Rankings and advice to find the right college.' ),
			array( 'title' => 'Best Graduate Schools', 'url' => array( 'url' => '#education' ), 'text' => 'Connect education to your career goals.' ),
			array( 'title' => 'Best Online Colleges', 'url' => array( 'url' => '#education' ), 'text' => 'Flexible learning options you can trust.' ),
			array( 'title' => 'Global Universities', 'url' => array( 'url' => '#education' ), 'text' => 'Compare schools worldwide by research and reputation.' ),
		),
		'feature_kicker'     => 'Applying to College',
		'feature_title'      => 'Should You Accelerate Your Degree?',
		'feature_url'        => array( 'url' => '#education' ),
		'feature_text'       => "Fast-track programs can save money, but they aren't the right fit for every student.",
		'story_rows'         => array(
			array(
				'kicker'  => 'Applying to Business School',
				'title'   => 'Online vs. On-Campus MBA Program',
				'url'     => array( 'url' => '#education' ),
				'excerpt' => 'Weighing cost, flexibility and networking before you apply.',
				'byline'  => 'By Sarah Wood',
				'image'   => array( 'url' => 'https://placehold.co/1200x800' ),
			),
			array(
				'kicker'  => 'Getting In',
				'title'   => 'How to Write a Strong College Essay',
				'url'     => array( 'url' => '#education' ),
				'excerpt' => 'Admissions officers share what stands out in personal statements this cycle.',
				'byline'  => 'By Cole Claybourn',
				'image'   => array( 'url' => 'https://placehold.co/1200x800' ),
			),
		),
		'latest_more_url'    => array( 'url' => '#education' ),
		'latest_items'       => array(
			array( 'kicker' => 'Medical School Admissions Doctor', 'title' => 'The Med School Gap Year Question', 'url' => array( 'url' => '#education' ), 'excerpt' => 'Whether a gap year helps or hurts depends on how you spend the time.' ),
			array( 'kicker' => 'Law Admissions Lowdown', 'title' => 'How to Build a Strong Law School Resume', 'url' => array( 'url' => '#education' ), 'excerpt' => 'What admissions officers want to see beyond GPA and LSAT scores.' ),
			array( 'kicker' => 'Getting In', 'title' => 'The Best Tips From a Year of Getting In', 'url' => array( 'url' => '#education' ), 'excerpt' => 'Admissions advice that helped families navigate a competitive cycle.' ),
			array( 'kicker' => 'Online Learning', 'title' => 'Best Online Colleges for 2026', 'url' => array( 'url' => '#education' ), 'excerpt' => 'Flexible, accredited programs ranked by outcomes and support.' ),
		),
	);

	$wire2 = array(
		'label'   => 'News wire continued',
		'columns' => array(
			array(
				'category'   => 'Health',
				'item_1'     => 'Senate Committee Postpones Vote on Health Package',
				'item_2'     => 'US Health Officials Are Investigating a Rise in Norovirus',
				'item_3'     => 'Famine Has Ended in Gaza, Aid Groups Say',
				'item_1_url' => array( 'url' => '#health' ),
				'item_2_url' => array( 'url' => '#health' ),
				'item_3_url' => array( 'url' => '#health' ),
			),
			array(
				'category'   => 'Science',
				'item_1'     => 'FDA Panel Narrowly Backs New Drug Application',
				'item_2'     => 'Florida Researchers Bring Endangered Species Back',
				'item_3'     => 'Rei Ami From ‘KPop Demon Hunters’ Talks Science',
				'item_1_url' => array( 'url' => '#news' ),
				'item_2_url' => array( 'url' => '#news' ),
				'item_3_url' => array( 'url' => '#news' ),
			),
			array(
				'category'   => 'Entertainment',
				'item_1'     => 'DNA Expert Ties 14-Year-Old Case to New Evidence',
				'item_2'     => 'Government Withdraws Subpoenas in Media Probe',
				'item_3'     => 'Salman Rushdie Testifies at the Terrorism Trial',
				'item_1_url' => array( 'url' => '#news' ),
				'item_2_url' => array( 'url' => '#news' ),
				'item_3_url' => array( 'url' => '#news' ),
			),
		),
	);

	// Full-width container wrapping all homepage widgets.
	$elements = array(
		array(
			'id'       => usnews_el_id(),
			'elType'   => 'container',
			'isInner'  => false,
			'settings' => array(
				'content_width'      => 'full',
				'flex_direction'     => 'column',
				'flex_gap'           => array(
					'unit'  => 'px',
					'size'  => 0,
					'sizes' => array(),
				),
				'padding'            => array(
					'unit'     => 'px',
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true,
				),
				'margin'             => array(
					'unit'     => 'px',
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true,
				),
			),
			'elements' => array(
				usnews_el_widget( 'usnews-hero' ),
				array(
					'id'       => usnews_el_id(),
					'elType'   => 'container',
					'isInner'  => true,
					'settings' => array(
						'content_width'  => 'full',
						'html_tag'       => 'main',
						'_element_id'    => 'main',
						'flex_direction' => 'column',
						'flex_gap'       => array( 'unit' => 'px', 'size' => 0, 'sizes' => array() ),
						'padding'        => array( 'unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => true ),
					),
					'elements' => array(
						usnews_el_widget( 'usnews-top-news' ),
						usnews_el_widget( 'usnews-ad' ),
						usnews_el_widget( 'usnews-newsletter' ),
						usnews_el_widget( 'usnews-feed' ),
						usnews_el_widget( 'usnews-ad' ),
						usnews_el_widget( 'usnews-rankings' ), // Health defaults
						usnews_el_widget( 'usnews-rankings', $education_settings ),
						usnews_el_widget( 'usnews-photos' ),
						usnews_el_widget( 'usnews-ad' ),
						usnews_el_widget( 'usnews-topics' ),
						usnews_el_widget( 'usnews-wire' ),
						usnews_el_widget( 'usnews-ad' ),
						usnews_el_widget( 'usnews-wire', $wire2 ),
						usnews_el_widget( 'usnews-app' ),
						usnews_el_widget( 'usnews-ad' ),
					),
				),
			),
		),
	);

	update_post_meta( $page_id, '_wp_page_template', 'elementor/home-canvas.php' );
	update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
	update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
	update_post_meta( $page_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '3.0.0' );
	update_post_meta( $page_id, '_elementor_data', wp_slash( wp_json_encode( $elements ) ) );
	update_post_meta( $page_id, '_elementor_page_settings', array() );

	// Clear Elementor CSS cache for this page.
	delete_post_meta( $page_id, '_elementor_css' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_id );

	if ( class_exists( '\Elementor\Plugin' ) ) {
		$plugin = \Elementor\Plugin::$instance;
		if ( $plugin && isset( $plugin->files_manager ) && is_object( $plugin->files_manager ) ) {
			$plugin->files_manager->clear_cache();
		}
	}

	return $page_id;
}

/**
 * One-click seeder in WP admin (Tools menu).
 */
function usnews_register_seed_tool() {
	add_management_page(
		__( 'Seed Elementor Home', 'usnews' ),
		__( 'Seed Elementor Home', 'usnews' ),
		'manage_options',
		'usnews-seed-home',
		'usnews_render_seed_tool'
	);
}
add_action( 'admin_menu', 'usnews_register_seed_tool' );

/**
 * Admin page UI for seeder.
 */
function usnews_render_seed_tool() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$done = false;
	$id   = 0;
	if ( isset( $_POST['usnews_seed'] ) && check_admin_referer( 'usnews_seed_home' ) ) {
		$id   = usnews_seed_elementor_home( true );
		$done = true;
	}
	$id = $id ? $id : (int) get_option( 'usnews_elementor_home_id' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Seed Elementor Home', 'usnews' ); ?></h1>
		<?php if ( $done ) : ?>
			<div class="notice notice-success"><p>
				<?php
				printf(
					/* translators: %d: page id */
					esc_html__( 'Home page created/updated (ID %d) and set as front page.', 'usnews' ),
					(int) $id
				);
				?>
			</p></div>
		<?php endif; ?>
		<p><?php esc_html_e( 'This builds a dynamic Elementor landing page using U.S. News widgets so every headline, image, and link is editable in Elementor.', 'usnews' ); ?></p>
		<form method="post">
			<?php wp_nonce_field( 'usnews_seed_home' ); ?>
			<p>
				<button type="submit" name="usnews_seed" class="button button-primary"><?php esc_html_e( 'Build / Refresh Elementor Home', 'usnews' ); ?></button>
				<?php if ( $id ) : ?>
					<a class="button button-secondary" href="<?php echo esc_url( admin_url( 'post.php?post=' . $id . '&action=elementor' ) ); ?>">
						<?php esc_html_e( 'Edit with Elementor', 'usnews' ); ?>
					</a>
				<?php endif; ?>
			</p>
		</form>
	</div>
	<?php
}
